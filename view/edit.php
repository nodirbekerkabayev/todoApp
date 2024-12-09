<?php
require 'view/components/header.php';
?>
<div class="edit-container">
    <h2 class="edit-header">Edit Task</h2>
    <form method="POST" , action="/todos/<?= $todo['id'] ?>/update">
        <input name="_method" value="PUT" type="text" hidden="">
        <div class="form-group">
            <label for="taskName" class="form-label">Task Name</label>
            <input type="text" id="taskName" class="form-control" placeholder="Enter task name" name="title"
                   value="<?= $todo['title'] ?>">
        </div>
        <div class="form-group">
            <label for="taskStatus" class="form-label">Status</label>
            <select id="taskStatus" class="form-select" name="status">
                <option value="Completed" <?= $todo['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                <option value="Pending" <?= $todo['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="in_progress" <?= $todo['status'] == 'in_progress' ? 'selected' : '' ?>>In-progress
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="taskDueDate" class="form-label">Due Date</label>
            <input type="datetime-local" id="taskDueDate" class="form-control" value="<?= $todo['due_date'] ?>"
                   name="due_date">
        </div>
        <div class="btn-actions">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="/todos" class="btn btn-secondary"
               style="display: inline-block; padding: 10px 20px; color: #fff; background-color: #6c757d; text-decoration: none; border-radius: 5px; font-size: 16px; text-align: center; transition: background-color 0.3s ease;">Back
                to Todo list</a>
        </div>
    </form>
</div>
<?php
require 'view/components/footer.php';
?>