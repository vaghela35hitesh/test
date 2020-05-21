<?php

if (isset($_POST['submit'])) {
	header("Location:index.php");
}

if (!isset($_POST['fname']) || !isset($_POST['age']) || !isset($_POST['address']) || !isset($_POST['mobile'])) {
	header("Location:index.php");
} else {

	$fname = $_POST['fname'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$mobile = $_POST['mobile'];

	$cn = mysqli_connect("localhost", "root", "", "test");

	if (!$cn) {
		header("Location:index.php");
	}

	$checktable = mysqli_query($cn, "SHOW TABLES LIKE 'example1'");
	$table_exists = mysqli_num_rows($checktable) > 0;

	if (!$table_exists) {

		$sql = "CREATE TABLE `test`.`example1` ( `name` VARCHAR(20) NOT NULL , `age` INT(3) NOT NULL , `address` VARCHAR(100) NOT NULL , `mobile` VARCHAR(10) NOT NULL )";

		mysqli_query($cn, $sql);

	}

	$sql = "INSERT INTO `example1` VALUES ('$fname',$age,'$address',$mobile)";
	$msg = mysqli_query($cn, $sql);

	if ($msg) {
		echo "Success";
	} else {
		echo "Error";
	}

}

?>