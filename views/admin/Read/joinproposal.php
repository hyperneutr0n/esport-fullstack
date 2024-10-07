<?php require __DIR__ . '/../../components/header.php'; ?>
<?php if (isset($_GET["message"])) {

$message = $_GET["message"];
echo "<script>";
echo 'alert(' . json_encode($message) . ')';
echo "</script>";
} ?>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

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
            <?php foreach ($joinProposals as $joinproposal) { ?>

                <?php $id = $joinproposal["idjoin_proposal"] ?>
                <tr>
                    <th><?= $id ?></th>
                    <th><?= $joinproposal["idmember"] ?></th>
                    <th><?= $joinproposal["idteam"] ?></th>
                    <th><?= $joinproposal["description"] ?></th>
                    <th><?= $joinproposal["status"] ?></th>
                    <td><a href="">Accept</a></td>
                    <td><a href="">Reject</a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>
</body>

</html>