<?php

namespace Demo;


use Bitrix\Highloadblock\HighloadBlockTable;

class DemoList extends \CBitrixComponent 
{

   
    public function getData(){
        $hlBlock = HighloadBlockTable::getById(FEEDBACK_HLBLOCK_ID)->fetch();
        $hlBlockEntity = HighloadBlockTable::compileEntity($hlBlock);
        $entityDataClass = $hlBlockEntity->getDataClass();
        // В целом, тут можно обойтись без этих вызовов. Используя прямые запросы к БД, но мы так делать не будем :)

        $nav = new \Bitrix\Main\UI\PageNavigation("nav-more-notice");
        $nav->allowAllRecords(true)
        ->setPageSize(2)
        ->initFromUri();


    }


    public function executeComponent(){}

}