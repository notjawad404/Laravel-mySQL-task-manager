<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: lavender;
        }

        h1 {
            color: darkslategray;
        }

        form {
            margin-bottom: 20px;
            background: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px lightgray;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid gainsboro;
            border-radius: 5px;
        }

        button {
            background: mediumseagreen;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: seagreen;
        }
    </style>
</head>
<body>
    <h1>Edit Task</h1>

    <!-- Edit Task Form -->
    <form action="/tasks/<?= $task->id ?>" method="POST">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" required>
        <input type="text" name="title" value="<?= htmlspecialchars($task->title) ?>" required>
        <textarea name="description" placeholder="Task Description"><?= htmlspecialchars($task->description) ?></textarea>

        <select name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category->id ?>" <?= $category->id == $task->category_id ? 'selected' : '' ?>><?= $category->name ?></option>
            <?php endforeach; ?>
        </select>

        <select name="status">
            <option value="pending" <?= $task->status == 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="in-progress" <?= $task->status == 'in-progress' ? 'selected' : '' ?>>In Progress</option>
            <option value="completed" <?= $task->status == 'completed' ? 'selected' : '' ?>>Completed</option>
        </select>

        <button type="submit">Update Task</button>
    </form>
</body>
</html>
