<?php
/* @var $this LinkController */
/* @var $model Link */
/* @var $form CActiveForm */


$this->breadcrumbs = array(
    'Зернохранилище'=>array('link/index'),
     $link->isNewRecord ? 'Добавить' : 'Поправить',
)




?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'link-add-form',
	'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Поля с <span class="required">*</span> нужны очень как.</p>

	<?php echo $form->errorSummary(array($link,$tags)); ?>

	<div class="row">
		<?php echo $form->labelEx($link,'subject'); ?>
		<?php echo $form->textField($link,'subject'); ?>
		<?php echo $form->error($link,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($link,'body'); ?>
		<?php echo $form->textField($link,'body'); ?>
		<?php echo $form->error($link,'body'); ?>
	</div>

    <div class="row">
        <?php echo $form->label($tags,'tags'); ?>
        <div class="note">Тэги разделяем запятой, можно до пяти штук не длиннее 10ти символов</div>
        <?php echo $form->textField($tags,'tags'); ?>
        <?php echo $form->error($tags,'tags'); ?>
    </div>


	<div class="row">
		<?php echo $form->labelEx($link,'is_private'); ?>
		<?php echo $form->checkBox($link,'is_private'); ?>
		<?php echo $form->error($link,'is_private'); ?>
	</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton($link->isNewRecord ? 'Припрятать' : 'Уплочено'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->