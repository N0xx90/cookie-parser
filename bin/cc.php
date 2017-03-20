<?php

include('config.php');

$data = array();
if (file_exists($DATA_PATH)){
    $datastr = explode("\n", file_get_contents($DATA_PATH));
    if ($datastr != null and is_array($datastr)){
        foreach($datastr as $d){
            array_push($data,explode('|', $d));
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
//if logged
if($_POST['login']==$LOGIN && $_POST['password']==$PASSWORD){
    if (count($data)!=0){
        ?>
        <table>
        <tr>
            <td>ip</td>
            <td>host</td>
            <td>navigator</td>
            <td>date</td>
            <td>hour</td>
            <td>referer</td>
            <td>data</td>
        <?php
        foreach($data as $d){
        ?>
        <tr>
        <?php
            foreach($d as $i){
    ?>
        
            <td><? echo $i; ?></td>
       <?php
            }
            ?>

        </tr>
            <?php
        }
        ?>
        </table>
    <?php
    } else {
        ?>
        <p>PAS DE DATA</p>
        <?php
    }
} else {
?>
<form method="POST">
    <table>
        <tr>
            <td>login : </td>
            <td><input type="text" name="login" /></td>
        </tr>
        <tr>
            <td>password : </td>
            <td><input type="password" name="password" /></td>
        </tr>
    </table>
    <table>
        <tr>
            <td><input type="submit" value="Connect" /></td>
        </tr>
    </table>

</form>
<?php
}
?>
</body>
</html>
