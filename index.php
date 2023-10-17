<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>ToDos</title>
</head>
<body>
    <div class="container">
        <h1>ToDos</h1>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm mx-2 border border-primary">
          <form action="tools.php" method="post">
            <div class="form-group">
              <label for="userid">UserId</label>
              <input type="text" class="form-control" name="userid" placeholder="234">
            </div>
            <div class="form-group">
              <label for="todo">Todo</label>
              <input type="text" class="form-control" name="todo" placeholder="Todo">
            </div>
            <input type="submit" id="add" class="btn btn-primary">
          </form>

          <hr>

          <form>
            <div class="form-group">
              <label for="todoSearche">Todo Filter</label>
              <input type="text" class="form-control" id="todoSearche" placeholder="Todo">
            </div>
            <div class="form-group">
              <label for="userSearche">User Filter</label>
              <input type="text" class="form-control" id="userSearche" placeholder="233">
            </div>
          </form>

        </div>

        <div class="col-sm-8 border border-primary">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">UserID</th>
                <th scope="col">Todo</th>
                <th scope="col">Completed</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
           
            <tbody id="tb">
            <?php
            $message = file_get_contents('data.json');
            $messge = json_decode($message, true);
            foreach ($messge as $id => $todo) {
            ?>
              <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $todo['userid']; ?></td>
                <td><?php echo $todo['todo']; ?></td>
                <td><?php echo $todo['completed']; ?></td>
                <td>
                    <a href="editerdoc.php?id=<?php echo $id; ?>">
                        <span class="glyphicon glyphicon-edit"></span> Éditer
                    </a>
                    <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer le todo')" href="suprimertodo.php?id=<?php echo $id; ?>">
                        <span class="glyphicon glyphicon-trash"></span> Supprimer
                    </a>
                </td>
              </tr>
            <?php
            }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

</body>
</html>
