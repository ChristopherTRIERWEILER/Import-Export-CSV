<?php
// including the config file
include('config.php');
$pdo = connect();

// set headers to force download on csv format
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=members.csv');

// we initialize the output with the headers
$output = "id, name";
// select all members
$sql = 'SELECT * FROM table1 ORDER BY id ASC';
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// add new row
    $output .= $rs['id'].",".$rs['name'];
}
// export the output
echo $output;
exit;
?>


