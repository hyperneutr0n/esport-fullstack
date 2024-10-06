<?php require __DIR__ . '/../../components/header.php'; ?>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

    <table border="1">
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
                    <td><a href="/process/deletegame?id=<?= $id ?>">Delete</a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>
<?php require __DIR__ . '/../../components/footer.php'; ?>