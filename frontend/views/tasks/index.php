<?php
/**
 * @var yii\web\View $this
 * @var Task[] $tasks
 * @var Categories[] $categories
 */

use frontend\models\Categories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<main class="page-main">
	<div class="main-container page-container">
		<section class="new-task">
			<div class="new-task__wrapper">
				<h1>Новые задания</h1>

				<?php foreach ($tasks as $task): ?>
					<div class="new-task__card">
						<div class="new-task__title">
							<a href="<?= Url::to(['task/view/' . $task->id]); ?>" class="link-regular">
								<h2><?= $task->name ?></h2></a>
							<a class="new-task__type link-regular" href="#"><p><?= $task->category->name ?></p></a>
						</div>
						<div class="new-task__icon new-task__icon--<?= $task->category->icon ?>"></div>
						<p class="new-task_description">
							<?= $task->description ?>
						</p>
						<b class="new-task__price new-task__price--<?= $task->category->icon ?>"><?= $task->price ?><b>
								₽</b></b>
						<p class="new-task__place"><?= !isset($task->cities->city) ? 'Город не установлен' : $task->cities->city ?> </p>
						<span
							class="new-task__time"><?= Yii::$app->formatter->asRelativeTime(strtotime($task->created_at)) ?></span>
					</div>
				<?php endforeach; ?>


			</div>
			<div class="new-task__pagination">
				<ul class="new-task__pagination-list">
					<li class="pagination__item"><a href="#"></a></li>
					<li class="pagination__item pagination__item--current">
						<a>1</a></li>
					<li class="pagination__item"><a href="#">2</a></li>
					<li class="pagination__item"><a href="#">3</a></li>
					<li class="pagination__item"><a href="#"></a></li>
				</ul>
			</div>
		</section>
		<section class="search-task">
			<div class="search-task__wrapper">

				<?php $form = ActiveForm::begin([
					'fieldConfig' => [
						'options' => [
							'tag' => false,
						]
					],
					'options' => [
						'name' => 'tasks',
						'class' => 'search-task__form'
					],

				]) ?>
				<fieldset class="search-task__categories">
					<legend>Категории</legend>

					<?= $form->field($model, 'categories')
						->checkboxList(Categories::find()->select(['name', 'id'])->indexBy('id')->column(),
							[
								'item' => function ($index, $label, $name, $checked, $value)  {
									$checked = $checked ? 'checked':'';
									return "<input class=\"visually-hidden checkbox__input\" id='{$index}' type='checkbox' name='{$name}' value='{$value}' $checked >
										<label for='{$index}'>{$label}</label>";
								}])->label(false) ?>

				</fieldset>
				<fieldset class="search-task__categories">
					<legend>Дополнительно</legend>
					<?= $form->field($model, 'noResponse', [
						'template' => '{input}{label}',
					])->checkbox([
						'class' => 'visually-hidden checkbox__input',
					],
						false); ?>
					<?= $form->field($model, 'remote', [
						'template' => '{input}{label}',
					])->checkbox([
						'class' => 'visually-hidden checkbox__input',
					],
						false); ?>
				</fieldset>

				<?= $form->field($model, 'period', [
					'template' => '{label}{input}',
					'options' => ['class' => 'custom'],
					'labelOptions' => ['class' => 'search-task__name']
				])
					->dropDownList($model->attributeLabelsPeriod(),
						[
							'class' => 'multiple-select input',
							'options' => [
								'week' => [
									'Selected' => true
								]
							]
						]); ?>

				<?= $form->field($model, 'search', [
					'template' => '{label}{input}',
					'options' => [
						'class' => 'custom',
					],
					'labelOptions' => [
						'class' => 'search-task__name',
					]
				])->input('text', [
					'class' => 'input-middle input'
				]);
				?>
				<?= Html::submitButton('Искать', [
					'class' => 'button'
				]) ?>
				<?php ActiveForm::end(); ?>
			</div>
		</section>
	</div>
</main>
