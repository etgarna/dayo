<?php
namespace classes\security;

class PermissionsKey{
    public static $HomeView = "Main.Home.View";

    public static $CompanyView = "Administration.Company.View";
    public static $CompanyCreate = "Administration.Company.Create";
    public static $CompanyUpdate = "Administration.Company.Update";
    public static $CompanyDelete = "Administration.Company.Delete";

    public static $UserView = "Administration.User.View";
	public static $UserCreate = "Administration.User.Create";
	public static $UserUpdate = "Administration.User.Update";
	public static $UserDelete = "Administration.User.Delete";
	
	public static $RoleView = "Administration.Role.View";
	public static $RoleCreate = "Administration.Role.Create";
	public static $RoleUpdate = "Administration.Role.Update";
	public static $RoleDelete = "Administration.Role.Delete";

    public static $TranslateView = "Administration.Translate.View";
    public static $TranslateUpdate = "Administration.Translate.Update";

    public static $LanguageView = "Administration.Language.View";
    public static $LanguageCreate = "Administration.Language.Create";
    public static $LanguageUpdate = "Administration.Language.Update";
    public static $LanguageDelete = "Administration.Language.Delete";

    public static $CountryView = "Data.Country.View";
    public static $CountryCreate = "Data.Country.Create";
    public static $CountryUpdate = "Data.Country.Update";
    public static $CountryDelete = "Data.Country.Delete";

    public static $StateView = "Data.State.View";
    public static $StateCreate = "Data.State.Create";
    public static $StateUpdate = "Data.State.Update";
    public static $StateDelete = "Data.State.Delete";
}
?>