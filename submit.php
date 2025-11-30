<?php
// Handle submitted data safely
function safe($key) {
    return isset($_POST[$key]) ? htmlspecialchars($_POST[$key]) : '';
}

$fullname = safe('fullname');
$email    = safe('email');
$phone    = safe('phone');
$address  = safe('address');
$course   = safe('course');
$bio      = safe('bio');

$photoPath = "";

// Handle photo upload (if provided)
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $newName = 'photo_' . time() . '.' . $ext;
    $targetDir = 'uploads/';
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $targetFile = $targetDir . $newName;

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
        $photoPath = $targetFile;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Application Received</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="header">
    <div class="header-inner">
      <h1 class="name">Application Received</h1>
    </div>
  </header>

  <main class="result-card">
    <section class="result-inner reveal">
      <div>
        <?php if ($photoPath): ?>
          <img src="<?php echo $photoPath; ?>" alt="Applicant Photo" class="result-photo">
        <?php else: ?>
          <!-- default placeholder if no photo -->
          <div style="width:130px;height:160px;border-radius:10px;border:2px solid rgba(148,163,184,0.7);display:flex;align-items:center;justify-content:center;font-size:0.8rem;color:#6b7280;">
            No Photo
          </div>
        <?php endif; ?>
      </div>

      <div>
        <h2 style="margin-bottom:10px;"><?php echo $fullname; ?></h2>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Phone:</strong> <?php echo $phone; ?></p>
        <p><strong>Address:</strong> <?php echo nl2br($address); ?></p>
        <p><strong>Course:</strong> <?php echo $course; ?></p>
        <p><strong>Bio:</strong><br><?php echo nl2br($bio); ?></p>

        <form action="form.html" method="get">
          <button class="small-btn" type="submit">Submit Another</button>
        </form>
      </div>
    </section>
  </main>

  <footer class="footer">
    © 2025 · Application System
  </footer>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="script.js"></script>
</body>
</html>
