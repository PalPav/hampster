<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />
    <link rel="icon" type="image/png" href="static/img/favicon.ico" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <script src="/static/js/jquery/jquery-1.9.1.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><img src="/static/img/theme/logo_monday.png"></div>
	</div>



	<div id="mainmenu">
		<?php
        if (!Yii::app()->user->isGuest){
            $this->widget('zii.widgets.CMenu',array(
                'items'=>array(
                    array('label'=>'Главная', 'url'=>array('/news/index')),
                    array('label'=>'Сервисы', 'url'=>array('/services/index')),
                    array('label'=>'Роли и пользователи', 'url'=>array('/srbac'), 'visible'=>Yii::app()->user->checkAccess('srbac@AuthitemViewing')),
                    array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/hampster/logout'))
                ),
            ));
        }
 ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    <div>
	<?php echo $content; ?>
    </div>
	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Hampster Team .<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered();?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
