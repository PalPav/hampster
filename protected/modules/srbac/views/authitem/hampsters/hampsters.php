<?php
/**
 * Created by JetBrains PhpStorm.
 * User: palpav
 * Date: 22.03.13
 * Time: 23:21
 * To change this template use File | Settings | File Templates.
 */

if($this->module->getMessage() != ""){
 echo '<div id="srbacError">'.$this->module->getMessage().'</div>';
}
echo '<div class="simple">'.$this->renderPartial("frontpage").'</div>';?>

<div class="grid-container">
    <h3 class="grid-header">
        Хомяки
    </h3>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$dataProvider,
        'columns'=>array(
            'id',
            'login',
            'settings',
            'email',
            'registered',
            'lastlogin',
            array(
               // display a column with "view", "update" and "delete" buttons
                'class'=>'CButtonColumn',
                'template'=>'{view}{update}',
            ),
        ),
    ));

    echo CHtml::button('Пополнение !', array('submit' => array('authitem/addhampster')));

    echo "</div>";