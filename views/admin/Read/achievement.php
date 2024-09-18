<?php require __DIR__ . '/../../components/header.php'; ?>

<table>
    <thead>
        <tr>
            <th>ID Achievement</th>
            <th>ID Team</th> 
            <th>Name</th>
            <th>Date</th>
            <th>Description</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($achievements as $achievement) { ?>
            <?php $id = $achievement["idachievement"]; ?>
            <tr>
                <td><?= $achievement["idachievement"] ?></td> 
                <td><?= $achievement["idteam"] ?></td> 
                <td><?= $achievement["name"] ?></td>
                <td><?= $achievement["date"] ?></td>
                <td><?= $achievement["description"] ?></td>
                <td><a href="/admin/updateachievement?id=<?= $id ?>">Update</a></td>
                <td><a href="/process/deleteachievement?id=<?= $id ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php require __DIR__ . '/../../components/footer.php'; ?>

