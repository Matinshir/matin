<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>edit</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php session_start();
ob_start();
include "connection.php";
if (isset($_GET['id']) && isset($_GET['page'])) {
    $id = $_GET['id'];
    $page = $_GET['page'];
    switch ($page) {
        case 1:
            include "connection.php";
            $query = "SELECT * FROM class WHERE class=" . $id;
            $result = $db->prepare($query);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if (isset($_POST['submit1'])) {
                $id = $_POST['txt_id'];
                $class = $_POST['txt_class'];
                $query = "UPDATE class SET id='" . $id . "',class='" . $class . "' WHERE class=" . $id;
                $del = $db->prepare($query);
                $del->execute();
                header("location:index.php");
            }
            echo '<div id="row1_col1">
<form action="" method="post">
<fieldset>
<legend>class</legend>
<label>class</label>
<input type="text" name="txt_class" value="' . $row['class'] . '">
<label>id</label>
<input type="number" name="txt_id" value="' . $row['id'] . '">
<input type="submit" name="submit1" value="edit-class"/>
</fieldset>
</form>
</div>';
            break;
        case 2:
            include "connection.php";
            $query = "SELECT * FROM student WHERE shomare_daneshamoz=" . $id;
            $result = $db->prepare($query);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if (isset($_POST['submit2'])) {
                $shomare_daneshamoz= $_POST['shomare_daneshamoz'];
                $shomare_class = $_POST['shomare_class'];
                $nam = $_POST['nam'];
                $khanvadegi = $_POST['khanvadegi'];
                $ave = $_POST['ave'];
                $query = "UPDATE student SET shomare_daneshamoz=" . $shomare_daneshamoz . ",nam='" . $nam . "'" . ",khanvadegi='" . $khanvadegi . "'WHERE id=" . $id;
                $edit = $db->prepare($query);
                $edit->execute();
                header("location:index.php");
            }
            echo '
            <label id="row1_col2">
            <form action="" method="post">
            <fieldset>
            <legend>shomare_daneshamoz</legend>
            <label>id</label>
            <input type="text" name="txt_id" value="' . $row['shomare_daneshamoz'] . '">
            <label>shomare_class</label>
<input type="text" name="txt_class" value="' . $row['shomare_class'] . '">
<label>nam</label>
<input type="text" name="name" value="' . $row['nam'] . '">
<label>khanvadegi</label>
<input type="text" name="family" value="' . $row['khanvadegi'] . '">
<label>ave</label>
<input type="number" name="ave" value="' . $row['ave'] . '">
</fieldset>
</form>
</div>
</label>
            ';
    }
}
?>
</body>
</head>
</html>