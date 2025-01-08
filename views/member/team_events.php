<?php require __DIR__ . '/../components/header.php'; ?>
<div class="jumbotron">
    <h1>Events</h1>
</div>
<main>
    <div id="content">
        <h2>Check your events!</h2>

        <?php foreach ($teamEvents as $event) { ?>

            <article>
                <div class="cards">
                    <div class="card-content">
                        <h3><?= $event['name'] ?></h3>
                        <p><?= $event['description'] ?></p>
                        <p><?= $event['date'] ?></p>
                    </div>
                </div>
            </article>

        <?php } ?>
    </div>
</main>



<?php require __DIR__ . '/../components/footer.php'; ?>