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

$nav = new \Bitrix\Main\UI\PageNavigation("nav-more-notice");
$nav->allowAllRecords(true)
      ->setPageSize(2)
    ->initFromUri();
?>


<section class="feedback">
    <?
     $arResult =  $entityDataClass::getList([
        'select'=>[
            '*'
        ],
        'order'=>[
            'ID'=>'ASC'
        ],

     ]);

    ?>
    <div class="feedback__list">
        <ul>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</section>