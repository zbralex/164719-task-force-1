<?php
/**
 * @var yii\web\View $this
 * @var array $detail
 * @var string $dateOfBirth
 */

use yii\helpers\Html;
$this->title = Html::encode($detail->user->name);
?>
<main class="page-main">
    <div class="main-container page-container">
        <section class="content-view">
            <div class="user__card-wrapper">
                <div class="user__card">
                    <img src="<?= $detail->user_pic; ?>" width="120" height="120" alt="Аватар пользователя">
                    <div class="content-view__headline">
                        <h1><?= Html::encode($detail->user->name) ?></h1>
                        <p><?= $detail->address ?>, <?= $dateOfBirth; ?></p>
                        <div class="profile-mini__name five-stars__rate">
                            <span></span><span></span><span></span><span></span><span class="star-disabled"></span>
                            <b>4.25</b>
                        </div>
                        <b class="done-task">Выполнил 5 заказов</b><b class="done-review">Получил 6 отзывов</b>
                    </div>
                    <div class="content-view__headline user__card-bookmark user__card-bookmark--current">
                        <span>Был на сайте 25 минут назад</span>
                        <a href="#"><b></b></a>
                    </div>
                </div>
                <div class="content-view__description">
                    <p><?php
                        if ($detail->about) {
                            echo $detail->about;
                        }
                        ?></p>
                </div>
                <div class="user__card-general-information">
                    <div class="user__card-info">
                        <h3 class="content-view__h3">Специализации</h3>
                        <div class="link-specialization">
                            <?php
                            foreach ($detail->userCategories as $item) {
                                print '<a href="#" class="link-regular">' . $item->category->name . '</a>';
                            }
                            ?>
                        </div>
                        <h3 class="content-view__h3">Контакты</h3>
                        <div class="user__card-link">
                            <a class="user__card-link--tel link-regular" href="#"><?= $detail->phone?></a>
                            <a class="user__card-link--email link-regular" href="#"><?= $detail->user->email?></a>
                            <a class="user__card-link--skype link-regular" href="#"><?= $detail->skype?></a>
                        </div>
                    </div>
                    <div class="user__card-photo">
                        <h3 class="content-view__h3">Фото работ</h3>
                        <a href="#"><img src="/img/rome-photo.jpg" width="85" height="86" alt="Фото работы"></a>
                        <a href="#"><img src="/img/smartphone-photo.png" width="85" height="86" alt="Фото работы"></a>
                        <a href="#"><img src="/img/dotonbori-photo.png" width="85" height="86" alt="Фото работы"></a>
                    </div>
                </div>
            </div>
            <div class="content-view__feedback">
                <h2>Отзывы<span>(2)</span></h2>
                <div class="content-view__feedback-wrapper reviews-wrapper">
                    <div class="feedback-card__reviews">
                        <p class="link-task link">Задание <a href="#" class="link-regular">«Выгулять моего боевого петуха»</a></p>
                        <div class="card__review">
                            <a href="#"><img src="/img/man-glasses.jpg" width="55" height="54"></a>
                            <div class="feedback-card__reviews-content">
                                <p class="link-name link"><a href="#" class="link-regular">Астахов Павел</a></p>
                                <p class="review-text">
                                    Кумар сделал всё в лучшем виде.  Буду обращаться к нему в будущем, если
                                    возникнет такая необходимость!
                                </p>
                            </div>
                            <div class="card__review-rate">
                                <p class="five-rate big-rate">5<span></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="feedback-card__reviews">
                        <p class="link-task link">Задание <a href="#" class="link-regular">«Повесить полочку»</a></p>
                        <div class="card__review">
                            <a href="#"><img src="/img/woman-glasses.jpg" width="55" height="54"></a>
                            <div class="feedback-card__reviews-content">
                                <p class="link-name link"><a href="#" class="link-regular">Морозова Евгения</a></p>
                                <p class="review-text">
                                    Кумар приехал позже, чем общал и не привез с собой всех
                                    инстументов. В итоге пришлось еще ходить в строительный магазин.
                                </p>
                            </div>
                            <div class="card__review-rate">
                                <p class="three-rate big-rate">3<span></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="connect-desk">
            <div class="connect-desk__chat">

            </div>
        </section>
    </div>
</main>
