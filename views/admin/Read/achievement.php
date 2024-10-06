<?php require __DIR__ . '/../../components/header.php'; ?>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">
    <table border="1">
        <thead>
            <tr>
                <th>ID Achievement</th>
                <th>ID Team</th>
                <th>Name</th>
                <th>Date</th>
                <th>Description</th>
                <th colspan=" 2">Aksi</th>
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
                    <td><a href="/admin/updateachievement?id=<?= $id ?>" class="action-link update-link">Update</a></td>
                    <td><a href="/process/deleteachievement?id=<?= $id ?>" class="action-link delete-link">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>

</html>