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
            <td class="comment-avatar" rowspan="2" width=100px align=center><img class="avatar" src="<?php echo Yii::app()->request->baseUrl; ?>/static/img/avatars/<?php echo $data->hampster_id; ?>.jpg" height="100px" width="100px"></td>
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
        <div class="news-comment-branch">
            <?php echo $this->actionGetCommentBranch($data->id);?>
        </div>
        <div class='comment-item' align=center>
            <table class='comment'>
                <tr>
                    <td>
                        <textarea class='new-comment'></textarea><input type='hidden' class='news-id' value='<?php echo $data->id; ?>'>
                        <input type='button' class='comment-button add' value='Пипипи!!'>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>





