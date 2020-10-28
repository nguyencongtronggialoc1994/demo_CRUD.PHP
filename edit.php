<?php
include 'DBConnect.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db1 = new DBConnect();
    $conn1 = $db1->connect();
    $query1 = "SELECT name,age,address,id FROM users WHERE id =$id";
    $stmt = $conn1->prepare($query1);
    $stmt->execute();
    $data = $stmt->fetch();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <fieldset>
        <legend>UPDATE DATA</legend>

        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $data[0] ?>"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" value="<?php echo $data[1] ?>"></td>
            </tr>
            <tr>
                <td>address</td>
                <td><input type="text" name="address" value="<?php echo $data[2] ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="update" value="UPDATE"></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $data[3] ?>">
    </fieldset>
</form>
<?php

function update($_name, $_age, $_address, $_id)
{
    $db = new DBConnect();
    $conn = $db->connect();
    $query = "UPDATE users SET name=:name ,age=:age,address=:address WHERE id=:id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $_name);
    $stmt->bindParam(':age', $_age);
    $stmt->bindParam(':address', $_address);
    $stmt->bindParam(':id', $_id);
    $stmt->execute();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    update($name, $age, $address, $id);
    header('location:index.php');
}
?>
</body>
</html>
