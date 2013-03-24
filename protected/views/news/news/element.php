<?php
/**
 * Created by JetBrains PhpStorm.
 * User: palpav
 * Date: 23.03.13
 * Time: 17:39
 * To change this template use File | Settings | File Templates.
 */
?>
<div class='news-item'>
    <table class="news">
        <tr class="news-header">
            <td class="news-avatar" rowspan="2" width=100px align=center><img class="avatar" src="<?php echo Yii::app()->request->baseUrl; ?>/static/img/avatars/1.jpg" height="100px" width="100px"></td>
            <td class="news-subject">
                <?php
                echo "#".$data->id." ".$data->subject;
                ?>
            </td>
        </tr>
        <tr>
            <td class="news-head-info">
                <?php
                echo "Добавил то хоть кто ?  Дык ".$data->hampster->login.". А когда ? Дык ".substr($data->created,0,19);
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
        Глав хомяк еще не сделал комменты вот ленивая сволочь!
    </div>





</div>





