<?php

use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;
CJSCore::Init();

if (!Loader::IncludeModule('highloadblock')) {
    ShowError('Не найден модуль Highloadblock');  // здеь лучше использовать языковые переменные: GetMessage('') но думаю, что в рамках теста - простителен хардкод.
    return;
}
?>



<section class="form">
    <form>
        <div class="form__up">
            <div class="form__title"><span class="h1">Форма обратной связи</span></div>
        </div>
        <div class="form__body">
            <div class="form__group">
                <label for="fio">ФИО*</label><input class="required" type="text" placeholder="Введите ваше ФИО">
                <label for="email">E-mail*</label><input class="required" type="text" placeholder="Введите ваш e-mail">
            </div>
            <div class="form__group">
                <label for="phone">Телефон</label><input type="text" placeholder="Введите Ваш телефон">
            </div>
            <div class="form__group"><label>Сообщение*</label><textarea class="required" name="" id="" cols="30" rows="10" placeholder="Ваше сообщение"></textarea></div>
            <div class="form__group"><button class="submit">Отправить</button></div>
        </div>
        <div class="form__footer"></div>
    </form>
</section>