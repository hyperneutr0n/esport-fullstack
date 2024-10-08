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
$totalEventTeam = count($eventTeams);
$totalPages = ceil($totalEventTeam / $rowCount);
$page = $page > $totalPages ? $totalPages : $page;
$offset = ($page - 1) * $rowCount;
$eventTeamDisplayed = array_slice($eventTeams, $offset, $rowCount);

function DisplayTable($eventTeamDisplayed)
{
    foreach ($eventTeamDisplayed as $eventteam) { ?>

        <?php $idevent = $eventteam["idevent"];
        $idteam = $eventteam["idteam"] ?>

        <tr>
            <th><?= $idevent ?></th>
            <th><?= $idteam ?></th>
            <td><a href="/admin/updateeventteams?idevent=<?= $idevent ?>&idteam=<?= $idteam ?>" class="action-link update-link">Update</a></td>
            <td><a href="/process/deleteeventteams?idevent=<?= $idevent ?>&idteam=<?= $idteam ?>" class="action-link delete-link">Delete</a></td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-5 mb-5 flex-column">
    <a href="" class="action-link update-link">Add Event Teams</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Event</th>
                <th>ID Team </th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php DisplayTable($eventTeamDisplayed) ?>
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