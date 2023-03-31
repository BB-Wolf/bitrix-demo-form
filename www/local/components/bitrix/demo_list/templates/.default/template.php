<?php

use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;

CJSCore::Init();

if (!Loader::IncludeModule('highloadblock')) {
    ShowError('Не найден модуль Highloadblock');  // здеь лучше использовать языковые переменные: GetMessage('') но думаю, что в рамках теста - простителен хардкод.
    return;
}

$hlBlock = HighloadBlockTable::getById(FEEDBACK_HLBLOCK_ID)->fetch();
$hlBlockEntity = HighloadBlockTable::compileEntity($hlBlock);
$entityDataClass = $hlBlockEntity->getDataClass();
// В целом, тут можно обойтись без этих вызовов. Используя прямые запросы к БД, но мы так делать не будем :)

?>

<style>
    .feedback {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .feedback__list ul {
        margin-top: 30px !important;
        
    }

    .feedback__list ul li,#workarea li {
        text-indent: unset !important;
    }

    .feedback__sort{
        display: flex;
        flex-direction: row;
        gap:20px;
    }
</style>

<?
$templateFilter = \Demo\DemoList::templateFilter();
?>
<section class="feedback">
    <div class="feedback__sort">
        <div class="sort__order">Сортировать по: <a href="?sort=<?=$_GET['sort']=='ASC'?'DESC':'ASC'?>&type=<?=$_GET['type']?>"><?=$templateFilter[0];?></a></div>
        <div class="sort__type">Сортировать по: <a href="?type=<?=$_GET['type']=='ID' ?'UF_FIO':'ID'?>&sort=<?=$_GET['sort']?>"><?=$templateFilter[1];?></a></div>
    </div>
    <div class="feedback__list">
        <?
        if ($arResult['ITEMS']) :
            foreach ($arResult['ITEMS'] as $arItem) :
                if ($arItem['UF_FIO'] == '') {
                    continue;
                } ?>
                <ul>
                    <li>ФИО: <?= $arItem['UF_FIO'] ?></li>
                    <li>E-mail:<? echo substr($arItem['UF_EMAIL'], 0, strpos($arItem['UF_EMAIL'], '@')); ?></li>
                    <li>Сообщение: <?= $arItem['UF_FIO']; ?></li>

                </ul>
        <? endforeach;
        endif; ?>
    </div>
</section>

<?
$APPLICATION->IncludeComponent(
    "bitrix:main.pagenavigation",
    "",
    array(
        "NAV_OBJECT" => $arResult['NAV'],
        "SEF_MODE" => "N"
    ),
    false
);
