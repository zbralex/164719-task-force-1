<?php

use frontend\models\Categories;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>
<main class="page-main">
	<div class="main-container page-container">
		<section class="create__task">
			<h1>Публикация нового задания</h1>
			<div class="create__task-main">
				<?php Pjax::begin([
				]); ?>
				<?php $form = ActiveForm::begin([
					'id' => 'task-form',
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
					'template' => "{label}{input}<span>{hint}</span>{error}",
				])->textarea([
					'class' => 'input textarea',
					'rows' => 1,
					'placeholder' => 'Повесить полку'
				])->hint('Кратко опишите суть работы');
				?>


				<?= $form->field($model, 'description', [
					'template' => "{label}{input}<span>{hint}</span>{error}",
				])->textarea([
					'class' => 'input textarea',
					'rows' => 7,
					'placeholder' => 'Place your text'
				])->hint('Укажите все пожелания и детали, чтобы исполнителям было проще соориентироваться');
				?>

				<?= $form->field($model, 'category', [
					'template' => "{label}{input}<span>{hint}</span>",
					'options' => ['class' => 'custom']
				])
					->dropDownList(Categories::find()->select(['name', 'id'])->indexBy('id')->column(),
						[
							'class' => 'multiple-select input multiple-select-big',
						])->hint('Выберите категорию'); ?>




					<?= $form->field($model, 'attachment', [
						'template' => " {label}
                                        <span>Загрузите файлы, которые помогут исполнителю лучше выполнить или оценить работу</span>
                                        <div class=\"create__file\">
										{input}
										<span>{hint}</span></div>"
					])
						->fileInput([
							'multiple' => 'multiple',
							'class' => 'dropzone',
							'name'=>"files",
							'style' => 'display: none'
						])
						->hint('Добавить новый файл'); ?>
					<!--                          <input type="file" name="files[]" class="dropzone">-->

				<label for="13">Локация</label>
				<input class="input-navigation input-middle input" id="13" type="search" name="q"
					placeholder="Санкт-Петербург, Калининский район">
				<span>Укажите адрес исполнения, если задание требует присутствия</span>
				<div class="create__price-time">
					<div class="create__price-time--wrapper">
						<label for="14">Бюджет</label>
						<textarea class="input textarea input-money" rows="1" id="14" name=""
							placeholder="1000"></textarea>
						<span>Не заполняйте для оценки исполнителем</span>
					</div>
					<div class="create__price-time--wrapper">
						<label for="15">Срок исполнения</label>
						<input id="15" class="input-middle input input-date" type="date" placeholder="10.11, 15:00">
						<span>Укажите крайний срок исполнения</span>
					</div>
				</div>
				<?php ActiveForm::end(); ?>
				<?php Pjax::end(); ?>
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
					<div class="warning-item warning-item--error">
						<h2>Ошибки заполнения формы</h2>
						<h3>Категория</h3>
						<p>Это поле должно быть выбрано.<br>
							Задание должно принадлежать одной из категорий</p>
					</div>
				</div>
			</div>
			<button form="task-form" class="button" type="submit">Опубликовать</button>
		</section>
	</div>
</main>


