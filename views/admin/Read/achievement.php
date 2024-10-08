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
$totalAchievement = count($achievements);
$totalPages = ceil($totalAchievement / $rowCount);
$page = $page > $totalPages ? $totalPages : $page;
$offset = ($page - 1) * $rowCount;
$achievementDisplayed = array_slice($achievements, $offset, $rowCount);

function DisplayTable($achievementDisplayed)
{
    foreach ($achievementDisplayed as $achievement) { ?>
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
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-5 mb-5 flex-column">
    <a href="" class="action-link update-link">Add Member</a>
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
            <?php DisplayTable($achievementDisplayed) ?>
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