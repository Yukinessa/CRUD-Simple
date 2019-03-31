<?php
	$mysqli = new mysqli('localhost','root','','crud') or die (mysqli_error($mysqli));

	$update=false;
	$name='';
	$nim='';

	if(isset($_POST['save'])){
		$name = $_POST['name'];
		$nim = $_POST['nim'];

		$mysqli->query("INSERT INTO data (name,nim) VALUES('$name','$nim')") or die ($mysqli->error);

		header('location: '.'index.php');
	}

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM data WHERE id=$id"); 
	}

	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$update=true;
		$result = $mysqli->query("SELECT * FROM data WHERE id=$id");
		if(count($result)==1){
			$row=$result->fetch_array();
			$name=$row['name'];
			$nim=$row['nim'];
		}
	}

	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$nim = $_POST['nim'];

		$mysqli->query("UPDATE data SET name='$name', nim='$nim' WHERE id=$id");

		header('location: '.'index.php');
	}
?>