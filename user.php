
<?php $db = mysqli_connect("localhost", "root", "", "phpcurd_db");?>
<!DOCTYPE html>
<html>
    <title>PHP CRUD </title>
</head>
<?php
if(isset($_POST['submit'])){
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "image/".$filename;
    move_uploaded_file($tempname, $folder);

    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];

    if($name != "" && $email != "" && $address !=""){

    $qry="insert into user values('', '$folder', '$name', '$email','$address')";
    if(mysqli_query($db, $qry)){
        echo'<script>alert("User registratered succesfully.");</script>';
        header('location:user.php');
    }
    else{
        echo "failed";
    }
}
}
?>
<body>
    <form method="post" enctype="multipart/form-data">
        <label>uploadfile</label>
        <br><br>
        <input type="file" name="uploadfile" style="width:100%" if isset echo $name>
        <br><br>
        <label>Name</label>
        <input type="text" name="name" placeholder="entername">
        <br><br>
        <label>E-mail</label>
        <input type="email" name="email" placeholder="Enter mail" >
        <br><br>
        <label>Address</label>
        <input type="text" name="address" placeholder="Enter Address" >
        <br><br>
        <input type="submit" name="submit" value="submit">
</form>

<hr>

<h3> user list</h3>
<table style="width: 80%" border="1">
<tr>
    <th>Sr</th>
    <th>profile</th>
    <th>Name</th>
    <th>e-mail</th>
    <th>Address</th>
    <th>operation</th>
</tr>
<?php
$i=1;
$qry="select * from user";
$run= $db -> query($qry);
if($run -> num_rows >0){
    while($row= $run -> fetch_assoc()){
        $id=$row['user_id'];
        ?>
        <tr>
            <td><?php echo $i++;?></td>
            <td> <img src=" <?php echo $row['profile']?>" height='100px' width='150px'></td>
            <td><?php echo $row['user_name']?></td>
            <td><?php echo $row['user_email']?></td>
            <td><?php echo $row['user_address']?></td>
           
            <td>
                <a href="edit.php?id=<?php echo $id;?>">Edit</a>
                <a href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
    </tr>
        <?php
    }
}
?>
</table>
</body>
</html>


         
