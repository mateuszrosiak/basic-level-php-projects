<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Weight Tracker</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<div class="container">

    <h1><a href="./">Simple Weight Tracker</a></h1>
    <div style="margin-bottom: 40px;">
        <h2 style="color: green;">Add new entry</h2>
        <form method="post" action="#" name="expense-form">
            <div class="form-one">
                <div class="row">
                <div class="row">
                    <div class="form-item">
                        <label for="date">Date: </label>
                        <input type="date" name="date" id="date" required>
                    </div>

                    <div class="form-item">
                        <label for="amount">Your Weight: </label>
                        <input type="text" name="weight" id="weight" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="test" id="add-weight" name="submit-weight-entry">Add new weight</button>
        </form>
    </div>

    <div style="width: 50%; margin: 0 auto">
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <td>No:</td>
                    <td>Date:</td>
                    <td>Weight: </td>
                    <td>Action</td>
                </tr>
                </thead>
            </table>
        </div>

        <div class="tbl-content">
            <table>
                <thead>
                    <tr>
                        <?php foreach ($allEntries as $entry): ?>
                        <td><?= htmlentities($entry['id']) ?></td>
                        <td><?= htmlentities($entry['date']) ?></td>
                        <td><?= htmlentities($entry['weight']) ?></td>
                        <td><button><a href="./?action=delete&id=<?= $entry['id'] ?>">Delete</a></button></td>
                    </tr>
                <? endforeach; ?>
                </thead>
            </table>
        </div>
    </div>
</div>

</body>

</html>