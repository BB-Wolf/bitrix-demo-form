<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Форма");
?><? $APPLICATION->IncludeComponent(
        "bitrix:demo_form",
        ".default",
        array(
           
        )
    ); ?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>