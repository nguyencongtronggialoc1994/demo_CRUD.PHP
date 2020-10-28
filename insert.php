<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<form method="post">
    <fieldset>
        <legend>ADD DATABASE</legend>
        <table>
            <tr>
                <td>name</td>
                <td><input type="text" name="name" placeholder="name"></td>
            </tr>
            <tr>
                <td>age</td>
                <td><input type="text" name="age" placeholder="age"></td>
            </tr>
            <tr>
                <td>address</td>
                <td><input type="text" name="address" placeholder=address"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="insert">ADD</button>

                </td>
            </tr>
        </table>

    </fieldset>

</form>
<?php
include 'DBConnect.php';
function add($_name,$_age,$_address){
    $db = new DBConnect();
    $conn = $db->connect();
    $query="INSERT INTO users (name,age,address) VALUES (:name,:age,:address)";
    $stmt=$conn->prepare($query);
    $stmt->bindParam(':name',$_name);
    $stmt->bindParam(':age',$_age);
    $stmt->bindParam(':address',$_address);
    $stmt->execute();
}
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    add($name,$age,$address);
    header('location:index.php');
}
?>
</body>
</html>
