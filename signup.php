<form action="signup.php" method="post">
    Enter your username 
    <input type="text" name="username" id="username"> <br> <br>
    Enter your password 
    <input type="password" name="password" id="password"> <br> <br>
    <input type="submit" value="Submit">
</form>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signupform";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO registration (username, password) VALUES ('$username', '$hashedPassword')";

    if ($conn->query($sql) === true) {
        echo "New record added";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Username and password not provided.";
}

$conn->close();
?>
