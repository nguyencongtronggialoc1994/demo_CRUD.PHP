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
        <legend>EDIT</legend>
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $user->getName(); ?>"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" value="<?php echo $user->getAge(); ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" value="<?php echo $user->getAddress(); ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="update">UPDATE</button></td>
            </tr>
        </table>
    </fieldset>
</form>
</body>
</html>
