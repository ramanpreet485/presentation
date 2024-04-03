<?php
// Name: Ramanpreet Kaur

include 'dbinfo.php'; 

// Fetch data from the database
$data = "SELECT * FROM mydata";
$mydata = mysqli_query($con, $data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Insert the form data into the mydata table
    $sql = "INSERT INTO mydata (name, email) VALUES ('$name', '$email')";

    if (mysqli_query($con, $sql)) {
        // Alert message after successful submission
        echo '<script>alert("Feedback submitted successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentation</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>User Email List</h1>
        <?php while ($row_data = mysqli_fetch_assoc($mydata)) { ?>
            <li><?php echo "Name - " . $row_data['name']; ?> . " Email - " . <?php echo $row_data['email']; ?></li>
        <?php } ?>
    <h1>Add new user Email</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" required>
        </div>
        <button type="submit">Add Email</button>
    </form>
</body>
</html>