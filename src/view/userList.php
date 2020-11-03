<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<table id="list">
    <tr>
        <td>STT</td>
        <td>Name</td>
        <td>Age</td>
        <td>Address</td>
        <td>Action</td>
    </tr>
    <?php foreach ($user as $key => $value): ?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $value->getName() ?></td>
            <td><?php echo $value->getAge() ?></td>
            <td><?php echo $value->getAddress() ?></td>
            <td>
                <a href="index.php?page=delete&id=<?php echo $value->getId(); ?>">DELETE</a>
                <a href="index.php?page=edit&id=<?php echo $value->getId(); ?>">EDIT</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="index.php?page=add">ADD </a>
</body>
</html>