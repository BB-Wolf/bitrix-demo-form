<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;


if(!Loader::IncludeModule('highloadblock')){
    ShowError();  // здеь лучше использовать языковые переменные: GetMessage('') но думаю, что в рамках теста - простителен хардкод.
    return;
}


$arHlBlockList = HighloadBlockTable::getList([
    'select'=>[
        'ID',
        'NAME'
    ],

])->fetchAll();

if($arHlBlockList){
    foreach($arHlBlockList as $arHlblock){
    $hlBlocks[$arHlblock["ID"]] = "[" . $arHlblock["ID"] . "] " . $arHlblock["NAME"];
    }
}

if($hlBlocks){
    $parameters = [
            "PARENT" => "BASE",
            "NAME" => "HL-блок",
            "TYPE" => "LIST",
            "VALUES" => $hlBlocks,
            "ADDITIONAL_VALUES" => "N",
    ];
}else{
    $parameters = [
        [
            "PARENT" => "BASE",
            "NAME" => "HL-блок",
            "TYPE" => "TEXT",
            "ADDITIONAL_VALUES" => "N",
        ]
    ];
}

$arComponentParameters =[
        'GROUPS' => [],
        'PARAMETERS'=>[
        "IBLOCK_ID" => $parameters
        ]
];