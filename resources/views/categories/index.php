<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: whitesmoke;
            color: #333;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }


        .category-form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .category-form input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 60%;
            margin-right: 10px;
            border: 1px solid lightgray;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: blue;
            color:white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: darkblue;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid lightgray;
        }

        table th {
            background-color: lightgray;
        }

        table td {
            background-color: white;
        }

        .delete {
            background-color: red;
        }

        .delete:hover {
            background-color: darkred;
        }

        .back {
            background-color: red;
        }

        .back:hover {
            background-color: darkred;
        }

        hr {
            margin-top: 30px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/"><button class="back">Back</button></a>
        <h1>Category Management</h1>

        <!-- Category Form -->
        <form action="/categories" method="POST" class="category-form">
            <input type="hidden" name="_token" value="<?= csrf_token() ?>">
            <input type="text" name="name" placeholder="Category Name" required>
            <button type="submit">Add Category</button>
        </form>

        <hr>

        <!-- Category List -->
        <h2>All Categories</h2>
        <table class="category-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category->name ?></td>
                        <td>
                            <form action="/categories/<?= $category->id ?>" method="POST" style="display:inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                <button type="submit" class="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
