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
$totalTeams = count($teams);
$totalPages = ceil($totalTeams / $rowCount);
if ($page > $totalPages) {
    header("Location: " . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?page=" . $totalPages);
    die;
}
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
            <td><?= $team["game_name"] ?></td>
            <td>
                <a href="/admin/details/team?id=<?= $id ?>" class="action-link blue-link">
                    Details
                </a>
            </td>
            <td>
                <a href="/admin/updateteam?id=<?= $id ?>" class="action-link blue-link">
                    Update
                </a>
            </td>
            <td>
                <a href="/process/deleteteam?id=<?= $id ?>" class="action-link red-link">
                    Delete
                </a>
            </td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-3 mb-5 flex-column">
    <h1>All Team</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID Team</th>
                <th>Name</th>
                <th>ID Game</th>
                <th>Game Name</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php DisplayTable($teamDisplayed); ?>
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
        <a href="/admin/addteam" class="action-link blue-link">Add Team</a>
    </div>
</div>
</body>

</html>