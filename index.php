<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>school database sample1</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<?php
include "connection.php";
if (isset($_POST['submit1'])) {
    $id = $_POST['txt_id'];
    $class = $_POST['txt_class'];
    $ins_sql = "INSERT INTO class(id,class)VALUES ('$id','$class')";
    $ins_sql_pre = $db->prepare($ins_sql);
    $ins_sql_pre->execute();
}
if (isset($_POST['submit2'])) {
    $shomare_daneshamoz = $_POST['shomare_daneshamoz'];
    $shomare_class = $_POST['shomare_class'];
    $nam = $_POST['nam'];
    $khanvadegi = $_POST['khanvadegi'];
    $ave = $_POST['ave'];
    $ins_sql = "INSERT INTO student(shomare_daneshamoz,shomare_class,nam,khanvadegi,ave) VALUES ('shomare_daneshamoz','$shomare_class','$nam','$khanvadegi','$ave')";
    $ins_sql_pre = $db->prepare($ins_sql);
    $ins_sql_pre->execute();
}
?>
<div id="wrapper">
    <div id="row1">
        <div id="row1_col1">
            <form action="" method="post">
                <fieldset>
                    <legend>class</legend>
                    <label>id</label>
                    <input type="text" name="txt_id"/><br/>
                    <label>class</label>
                    <input type="text" name="txt_class"/>
                    <input type="submit" name="submit" value="insert-class"/><br/>
                </fieldset>
            </form>
            <table border="1">
                <tr>
                    <td>id</td>
                    <td>class</td>
                    <td>delete</td>
                    <td>edit</td>
                </tr>
                <?php
                include "connection.php";
                $query = "SELECT * FROM class";
                $result = $db->prepare($query);
                $result->execute();
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "
                    <tr>
                    <td>" . $row['id'] . "</td>
                         <td>" . $row['class'] . "</td>
                         <td><a href='delete.php?id=" . $row['id'] . "&&page=1'>delete</a></td>
                         <td><a href='edit.php?id=" . $row['id'] . "&&page=1'>edit</a></td>
                         </tr>
                    ";
                }
                ?>
            </table>
        </div>
        <div id="row1_col2">
            <form action="" method="post">
                <fieldset>
                    <legend>student</legend>
                    <label>shomare_daneshamoz</label>
                    <input type="text" name="shomare_daneshamoz"><br/>
                    <label>shomare_class</label>
                    <input type="text" name="shomare_class"><br/>
                    <label>nam</label>
                    <input type="text" name="nam"><br/>
                    <label>khanvadegi</label>
                    <input type="text" name="khanvadegi"><br/>
                    <label>ave</label>
                    <input type="number" name="ave"><br/>
                    <input type="submit" name="submit2" value="insert-student"/>
                </fieldset>
            </form>
            <table border="1">
                <tr>
                    <td>shomare_daneshamoz</td>
                    <td>shomare_class</td>
                    <td>nam</td>
                    <td>khanvadegi</td>
                    <td>ave</td>
                    <td>delete</td>
                    <td>edit</td>
                </tr>
                <?php
                include "connection.php";
                $query = "SELECT * FROM student";
                $result = $db->prepare($query);
                $result->execute();
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "
                     <tr>
                         <td>" . $row['shomare_daneshamozid'] . "</td>
                         <td>" . $row['shomare_class'] . "</td>
                         <td>" . $row['nam'] . "</td>
                         <td>" . $row['khanvadegi'] . "</td>
                         <td>" . $row['ave'] . "</td>
                         <td><a href='delete.php?id=" . $row['shomare_daneshamoz'] . "&&page=2'></a>delete</td>
                         <td><a href='edit.php?id=" . $row['shomare_daneshamoz'] . " &&page=2'></a>edit</td>
                  </tr>
                    ";
                }
                ?>
            </table>
        </div>
    </div>
</div>
<div id="show_list">
    <form method="post">
        <label>class</label>
        <select name="select1" id="select1">
            <?php
            include "connection.php";
            $sql_option = "SELECT * FROM class";
            $sql_option_pre = $db->prepare($sql_option);
            $sql_option_pre->execute();
            while ($rows = $sql_option_pre->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $rows['id'] . "'>" . $rows['class'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" name="sub" value="select">
    </form>
    <table>
        <tr>
            <td>name</td>
            <td>family</td>
            <td>ave</td>
        </tr>
        <?php
        include "connection.php";
        if (isset($_POST['sub'])) {
            echo "<script>alert('ok');</script>";
            $id = $_POST['select1'];
            $sql_show = "SELECT * FROM student WHERE class=" . $shomare_daneshamoz;
            $sql_show_pre = $db->prepare($sql_show);
            $sql_show_pre->execute();
            while ($row = $sql_show_pre->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <tr>
                <td>' . $row['nam'] . '</td>
                  <td>' . $row['shomare_class'] . '</td>
                    <td>' . $row['ave'] . '</td>
                    </tr>
                ';
            }
        }
        ?>
    </table>
</div>
</body>
</html>
