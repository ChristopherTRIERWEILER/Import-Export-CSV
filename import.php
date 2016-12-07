<?php 

include('config.php');
$pdo = connect();

$csv_file =  $_FILES['csv_file']['tmp_name'];
if (is_file($csv_file)) {
	$input = fopen($csv_file, 'a+');

	$row = fgetcsv($input, 0, ';');
	while ($row = fgetcsv($input, 0, ';')) {
		$sql = 'INSERT INTO table1(id,name) VALUES(:id, :name)';
		$query = $pdo->prepare($sql);
		$query->bindParam(':id', $row[0], PDO::PARAM_INT);
		$query->bindParam(':name', $row[1], PDO::PARAM_INT);
		$query->execute();
	}
}

// redirect to the index page
header('location: index.php');
?>


