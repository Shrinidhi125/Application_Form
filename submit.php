<?php
// Check form request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collecting form data
    $fullname = $_POST['fullname'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];
    $course   = $_POST['course'];
    $bio      = $_POST['bio'];

    // File upload handling
    $filename = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    $folder   = "uploads/" . $filename;

    // Ensure uploads directory exists
    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }

    // Move uploaded image
    if (!empty($filename)) {
        move_uploaded_file($tempname, $folder);
    } else {
        $folder = "uploads/default.png"; // fallback default photo
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Application Submitted</title>
<link rel="stylesheet" href="style.css">

<style>
.output-container {
  display: flex;
  justify-content: center;
  padding: 20px;
}

.output-card {
  width: 75%;
  max-width: 700px;
  background: #ffffff;
  border-radius: 18px;
  padding: 26px;
  text-align: center;
  box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}

.output-card img {
  width: 130px;
  height: 130px;
  border-radius: 14px;
  object-fit: cover;
  margin-bottom: 12px;
}

.output-card h2 {
  font-size: 1.6rem;
  margin-bottom: 8px;
  color: #1e1b4b;
}

.output-card p {
  margin: 6px 0;
  font-size: 1rem;
  color: #374151;
}

.return-btn {
  margin-top: 18px;
  display: inline-block;
  padding: 12px 22px;
  background: linear-gradient(135deg, #6366f1, #ec4899);
  color: white;
  font-weight: 600;
  border-radius: 12px;
  text-decoration: none;
  box-shadow: 0 10px 22px rgba(99,102,241,0.35);
  transition: 0.25s ease;
}

.return-btn:hover {
  transform: translateY(-4px);
  box-shadow: 0 14px 28px rgba(99,102,241,0.45);
}
</style>

</head>

<body>

<header class="header">
  <h1 class="name">Application Submitted Successfully 🎉</h1>
  <p class="tagline">Below is your submitted information</p>
</header>

<div class="output-container appear">
  <div class="output-card">

    <img src="<?php echo $folder; ?>" alt="Uploaded Photo">

    <h2><?php echo $fullname; ?></h2>

    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Phone:</strong> <?php echo $phone; ?></p>
    <p><strong>Address:</strong> <?php echo $address; ?></p>
    <p><strong>Course Applied:</strong> <?php echo $course; ?></p>
    <p><strong>Bio:</strong> <?php echo nl2br($bio); ?></p>

    <a href="index.html" class="return-btn">Submit Another</a>

  </div>
</div>

<footer class="footer">© 2025 · Application Form</footer>

<script src="script.js"></script>
</body>
</html>
