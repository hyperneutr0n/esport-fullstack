<?php require __DIR__ . '/../../components/header.php'; ?>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

    <table border="1">
        <thead>
            <tr>
                <th>ID Member</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Profile</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member) { ?>
                <tr>
                    <?php $id = $member["idmember"] ?>
                    <th><?= $id ?></th>
                    <th><?= $member["fname"] ?></th>
                    <th><?= $member["lname"] ?></th>
                    <th><?= $member["username"] ?></th>
                    <th><?= $member["password"] ?></th>
                    <th><?= $member["profile"] ?></th>
                    <td><a href="/admin/updatemember?id=<?= $id ?>">Update</a></td>
                    <td><a href="/process/deletemember?id=<?= $id ?>">Delete</a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../../components/footer.php'; ?>