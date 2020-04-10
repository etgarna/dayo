<?php
namespace classes\security;
use classes\common\helpers\Utils as Utils;
use classes\dal\Context as Context;
use classes\security\UserRetrieveService as UserRetrieveService;

class Identity {
	public function authenticate( $email, $password ) {
		$user = $this->getUser( $email );
		if ( !$user ) {
			return false;
		}

		$hashPassword = $this->getHash( $password, $user[ 'salt' ] );
		if ( $hashPassword != $user[ 'password' ] ) {
			return false;
		}
		return true;
	}

	public function checkUserExist( $email,$curUserId=null ) {
		$entity="user";
		$context=new Context($entity);
		
		if($curUserId){
			return $context->any("email='$email' and id!='$curUserId'");
		}
		return $context->any("email='$email'");
	}


	public function checkPasswordMatch( $password, $confirmPassword ) {
		if ( $password != $confirmPassword ) {
			return false;
		}
		return true;
	}

	public function generateHash( $password, &$salt )
    {
        $salt = uniqid(mt_rand(), true);
        $hashPassword = $this->getHash($password, $salt);
        return $hashPassword;
    }

	private function getHash( $password, $salt ) {
		$hash = md5( md5( $password ) . $salt );
		return $hash;
	}

	public function authorization( $email, $persistent ) {
		$user=$this->getUser($email);
		$this->setUserToken($user["id"], $userToken);
        UserRetrieveService::setUserDefinition($user["id"],null);

		$_SESSION[ "authorize" ] = true;
		$_SESSION[ "userToken" ] = $userToken;
		
		if ($persistent){
            Utils::setCookie("userToken", $userToken,86400);
		} else {
            Utils::deleteCookie("userToken");
		}

		$expire=3600*24*365;
		if(empty($user["languageId"])){
            Utils::setCookie("languagePreference","en",$expire);
        }else{
            Utils::setCookie("languagePreference",$user["languageId"],$expire);
        }
	}

	public function logOut() {
		unset( $_SESSION[ "authorize" ] );
        unset( $_SESSION[ "userToken" ] );
		Utils::deleteCookie("userToken");
        UserRetrieveService::resetUserDefinition();
		session_destroy();
	}

	public function getUser( $email ) {
		$entity="user";
		$context=new Context($entity);
        $context->tableAs("u");
        $context->select("u.id,u.salt,u.password,u.languageId");
        $context->join_on("companies as c on c.id=u.companyId");
		$context->where("u.email='$email' and u.active='1' and c.active='1'");
		return $context->fetchFirstOrDefault();
	}

	private function setUserToken($userId,&$userToken){
        $userToken=md5(md5($userId));
	    $entity="user";
        $context=new Context($entity);
        $context->user->id=$userId;
        $context->user->token=$userToken;
        $context->updateValues("token");
        $context->update($context->user);
        $context->save();
    }

    public function changeUserPassword($userId,$password){
        $context=new Context("user");
        $context->user->id=$userId;
        $context->user->password=$this->generateHash( $password, $salt );
        $context->user->salt=$salt;
        $context->updateValues("password,salt");
        $context->update($context->user);
        $context->save();
    }
}
?>