<?php
/**
 * @var yii\web\View $this
 * @var array $detail
 * @var string $count_tasks
 * @var string $user
 * @var array $actionResponseForm
 * @var array $actionRefuseForm
 * @var array $actionDoneForm
 *
 */


use frontend\assets\TaskActionsAsset;
use taskForce\classes\Task;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Response;

TaskActionsAsset::register($this);
?>

<main class="page-main">
	<div class="main-container page-container">
		<section class="content-view">
			<div class="content-view__card">
				<div class="content-view__card-wrapper">
					<div class="content-view__header">
						<div class="content-view__headline">
							<h1><?= Html::encode($detail->name) ?></h1>
							<span>Размещено в категории
                                    <a href="#" class="link-regular"><?= $detail->category->name ?></a>
                                   <?= Yii::$app->formatter->asRelativeTime(strtotime($detail->created_at)) ?></span>
						</div>
						<b class="new-task__price new-task__price--clean content-view-price"><?= $detail->price; ?><b>
								₽</b></b>
						<div class="new-task__icon new-task__icon--clean content-view-icon"></div>
					</div>
					<div class="content-view__description">
						<h3 class="content-view__h3">Общее описание</h3>
						<p>
							<?= Html::encode($detail->description) ?>
						</p>
					</div>
					<div class="content-view__attach">
						<h3 class="content-view__h3">Вложения</h3>

						<?php foreach ($detail->attachments as $item): ?>

							<a href="<?= Url::to($item->url); ?>"
								class="link-regular"><?= Html::encode($item->name); ?></a><br>

						<?php endforeach; ?>

					</div>
					<div class="content-view__location">
						<h3 class="content-view__h3">Расположение</h3>
						<div class="content-view__location-wrapper">
							<div class="content-view__map">
								<a href="#"><img src="/img/map.jpg" width="361" height="292"
										alt="Москва, Новый арбат, 23 к. 1"></a>
							</div>
							<div class="content-view__address">
								<span class="address__town">Москва</span><br>
								<span>Новый арбат, 23 к. 1</span>
								<p>Вход под арку, код домофона 1122</p>
							</div>
						</div>
					</div>
				</div>
				<div class="content-view__action-buttons">
					<?php
					$resp = Response::find()
						->where(['user_id' => Yii::$app->user->id, 'task_id' => $detail->id, 'status' => 'new'])
						->count();

					$task = new Task($detail->status);

					foreach ($task->getAvailableActions($detail->author->role_id, $detail->author_id, Yii::$app->user->id, $resp) as $item) {
						echo Html::button($item->actionName, [
							'class' => 'button button__big-color ' . $item->class . '-button open-modal',
							'data-for' => $item->innerName . '-form'
						]);
					}
					?>
				</div>
			</div>
			<?php if ($detail->author_id == Yii::$app->user->id): ?>
				<div class="content-view__feedback">
					<h2>Отклики <span>(<?= count($detail->response) ?>)</span></h2>
					<div class="content-view__feedback-wrapper">
						<div class="content-view__feedback-card">
							<?php foreach ($detail->responses as $item): ?>
								<div class="feedback-card__top">
									<a href="#"><img src="/img/man-blond.jpg" width="55" height="55"></a>
									<div class="feedback-card__top--name">
										<p class="link-name">
											<a href="#" class="link-regular">
												<?php
												if (isset($item->userInfo)) {
													echo Html::encode($item->userInfo->name) . ' ' . Html::encode($item->userInfo->surname);
												} else {
													echo Html::encode($item->user->name);
												}
												?>
											</a></p>
										<span></span><span></span><span></span><span></span><span
											class="star-disabled"></span>
										<b>4.25</b>
									</div>
									<span class="new-task__time">
                                 <?= Yii::$app->formatter->asRelativeTime(strtotime($item->responsed_at)) ?>
                            </span>
								</div>
								<div class="feedback-card__content">
									<p>
										<?= Html::encode($item->comment); ?>
									</p>
									<span>
										<?php
										if (isset($item->price)) {
											echo $item->price . '₽';
										} else {
											echo '-';
										} ?>
									</span>
								</div>
								<div class="feedback-card__actions">
									<?php foreach ($task->getAvailableActionsClient($detail->author->role_id, $detail->status) as $item) {

										echo Html::a($item->actionName, '', [
											'class' => 'button__small-color ' . $item->class . '-button button',
											'data-for' => $item->class . '-form'
										]);
									}
									?>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</section>

		<section class="connect-desk">
			<div class="connect-desk__profile-mini">
				<div class="profile-mini__wrapper">
					<h3>Заказчик</h3>
					<div class="profile-mini__top">
						<img src="/img/man-brune.jpg" width="62" height="62" alt="Аватар заказчика">
						<div class="profile-mini__name five-stars__rate">
							<p><?php if ($detail->author) {
									echo $detail->author->name . ' ' . $detail->author->surname;
								} else {
									echo Yii::$app->user->identity->name;
								} ?></p>
						</div>
					</div>
					<p class="info-customer"><span><?= $count_tasks; ?> заданий</span>
						<span class="last-">2 года на сайте</span></p>
					<?php if ($detail->author): ?>
						<a href="<?= Url::to(['user/view/' . $detail->author->id]); ?>" class="link-regular">Смотреть
							профиль</a>
					<?php endif; ?>
				</div>
			</div>
			<div id="chat-container">

				<!--                    добавьте сюда атрибут task с указанием в нем id текущего задания-->
				<chat class="connect-desk__chat"></chat>
			</div>
		</section>
	</div>
</main>
<section class="modal response-form form-modal" id="response-form">
	<h2>Отклик на задание</h2>
	<?php $formResponse = ActiveForm::begin() ?>
	<?= $formResponse->field($actionResponseForm, 'price', [
		'labelOptions' => [
			'class' => 'form-modal-description',
			'style' => 'display: block;'
		]
	])->input('text', [
		'class' => 'response-form-payment input input-middle input-money',
		'id' => 'response-payment'
	]);
	?>
	<?= $formResponse->field($actionResponseForm, 'comment', [
		'labelOptions' => [
			'style' => 'display: block;',
			'class' => 'form-modal-description'
		]
	])->textarea([
		'class' => 'input textarea',
		'id' => 'response-comment',
		'style' => 'width: 100%;box-sizing: border-box',
		'rows' => 4,
		'placeholder' => 'Place your text'
	]);
	?>
	<?= Html::submitButton('Отправить', [
		'class' => 'button modal-button'
	]) ?>
	<?php ActiveForm::end(); ?>
	<button class="form-modal-close" type="button">Закрыть</button>
</section>
<section class="modal completion-form form-modal" id="complete-form">
	<h2>Завершение задания</h2>


	<?php $formDone = ActiveForm::begin(); ?>
	<p class="form-modal-description">
		<?= $formDone->field($actionDoneForm, 'isDone')
			->radioList(
				$actionDoneForm->radioLabels,
				[
					'item' => function ($index, $label, $name) {
						$class = ['yes', 'difficult'];
						return "<input class=\"visually-hidden completion-input completion-input--{$class[$index]}\" 
							id='{$index}' 
							type='radio' 
							name='{$name}' 
							value='{$index}' >
							<label class=\"completion-label completion-label--{$class[$index]}\" for='{$index}'>{$label}</label>";
					}
				]);
		?>
	</p>

	<?= $formDone->field($actionDoneForm, 'comment',
		[
			'template' => "{label}{input}<span>{hint}</span><span style='color: red'>{error}</span>",
			'labelOptions' => [
				'style' => 'display: block;',
				'class' => 'form-modal-description'
			]
		])->textarea([
		'class' => 'input textarea',
		'id' => 'completion-comment',
		'style' => 'width: 100%;box-sizing: border-box',
		'rows' => 4,
		'placeholder' => 'Place your text'
	]);
	?>
	<p class="form-modal-description">
		<?= $formDone->field($actionDoneForm, 'rating', [
			'options' => [
				'tag' => false
			],
		])->hiddenInput([
			'id' => 'rating',
			'name' => 'rating',
		]); ?>
	<div class="feedback-card__top--name completion-form-star">
		<span class="star-disabled"></span>
		<span class="star-disabled"></span>
		<span class="star-disabled"></span>
		<span class="star-disabled"></span>
		<span class="star-disabled"></span>
	</div>
	</p>


	<?= Html::submitButton('Отправить', ['class' => 'button modal-button']) ?>

	<?php ActiveForm::end(); ?>

	<button class="form-modal-close" type="button">Закрыть</button>
</section>
<section class="modal form-modal refusal-form" id="refuse-form">
	<h2>Отказ от задания</h2>
	<p>
		Вы собираетесь отказаться от выполнения задания.
		Это действие приведёт к снижению вашего рейтинга.
		Вы уверены?
	</p>
	<button class="button__form-modal button" id="close-modal"
		type="button">Отмена
	</button>
	<?php $formRefuse = ActiveForm::begin(); ?>

	<?= $formRefuse->field($actionRefuseForm, 'refuse')->hiddenInput()->label(false); ?>
	<?= Html::submitButton('Отказаться', [
		'class' => 'button__form-modal refusal-button button'
	]) ?>
	<?php ActiveForm::end(); ?>
	<button class="form-modal-close" type="button">Закрыть</button>

</section>
<div class="overlay"></div>
