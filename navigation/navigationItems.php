<?php
namespace classes\common\navigation;
use classes\common\system\Texts;
use classes\security\PermissionsKey;

class NavigationItems
{
    public function init(){
        NavigationAssembly::link(1,Texts::$home, BASE_URL);

        NavigationAssembly::menu(2,Texts::$administration);
        NavigationAssembly::link(2,Texts::$companies, BASE_URL."/company/index",PermissionsKey::$CompanyView);
        NavigationAssembly::link(2,Texts::$userManagement, BASE_URL."/user/index",PermissionsKey::$UserView);
        NavigationAssembly::link(2,Texts::$roles, BASE_URL."/role/index",PermissionsKey::$RoleView);
        NavigationAssembly::link(2,Texts::$languages, BASE_URL."/language/index",PermissionsKey::$LanguageView);
        NavigationAssembly::link(2,Texts::$translation, BASE_URL."/translation/index",PermissionsKey::$TranslateView);

        NavigationAssembly::menu(3,Texts::$data);
        NavigationAssembly::link(3,Texts::$countries, BASE_URL."/country/index",PermissionsKey::$CountryView);
        NavigationAssembly::link(3,Texts::$states, BASE_URL."/state/index",PermissionsKey::$StateView);
    }
}

