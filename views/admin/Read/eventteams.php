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
$totalEventTeam = count($eventTeams);
$totalPages = ceil($totalEventTeam / $rowCount);
$totalPages = $totalEventTeam > 0 ? ceil($totalEventTeam / $rowCount) : 1;
if ($page > $totalPages) {
    header("Location: " . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?page=" . $totalPages);
    die;
}
$offset = ($page - 1) * $rowCount;
$eventTeamDisplayed = array_slice($eventTeams, $offset, $rowCount);

function DisplayTable($eventTeamDisplayed)
{
    foreach ($eventTeamDisplayed as $eventteam) { ?>

        <?php $idevent = $eventteam["idevent"];
        $idteam = $eventteam["idteam"] ?>

        <tr>
            <td><?= $idevent ?></td>
            <td><?= $eventteam["event_name"] ?></td>
            <td><?= $idteam ?></td>
            <td><?= $eventteam["team_name"] ?></td>
            <td><a href="/admin/updateeventteams?idevent=<?= $idevent ?>&idteam=<?= $idteam ?>" class="action-link blue-link">Update</a></td>
            <td><a href="/process/deleteeventteams?idevent=<?= $idevent ?>&idteam=<?= $idteam ?>" class="action-link red-link">Delete</a></td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-3 mb-5 flex-column">
    <h1>All Event Teams</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID Event</th>
                <th>Event Name</th>
                <th>ID Team</th>
                <th>Team Name</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php DisplayTable($eventTeamDisplayed) ?>
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
        <a href="/admin/addeventteams" class="action-link blue-link">Add Event Teams</a>
    </div>
</div>
</body>

</html>