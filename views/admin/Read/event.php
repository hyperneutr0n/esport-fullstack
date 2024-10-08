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
$totalEvent = count($events);
$totalPages = ceil($totalEvent / $rowCount);
$page = $page > $totalPages ? $totalPages : $page;
$offset = ($page - 1) * $rowCount;
$eventDisplayed = array_slice($events, $offset, $rowCount);

function DisplayTable($eventDisplayed)
{
    foreach ($eventDisplayed as $event) { ?>
        <tr>
            <?php $id = $event["idevent"] ?>
            <th><?= $id ?></th>
            <th><?= $event["name"] ?></th>
            <th><?= $event["date"] ?></th>
            <th><?= $event["description"] ?></th>
            <td><a href="/admin/updateevent?id=<?= $id ?>" class="action-link update-link">Update</a></td>
            <td><a href="/process/deleteevent?id=<?= $id ?>" class="action-link delete-link">Delete</a></td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-5 mb-5 flex-column">
    <a href="/admin/addevent" class="action-link update-link">Add Event</a>
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
            <?php DisplayTable($eventDisplayed) ?>
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