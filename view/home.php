
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://images.pexels.com/photos/628241/pexels-photo-628241.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
        }

        .todo-body {
            max-width: 700px;
            box-shadow: 0 0 5px 5px #ccc;
            backface-visibility: hidden;
            background-color: #f4f0ec;
            border-radius: 20px;
            padding: 20px;
        }

        .todo-text {
            font-weight: bold;
        }
        .completed {
            text-decoration: line-through;
            color: green;
        }
        .in_progress {
            text-decoration: underline;
            color: #ffc40c;
        }
        .pending {
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="todo-body my-5 p-3">
            <h1 class="text-center todo-text">Todo App</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam autem eveniet illum ipsa, nihil
                numquam officiis pariatur placeat quae quasi recusandae repellat similique tempora tenetur ut vel veniam
                veritatis.</p>
            <form method="POST" action="/store">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username"
                           aria-label="Recipient's username" aria-describedby="button-addon2"
                           name="title"
                           required
                    >
                    <input type="datetime-local" class="form-control" placeholder="Recipient's username"
                           aria-label="Recipient's username" aria-describedby="button-addon2"
                           name="due_date"
                           required
                    >
                    <button class="btn btn-primary" type="submit" id="button-addon2">Add</button>
                </div>
            </form>
            <ul class="list-group">

                    <?php
                    /** @var TYPE_NAME $todos */

                    foreach ($todos as $todo) {
                        if ($todo['status'] == 'completed'){
                            echo '<li class="' . $todo['status'] . ' list-group-item d-flex justify-content-between align-items-center">
                        ' . $todo["title"] . '
                        <div>
                        <a href="/inProgress?id=' . $todo["id"] . '" class="btn btn-outline-success">In progress</a>
                        <a href="/pending?id=' . $todo["id"] . '" class="btn btn-outline-success">Pending</a>
                        </div>
                        </li>';
                        }
                        elseif($todo['status'] == 'in_progress'){
                            echo '<li class="' . $todo['status'] . ' list-group-item d-flex justify-content-between align-items-center">
                        ' . $todo["title"] . '
                        <div>
                        <a href="/pending?id=' . $todo["id"] . '" class="btn btn-outline-success">Pending</a>
                        <a href="/complete?id=' . $todo["id"] . '" class="btn btn-outline-success">Completed</a>
                        </div>
                        </li>';
                        }
                        else{
                            echo '<li class="' . $todo['status'] . ' list-group-item d-flex justify-content-between align-items-center">
                        ' . $todo["title"] . '
                        <div>
                        <a href="/inProgress?id=' . $todo["id"] . '" class="btn btn-outline-success">In progress</a>
                        <a href="/complete?id=' . $todo["id"] . '" class="btn btn-outline-success">Completed</a>
                        </div>
                        </li>';
                        }
                        }
                        ?>
        </div>
        </ul>
    </div>
</div>
</body>
</html>