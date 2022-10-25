<?php
    $todos = [];
    if(file_exists('todo.json')){
        $json = file_get_contents('todo.json');
        $todos = json_decode($json, true);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP TO-DO APP BY JOHN</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form">
    <form action="newtodo.php" method="post">
        <input type="text" name="todo-name" placeholder="Enter your TO-DO">
        <button class="buttonform">Add to-do to the list</button>
    </form>
    </div>
    <div class="tablediv">
        <table class="table">
            <thead>
                <tr>
                    <th id="status">STATUS</th>
                    <th id="description">DESCRIPTION</th>
                    <th id="manage">MANAGE</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php
                    foreach($todos as $todoName => $todos): ?>
                        <tr>
                            <td>
                                <form action="change_status.php" method="post">
                                    <input type="hidden" name="todo-name" value="<?php echo $todoName ?>">
                                    <input type="checkbox" <?php echo $todos['Completed'] ? 'checked' : '' ?>></td>
                                </form>
                            <td><?php echo $todoName; ?></td>
                                <form action="delete.php" method="post">
                                    <input type="hidden" name="todo-name" value="<?php echo $todoName ?>">
                                    <td><button class="buttondelete">Delete</button></td>
                                </form>
                        </tr>
                <?php endforeach; ?>

                <script>
                    const checkboxes = document.querySelectorAll('input[type=checkbox]');
                    checkboxes.forEach(ch => {
                        ch.onclick = function() {
                            this.parentNode.submit();
                        };
                    });
                </script>
            </tbody>
        </table>
    </div>
</body>
</html>