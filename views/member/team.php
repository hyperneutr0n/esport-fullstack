<?php require __DIR__ . '/../components/header.php'; ?>
<div class="jumbotron">
    <h1>Teams</h1>
</div>
<main>
    <div id="content">
        <h2>Check your Teams!</h2>
        <?php foreach ($teamList as $team) { ?>

            <article>
                <div class="cards justify-content-start">
                    <img src="../../images/public/<?= $team['idteam'] ?>.jpg" alt="No logo yet" class="logo-image">
                    <div class="team-details">
                        <h1><?= $team['team_name'] ?></h1>
                        <h2>Team Members</h2>
                        <ul>
                            <?php foreach ($team['team_members'] as $members) { ?>
                                <li><?= $members["fname"] . ' "' . $members["username"] . '" ' . $members["lname"] ?></li>
                            <?php } ?>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <a href="/member/teamachievements?id=<?= $team['idteam'] ?>" class="btn-primary" style="margin-right:5px;">Show achievements</a>
                            <a href="/member/teamevents?id=<?= $team['idteam'] ?>" class="btn-primary">Show events</a>
                        </div>
                    </div>
                </div>
            </article>

        <?php } ?>
    </div>
</main>



<?php require __DIR__ . '/../components/footer.php'; ?>