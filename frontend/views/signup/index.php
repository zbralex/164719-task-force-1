<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Cities;

?>
<main class="page-main">
    <div class="main-container page-container">
        <section class="registration__user">
            <h1>Регистрация аккаунта</h1>
            <div class="registration-wrapper">
                <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'options' => [
                            'tag' => false,
                        ]
                    ],
                    'options' => [
                        'name' => 'registration',
                        'class' => 'registration__user-form form-create'
                    ],

                ]) ?>
                <?= $form->field($model, 'email', [
                    'template' => '{label}{input}{hint}',
                    'options' => [
                        'class' => 'custom',
                    ],
                    'labelOptions' => []
                ])->textInput([
                    'class' => 'input textarea',
                    'placeholder' => 'kumarm@mail.ru'
                ])->hint('Введите валидный адрес электронной почты', [
                    'tag' => 'span'
                ]);
                ?>

                <?= $form->field($model, 'nameSurname', [
                    'template' => '{label}{input}{hint}',
                    'options' => [
                        'class' => 'custom',
                    ],
                    'labelOptions' => []
                ])->textInput([
                    'class' => 'input textarea',
                    'placeholder' => 'Мамедов Кумар'
                ])->hint('Введите ваше имя и фамилию', [
                    'tag' => 'span'
                ]);
                ?>
                <?= $form->field($model, 'city', [
                    'template' => '{label}{input}{hint}',
                    'options' => ['class' => 'custom'],
                    'labelOptions' => []
                ])
                    ->dropDownList(Cities::find()->select(['city', 'id'])->indexBy('id')->column(),
                        [
                            'class' => 'multiple-select input town-select registration-town',
                            'options' => [
                                '1109' => [
                                    'Selected' => true
                                ]
                            ]
                        ])->hint('Укажите город, чтобы находить подходящие задачи', [
                        'tag' => 'span'
                    ]); ?>
                <?= $form->field($model, 'password', [
                    'template' => '{label}{input}{hint}',
                    'options' => [
                        'class' => 'custom',
                    ],
                    'labelOptions' => [
                        'class' => 'input-danger'
                    ]
                ])->passwordInput([
                    'class' => 'input textarea'
                ])->hint('Укажите город, чтобы находить подходящие задачи', [
                    'tag' => 'span'
                ]);
                ?>

                <?= Html::submitButton('Cоздать аккаунт', [
                    'class' => 'button button__registration'
                ]) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </section>

    </div>
</main>
