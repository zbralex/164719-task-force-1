<?php
/* @var $this \yii\web\View */
/* @var string $content  */

use frontend\assets\PublicAsset;
use yii\helpers\Html;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
    <title><?= Html::encode($this->title) ?></title>
	<?= Html::csrfMetaTags() ?>

	<?php $this->head()?>
</head>
<body class="landing">
<?php $this->beginBody()?>
<?= $content?>
<div class="overlay"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
