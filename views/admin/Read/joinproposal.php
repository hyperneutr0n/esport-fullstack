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
$totalJoinProposal = count($joinProposals);
$totalPages = ceil($totalJoinProposal / $rowCount);
$page = $page > $totalPages ? $totalPages : $page;
$offset = ($page - 1) * $rowCount;
$joinProposalDisplayed = array_slice($joinProposals, $offset, $rowCount);

function DisplayTable($joinProposalDisplayed)
{
    foreach ($joinProposalDisplayed as $joinproposal) { ?>

        <?php $id = $joinproposal["idjoin_proposal"] ?>
        <tr>
            <th><?= $id ?></th>
            <th><?= $joinproposal["idmember"] ?></th>
            <th><?= $joinproposal["idteam"] ?></th>
            <th><?= $joinproposal["description"] ?></th>
            <th><?= $joinproposal["status"] ?></th>
            <td><a href="/admin/updatejoinproposal?id=<?= $id ?>">Update</a></td>
            <td><a href="/process/delete?id=<?= $id ?>">Delete</a></td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-5 mb-5">
    <a href="" class="action-link update-link">Add Member</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Proposal</th>
                <th>ID Member </th>
                <th>ID Team</th>
                <th>Description</th>
                <th>Status</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php DisplayTable($joinProposalDisplayed) ?>
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