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
$totalTeamMember = count($teamMembers);
$totalPages = ceil($totalTeamMember / $rowCount);
$page = $page > $totalPages ? $totalPages : $page;
$offset = ($page - 1) * $rowCount;
$teamMemberDisplayed = array_slice($teamMembers, $offset, $rowCount);

function DisplayTable($teamMemberDisplayed)
{

    foreach ($teamMemberDisplayed as $teammember) { ?>
        <?php
        $idteam = $teammember["idteam"];
        $idmember = $teammember["idmember"];
        ?>
        <tr>
            <th><?= $idteam ?></th>
            <th><?= $idmember ?></th>
            <th><?= $teammember["description"] ?></th>
            <td><a href="/admin/updateteammembers?idteam=<?= $idteam ?>&idmember=<?= $idmember ?>" class="action-link update-link">Update</a></td>
            <td><a href="/process/deleteteammembers?idteam=<?= $idteam ?>&idmember=<?= $idmember ?>" class="action-link delete-link">Delete</a></td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-5 mb-5 flex-column">
    <a href="" class="action-link update-link">Add Team Member</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Team</th>
                <th>ID Member </th>
                <th>Description</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php DisplayTable($teamMemberDisplayed) ?>
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