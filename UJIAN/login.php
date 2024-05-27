<?php
// include( './libs/loaddata.php' );

include('config.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = file_get_contents(DATA_DIR . '/data.json');
    $users = json_decode($data, true);

    if (isset($users[$opd]) && $users[$opd]['username'] == $username && 
              $users[$opd]['password'] == $password) {
        $_SESSION['username'] = $username;
        $_SESSION['opd'] = $opd;
        echo 'Dashboard....';
        // header('Location: dashboard.php');
        exit();
    } else {
        $error = "Invalid username or password";
    }
}

include 'header.php';
?>

<h2>Login - <?php echo ucfirst($opd); ?></h2>
<?php if (isset($error)): ?>
    <p class="error"><?php echo $error; ?></p>
<?php endif; ?>
<form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Login</button>
</form>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-top: 0;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
    }

    input {
        margin-bottom: 15px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #007BFF;
        color: #fff;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    .error {
        color: red;
    }    
</style>

<?php include 'footer.php'; ?>