<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Форма");
?><? $APPLICATION->IncludeComponent(
        "bitrix:demo_form",
        ".default",
        array()
    ); ?>


<? $APPLICATION->IncludeComponent(
"bitrix:demo_list",
".default",
array(

)
); ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>