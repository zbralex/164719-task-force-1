<?php

use frontend\models\Categories;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<main class="page-main">
	<div class="main-container page-container">
		<section class="create__task">
			<h1>Публикация нового задания</h1>
			<div class="create__task-main">

				<?php $form = ActiveForm::begin([
					'id' => 'create-task-form',
					'enableClientValidation' => true,
					'fieldConfig' => [
						'options' => [
							'tag' => false,
						]
					],
					'options' => [
						'class' => 'create__task-form form-create',
						['enctype' => 'multipart/form-data']
					],

				]) ?>

				<?= $form->field($model, 'name', [
					'template' => "{label}{input}<span>{hint}</span><span style='color: red'>{error}</span>",
				])->input('text', [
					'class' => 'input textarea',
					'placeholder' => 'Повесить полку'
				])->hint('Кратко опишите суть работы');
				?>


				<?= $form->field($model, 'description', [
					'template' => "{label}{input}<span>{hint}</span><span style='color: red'>{error}</span>",
				])->textarea([
					'class' => 'input textarea',
					'rows' => 7,
					'placeholder' => 'Place your text'
				])->hint('Укажите все пожелания и детали, чтобы исполнителям было проще соориентироваться');
				?>

				<?= $form->field($model, 'category', [
					'template' => "{label}{input}<span>{hint}</span><span style='color: red'>{error}</span>",
					'options' => ['class' => 'custom']
				])
					->dropDownList(Categories::find()->select(['name', 'id'])->indexBy('id')->column(),
						[
							'class' => 'multiple-select input multiple-select-big',
						])->hint('Выберите категорию'); ?>


				<?= $form->field($model, 'attachment[]', [
					'template' => " {label}
                                        <span>Загрузите файлы, которые помогут исполнителю лучше выполнить или оценить работу</span>
                                        <div class=\"create__file\">
										{input}
										<span>{hint}</span><span>{error}</span></div>"
				])
					->fileInput([
						'multiple' => 'multiple',
						'class' => 'dropzone',
						'style' => 'display: none'
					])
					->hint('Добавить новый файл'); ?>

<!--				<label for="13">Локация</label>-->
<!--				<input class="input-navigation input-middle input" id="13" type="search" name="q"-->
<!--					placeholder="Санкт-Петербург, Калининский район">-->
<!--				<span>Укажите адрес исполнения, если задание требует присутствия</span>-->
				<div class="create__price-time">
					<div class="create__price-time--wrapper">

						<?= $form->field($model, 'price', [
							'template' => "{label}{input}<span>{hint}</span><span style='color: red'>{error}</span>",
						])->textarea([
							'class' => 'input textarea input-money',
							'rows' => 1,
							'placeholder' => '1000'
						])->hint('Не заполняйте для оценки исполнителем');
						?>
					</div>
					<div class="create__price-time--wrapper">

						<?= $form->field($model, 'execution_date', [
							'template' => "{label}{input}<span>{hint}</span>{error}",
						])->input('date', [
							'class' => 'input-middle input input-date'
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
							<?= $form->errorSummary($model); ?>
							<h3>Категория</h3>
							<p>Это поле должно быть выбрано.<br>
								Задание должно принадлежать одной из категорий</p>
						</div>
					<?php endif;?>
				</div>


			</div>

		</section>
	</div>
</main>


