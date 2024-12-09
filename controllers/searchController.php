<?php
(new \App\Todo())->search($_POST['search']);
header('Location: /todos');
exit();