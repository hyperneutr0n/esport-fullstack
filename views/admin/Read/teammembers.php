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
$totalTeamMember = count($teamMembers);
$totalPages = ceil($totalTeamMember / $rowCount);
$totalPages = $totalTeamMember > 0 ? ceil($totalTeamMember / $rowCount) : 1;
if ($page > $totalPages) {
    header("Location: " . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?page=" . $totalPages);
    die;
}
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
            <td><?= $idteam ?></td>
            <td><?= $teammember["team_name"] ?></td>
            <td><?= $idmember ?></td>
            <td><?= $teammember["member_username"] ?></td>
            <td><?= $teammember["description"] ?></td>
            <td><a href="/admin/updateteammembers?idteam=<?= $idteam ?>&idmember=<?= $idmember ?>" class="action-link blue-link">Update</a></td>
            <td><a href="/process/deleteteammembers?idteam=<?= $idteam ?>&idmember=<?= $idmember ?>" class="action-link red-link">Delete</a></td>
        </tr>
<?php }
}
?>

<div class="d-flex justify-content-center align-items-center mt-3 mb-5 flex-column">
    <h1>All Team Member</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID Team</th>
                <th>Team Name</th>
                <th>ID Member </th>
                <th>Member Username</th>
                <th>Description</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php DisplayTable($teamMemberDisplayed) ?>
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
        <a href="/admin/addteammembers" class="action-link blue-link">Add Team Members</a>
    </div>
</div>
</body>

</html>