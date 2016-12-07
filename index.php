<?php

include('config.php');
$pdo = connect();
// select all members
$sql = 'SELECT * FROM capacity ORDER BY id ASC';
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Import / Export CSV - MySQL</title>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="images/chris.png" alt="CHRIS COM" />
        </div><!-- header -->
        <h1 class="main_title">Import / Export CSV - MySQL</h1>
        <div class="content">
            <fieldset class="field_container align_right">
                <legend>Actions</legend>
                <img class="logo-mysql" src="images/52471.png">
                <span class="import" onclick="show_popup('popup_upload')">Importer CSV -> MySQL</span>
                <a href="export.php" class="export">Exporter MySQL -> CSV</a>
            </fieldset>
            <fieldset class="field_container">
                <legend> <img src="images/arrow.gif"> Table active </legend>
                <div id="list_container">
                    <table class="table_list" cellspacing="2" cellpadding="0">
                        <tr class="bg_h">
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                        <?php
                            $bg = 'bg_1';
                            foreach ($list as $rs) {
                                ?>
                                <tr class="<?php echo $bg; ?>">
                                    <td><?php echo $rs['id']; ?></td>
                                    <td><?php echo $rs['name']; ?></td>
                                </tr>
                                <?php
                                if ($bg == 'bg_1') {
                                    $bg = 'bg_2';
                                } else {
                                    $bg = 'bg_1';
                                }
                            }
                        ?>
                    </table>
                </div>
            </fieldset>
        </div>
    </div>
    
    <div id="popup_upload">
        <div class="form_upload">
            <span class="close" onclick="close_popup('popup_upload')">x</span>
            <h2>Envoyer le fichier CSV</h2>
            <form action="import.php" method="post" enctype="multipart/form-data">
                <input type="file" name="csv_file" id="csv_file" class="file_input">
                <input type="submit" value="Upload file" id="upload_btn">
            </form>
        </div>
    </div>
</body>
</html>
