<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class DemoFormAjaxController extends \Bitrix\Main\Engine\Controller
{
    public function sendMessageAction($msg){       
            return [
                "result" => "Ваше сообщение принято",
            ];
    }
    
}