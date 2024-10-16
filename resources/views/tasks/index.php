<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: lavender;
        }

        h1 {
            color: darkslategray;
        }

        .add-form {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            background: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px lightgray;
        }

        input[type="text"], textarea, select {
            width: 75%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid gainsboro;
            border-radius: 5px;
        }

        select{
            width: 50%;
        }

        button {
            background: green;
            color: white;
            width: 100px;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;

        }

        button:hover {
            background: darkgreen;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }

        table, th, td {
            border: 1px solid lightgray;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: lightgray;
            color: darkslategray;
        }

        tr:nth-child(even) {
            background-color: whitesmoke;
        }

        .edit{
            background-color: green;
        }

        .edit:hover{
            background-color: darkgreen;
        }

        .delete{
            background-color: red;
        }

        .delete:hover{
            background-color: darkred;
        }
    </style>
</head>
<body>
    <h1>Task Management</h1>

    <!-- Task Form -->
    <form action="/tasks" method="POST" class="add-form">
        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
        <input type="text" name="title" placeholder="Task Title" required>
        <textarea name="description" placeholder="Task Description"></textarea>

        <select name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php endforeach; ?>
        </select>

        <select name="status">
            <option value="pending">Pending</option>
            <option value="in-progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>

        <button type="submit">Add Task</button>
    </form>

    <hr>

    <!-- Task List -->
    <h2>All Tasks</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= htmlspecialchars($task->title) ?></td>
                    <td><?= htmlspecialchars($task->description) ?></td>
                    <td><?= htmlspecialchars($task->category->name) ?></td>
                    <td><?= htmlspecialchars($task->status) ?></td>
                    <td>
                        <a href="/tasks/edit/<?= $task->id ?>"><button class="edit">Edit</button></a>
                        <form action="/tasks/<?= $task->id ?>" method="POST" style="display:inline;">
                            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this task?');" class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
