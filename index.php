<?php
session_start();
require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "Both username and password are required.";
    } else {

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $stmt = $conn->prepare("SELECT id, username FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: menu.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }

        $stmt->close();
    }
}

?>

<?php require_once("includes/header.php"); ?>


<!-- This is for LOG IN -->
<div class="container-fluid">
    <div class="row h-full" style="height: 100vh;">
        <div class="col-lg-7 custom-bg d-flex flex-column h-full">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <form method="post" action="">
                    <h1 class="fw-bold my-5" style="font-size: 4em;">Welcome to <br> <span class="fw-bolder text-primary">LSTV</span></h1>
                    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                    <div class="row mb-2">
                        <input type="text" class="form-control p-3" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="row mb-3">
                        <input type="password" class="form-control p-3" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="row mb-3 my-5">
                        <button type="submit" class="btn btn-primary btn-lg py-3">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 bg-image d-flex flex-column h-full">
            <!-- This is for bg-pattern.png -->
        </div>
    </div>
</div>


<?php require_once("includes/footer.php"); ?>