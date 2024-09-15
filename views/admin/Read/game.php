<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game) { ?>

                <?php $id = $game["idgame"] ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $game["name"] ?></td>
                    <td><?= $game["description"] ?></td>
                    <td><a href="/admin/updategame?id=<?= $id ?>">Update</a></td>
                    <td><a href="process/deletegame?id=<?= $id ?>">Delete</a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>


</body>

</html>