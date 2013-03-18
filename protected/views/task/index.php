<link rel="stylesheet" type="text/css" href="/static/css/tasks.css" media="screen, projection" />
<script src="/static/js/jquery/jquery-1.9.1.js"></script>



<script>
jQuery(document).ready(function(){
    $('.task-list').on('click','.task-head', function() {
        $(this).toggleClass('task-head-opened');
        $(this).next().slideToggle('fast');
    });
});
</script>


<h3>Лента задач (Жуй хомяк, жуй)</h3>
<?php


echo "<div class='task-list'>";
foreach ($data as $key => $task) {
    echo "<div class='task-head level-".$task['priority_level_id']."'>
            <div class='head-controls'>
                <input type='button' value='+' title='Добавить подзадачу'>
                <input type='button' value='E' title='Редактировать задачу'>
                <input type='button' value='M' title='Редактировать статус'>
            </div>
            <div class='head-time'>".$task['end_time']."</div>
            <div class='head-title'>#".$task['id']." ".$task['subject']."</div>
            </div>";
    echo "<div class='task-container'><br><br> ".$task['body']."<br><br></div>";
}
echo "</div>";
