<?php require __DIR__ . '/../components/header.php'; ?>

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
$totalEventTeam = count($achievements);
$totalPages = ceil($totalEventTeam / $rowCount);
$totalPages = $totalEventTeam > 0 ? ceil($totalEventTeam / $rowCount) : 1;
if ($page > $totalPages) {
    header("Location: " . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?page=" . $totalPages);
    die;
}
$offset = ($page - 1) * $rowCount;
$eventTeamDisplayed = array_slice($achievements, $offset, $rowCount);

function DisplayTable($achievements)
{
    foreach ($achievements as $teamEvent) { ?>

        <tr>
            <td><?= $teamEvent["name"] ?></td>
            <td><?= $teamEvent["date"] ?></td>
            <td><?= $teamEvent["description"] ?></td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-3 mb-5 flex-column">
    <h1>All Achievements</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php DisplayTable($achievements) ?>
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
    </div>
</div>
</body>

</html>