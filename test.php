<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<?php
$imagePath = "image/SJM_Icon.png"; // path to the image file relative to the PHP file
?>
<link rel="icon" href="<?php echo $imagePath; ?>" type="image/png" />
<body>
    <!-- <nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/image/SamanthaJM-removebg-preview.png" alt="Bootstrap" width="30" height="24">
    </a>
  </div>
</nav> -->
<?php
$imagePath = "image/SamanthaJM-removebg-preview.png";
?>
<nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="<?php echo $imagePath; ?>" alt="Logo" width="140" height="50">
    </a>
  </div>
</nav>

</body>
</html>