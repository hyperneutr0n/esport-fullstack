<?php require __DIR__ . '/../../components/header.php'; ?>

<?php if (isset($_GET["message"])) {
    $message = $_GET["message"];
    echo "<script>";
    echo 'alert(' . json_encode($message) . ')';
    echo "</script>";
} ?>

<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$rowCount = isset($_GET['row']) ? (int)$_GET['row'] : 5;
$totalMember = count($members);
$totalPages = ceil($totalMember / $rowCount);
$page = $page > $totalPages ? $totalPages : $page;
$offset = ($page - 1) * $rowCount;
$memberDisplayed = array_slice($members, $offset, $rowCount);

function DisplayTable($memberDisplayed)
{
    foreach ($memberDisplayed as $member) { ?>
        <tr>
            <?php $id = $member["idmember"] ?>
            <td><?= $id ?></td>
            <td><?= $member["fname"] ?></td>
            <td><?= $member["lname"] ?></td>
            <td><?= $member["username"] ?></td>
            <td><?= $member["profile"] ?></td>
            <td><a href="/admin/updatemember?id=<?= $id ?>" class="action-link update-link">Update</a></td>
            <td><a href="/process/deletemember?id=<?= $id ?>" class="action-link delete-link">Delete</a></td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-5 mb-5 flex-column">
    <table border="1">
        <thead>
            <tr>
                <th>ID Member</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Username</th>
                <th>Profile</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php DisplayTable($memberDisplayed) ?>
        </tbody>
    </table>
    <div class="pagination-links" style="text-align:center;">
        <?php
        $beforePage = --$page;
        $afterPage = $page + 2;
        ?>
        <a href="?page=<?= $beforePage ?>">Before</a>
        <a href="?page=<?= $afterPage ?>">Next</a>
    </div>
</div>
</body>

</html>