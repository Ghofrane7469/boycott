<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Users</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-2 py-2">List Users</h2>
        <?php if (array_key_exists("message", $_GET)) : ?>
            <div class="alert alert-success">
                <?php echo $_GET['message']; ?>
            </div>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">email</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($res) == 0) {
                ?>
                    <tr>
                        <td class="text-center" colspan="5">Table Empty</td>
                    </tr>
                <?php
                } else {
                ?>
                    <?php foreach ($res as $val) { ?>
                        <tr>
                            <td><?= $val['id'] ?></td>
                            <td><?= $val['nom'] ?></td>
                            <td><?= $val['prenom'] ?></td>
                            <td><?= $val['email'] ?></td>
                            <td>
                                <a href="./deleteUser.php?id=<?= $val['id'] ?>">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                                <a>
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                            </td>
                        </tr>
                <?php  }
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>