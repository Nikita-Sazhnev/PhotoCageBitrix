<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Логин");
?><?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "login", Array(
	"COMPONENT_TEMPLATE" => ".default",
		"REGISTER_URL" => "/reg/",	// Страница регистрации
		"FORGOT_PASSWORD_URL" => "/forgot/",	// Страница забытого пароля
		"PROFILE_URL" => "/",	// Страница профиля
		"SHOW_ERRORS" => "N",	// Показывать ошибки
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>