<?php
/** @var TYPE_NAME $todoId */
$todo = (new \App\Todo())->destroy($todoId);
redirect('/todos');