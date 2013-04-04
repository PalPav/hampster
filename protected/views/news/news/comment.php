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
            <td class="comment-head">
                <?php
                echo "<span>".$data->hampster->login."</span>";
                ?>
            </td>
            <td class="comment-head">
                <?php
                echo "<span>".substr($data->created,0,16)."</span>";
                ?>
            </td>
        </tr>
        <tr>
            <td class="comment-avatar" width=80px align=center><img class="avatar" src="<?php echo Yii::app()->request->baseUrl; ?>/static/img/avatars/<?php echo $data->hampster_id; ?>.jpg" height="70px" width="70px"></td>
            <td class="comment-body">
                <?php
                echo $data->body;
                ?>
            </td>
        </tr>
        <tr>
            <td class="comment-footer" colspan="2">
            </td>
        </tr>
    </table>
</div>





