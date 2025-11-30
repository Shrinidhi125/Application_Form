<?php
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$education=$_POST['education'];
$skills=$_POST['skills'];
$address=$_POST['address'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Application Details</title>
<style>
body{
  background:black;
  display:flex; justify-content:center; align-items:center;
  height:100vh; font-family:poppins;
}
.card{
  background:rgba(255,255,255,0.1);
  padding:35px; width:550px; border-radius:20px;
  box-shadow:0 0 25px rgba(255,215,0,0.6);
  backdrop-filter:blur(10px); color:white; text-align:center;
}
h2{ color:gold; margin-bottom:18px; }
p{ font-size:18px; margin:8px 0; }
.status{
  font-size:20px; font-weight:600; color:lightgreen; margin-top:12px;
}
.print-btn{
  margin-top:20px; padding:12px 25px; font-size:17px; border:none;
  background:linear-gradient(45deg,#d4af37,#8b6b18);
  color:white; border-radius:10px; cursor:pointer;
}
.print-btn:hover{ transform:scale(1.05); }
</style>

<script>
function printPage(){
  window.print();
}
</script>

</head>
<body>
<div class='card'>
<h2>🎉 Registration Successful 🎉</h2>

<p><b>Name:</b> <?php echo $name; ?></p>
<p><b>Email:</b> <?php echo $email; ?></p>
<p><b>Phone:</b> <?php echo $phone; ?></p>
<p><b>Date of Birth:</b> <?php echo $dob; ?></p>
<p><b>Gender:</b> <?php echo $gender; ?></p>
<p><b>Education:</b> <?php echo $education; ?></p>
<p><b>Skills:</b> <?php echo $skills; ?></p>
<p><b>Address:</b> <?php echo $address; ?></p>

<p class="status">Application Status: ✔ Submitted Successfully</p>

<button class="print-btn" onclick="printPage()">Print / Download PDF</button>

</div>
</body>
</html>
