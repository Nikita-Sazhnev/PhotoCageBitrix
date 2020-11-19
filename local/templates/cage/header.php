<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
die();
?>
<!DOCTYPE html>
<html>
	<head>
		<?$APPLICATION->ShowHead();
		use Bitrix\Main\Page\Asset;
		//JS
		CJSCore::Init(array("jquery"));
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/fancy.js');
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/script.js');
		//CSS
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/jquery.fancybox.css');
		//STIRNG
		Asset::getInstance()->addString("<link rel='shortcut icon' type='image/x-icon' href='".SITE_TEMPLATE_PATH."/img/art-and-design.png' />");
		Asset::getInstance()->addString("<meta name='viewport' content='width=device-width, initial-scale=1'>");
		Asset::getInstance()->addString("<link href='https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap' rel='stylesheet'>");
		?>
		<title><?$APPLICATION->ShowTitle();?></title>
	</head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
		<header class="warpper__header">
			<div class="logo">
				<a href="/">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/includes/logo.php"
					)
				);?>
				</a>
			</div>
			<div class="nav__icon">
				<div class="nav__link__icon">
					<a href="#" id="menu" class="icon">&#9776;</a>
				</div>
			</div>
			<nav class="topnav" id="myTopnav">		
				<?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
					"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					"DELAY" => "N",	// Откладывать выполнение шаблона меню
					"MAX_LEVEL" => "1",	// Уровень вложенности меню
					"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
						0 => "",
					),
					"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"MENU_CACHE_TYPE" => "N",	// Тип кеширования
					"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
					"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
					"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
					),
				false
				);?>
			</nav>
		</header>
		<main class="warpper">
		