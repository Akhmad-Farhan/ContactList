<?php
    $conn = mysqli_connect("localhost", "root", "", "contactlist");

	function hapus($id) {
		global $conn;
   	 	mysqli_query($conn, "DELETE FROM list WHERE `no` = $id");
		return mysqli_affected_rows($conn);
	}

    function ubah($id, $data, $files) {
		global $conn;
		$name = htmlspecialchars($data["name"]);
		$email = htmlspecialchars($data["email"]);
		$phone = htmlspecialchars($data["phone"]);
		
		$image = $files["image"]["name"];
	
		$dir = "images/";
		$tmpfile = $files["image"]["tmp_name"];
	
		move_uploaded_file($tmpfile, $dir.$image);
	
		$query = "UPDATE list SET name = '$name', email = '$email', phone = '$phone', image = '$image' WHERE `no` = $id";
			mysqli_query($conn, $query);
            
		return mysqli_affected_rows($conn);
	}
?>