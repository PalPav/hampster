<?php
/**
 * Created by JetBrains PhpStorm.
 * User: palpav
 * Date: 23.03.13
 * Time: 17:39
 * To change this template use File | Settings | File Templates.
 */




        $commentsProvider=new CActiveDataProvider('NewsComments', array(
            'criteria'=>array(
                'condition'=>'news_id='.$data->id,
                'order'=>'created asc',
                'with'=>array('hampster'),
            )
        ));

?>
<div class='news-item'>
    <table class="news">
        <tr class="news-header">
            <td class="comment-avatar" rowspan="2" width=100px align=center><img class="avatar" src="<?php echo Yii::app()->request->baseUrl; ?>/static/img/avatars/<?php echo Yii::app()->user->id; ?>.jpg" height="100px" width="100px"></td>
            <td class="news-subject">
                <?php
                echo "#".$data->id." ".$data->subject;
                ?>
            </td>
        </tr>
        <tr>
            <td class="news-head-info">
                <?php
                echo "Кто :".$data->hampster->login.". Когда :".substr($data->created,0,16);
                ?>
            </td>
        </tr>
    </table>
    <div class="news-body">
            <?php
            echo $data->body;
            ?>
    </div>
    <div class="news-comment-header">
          Что хомяки то думают...
    </div>
    <div class="news-comment-body">
        <?php
        $comment = $commentsProvider->getData();
        foreach($comment as $i => $item) {
            Yii::app()->controller->renderPartial('news/comment',
                array('index' => $i, 'data' => $item, 'widget' => $this));
        }
        ?>

        <div class='comment-item' align=center>
            <table class="comment">
                <tr>
                    <td>
                        Автообновления ветки после вствки коммента еще нет )) Так что жамкаем F5 после того как добавили коммент))
                        <textarea class="new-comment" rows=5 cols=115></textarea><input type="hidden" class='news-id' value="<?php echo $data->id; ?>">
                        <div class="comment-button add">Пипипи!!</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>





</div>





