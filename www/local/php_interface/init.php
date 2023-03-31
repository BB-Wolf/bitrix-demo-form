 <?php 

 define('FEEDBACK_HLBLOCK_ID',1);

\Bitrix\Main\EventManager::getInstance()->addEventHandler('', 'FeedbackOnAfterAdd', 'registerUser');

 function registerUser(\Bitrix\Main\Entity\Event $event){

        $arFields = $event->getParameter("fields");
        
        $user = new  CUser;
           $user->Add([
            "NAME"              => $arFields['UF_FIO'],
            "LAST_NAME"         => '2',
            "EMAIL"             =>$arFields['UF_EMAIL'],
            "LOGIN"             => $arFields['UF_EMAIL'],
            "LID"               => "ru",
            "ACTIVE"            => "Y",
            "GROUP_ID"          => [3,4],
            "PASSWORD"          => "123456",
            "CONFIRM_PASSWORD"  => "123456",
            ]);
    }
