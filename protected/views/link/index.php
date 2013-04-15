<?php
/* @var $this LinkController */
?>
<link rel="stylesheet" type="text/css" href="/static/css/links.css" media="screen, projection" />

<script>
    jQuery(document).ready(function(){

        $('.recheck').click(function() {
            var row = {};
            var id=$(this).data("link_id");
            var span=$('#recheck'+id);
            row["link_id"]=id;
            $.post("/index.php?r=link/Recheck",row,function(data){
                if (data.success==true){
                    $(span).slideUp("fast");
                    setTimeout(function(){
                        $(span).html(data.date);
                        $(span).slideDown("fast");
                    },200);

                }
                else if (data.success==false) {

                }
            }, "json");
        });
    });

</script>


<h3 class="grid-header">
    Зернохранилище
</h3>
</br>
<?php
echo CHtml::button('Моя нашел что принычить !', array('submit' => array('link/add')));

//Добавить фильтры
// цвета ссылок от чего зависят ? // Может сделать линки свернутыми ?
// + кнопка редактирования и удаления только для капибар или владельцев )
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'link/element',
));

