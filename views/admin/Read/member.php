<?php require __DIR__ . '/../../components/header.php'; ?>

<?php if (isset($_GET["message"])) {
    $message = $_GET["message"];
    echo "<script>";
    echo 'alert(' . json_encode($message) . ')';
    echo "</script>";
} ?>

<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) {
    header("Location: " . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?page=1");
    die;
}
$rowCount = isset($_GET['row']) ? (int)$_GET['row'] : 5;
$totalMember = count($members);
$totalPages = ceil($totalMember / $rowCount);
if ($page > $totalPages) {
    header("Location: " . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?page=" . $totalPages);
    die;
}
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
            <td><a href="/admin/updatemember?id=<?= $id ?>" class="action-link blue-link">Update</a></td>
            <td><a href="/process/deletemember?id=<?= $id ?>" class="action-link red-link">Delete</a></td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-3 mb-5 flex-column">
    <h1>All Member</h1>
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
    <div class="bottom-nav">
        <div class="pagination-links align-items-center">
            <?php
            $beforePage = $page - 1;
            $afterPage = $page + 1;
            ?>
            <?php if ($beforePage > 0) { ?>
                <div class="allowed">
                    <a href="?page=<?= $beforePage ?>" class="enabled">Before</a>
                </div>
            <?php } else { ?>
                <div class="not-allowed">
                    <a href="javascript:void(0)" class="disabled">Before</a>
                </div>
            <?php } ?>
            <?php if ($afterPage <= $totalPages) { ?>
                <div class="allowed">
                    <a href="?page=<?= $afterPage ?>" class="enabled">Next</a>
                </div>
            <?php } else { ?>
                <div class="not-allowed">
                    <a href="javascript:void(0)" class="disabled">Next</a>
                </div>
            <?php } ?>
        </div>
        <a href="/admin/addgame" class="action-link blue-link">Add Game</a>
    </div>
</div>
</body>

</html>