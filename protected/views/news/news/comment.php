<?php
/**
 * Created by JetBrains PhpStorm.
 * User: palpav
 * Date: 26.03.13
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */

?>
<div class='comment-item' align=center>
    <table class="comment">
        <tr>
            <td class="comment-head" colspan="2">
                <?php
                echo '<span>'.$data->hampster->login." ".substr($data->created,0,16);
                ?>
            </td>
        </tr>
        <tr>
            <td class="comment-avatar" width=80px align=center><img class="avatar" src="<?php echo Yii::app()->request->baseUrl; ?>/static/img/avatars/<?php echo Yii::app()->user->id; ?>.jpg" height="70px" width="70px"></td>
            <td class="comment-body">
                <?php
                echo '&nbsp;&nbsp;&nbsp;'.$data->body;
                ?>
            </td>
        </tr>
        <tr>
            <td class="comment-footer" colspan="2">
                Ответить
            </td>
        </tr>
    </table>
</div>





