<?php require __DIR__ . '/../../components/header.php'; ?>

<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

    <table border="1">
        <thead>
            <tr>
                <th>ID Event</th>
                <th>Name </th>
                <th>Date</th>
                <th>Description</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event) { ?>
                <tr>
                    <?php $id = $event["idevent"] ?>
                    <th><?= $id ?></th>
                    <th><?= $event["name"] ?></th>
                    <th><?= $event["date"] ?></th>
                    <th><?= $event["description"] ?></th>
                    <td><a href="/admin/updateevent?id=<?= $id ?>">Update</a></td>
                    <td><a href="/process/deleteevent?id=<?= $id ?>">Delete</a></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../../components/footer.php'; ?>