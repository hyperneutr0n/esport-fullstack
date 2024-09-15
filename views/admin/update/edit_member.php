    <?php require __DIR__ . '/../../components/header.php'; ?>

    <div>
        <h1>This is edit member form</h1>

        <form action="/process/updatemember" method="POST" id="registrationForm">
            <div>
                <label for="">ID:</label>
                <input type="text" id="idmember" name="idmember" value="<?= $member["idmember"] ?>" disabled>
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
                <input type="text" id="username" name="username" value="<?= $member["username"] ?>" required>
            </div>


            <input type="submit" id="submit" name="submit">

        </form>


    </div>


    <?php require __DIR__ . '/../../components/footer.php'; ?>