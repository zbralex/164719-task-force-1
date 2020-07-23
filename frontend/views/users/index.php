<?php
/* @var $this yii\web\View
 * @var $users = []
 * @var $filter = []
 * @var $categories = []
 */

use frontend\models\Categories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="page-main">
	<div class="main-container page-container">
		<section class="user__search">
			<div class="user__search-link">
				<p>Сортировать по:</p>
				<ul class="user__search-list">
					<li class="user__search-item user__search-item--current">
						<a href="#" class="link-regular">Рейтингу</a>
					</li>
					<li class="user__search-item">
						<a href="#" class="link-regular">Числу заказов</a>
					</li>
					<li class="user__search-item">
						<a href="#" class="link-regular">Популярности</a>
					</li>
				</ul>
			</div>
			<div class="content-view__feedback-card user__search-wrapper">
				<?php foreach ($users as $key => $user): ?>
					<div class="feedback-card__top">
						<div class="user__search-icon">
							<a href="#"><img src="./img/man-glasses.jpg" width="65" height="65"></a>
							<span>17 заданий</span>
							<span>6 отзывов </span>
						</div>
						<div class="feedback-card__top--name user__search-card">
							<p class="link-name"><a href="<?= Url::to(['user/view/'.$user->id]); ?>"
									class="link-regular">
									<?= $user->name ?>
									<?= $user->surname ?>
								</a></p>
							<span></span><span></span><span></span><span></span><span class="star-disabled"></span>
							<b><?= $user->rating?></b>
							<p class="user__search-content">
								Сложно сказать, почему элементы политического процесса лишь
								добавляют фракционных разногласий и рассмотрены исключительно
								в разрезе маркетинговых и финансовых предпосылок.
							</p>
						</div>
						<span class="new-task__time">Был на сайте
							<?=Yii::$app->formatter->asRelativeTime(strtotime('-3 hour', strtotime($user->online))) ?>
						</span>
					</div>
					<div class="link-specialization user__search-link--bottom">
						<?php
						foreach ($user->userCategories as $item) {
							print '<a href="#" class="link-regular">' . $item->category->name . '</a>';
						}
						?>
					</div>
				<?php endforeach; ?>

			</div>

		</section>

		<section class="search-task">
			<div class="search-task__wrapper">
				<?php $form = ActiveForm::begin([
					'options' => [
						'name' => 'users',
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
					<?= $form->field($model, 'online', [
						'template' => '{input}{label}',
					])->checkbox([
						'class' => 'visually-hidden checkbox__input',
					],
						false); ?>
					<?= $form->field($model, 'isFree', [
						'template' => '{input}{label}',
					])->checkbox([
						'class' => 'visually-hidden checkbox__input',
					],
						false); ?>
					<?= $form->field($model, 'review', [
						'template' => '{input}{label}',
					])->checkbox([
						'class' => 'visually-hidden checkbox__input',
					],
						false); ?>
					<?= $form->field($model, 'favorite', [
						'template' => '{input}{label}',
					])->checkbox([
						'class' => 'visually-hidden checkbox__input',
					],
						false); ?>
				</fieldset>

				<?=
				$form->field($model, 'search', [
					'template' => '{label}{input}',
					'options' => [
						'class' => 'custom'
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
