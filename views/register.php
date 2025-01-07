<?php require __DIR__ . '/components/header.php'; ?>

<?php if (isset($_GET["message"])) {

    $message = $_GET["message"];
    echo "<script>";
    echo 'alert(' . json_encode($message) . ')';
    echo "</script>";
} ?>

<div class="d-flex justify-content-center align-items-center mt-5">
    <h1>Register</h1>
</div>
<div class="d-flex justify-content-center align-items-center mb-5">

    <form action="/process/register" method="POST" id="registrationForm">
        <label for="">First name:</label>
        <div>
            <input type="text" id="fname" name="fname" required>
        </div>

        <label for="">Last name:</label>
        <div>
            <input type="text" id="lname" name="lname" required>
        </div>

        <label for="">Username:</label>
        <div>
            <input type="text" id="username" name="username" required>
        </div>

        <label for="">Password:</label>
        <div>
            <input type="password" id="password" name="password" required>
        </div>

        <label for="">Repeat password:</label>
        <div>
            <input type="password" id="repeatpassword" name="repeatpassword" required>
        </div>


        <div class="d-flex" style="justify-content: space-between;">
            <a href="/member/login">Login </a>

            <input type="submit" id="submit" name="submit" value="Register" class="btn-primary">
        </div>

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