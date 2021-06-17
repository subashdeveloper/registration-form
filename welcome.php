<?php 

session_start();
require_once 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
<?php
    	$sql = "SELECT * FROM users ORDER BY id DESC";
    	$result = $conn->query($sql);
    	$row = $result->fetch_assoc();
    	// echo "<pre>";print_r($row);exit;
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="uploads/<?=$row['image_url'];?>">
    <title>Welcome</title>
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <a href="logout.php">Logout</a>

    
    <a href="uploads/<?=$row['image_url'];?>" download><img src="uploads/<?=$row['image_url'];?>"></a>

</body>
</body>
</html>