<?php
/**
 * @var array $model
 * @var array $userInfo
 */

use frontend\models\Categories;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$formatter = \Yii::$app->formatter;
//var_dump($userInfo);
?>

<main class="page-main">
    <div class="main-container page-container">
        <section class="account__redaction-wrapper">
            <h1>Редактирование настроек профиля</h1>

            <?php $form = ActiveForm::begin([
                'id' => 'account',
                'enableClientValidation' => true,
                'options' => [
                    'enctype' => 'multipart/form-data',
                ],
                'fieldConfig' => [
                    'template' => "{label}{input}<span>{hint}</span><span style='color: red'>{error}</span>",
                ]

            ]) ?>

                <div class="account__redaction-section">
                    <h3 class="div-line">Настройки аккаунта</h3>
                    <div class="account__redaction-section-wrapper">
                        <div class="account__redaction-avatar">
                            <img src="./img/man-glasses.jpg" width="156" height="156">
                            <input type="file" name="avatar" id="upload-avatar">
                            <label for="upload-avatar" class="link-regular">Сменить аватар</label>
                        </div>
                        <div class="account__redaction">
                            <div class="field-container account__input account__input--name">
                                <label for="200">Ваше имя</label>
                                <input class="input textarea" id="200" name="" placeholder="<?= $userInfo->user->name?>" disabled value="<?= $userInfo->user->name?>">
                            </div>
                            <div class="field-container account__input account__input--email">
                                <label for="201">email</label>
                                <input class="input textarea" id="201" name="" placeholder="DenisT@bk.ru" value="<?= $userInfo->user->email?>">
                            </div>
                            <div class="field-container account__input account__input--address">
                                <label for="202">Адрес</label>
                                <input class="input textarea" id="202" name=""
                                       placeholder="Санкт-Петербург, Московский район" value="<?= $userInfo->city->city?>">
                            </div>
                            <div class="field-container account__input account__input--date">
                                <label for="203">День рождения</label>
                                <input id="203" class="input-middle input input-date" type="text"
                                       placeholder="15.08.1987" value="<?= $formatter->asDate($userInfo->date_birth, 'php:d.m.Y')?>">
                            </div>
                            <div class="field-container account__input account__input--info">
                                <?= $form->field($model, 'about_myself', [
                                    'labelOptions' => [
                                        'style' => 'display: block;'
                                    ]
                                ])->textarea([
                                    'class' => 'input textarea',
                                    'style' => 'width: 100%;box-sizing: border-box',
                                    'rows' => 7,
                                    'placeholder' => 'Place your text',
                                    'value' => $userInfo->about
                                ]);
                                ?>
                            </div>
                        </div>
                    </div>
                    <h3 class="div-line">Выберите свои специализации</h3>
                    <div class="account__redaction-section-wrapper">
                        <div class="search-task__categories account_checkbox--bottom">

                                <?= $form->field($model, 'user_category')
                                    ->checkboxList(Categories::find()->select(['name', 'id'])->indexBy('id')->column(),
                                        [
                                            'item' => function ($index, $label, $name, $checked, $value)  {
                                                $checked = $checked ? 'checked':'';
                                                return "<label for='{$index}' class='checkbox__legend'>
                                                            <input class=\"visually-hidden checkbox__input\" id='{$index}' type='checkbox' name='{$name}' value='{$value}' $checked >
                                                            <span>{$label}</span>
							                            </label>";
                                            },
                                            'class'=> 'search-task__categories account_checkbox--bottom'])->label(false) ?>

                        </div>
                    </div>
                    <h3 class="div-line">Безопасность</h3>
                    <div class="account__redaction-section-wrapper account__redaction">
                        <div class="field-container account__input">
                            <label for="211">Новый пароль</label>
                            <input class="input textarea" type="password" id="211" name="" value="moiparol">
                        </div>
                        <div class="field-container account__input">
                            <label for="212">Повтор пароля</label>
                            <input class="input textarea" type="password" id="212" name="" value="moiparol">
                        </div>
                    </div>

                    <h3 class="div-line">Фото работ</h3>

                    <div class="account__redaction-section-wrapper account__redaction">
                        <span class="dropzone">Выбрать фотографии</span>
                    </div>

                    <h3 class="div-line">Контакты</h3>
                    <div class="account__redaction-section-wrapper account__redaction">
                        <div class="field-container account__input">
                            <label for="213">Телефон</label>
                            <input class="input textarea" type="tel" id="213" name="" placeholder="8 (555) 187 44 87" value="<?= $userInfo->phone?>">
                        </div>
                        <div class="field-container account__input">
                            <label for="214">Skype</label>
                            <input class="input textarea" type="password" id="214" name="" placeholder="DenisT" value="<?= $userInfo->skype?>">
                        </div>
                        <div class="field-container account__input">
                            <label for="215">Другой мессенджер</label>
                            <input class="input textarea" id="215" name="" placeholder="@DenisT" value="<?= $userInfo->telegram?>">
                        </div>
                    </div>
                    <h3 class="div-line">Настройки сайта</h3>
                    <h4>Уведомления</h4>
                    <div class="account__redaction-section-wrapper account_section--bottom">
                        <div class="search-task__categories account_checkbox--bottom">
                            <label class="checkbox__legend">
                                <input class="visually-hidden checkbox__input" type="checkbox" name="" value="" checked>
                                <span>Новое сообщение</span>
                            </label>
                            <label class="checkbox__legend">
                                <input class="visually-hidden checkbox__input" type="checkbox" name="" value="" checked>
                                <span>Действия по заданию</span>
                            </label>
                            <label class="checkbox__legend">
                                <input class="visually-hidden checkbox__input" type="checkbox" name="" value="" checked>
                                <span>Новый отзыв</span>
                            </label>
                        </div>
                        <div class="search-task__categories account_checkbox account_checkbox--secrecy">
                            <label class="checkbox__legend">
                                <input class="visually-hidden checkbox__input" type="checkbox" name="" value="">
                                <span>Показывать мои контакты только заказчику</span>
                            </label>
                            <label class="checkbox__legend">
                                <input class="visually-hidden checkbox__input" type="checkbox" name="" value="" checked>
                                <span>Не показывать мой профиль</span>
                            </label>
                        </div>
                    </div>
                </div>

                <?= Html::submitButton('Сохранить изменения', ['class' => 'button']) ?>

                <?php ActiveForm::end(); ?>
        </section>
    </div>
</main>
