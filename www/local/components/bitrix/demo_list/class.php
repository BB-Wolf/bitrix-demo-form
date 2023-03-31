<?php

namespace Demo;


use Bitrix\Highloadblock\HighloadBlockTable;

class DemoList extends \CBitrixComponent 
{

    // Для сортировки можно задать отдельные сеттер\гететр которые будут задаваться через ajax-controller, но мы пойдем простым путем и будем брать из GET, конечно лучше использовать
    // методы встроенные и не доверять пользовательскому вводу.

    private $nav;

    
   
    public function getData(): Array    {

        $hlBlock = HighloadBlockTable::getById(FEEDBACK_HLBLOCK_ID)->fetch();
        $hlBlockEntity = HighloadBlockTable::compileEntity($hlBlock);
        $entityDataClass = $hlBlockEntity->getDataClass();
        // В целом, тут можно обойтись без этих вызовов. Используя прямые запросы к БД, но мы так делать не будем :)

        $nav = new \Bitrix\Main\UI\PageNavigation("nav-more-notice");
        $nav->allowAllRecords(true)
        ->setPageSize(4)
        ->initFromUri();


        $this->nav = $nav;

        $resultData = $entityDataClass::getList(array(
            'select' => array('*'),
            "count_total" => true,
            "offset" => $nav->getOffset(), 
            "limit" => $nav->getLimit(),
            'order'=>['ID'=>strip_tags(trim($_GET['sort']))?:'ASC'],
        ));

        $nav->setRecordCount($resultData->getCount());

        $arResult = $resultData->fetchAll();
        return $arResult;
    }


    public function executeComponent(){


        $this->arResult['ITEMS']=$this->getData();
        $this->arResult['NAV'] =  $this->nav;
        $this->includeComponentTemplate();
        
    }

}