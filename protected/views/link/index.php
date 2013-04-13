<?php
/* @var $this LinkController */
?>
<link rel="stylesheet" type="text/css" href="/static/css/links.css" media="screen, projection" />
<h3 class="grid-header">
    Зернохранилище
</h3>
</br>
<?php
echo CHtml::button('Моя нашел что принычить !', array('submit' => array('link/addlink')));

//Добавить фильтры
// цвета ссылок от чего зависят ? // Может сделать линки свернутыми ?
// + кнопка редактирования и удаления только для капибар или владельцев )
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'link/element',
));

