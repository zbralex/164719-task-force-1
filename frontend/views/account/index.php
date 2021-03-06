<?php
/**
 * @var array $model
 * @var array $userInfo
 * @var $this yii\web\View
 */

use frontend\assets\AutoComplete;
use frontend\assets\CustomAutoCompleteAsset;
use frontend\models\Categories;
use frontend\models\UserCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$formatter = \Yii::$app->formatter;
$this->title = 'Редактирование настроек профиля';
AutoComplete::register($this);
CustomAutoCompleteAsset::register($this);
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

            ]) ?>

                <div class="account__redaction-section">
                    <h3 class="div-line">Настройки аккаунта</h3>
                    <div class="account__redaction-section-wrapper">
                        <div class="account__redaction-avatar">

                            <?php if ($userInfo->user_pic):?>
                                <img src="<?= $userInfo->user_pic; ?>" width="156" height="156">
                            <?php else: ?>
                                <img src="./img/man-glasses.jpg" width="156" height="156">
                            <?php endif; ?>


                            <?= $form->field($model, 'userPic', [
                                'template' => "<div class='account__redaction-avatar'>" . " {label}{input}<span>{error}</span> </div>",
                                'labelOptions' => [
                                    'class'=> 'link-regular',
                                ]
                            ])->fileInput([
                                'id' => 'upload-avatar'
                            ]) ?></div>
                        <div class="account__redaction">


                                <?= $form->field($model, 'name', [
                                    'template' => "<div class='field-container account__input account__input--name'>"
                                        . " {label}{input}<span>{error}</span> </div>",
                                ])->textInput([
                                    'class' => 'input textarea',
                                    'placeholder' => 'DenisT@bk.ru',
                                    'value' => $userInfo->user->name,
                                    'disabled' => true
                                ]) ?>




                                <?= $form->field($model, 'email', [
                                    'template' => "<div class='field-container account__input account__input--email'>"
                                        . " {label}{input}<span>{error}</span> </div>",
                                ])->textInput([
                                    'class' => 'input textarea',
                                    'placeholder' => 'DenisT@bk.ru',
                                    'value' => $userInfo->user->email
                                ]) ?>



                                <?= $form->field($model, 'address', [
                                    'template' => "<div class='field-container account__input account__input--address'>"
                                        . " {label}{input}<span>{error}</span> </div>",
                                ])->textInput([
                                    'class' => 'input textarea',
                                    'placeholder' => 'Санкт-Петербург, Московский район',
                                    'value' => '',
                                    'id'=>'autoComplete',
                                    'value' => $userInfo->address ? $userInfo->address: $userInfo->cities->city
                                ]) ?>



                                <?= $form->field($model, 'date_of_birth', [
                                    'template' => "<div class='field-container account__input account__input--date'>"
                                        . " {label}{input}<span>{error}</span> </div>",
                                ])->widget(\yii\jui\DatePicker::class,
                                    [ 'dateFormat' => 'php:Y-m-d',
                                        'clientOptions' => [
                                            'changeYear' => true,
                                            'changeMonth' => true,
                                            'yearRange' => '-50:-12',
                                            'altFormat' => 'yy-mm-dd',
                                        ]],
                                    [
                                        'placeholder' => 'dd.mm.yyyy'
                                    ])
                                    ->textInput([
                                        'placeholder' => \Yii::t('app', '15.08.1987'),
                                        'class'=> 'input-middle input input-date',
                                        'value' =>  $userInfo->date_birth ?  $userInfo->date_birth  : '',
                                    ]) ;
                                ?>


                                <?= $form->field($model, 'about_myself', [
                                    'options' => ['tag'=> false],
                                    'template' => "<div class='field-container account__input account__input--info'>"
                                        . " {label}{input}<span>{error}</span> </div>",
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
                    <h3 class="div-line">Выберите свои специализации</h3>
                    <div class="account__redaction-section-wrapper">
                        <div class="search-task__categories account_checkbox--bottom">

                            <?= $form->field($model, 'user_category[]')
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

                            <?= $form->field($model, 'password', [
                                'template' => "<div class='field-container account__input'>". " {label}{input}<span>{error}</span> </div>",
                            ])
                                ->passwordInput([
                                    'class' => 'input textarea',
                                ]); ?>

                            <?= $form->field($model, 're_password', [

                                'template' => "<div class='field-container account__input'>". " {label}{input}<span>{error}</span> </div>",
                            ])
                                ->passwordInput([
                                    'class' => 'input textarea',
                                ]); ?>


                    </div>

                    <h3 class="div-line">Фото работ</h3>


                    <?= $form->field($model, 'photos_of_works', [
                        'template' => "<div class='account__redaction-section-wrapper account__redaction'>". " {label}{input}<span>{error}</span> </div>",
                        'options' => ['tag' => false]
                    ])->fileInput([
                        'class' => 'dropzone',
                        'placeholder' => 'Выбрать фотографии',
                        'style' => ['display'=> 'none']
                    ]) ?>

                    <h3 class="div-line">Контакты</h3>
                    <div class="account__redaction-section-wrapper account__redaction">


                            <?= $form->field($model, 'phone', [
                                'template' => "<div class='field-container account__input'>". " {label}{input}<span>{error}</span> </div>",

                            ])->widget(\yii\widgets\MaskedInput::className(), [
                                'mask' => '9 (999) 999 99 99',
                                'clientOptions' => [
                                    'removeMaskOnSubmit' => true,
                                ]
                            ])->textInput([
                                'class' => 'input textarea',
                                'placeholder' => '8 (555) 187 44 87',
                                'value' => $userInfo->phone
                            ]); ?>


                            <?= $form->field($model, 'skype', [
                                'template' => "<div class='field-container account__input'>". " {label}{input}<span>{error}</span> </div>",
                                'options' => ['tag' => false]
                            ])->textInput([
                                'class' => 'input textarea',
                                'placeholder' => 'DenisT',
                                'value' => $userInfo->skype
                            ]) ?>

                            <?= $form->field($model, 'another_messenger', [
                                'template' => "<div class='field-container account__input'>". " {label}{input}<span>{error}</span> </div>",
                                'options' => ['tag' => false]
                            ])->widget(\yii\widgets\MaskedInput::class, [
                                'mask' => ['@'.'[*]{1,15}'],
                                'clientOptions' => [
                                    'removeMaskOnSubmit' => true,
                                ]
                            ])->textInput([
                                'class' => 'input textarea',
                                'placeholder' => '@DenisT',
                                'value' => $userInfo->telegram
                            ]) ?>

                    </div>
                    <h3 class="div-line">Настройки сайта</h3>
                    <h4>Уведомления</h4>
                    <div class="account__redaction-section-wrapper account_section--bottom">
                        <div class="search-task__categories account_checkbox--bottom">


                            <?= $form->field($model, 'show_new_messages', [
                                'labelOptions' => [
                                    'class' => 'checkbox__legend'
                                ],
                                'template' => '<label class="checkbox__legend">
                                {input}
                                <span>Новое сообщение</span>
                            </label>',

                            ])->checkbox([
                                'class' => 'visually-hidden checkbox__input',
                                'checked' => $userInfo->user->siteSettings->new_message ? true: false
                            ],
                                false)->label(false); ?>
                            <?= $form->field($model, 'show_actions_of_task', [
                                'labelOptions' => [
                                    'class' => 'checkbox__legend'
                                ],
                                'template' => '<label class="checkbox__legend">
                                {input}
                                <span>Действия по заданию</span>
                            </label>',

                            ])->checkbox([
                                'class' => 'visually-hidden checkbox__input',
                                'checked' => $userInfo->user->siteSettings->actions_in_task ? true: false
                            ],
                                false)->label(false); ?>

                            <?= $form->field($model, 'show_new_review', [
                                'labelOptions' => [
                                    'class' => 'checkbox__legend'
                                ],
                                'template' => '<label class="checkbox__legend">
                                {input}
                                <span>Новый отзыв</span>
                            </label>',

                            ])->checkbox([
                                'class' => 'visually-hidden checkbox__input',
                                'checked' => $userInfo->user->siteSettings->new_review ? true: false
                            ],
                                false)->label(false); ?>



                        </div>
                        <div class="search-task__categories account_checkbox account_checkbox--secrecy">


                            <?= $form->field($model, 'show_my_contacts_customer', [
                                'labelOptions' => [
                                    'class' => 'checkbox__legend'
                                ],
                                'template' => '<label class="checkbox__legend">
                                {input}
                                <span>Показывать мои контакты только заказчику</span>
                            </label>',

                            ])->checkbox([
                                'class' => 'visually-hidden checkbox__input',
                                'checked' => $userInfo->user->siteSettings->show_contacts_client ?  true : false,
                            ],
                                false)->label(false); ?>

                            <?= $form->field($model, 'hide_account', [
                                'labelOptions' => [
                                    'class' => 'checkbox__legend'
                                ],
                                'template' => '<label class="checkbox__legend">
                                {input}
                                <span>Не показывать мой профиль</span>
                            </label>',

                            ])->checkbox([
                                'class' => 'visually-hidden checkbox__input',
                                'checked' => $userInfo->user->siteSettings->show_profile ? true : false
                            ],
                                false)->label(false); ?>
                        </div>
                    </div>
                </div>

                <?= Html::submitButton('Сохранить изменения', ['class' => 'button']) ?>

                <?php ActiveForm::end(); ?>
        </section>
    </div>
</main>
