<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);

if (!empty($arResult["ERRORS"])):?>
	<?ShowError(implode("<br />", $arResult["ERRORS"]))?>
<?endif;
if ($arResult["MESSAGE"] <> ''):?>
	<?ShowNote($arResult["MESSAGE"])?>
<?endif?>

	<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
		<?=bitrix_sessid_post()?>
		<h1>Please select an image from your computer</h1>
		<div class="browse__box">
			<div class="field__wrapper">
				<?if ($arParams["MAX_FILE_SIZE"] > 0):?>
					<input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" />
				<?endif?>
				<?if (is_array($arResult["PROPERTY_LIST"]) && !empty($arResult["PROPERTY_LIST"])):?>								
					<input type="hidden" name="PROPERTY[NAME][0]" size="51" value="<?=time()?>">				
					<input type="hidden" name="PROPERTY[IBLOCK_SECTION][]" size="12" multiple="multiple" value="3">
					<input type="hidden" name="PROPERTY[DETAIL_PICTURE][0]" value="">
					<input id="field__file-2" class="field field__file" type="file" size="" name="PROPERTY_FILE_DETAIL_PICTURE_0">
					<label class="field__file-wrapper" for="field__file-2">
					<div class="field__file-fake">
					</div>
					<div class="field__file-button">
						Browse
					</div>
					<input class="field__file-submit" type="submit" name="iblock_submit" value="Сохранить"></label>
				<?endif?>
			</div>
		</div>
	</form>
