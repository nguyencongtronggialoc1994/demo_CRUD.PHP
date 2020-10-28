<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<h1>DANH SÁCH HỌC SINH</h1>
<div id="menu">
    <ul>
        <li><a href="#">Trang chu</a></li>
        <li><a href="insert.php">danh sach hoc sinh</a></li>
        <li><a href="#">tin tuc</a></li>
        <li><a href="#">lich hoc</a></li>
    </ul>
</div>

<h1>NỘI DUNG</h1>

<?php

include 'DBConnect.php';

$db = new DBConnect();
$conn = $db->connect();
$stmt = $conn->prepare('SELECT id,name,age,address from users');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table id="list_user">
    <tr>
        <td>STT</td>
        <td>Name</td>
        <td>Age</td>
        <td>Address</td>
        <td>Action</td>
    </tr>
    <?php foreach ($result as $key => $item): ?>

        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $item['name'] ?></td>
            <td><?php echo $item['age'] ?></td>
            <td><?php echo $item['address'] ?></td>
            <td>
                <a href="delete.php?id=<?php echo $item['id'] ?>">DELETE</a>
                <a href="edit.php?id=<?php echo $item['id'] ?>">EDIT</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>
<a href="insert.php">THÊM</a>


</div>
</body>
</html>
