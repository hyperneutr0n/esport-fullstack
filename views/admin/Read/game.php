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
$totalGame = count($games);
$totalPages = ceil($totalGame / $rowCount);
$page = $page > $totalPages ? $totalPages : $page;
$offset = ($page - 1) * $rowCount;
$gameDisplayed = array_slice($games, $offset, $rowCount);

function DisplayTable($gameDisplayed)
{
    foreach ($gameDisplayed as $game) { ?>

        <?php $id = $game["idgame"] ?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $game["name"] ?></td>
            <td><?= $game["description"] ?></td>
            <td><a href="/admin/updategame?id=<?= $id ?>" class="action-link update-link">Update</a></td>
            <td><a href="/process/deletegame?id=<?= $id ?>" class="action-link delete-link">Delete</a></td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-5 mb-5">
    <a href="" class="action-link update-link">Add Member</a>
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
            <?php DisplayTable($gameDisplayed) ?>
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