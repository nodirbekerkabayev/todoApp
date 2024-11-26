<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('https://images.pexels.com/photos/628241/pexels-photo-628241.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
        }

        .todo-body {
            max-width: 700px;
            box-shadow: 0 0 5px #ccc;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
        }

        .todo-text {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="todo-body my-5 p-3">
            <h1 class="text-center todo-text">Todo App</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi facere fugit hic nesciunt similique. Alias doloremque eaque esse explicabo. Dolorum ducimus harum libero molestiae necessitatibus optio perspiciatis quos repudiandae sunt?</p>
            <form action="add.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter your task"
                           aria-label="Task input" id="taskInput">
                    <select name="Status" id="" style="margin:0 20px">
                        <option value="pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                    <button class="btn btn-primary" id="addTaskBtn">Add</button>
                </div>
            </form>
            <ul class="list-group" id="taskList">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Sample Task
                    <button class="btn btn-outline-success">Done</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Sample Task
                    <button class="btn btn-outline-success">Done</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Sample Task
                    <button class="btn btn-outline-success">Done</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Sample Task
                    <button class="btn btn-outline-success">Done</button>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>