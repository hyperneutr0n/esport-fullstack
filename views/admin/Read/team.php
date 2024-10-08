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
$totalTeams = count($teams);
$totalPages = ceil($totalTeams / $rowCount);
$page = $page > $totalPages ? $totalPages : $page;
$offset = ($page - 1) * $rowCount;
$teamDisplayed = array_slice($teams, $offset, $rowCount);

function DisplayTable($teamDisplayed)
{

    foreach ($teamDisplayed as $team) { ?>

        <tr>
            <?php $id = $team["idteam"] ?>
            <td><?= $id ?></td>
            <td><?= $team["name"] ?></td>
            <td><?= $team["idgame"] ?></td>
            <td>
                <a href="/admin/updateteam?id=<?= $id ?>" class="action-link update-link">
                    Update
                </a>
            </td>
            <td>
                <a href="/process/deleteteam?id=<?= $id ?>" class="action-link delete-link">
                    Delete
                </a>
            </td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-5 mb-5 flex-column">
    <!-- <form id="rowsForm">
        <label for="rows">Rows per page:</label>
        <select id="rows" name="rows">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
        </select>
    </form> -->
    <a href="/admin/addteam" class="action-link update-link">Add Team</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Team</th>
                <th>Name</th>
                <th>ID Game </th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php DisplayTable($teamDisplayed); ?>
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