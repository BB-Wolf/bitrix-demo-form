<?php



class DemoForm extends CBitrixComponent
{


    function registerUser(\Bitrix\Main\Entity\Event $event){
        var_dump($event);die();
            CUSer::Add([
                'NAME'=>'',
            ]);
    }
}