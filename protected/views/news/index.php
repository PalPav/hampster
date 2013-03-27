<link rel="stylesheet" type="text/css" href="/static/css/news.css" media="screen, projection" />


<script>
    jQuery(document).ready(function(){

        $('.news-item').on('click','.news-comment-header', function() {
            /*            $(this).toggleClass('task-head-opened');*/
            $(this).next().slideToggle('fast');
        });

        $('.comment-item').on('click','.add', function() {
            /*            $(this).toggleClass('task-head-opened');*/
            var elem = this;
            var tr = $(elem).closest("tr");
            var row = {};
            row['text']=$(tr).find('.new-comment').val();
            row['news_id']=$(tr).find('.news-id').val();
            row['level']=0;

            $.post("/index.php?r=news/CommentAdd",row,function(data){
                data = $.parseJSON(data);
                console.log(data);
                if (data.success==true){
                        //тут делаем вставку элемента перед нашей формой попробовать сфетчить готовый элемент
                }
                else if (data.success==false) {
                        //иначе что там не прошло валидацию!
                }
            });

        });






    });








</script>

<h1>Хомячьи новости</h1>
<?php

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'news/element',
));

?>