<?php require __DIR__ . '/../components/header.php'; ?>

<div class="jumbotron">
    <h1>Achievements</h1>
</div>
<main>
    <div id="content">
        <h2>Check your achievements!</h2>

        <?php foreach ($achievements as $achievement) { ?>

            <article>
                <div class="cards">
                    <div class="card-content">
                        <h3><?= $achievement['name'] ?></h3>
                        <p><?= $achievement['description'] ?></p>
                        <p><?= $achievement['date'] ?></p>
                    </div>
                </div>
            </article>

        <?php } ?>
    </div>
</main>





<?php require __DIR__ . '/../components/footer.php'; ?>