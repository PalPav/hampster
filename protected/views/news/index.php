<link rel="stylesheet" type="text/css" href="/static/css/news.css" media="screen, projection" />


<script>
    jQuery(document).ready(function(){
        $('.news-item').on('click','.news-comment-header', function() {
            /*            $(this).toggleClass('task-head-opened');*/
            $(this).next().slideToggle('fast');
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