<?php 

require 'function.php';
require 'db_connect.php';

$id = $_GET["no"];
$result = mysqli_query($conn, "SELECT * FROM list WHERE no = $id");
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    // You can also fetch other fields as needed
} else {
    echo "Data not found!";
    exit;
}

if( isset($_POST["submit"])) {
    if( ubah($id, $_POST, $_FILES) > 0) {
        echo 
        "<script>
        alert ('Data berhasil diubah!');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo 
        "<script>
        alert ('Data gagal diubah!');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="edit.css">
    <title>Edit Contact</title>
</head>

<body>

    <div class="container edit">
        <div class="edit-section">
            <header>Edit Contact</header>
            
            <form method="POST" enctype="multipart/form-data">
                <label for="name"> Full Name</label>
                <input type="text" placeholder="Full name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

                <label for="email"> Email</label>
                <input type="email" placeholder="Email address" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

                <label for="phone"> Phone Number </label>
                <input type="text" placeholder="Phone Number" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>

                <label for="image"> Profile Picture </label>
                <input type="file" name="image" accept=".jpg, .jpeg, .png">

                <button type="submit" name="submit" class="btn">Confirm</button>
            </form>
        </div>
        <button class="btn back-btn" id="backBtn">Back to Contact List</button>
    </div>
    <script src="scripts.js"></script>
</body>

</html>