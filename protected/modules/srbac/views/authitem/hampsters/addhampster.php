<?php

if($this->module->getMessage() != ""){
echo '<div id="srbacError">'.$this->module->getMessage().'</div>';
}
echo '<div class="simple">'.$this->renderPartial("frontpage").'</div>';?>
<div class="form-container">
<h1>Добавить хомячка</h1>

<?php echo $this->renderPartial('hampsters/form', array('model'=>$model)); ?>
</div>