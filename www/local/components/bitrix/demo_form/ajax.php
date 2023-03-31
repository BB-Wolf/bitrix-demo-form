<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;

Loader::includeModule('highloadblock');

class DemoFormAjaxController extends \Bitrix\Main\Engine\Controller
{
    public function sendMessageAction(){

        $request = \Bitrix\Main\Context::getCurrent()->getRequest();

        $userData = trim(strip_tags($_REQUEST['fio']));
        $userPhone = trim(strip_tags($_REQUEST['phone']));
        $userEmail = trim(strip_tags($_REQUEST['email']));
        $userMsg = trim(strip_tags($_REQUEST['usmsg']));

        Bitrix\Main\Diag\Debug::dumpToFile(array('$varname' => $_REQUEST), "", "filename.txt");
        
        if($userData !=='' && $userEmail !=='' && $userMsg!==''){
        // в идеале - тут должна быть проверка на уникальность данных, дабы не регистировать пользователя дважды.

        $hlBlock = HighloadBlockTable::getById(FEEDBACK_HLBLOCK_ID)->fetch();
        $entity = HighloadBlockTable::compileEntity($hlBlock);
        $entityDataClass = $entity->getDataClass();

        $hlFields = [
            'UF_FIO'=>$userData,
            'UF_PHONE'=>$userPhone,
            'UF_EMAIL'=>$userEmail,
            'UF_MSG'=>$userMsg,
        ];

        $addResult = $entityDataClass::add($hlFields);

            if($addResult){
               


            $jsonResult = ['result' => 'Успешно добавлено'];
            }else{
                $jsonResult = ['result'=>$addResult->error];
            }
        }else{
            $jsonResult = ['result'=>'Ошибка добавления. Незаполнены данные'];
        }

            return $jsonResult;
    }
    
}