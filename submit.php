<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];
    $course   = $_POST['course'];
    $bio      = $_POST['bio'];

    $filename = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    $folder   = "uploads/" . $filename;

    if (!is_dir("uploads")) mkdir("uploads",0777,true);

    if (!empty($filename)) {
        move_uploaded_file($tempname,$folder);
    } else {
        $folder = "uploads/default.png";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Application Received</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header class="header">
  <h1 class="title">Application Received</h1>
</header>

<div class="output-wrapper appear">
  <div class="output-card">
    
    <img src="<?php echo $folder; ?>" alt="Uploaded">

    <div style="text-align:left;">
      <h2><?php echo $fullname; ?></h2>
      <p><strong>Email:</strong> <?php echo $email; ?></p>
      <p><strong>Phone:</strong> <?php echo $phone; ?></p>
      <p><strong>Address:</strong> <?php echo $address; ?></p>
      <p><strong>Course:</strong> <?php echo $course; ?></p>
      <p><strong>Bio:</strong> <?php echo $bio; ?></p>
      <a href="index.html" class="submit-back">Submit Another</a>
    </div>

  </div>
</div>

<footer class="footer">© 2025 · Application System</footer>
</body>
</html>
