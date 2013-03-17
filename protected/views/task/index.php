<style type="text/css">
    .task-list {
        width: 95%;
        overflow:hidden;
        padding:10px;
    }
    .task-container {
        margin-bottom:10px;
        padding:10px;
        display: none;
        border: solid 1px;
        border-radius: 0 0 5px 5px;
    }

    .task-head {
        border: solid 1px;
        border-radius:5px 5px  0 0 ;
        padding:10px;
    }
    .head-controls {
        float:right;
    }
</style>
<script src="/static/js/jquery-1.9.1.js"></script>



<script>
jQuery(document).ready(function(){



    $('.task-list').on('click','.task-head', function() {
    $(this).next().slideToggle('fast');
    return false;
    });




});
</script>

<?php
/* @var $this TaskController */

echo "<div class='task-list'>";
foreach ($data as $key => $task) {
    echo "<div class='task-head'><div class='head-controls'>+/E/X</div>".$task['id']." ".$task['subject']." Сделать до : ".$task['end_time']."</div>";
    echo "<div class='task-container'><br><br> ".$task['body']."<br><br></div>";
}
echo "</div>";
