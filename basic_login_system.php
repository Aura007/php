session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Let $conn is your MySQL connection
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        echo "Login successful!";
    } else {
        echo "Invalid username or password.";
    }
}
?>
<form method="post">
    <input type="text" name="username" required>
    <input type="password" name="password" required>
    <input type="submit" value="Login">
</form>




