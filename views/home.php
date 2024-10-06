<?php require __DIR__ . '/components/header.php'; ?>
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
                                <?php foreach ($row['teams'] as $team) { ?>
                                    <li>
                                        <p><?= $team['team_name'] ?></p>
                                    </li>
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
    document.querySelectorAll('.team-toggle').forEach(button => {
        button.addEventListener('click', () => {
            const teamList = button.nextElementSibling;
            teamList.classList.toggle('open');

            // Toggle Font Awesome arrow direction
            const arrow = button.querySelector('.arrow');
            if (teamList.classList.contains('open')) {
                arrow.classList.replace('fa-chevron-down', 'fa-chevron-up'); // Change to up arrow
            } else {
                arrow.classList.replace('fa-chevron-up', 'fa-chevron-down'); // Change to down arrow
            }
        });
    });
</script>
<?php require __DIR__ . '/components/footer.php'; ?>