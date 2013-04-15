<?php
/**
 * Created by JetBrains PhpStorm.
 * User: palpav
 * Date: 10.04.13
 * Time: 22:22
 * To change this template use File | Settings | File Templates.
 */
?>


<div class='link-item' align=center>
    <table class="link">
        <tr>
            <td class="link-favicon">
                <img src="http://www.google.com/s2/favicons?domain=<?php echo $data->body;?>">
            </td>
            <td class="link-subject">
                <?php
                echo "<span>".$data->subject."</span>";
                ?>
            </td>
            <td class="link-owner">
                <?php
                echo "<span>".$data->hampster->login."</span>";
                ?>
            </td>
            <td class="link-time" title="Дата добавления ссылки" >
                <?php
                echo "<span>".substr($data->added,0,16)."</span>";
                ?>
            </td>
            <td class="link-time" title="Дата последней проверки">
                <?php
                echo "<span id='recheck".$data->id."'>".substr($data->last_check,0,16)."</span>";
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=2>
                <?php
                echo "<a href='".$data->body."' target='_blank'>".$data->body."</a>";
                ?>
            </td>
            <td colspan=2 class="link-tags" title="Тэги">
                <?php
                foreach ($data->tags as $tag) {
                    echo "<a href='/index.php?r=link/index&tag=".$tag->id."' target='_blank'>#".$tag->tag."</a> ";
                }
                ?>
            </td>
            <td>
                <span class="link-actions">
                    <?php if($data->hampster_id==Yii::app()->user->id OR Yii::app()->user->checkAccess('Cavy')) {?><a href="/index.php?r=link/edit&id=<?php echo $data->id;?>"><input type='button' name='edit' value='E' title='Редактировать'></a><?php }?><input type='button' class='recheck' data-link_id="<?php echo $data->id;?>" value='R' title='Проверено'><input type='button' name='drop' value='X' title='Удалить'>
                </span>
            </td>
        </tr>
    </table>
</div>
