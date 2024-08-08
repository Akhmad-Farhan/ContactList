<?php
    require 'db_connect.php';
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = strval($_POST["phone"]);
        if($_FILES["image"]["error"] === 4){
            echo "<script> alert('Image does not exist!')</script>";
        }
        else{
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImgExt = ['jpg', 'jpeg', 'png'];
            $imgExt = explode('.' , $fileName);
            $imgExt = strtolower(end($imgExt));
            if(!in_array($imgExt, $validImgExt)){
                echo "<script> alert('Invalid Image Extension!')</script>";
            }
            else if($fileSize > 1000000){
                echo "<script> alert('Image Size is too large!')</script>";
            }
            else{
                $newImageName = uniqid();
                $newImageName .= '.' . $imgExt;
                move_uploaded_file($tmpName, 'images/' . $newImageName);
                $query = "INSERT INTO list VALUES('', '$name','$email', '$phone', '$newImageName')";
                mysqli_query($conn, $query);
                echo 
                "<script> 
                    alert('Successfully Added')
                    document.location.href = 'index.php'
                </script>";
            }           
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add.css">
    <title>Add Contact</title>
</head>

<body>

    <div class="container add">
        <div class="add-section">
            <header>Add Contact</header>
            
            <form action="add_contact.php" method="POST" enctype="multipart/form-data">
                <label for="name"> Full Name*</label>
                <input type="text" placeholder="Full name" name="name" required>

                <label for="email"> Email*</label>
                <input type="email" placeholder="Email address" name="email" required>

                <label for="phone"> Phone Number* </label>
                <input type="text" placeholder="Phone Number" name="phone" required>

                <label for="image"> Profile Picture* </label>
                <input type="file" name="image" accept=".jpg, .jpeg, .png">
                
                <button type="submit" name="submit" class="btn">Confirm</button>
            </form>
            <button class="btn back-btn" id="backBtn">Back to Contact List</button>
            
        </div>
    </div>


    <script src="scripts.js"></script>
</body>

</html>