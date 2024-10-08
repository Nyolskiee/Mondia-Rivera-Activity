<?php
// Start session to store the list
session_start();

// Initialize an empty array for the list if not already set
if (!isset($_SESSION['user_list'])) {
    $_SESSION['user_list'] = [];
}

// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['clear'])) {
        // Clear the list
        $_SESSION['user_list'] = [];
    } else {
        // Get the form data
        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $age = htmlspecialchars($_POST['age']);
        $contact = htmlspecialchars($_POST['contact']);
        $address = htmlspecialchars($_POST['address']);

        // Add the data to the session list
        $user = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'age' => $age,
            'contact' => $contact,
            'address' => $address
        ];

        $_SESSION['user_list'][] = $user;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bg.gif" alt="HTML tutorial" class="bg-design">
 <div class="cont">
<h2>Enter User Details</h2>
<form method="POST" action="">
    <label for="first_name">First Name:</label><br>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="last_name">Last Name:</label><br>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <label for="age">Age:</label><br>
    <input type="number" id="age" name="age" required><br><br>

    <label for="contact">Contact:</label><br>
    <input type="text" id="contact" name="contact" required><br><br>

    <label for="address">Address:</label><br>
    <textarea id="address" name="address" required></textarea><br><br>

    <input type="submit" value="Add to List">
</form>
</div>

 <div class="view">

<h2>User List</h2>
<ul>
    <?php foreach ($_SESSION['user_list'] as $user): ?>
        <table class="font-design">
            <tr>
            <?php echo "Full Name: " . $user['first_name'] . " " . $user['last_name'] . ", Age: " . $user['age'] . ", Contact: " . $user['contact'] . ", Address: " . $user['address']; ?>
    </tr>
    </table>
    <?php endforeach; ?>
</ul>

<form method="POST" action="">
    <input type="hidden" name="clear" value="true">
    <input type="submit" value="Clear List" class="clear">
</form>
</div>
</body>
</html>
