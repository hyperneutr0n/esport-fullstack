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
$totalJoinProposal = count($joinProposals);
$totalPages = ceil($totalJoinProposal / $rowCount);
if ($page > $totalPages) {
    header("Location: " . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?page=" . $totalPages);
    die;
}
$offset = ($page - 1) * $rowCount;
$joinProposalDisplayed = array_slice($joinProposals, $offset, $rowCount);

function DisplayTable($joinProposalDisplayed)
{
    foreach ($joinProposalDisplayed as $joinproposal) { ?>

        <?php $id = $joinproposal["idjoin_proposal"] ?>
        <tr>
            <th><?= $id ?></th>
            <th><?= $joinproposal["idmember"] ?></th>
            <th><?= $joinproposal["member_username"] ?></th>
            <th><?= $joinproposal["idteam"] ?></th>
            <th><?= $joinproposal["team_name"] ?></th>
            <th><?= $joinproposal["description"] ?></th>
            <th><?= $joinproposal["status"] ?></th>
            <td><a href="/admin/updatejoinproposal?id=<?= $id ?>">Update</a></td>
            <td><a href="/process/delete?id=<?= $id ?>">Delete</a></td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-3 mb-5 flex-column">
    <h1>All Join Proposal</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID Proposal</th>
                <th>ID Member</th>
                <th>Member Name</th>
                <th>ID Team</th>
                <th>Team Name</th>
                <th>Description</th>
                <th>Status</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php DisplayTable($joinProposalDisplayed) ?>
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