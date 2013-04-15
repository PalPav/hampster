<link rel="stylesheet" type="text/css" href="/static/css/news.css" media="screen, projection" />


<script>
    jQuery(document).ready(function(){

        $('.news-item').on('click','.news-comment-header', function() {
            $(this).next().slideToggle('fast');
        });

        $('.comment-item').on('click','.add', function() {
            var elem = this;
            var tr = $(elem).closest("tr");
            var row = {};
            var area =$(tr).find('.new-comment');
            row['text']=$(area).val();
            row['news_id']=$(tr).find('.news-id').val();
            row['level']=1;


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