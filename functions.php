

<?php

// Function with parameters
function greet_user($name) {
    return "Hello, $name!";
}

?>

<?php
$userName = "Jiaqin";
echo '<p>' . greet_user($userName) . '</p>';
?>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username contains any numbers
    $containsNumber = false;
    for ($i = 0; $i < strlen($username); $i++) {
        if (is_numeric($username[$i])) {
            $containsNumber = true;
            break;
        }
    }

    // Validate the username and password (you can add your own validation logic here)
    if ($username === "admin" && $password === "password" && !$containsNumber) {
        // Redirect to the dashboard or any other page
        header("Location: dashboard.php");
        exit();
    } else {
        $errorMessage = "Invalid username or password";
        if ($containsNumber) {
            $errorMessage = "Not correct username. The username should not contain numbers.";
        }
    }
}

// Include the header
include 'header.php';
?>

    <h1>Login</h1>

    <?php if (isset($errorMessage)) { ?>
        <p><?php echo $errorMessage; ?></p>
    <?php } ?>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Login">
    </form>

<?php
// Include the footer
include 'footer.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
