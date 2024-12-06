<?php
/** @var TYPE_NAME $todoId */
$todo = (new \App\Todo())->update(
    $todoId,
    $_POST['title'],
    $_POST['status'],
    $_POST['due_date']
);
redirect('/todos');