<?php
require_once './db_connection.php';
require_once './fetch-data.php';
require_once './update.php';
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['u_name']) && isset($_POST['u_email'])) {

    $update_data = updateUser($conn, $_GET['id'], $_POST['u_name'], $_POST['u_email']);

    if ($update_data === true) {
        header('Location: index.php');
        exit;
    }
}

$theUser = fetchUser($conn, $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP CRUD Application</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

<div class="container">
    <header class="header">
        <h1 class="title">PHP CRUD Application</h1>
        <p>By <a href="//www.w3jar.com">w3jar.com</a></p>
    </header>
    <div class="wrapper edit-wrapper">
        <div class="form">
            <form method="POST">
                <label for="userName">Full Name</label>
                <input type="text" name="u_name" value="<?php echo htmlspecialchars($theUser['name']); ?>" id="userName" placeholder="Name" autocomplete="off" required>
                <label for="userEmail">Email</label>
                <input type="email" name="u_email" value="<?php echo htmlspecialchars($theUser['email']); ?>" id="userEmail" placeholder="Email" autocomplete="off" required>
                <?php if (isset($update_data) && $update_data !== true) {
                    echo '<p class="msg err-msg">' . $update_data . '</p>';
                }
                ?>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>
</div>

</body>

</html>