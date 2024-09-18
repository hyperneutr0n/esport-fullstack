<?php require __DIR__ . '/components/header.php'; ?>

<div>
    <h1>This is register form</h1>

    <form action="/process/register" method="POST" id="registrationForm">
        <div>
            <label for="">First name:</label>
            <input type="text" id="fname" name="fname" required>
        </div>

        <div>
            <label for="">Last name:</label>
            <input type="text" id="lname" name="lname" required>
        </div>

        <div>
            <label for="">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div>
            <label for="">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="">Repeat password:</label>
            <input type="password" id="repeatpassword" name="repeatpassword" required>
        </div>


        <input type="submit" id="submit" name="submit">

    </form>


</div>


<script>
    document.getElementById("registrationForm").addEventListener("submit", function() {
        const password = document.getElementById("password").value;
        const repeatPassword = document.getElementById("repeatpassword").value;

        if (password !== repeatPassword) {
            event.preventDefault();
            alert("Passwords do not match! Please try again.");
        }

    });


    var password = document.getElementById("password");
    var repeatPassword = document.getElementById("repeatpassword");
</script>


<?php require __DIR__ . '/components/footer.php'; ?>