    <?php require __DIR__ . '/../../components/header.php'; ?>

    <h1>This is edit member form</h1>
    <div class="d-flex justify-content-center align-items-center mt-5 mb-5">

        <form action="/process/updatemember" method="POST" id="registrationForm">
            <div>
                <label for="">ID:</label>
                <input type="text" id="idmembers" name="idmembers" value="<?= $member["idmember"] ?>" disabled>
                <input type="hidden" id="idmember" name="idmember" value="<?= $member["idmember"] ?>">
            </div>
            <div>
                <label for="">First name:</label>
                <input type="text" id="fname" name="fname" value="<?= $member["fname"] ?>" required>
            </div>

            <div>
                <label for="">Last name:</label>
                <input type="text" id="lname" name="lname" value="<?= $member["lname"] ?>" required>
            </div>

            <div>
                <label for="">Username:</label>
                <input type="text" id="username" name="username" value="<?= $member["username"] ?>" disabled>
            </div>


            <input type="submit" id="submit" name="submit" class="btn-primary">

        </form>


    </div>


    <?php require __DIR__ . '/../../components/footer.php'; ?>