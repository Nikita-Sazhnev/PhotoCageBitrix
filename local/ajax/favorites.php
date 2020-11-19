<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle(' ');
$GLOBALS['APPLICATION']->RestartBuffer();
use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;
$application = Application::getInstance();
$context = $application->getContext();
global $APPLICATION;
?>
<?php 
	$id = $_GET['id'];
	if($_GET['action'] == "add") {
		$APPLICATION->set_cookie($id, true, time()+60*60*24*30*12*2);
	} else {
		$APPLICATION->set_cookie($id, true, time()-60*60*24*30*12*2);
	}
?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
