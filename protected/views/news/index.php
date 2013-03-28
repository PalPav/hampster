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

            $.post("/index.php?r=news/CommentAdd",row,function(data){
                data = $.parseJSON(data);
                console.log(data);
                if (data.success==true){
                    $(elem).closest(".news-comment-body").find('.news-comment-branch').html(data.htmldata);
                    $(area).val("");
                        //мне кажется или можно по проще
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