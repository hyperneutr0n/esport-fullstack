<?php require __DIR__ . '/components/header.php'; ?>
<?php if (isset($_GET["message"])) {

    $message = $_GET["message"];
    echo "<script>";
    echo 'alert(' . json_encode($message) . ')';
    echo "</script>";
} ?>
<div class="jumbotron">
    <h1>Welcome to INFORMATICS E-SPORTS CLUB</h1>
</div>
<main>
    <div id="content">
        <h2>Check out our teams!</h2>

        <?php foreach ($gameListWithTeams as $row) { ?>

            <article>

                <div class="cards">
                    <div class="card-content">
                        <h3><?= $row['name'] ?></h3>
                        <p><?= $row['description'] ?></p>

                        <div class="team-dropdown">
                            <button class="team-toggle">
                                Our teams...
                                <i class="fa-solid fa-chevron-down arrow"></i>
                            </button>
                            <ul class="team-list">
                                <?php if (count($row['teams']) !== 0) { ?>

                                    <?php foreach ($row['teams'] as $team) { ?>
                                        <li>
                                            <p><?= $team['team_name'] ?></p>
                                        </li>
                                    <?php } ?>

                                <?php } else { ?>
                                    <p>We don't have team in this game yet.</p>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </article>

        <?php } ?>
    </div>
</main>
<script>
    $('.team-toggle').each(function() {
        $(this).on('click', function() {
            const teamList = $(this).next();
            teamList.toggleClass('open');

            const arrow = $(this).find('.arrow');
            if (teamList.hasClass('open')) {
                arrow.removeClass('fa-chevron-down').addClass('fa-chevron-up');
            } else {
                arrow.removeClass('fa-chevron-up').addClass('fa-chevron-down');
            }
        });
    });
</script>
<?php require __DIR__ . '/components/footer.php'; ?>