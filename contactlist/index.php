<?php require 'db_connect.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            width: 90%;
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .button-container {
            margin-bottom: 20px;
        }

        .add-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: #45a049;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #388E3C;
        }

        img {
            border-radius: 50%;
        }

        .delete-btn {
            color: #ff6347; /* Red color */
            text-decoration: none;
            border: 1px solid #ff6347; /* Red border */
            padding: 5px 10px; /* Padding inside the button */
            border-radius: 4px; /* Rounded corners */
            margin-right: 5px; /* Add some spacing */
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        .delete-btn:hover {
            background-color: #ff6347; /* Red background on hover */
            color: white; /* White text on hover */
            text-decoration: none; /* Remove underline on hover */
        }

        /* Styling for Edit button */
        .edit-btn {
            color: #1e90ff; /* Dodger blue color */
            text-decoration: none;
            border: 1px solid #1e90ff; /* Blue border */
            padding: 5px 10px; /* Padding inside the button */
            border-radius: 4px; /* Rounded corners */
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        .edit-btn:hover {
            background-color: #1e90ff; /* Blue background on hover */
            color: white; /* White text on hover */
            text-decoration: none; /* Remove underline on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact List</h1> 
        <div class="button-container">
            <a href="add_contact.php"><button class="add-button">Add Contact</button></a>
        </div>

        <table>
            <tr>
                <th>No.</th>
                <th>Profile Picture</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
            <?php 
            $i = 1;
            $rows = mysqli_query($conn, "SELECT * FROM list ORDER BY no DESC");
            ?>
            <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?php echo $i?></td>
                <td><img src="images/<?php echo $row["image"]?>" width="55px" height="55px" alt="image"></td>
                <td><?php echo $row["name"]?></td>
                <td><?php echo $row["email"]?></td>
                <td><?php echo $row["phone"]?></td>
                <td>
                    <a href="delete_list.php?no=<?php echo $row["no"]?>" class="delete-btn">Delete</a>
                    <a href="edit_list.php?no=<?php echo $row["no"]?>" class="edit-btn">Edit</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
