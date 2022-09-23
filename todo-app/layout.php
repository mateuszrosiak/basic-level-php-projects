<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Application in PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<div class="container">

    <h1><a href="./">Todo Application in PHP</a></h1>
    <div style="margin-bottom: 40px;">
        <h2 style="color: green;">Add new task</h2>
        <form method="post" action="#" name="expense-form">
            <div class="form-one">
                <div class="row">
                    <div class="row">
                        <div class="form-item">
                            <label for="date">Date: </label>
                            <input type="date" name="date" id="date" required>
                        </div>

                        <div class="form-item">
                            <label for="amount">Task name</label>
                            <input type="text" name="task" id="task" required>
                        </div>

                        <div class="form-item">
                            <label for="date">Due date: </label>
                            <input type="date" name="due-date" id="date"
                                   required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="test" id="add-task"
                        name="submit-weight-entry">Add new task
                </button>
        </form>
    </div>

    <div style="width: 50%; margin: 0 auto">
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <td>No:</td>
                    <td>Date:</td>
                    <td>Task:</td>
                    <td>Due Date:</td>
                    <td>Action</td>
                </tr>
                </thead>
            </table>
        </div>

        <div class="tbl-content">
            <table>
                <thead>
                <tr>
                    <?php
                    foreach ($params

                    as $param): ?>
                    <td><?= htmlentities($param['id']) ?> </td>
                    <td><?= htmlentities($param['date']) ?></td>
                    <td><?= htmlentities($param['task']) ?></td>
                    <td><?= htmlentities($param['due-date']) ?></td>
                    <td>
                        <a href="?action=delete&id=<?= $param['id'] ?>"><button>Action</button></a>
                    </td>
                </tr>
                <?
                endforeach; ?>
                </thead>
            </table>

        </div>
    </div>
</div>

</body>

</html>