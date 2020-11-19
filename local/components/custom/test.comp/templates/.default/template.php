<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

global $USER;
$filter = Array("GROUPS_ID" => Array(1,2,3,4,5,6));
$rsUsers = CUser::GetList(($by = "NAME"), ($order = "desc"), $filter);
while ($arUser = $rsUsers->Fetch()):?>
<ul class="user__list">
	<li>Логин: <?=$arUser[LOGIN]?> Email: <?=$arUser[EMAIL]?> <a href="/members/profile?id=<?=$arUser[ID]?>">Профиль</a></li>
</ul>
 <?endwhile;?><br>