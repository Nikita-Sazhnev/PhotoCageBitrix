<div class="paginat">
	<?php 
if (!CModule::IncludeModule('iblock')) {
    ShowError('Модуль «Информационные блоки» не установлен');
}

// какие поля элементов инфоблока выбираем
$arSelect = array(
    'ID',
    'CODE',
    'NAME',
    'PREVIEW_TEXT',
);
// условия выборки элементов инфоблока
$arFilter = array(
    'IBLOCK_ID' => 1,             // идентификатор инфоблока
    'IBLOCK_ACTIVE' => 'Y',       // инфоблок должен быть активным
    'SECTION_ID' => 3,           // идентификатор раздела инфоблока
    'INCLUDE_SUBSECTIONS' => 'Y', // включая элементы из подразделов
    'SECTION_ACTIVE' => 'Y',      // разделы элементов должны быть активными
    'ACTIVE' => 'Y',              // только активные элементы
    'ACTIVE_DATE' => 'Y',         // активные элементы с учетом даты
);
// сортировка элементов
$arSort = array(
    'SORT' => 'ASC'
);
// постраничная навигация
$arNavParams = array(
    'nPageSize' => 20,   // количество элементов на странице
    'bShowAll' => true, // показывать ссылку «Все элементы»?
);
// выполняем запрос к базе данных
$dbResult = CIBlockElement::GetList(
    $arSort,
    $arFilter,
    false,
    $arNavParams,
    $arSelect
);

ob_start(); // начинаем буферизацию вывода
$APPLICATION->IncludeComponent(
	"bitrix:system.pagenavigation", 
	"modern", 
	array(
		"NAV_TITLE" => "Элементы",
		"NAV_RESULT" => $dbResult,
		"SHOW_ALWAYS" => true,
		"COMPONENT_TEMPLATE" => "modern"
	),
	false
);
$navString = ob_get_clean(); // завершаем буферизацию вывода


// выводим постраничную навигацию
echo $navString;

?>
</div>