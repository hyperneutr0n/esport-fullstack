<?php require __DIR__ . '/../components/header.php'; ?>
<div class="jumbotron">
    <h1>Teams</h1>
</div>
<main>
    <div id="content">
        <h2>Check your Teams!</h2>

        <?php foreach ($teams as $team) { ?>

            <article>
                <div class="cards">
                    <div class="card-content">
                        <img src="../../images/public/<?=$team['idteam']?>.jpg" alt="No logo yet" class = "logo-image">
                        <h3><?= $team['name'] ?></h3>
                        <div class="d-flex justify-content-center">
                            <a href="/member/teammembers?id=<?= $team['idteam'] ?>" class="btn-primary" style="margin-right:5px;">Show members</a>
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