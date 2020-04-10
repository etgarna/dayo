<?php
namespace classes\common\system;

class Texts
{
    //Validations//
    public static $emailPasswordNotCorrect="E-mail or password not correct!";
    public static $fillEmptyField="Please fill the empty fields!";
    public static $anotherUserExist="Another user with this e-mail exists!";
    public static $passwordNotMatch="Password and confirmation password do not match!";
    public static $successfullyRegistered="You have successfully registered!";
    public static $authorizationDeniedRequest="Authorization has been denied for this request!";
    public static $emptyOrInvalidInputs="Please validate empty or invalid inputs (marked with red) before submitting the form.";
    public static $emailNotSend="There was a problem sending your e-mai. Please Connect to your administrator.";
    public static $resetPasswordSend="An e-mail with password reset instructions is sent to your e-mail address.";
    public static $notFindUser="Can't find a user with that e-mail address!";
    public static $invalidResetToken = "Your token to reset your password is invalid or has expired!";
    public static $passwordChanged="Your password is changed. Please login with your new password.";
    public static $currentPasswordNotValid="Your current password is not valid!";

    //Form Validate//
    public static $selectEmail="Please select a email.";
    public static $selectPassword="Please select a password.";
    public static $selectCompany="Please select company name";
    public static $selectFullName="Please select full name.";
    public static $selectCountry="Please select country.";
    public static $selectConfirmPassword="Please confirm a password.";
    public static $selectCurrentPassword="Please select a current password.";

    //Labels//
    public static $email="Email";
    public static $password="Password";
    public static $confirmPassword="Confirm Password";
    public static $currentPassword="Current Password";
    public static $remember="Remember";
    public static $fullName="Full Name";
    public static $company="Company";
    public static $createRole="Create Role";
    public static $editRole="Edit Role";
    public static $role="Role";
    public static $general="General";
    public static $roleName="Role Name";
    public static $roles="Roles";
    public static $edit="Edit";
    public static $name="Name";
    public static $createUser="Create User";
    public static $editUser="Edit User";
    public static $active="Active";
    public static $permission="Permission";
    public static $users="Users";
    public static $image="Image";
    public static $countries="Countries";
    public static $createCountry="Create Country";
    public static $editCountry="Edit Country";
    public static $code="Code";
    public static $phoneCode="Phone Code";
    public static $countryName="Country Name";
    public static $country="Country";
    public static $states="States";
    public static $createState="Create State";
    public static $editState="Edit State";
    public static $state="State";
    public static $stateName="State Name";
    public static $companies="Companies";
    public static $createCompany="Create Company";
    public static $editCompany="Edit Company";
    public static $companyName="Company Name";
    public static $created="Created";
    public static $logo="Logo";
    public static $city="City";
    public static $address="Address";
    public static $zipCode="ZipCode";
    public static $phone="Phone";
    public static $fax="Fax";
    public static $site="Site URL";
    public static $introduction="Introduction";
    public static $resetPassword="Reset Password";
    public static $forgotPassword="Forgot Password";
    public static $translation="Translation";
    public static $textKey="Text Key";
    public static $sourceLanguage="Source Language";
    public static $targetLanguage="Target Language";
    public static $languages="Languages";
    public static $createLanguage="Create Language";
    public static $editLanguage="Edit Language";

    //Buttons & Links//
    public static $signIn="Sign In";
    public static $signUp="Sign Up";
    public static $save="Save";
    public static $saveClose="Save Close";
    public static $update="Update";
    public static $delete="Delete";
    public static $updateClose="Update Close";
    public static $changePassword="Change Password";
    public static $logout="Logout";

    //Place Holders//
    public static $search="SEARCH";
    public static $select="SELECT";
    public static $selectSourceLanguage="SOURCE LANGUAGE";
    public static $selectTargetLanguage="TARGET LANGUAGE";

    //Confirm//
    public static $isDeleteRecord="Are you sure you want to delete this record?";

    //Notification//
    public static $savedSuccessfully="Saved successfully";
    public static $updatedSuccessfully="Updated successfully";
    public static $deletedSuccessfully="Deleted successfully";

    //Navigation//
    public static $home="Home";
    public static $administration="Administration";
    public static $userManagement="User Management";
    public static $data="Data";
    public static $translate="Translate";
}