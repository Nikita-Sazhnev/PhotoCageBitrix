<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>
<div class="main__content">
	<div class="main__content-inner">
		<?foreach($arResult["SECTIONS"] as $arSection):?>
		<?
		$this->AddEditAction('section_'.$arSection['ID'], $arSection['ADD_ELEMENT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "ELEMENT_ADD"), array('ICON' => 'bx-context-toolbar-create-icon'));
		$this->AddEditAction('section_'.$arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction('section_'.$arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BPS_SECTION_DELETE_CONFIRM')));
		?>
		<h3 id="<?=$this->GetEditAreaId('section_'.$arSection['ID']);?>"></h3>
		<?foreach($arSection["ROWS"] as $arItems):?>
		<?foreach($arItems as $arItem):?>
		<?if(is_array($arItem)):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BPS_ELEMENT_DELETE_CONFIRM')));
		?>
		<?if($arItem["DISPLAY_PROPERTIES"]["APPROVE_ELEMENT"]["VALUE"]  == 'Y'):?>
		<div class="main__item-box" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<?if($arResult["USER_HAVE_ACCESS"]):?>
			
			
			<div class="main__image">
				<img border="0" src="<?=$arItem["PICTURE"]["SRC"]?>" width="<?=$arItem["PICTURE"]["WIDTH"]?>"
				height="<?=$arItem["PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["PICTURE"]["ALT"]?>"
				title="<?=$arItem["PICTURE"]["TITLE"]?>" />
				<a data-fancybox="gallery" href="<?=$arItem["PICTURE"]["SRC"]?>">
					<div class="main__upskale">
						<img id="<?=$this->GetEditAreaId($arItem['ID']);?>" src="<?=SITE_TEMPLATE_PATH?>/img/upsakle.png" alt="">
					</div>
				</a>
				
				
				<div class="main__item-data">
					<?foreach($arParams["FIELD_CODE"] as $code):?>
					<p><?=$arItem[$code]?></p>
					<?endforeach?>
				</div>
				<div class="main__naming">
					<div class="main__naming-name">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
					</div>
					<div class="main__naming-favor">
						<?if(isset($_COOKIE['BITRIX_SM_' . $arItem["ID"]])):?>
						<img data-item="<?=$arItem["ID"]?>" class="favor_img activeFav"
						src="<?=SITE_TEMPLATE_PATH?>/img/favourite.png" alt="">
						<?else:?>
						<img data-item="<?=$arItem["ID"]?>" class="favor_img" src="<?=SITE_TEMPLATE_PATH?>/img/favourite.png"
						alt="">
						<?endif;?>
					</div>
				</div>
				<div class="main__social">
					<div class="social__name">
						<p>
							Share
						</p>
					</div>
					<div class="social__icons">
						<ul>
							<li>
								<a href="https://www.tumblr.com" target="_blank" tooltip="share in tumblr" flow="down">
									<img class="tum__social" src="<?=SITE_TEMPLATE_PATH?>/img/tumbler.png" alt="">
								</a>
							</li>
							<li>
								<a href="https://www.facebook.com" target="_blank" tooltip="share in facebook" flow="down">
								<img class="fac__social" src="<?=SITE_TEMPLATE_PATH?>/img/Facebook.png" alt=""></a>
							</li>
							<li>
								<a href="https://www.pinterest.com" target="_blank" tooltip="share in pintrest" flow="down">
									<img class="pin__social" src="<?=SITE_TEMPLATE_PATH?>/img/pintrest.png" alt="">
								</a>
							</li>
							<li>
								<a href="https://twitter.com/share?text=Супер ФОТКА!&url=<?=urlencode("http://photocage.bitrix" . $arItem["DETAIL_PAGE_URL"])?>"
									target="_blank" tooltip="share in twitter" flow="down">
									<img class="last__social" src="<?=SITE_TEMPLATE_PATH?>/img/twittor.png" alt="">
								</a>
							</li>
						</ul>
					</div>
				</div>
				
			</div>
			
			<?endif?>
		</div>
		<?endif;?>
		<?endif;?>
		<?endforeach?>
		<?endforeach?>
		<?endforeach;?>
	</div>
</div>