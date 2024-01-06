<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // 獲取角色值
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="customer">Customer</option>
            <option value="merchant">Merchant</option>
        </select><br><br>    
		<input type="submit" value="Register">
	</form>
	<br>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
