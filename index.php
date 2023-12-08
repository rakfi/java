<?php
    include("actions.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>
</head>
<body>
    <?php
    if(isset($_GET['update'])){
        $id = $_GET["id"] ?? null;
        $where = array(
            "id" => $id
        );

        $row = $obj->select_record("user", $where);
    ?>

    <h2>Update</h2>
    <form action="actions.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        <input type="text" name="name" placeholder="Name" value="<?php echo $row["name"]; ?>"><br><br>
        <input type="email" name="email" placeholder="Email" value="<?php echo $row["email"]; ?>"><br><br>
        <input type="password" name="password" placeholder="Password" value="<?php echo $row["password"]; ?>"><br><br>
        <input type="submit" name="update" value="Update"><br>
    </form>

    <hr><br>

<?php } else { ?>

    <h2>Register</h2>
    <form action="actions.php" method="post">
        <input type="text" name="name" placeholder="Name"><br><br>
        <input type="email" name="email" placeholder="Email"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="password" name="cpassword" placeholder="Confirm Password"><br><br>
        <input type="submit" name="submit" value="Insert"><br>
    </form>

    <hr><br>
<?php } ?>
    

    <table border="1" width="25%">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th colspan="2">Actions</th>
        </tr>

        <?php
            $data = $obj->fetch_record("user");
            foreach ($sql as $value) {
        ?>
            <tr>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><a href="index.php?update=1&id=<?php echo $value['id']; ?>">Update</a></td>
                <td><a href="actions.php?delete=1&id=<?php echo  $value['id']; ?>">Delete</a></td>
            </tr>
        <?php
            }
        ?>
        
    </table>
</body>
</html>