<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
    <?php require_once 'procces.php'; ?>
        <?php 
            $mysqli = new mysqli('localhost','root','','crud') or die ($mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM data") or die ($mysqli->error);
        ?>
    <div class="container">
    <div class="row">
        <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th class="col">name</th>
                    <th class="col">nim</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['nim']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>"
                                class="btn btn-info">edit</a>
                            <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
    <form action ="procces.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Nama</label>
        <input type="text" name="name" 
               value="<?php echo $name; ?>" placeholder="">
        <label>NIM</label>
        <input type="text" name="nim" 
                value="<?php echo $nim ?>" placeholder="">
        <?php
            if($update == true):
        ?>
            <button type="submit" name="update">update</button>
        <?php else: ?>
            <button type="submit" name="save">save</button>
        <?php endif; ?>

    </form>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
</body>
</html>