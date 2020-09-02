<?php

/**
 * $categories = []
 * $errors = []
 ** @var $categories
 * */


use frontend\assets\CreateTaskDropZone;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// CreateTaskDropZone::register($this);
?>


<main class="page-main">
    <div class="main-container page-container">
        <section class="create__task">
            <h1>Публикация нового задания</h1>
            <div class="create__task-main">
                <?php $form = ActiveForm::begin([
                    'id' => 'create-task-form',
                    'enableClientValidation' => true,
                    'options' => [
                        'class' => 'create__task-form form-create',
                        'enctype' => 'multipart/form-data',
                    ],
                    'fieldConfig' => [
                        'template' => "{label}{input}<span>{hint}</span><span style='color: red'>{error}</span>",
                    ]

                ]) ?>

                <?= $form->field($model, 'name', [
                    'labelOptions' => [
                        'style' => 'display: block;'
                    ]
                ])->input('text', [
                    'class' => 'input textarea',
                    'style' => 'width: 100%; box-sizing: border-box',
                    'placeholder' => 'Повесить полку',
                ])->hint('Кратко опишите суть работы');
                ?>


                <?= $form->field($model, 'description', [
                    'labelOptions' => [
                        'style' => 'display: block;'
                    ]
                ])->textarea([
                    'class' => 'input textarea',
                    'style' => 'width: 100%; box-sizing: border-box',
                    'rows' => 7,
                    'placeholder' => 'Place your text',
                ])->hint('Укажите все пожелания и детали, чтобы исполнителям было проще соориентироваться');
                ?>

                <?=

                $form->field($model, 'category', [
                    'options' => ['style' => 'width: 100%;box-sizing: border-box'],
                    'labelOptions' => [
                        'style' => 'display: block;'
                    ]
                ])
                    ->dropDownList($categories,
                        [
                            'class' => 'multiple-select input multiple-select-big',
                            'style' => 'width: 100%'
                        ])->hint('Выберите категорию'); ?>

                <?= $form->field($model, 'files[]', [
                    'template' => " {label}
                                        <span>Загрузите файлы, которые помогут исполнителю лучше выполнить или оценить работу</span>
                                        <div class='create__file'>
										{input}
										<span>{hint}</span><span>{error}</span></div>",
                    'labelOptions' => [
                        'style' => 'display: block;'
                    ]
                ])
                    ->fileInput([
                        'multiple' => 'multiple',
                        'class' => 'dropzone',
                        //'style' => 'display: none'
                    ])
                    ->hint('Добавить новый файл'); ?>

                <!--				<input class="input-navigation input-middle input" id="13" type="search" name="q"-->
                <!--					placeholder="Санкт-Петербург, Калининский район">-->
                <!--				<span>Укажите адрес исполнения, если задание требует присутствия</span>-->
                <div class="create__price-time">
                    <div class="create__price-time--wrapper">

                        <?= $form->field($model, 'price', [
                            'labelOptions' => [
                                'style' => 'display: block;'
                            ]
                        ])->textarea([
                            'class' => 'input textarea input-money',
                            'style' => 'width: 100%;box-sizing: border-box',
                            'rows' => 1,
                            'placeholder' => '1000'
                        ])->hint('Не заполняйте для оценки исполнителем');
                        ?>
                    </div>
                    <div class="create__price-time--wrapper">

                        <?= $form->field($model, 'execution_date', [
                            'labelOptions' => [
                                'style' => 'display: block;'
                            ]
                        ])->input('date', [
                            'class' => 'input-middle input input-date',
                            'style' => 'width: 100%;box-sizing: border-box',
                        ])->hint('Укажите крайний срок исполнения');
                        ?>

                    </div>
                </div>


                <?= Html::submitButton('Опубликовать', ['class' => 'button']) ?>

                <?php ActiveForm::end(); ?>

                <div class="create__warnings">
                    <div class="warning-item warning-item--advice">
                        <h2>Правила хорошего описания</h2>
                        <h3>Подробности</h3>
                        <p>Друзья, не используйте случайный<br>
                            контент – ни наш, ни чей-либо еще. Заполняйте свои
                            макеты, вайрфреймы, мокапы и прототипы реальным
                            содержимым.</p>
                        <h3>Файлы</h3>
                        <p>Если загружаете фотографии объекта, то убедитесь,
                            что всё в фокусе, а фото показывает объект со всех
                            ракурсов.</p>
                    </div>
                    <?php if ($model->errors): ?>
                        <div class="warning-item warning-item--error">
                            <h2>Ошибки заполнения формы</h2>

                            <?php foreach ($errors as $key => $error): ?>

                                <h3><?= $model->attributeLabels()[$key] ?></h3>

                                <p>
                                    <?php foreach ($error as $description): ?>
                                        <?= $description ?>
                                    <?php endforeach; ?>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </section>
    </div>
</main>



