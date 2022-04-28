<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Expenses Tracker</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<div class="container">

    <h1><a href="./">Simple Expenses Tracker</a></h1>
    <div style="margin-bottom: 40px;">
        <h2 style="color: green;">Add new expense</h2>
        <form method="post" action="#" name="expense-form">
            <div class="form-one">
            <div class="row">
                <div class="form-item">
                    <label for="type">Expense type: </label>
                    <select name="type" id="type" required>
                        <option value="living">Living</option>
                        <option value="entertainment">Entertainment</option>
                        <option value="investment">Investment</option>
                        <option value="charity">Charity</option>
                    </select>
                </div>

                <div class="form-item">
                    <label for="name">Name of expense: </label>
                    <input type="text" name="name" id="name" required>
                </div>
            </div>

            <div class="row">
                <div class="form-item">
                    <label for="date">Date: </label>
                    <input type="date" name="date" id="date" required>
                </div>

                <div class="form-item">
                    <label for="amount">Amount: </label>
                    <input type="text" name="amount" id="amount" required>
                </div>
            </div>
            </div>
            <button type="submit" class="test" id="add-expense" name="submit-expense">Add new expense</button>
        </form>
    </div>

    <div style="width: 50%; margin: 0 auto">
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <td>Expense name:</td>
                <td>Category:</td>
                <td>Amount spent: </td>
                <td>Date of expense: </td>
            </tr>
            </thead>
        </table>
    </div>

    <div class="tbl-content">
        <table>
            <thead>
            <?foreach ($allExpenses as $item): ?>
            <tr>
                <td><?php echo htmlentities($item['name']) ?></td>
                <td><?php echo htmlentities($item['category']) ?></td>
                <td><?php echo (float) $item['value'] ?></td>
                <td><?php echo  htmlentities($item['date']) ?></td>
            </tr>
<?php endforeach; ?>
            </thead>
        </table>
    </div>
    </div>
</div>

</body>

</html>