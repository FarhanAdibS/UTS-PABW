<!DOCTYPE html>

<html
	<head>
	<title>Farhan As</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/jquery-ui.css">				
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">				
			<link rel="stylesheet" href="css/main.css">
	
	</head>
	<body>
	
	<header id="header">
	
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="index.html"><img src="foto/logo.png" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="index.html">Home</a></li>
			          <li><a href="about.html">About</a></li>        					          		          
			          <li><a href="contact.html">Contact</a></li>
					  <li><a href="phpmyinfo.php">PHP Info</a></li>
					  <li><a href="UTS.html">UTS</a> </li>
						<li><a href="logout.php" class="form-inline my-2 my-lg-0 btn btn-secondary">Logout</a></li>
			        </ul>
			      </nav>	    		
		    	</div>
		    </div>
		  </header>

<?php 
session_start();
if(! isset($_SESSION['is_login']))
{
  header('location:login.php');
}
?>


<?php
    include 'koneksi.php';
    $query = $db->prepare("SELECT * FROM corona");
    $query->execute();
    $data = $query->fetchAll();
?>

<section class="home-about-area section-gap">
<h2 align="center">Selamat Datang <?php echo $_SESSION['nama']; ?></h2>
<h2><strong><p align="center">Berikut<br>Dafter kasus COVID-19 Terbesar di Dunia</p></strong></h2>
<table width="807" border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="115" height="30" align="center" valign="middle" bgcolor="#00FFFF">Negara</td>
    <td width="175" align="center" valign="middle" bgcolor="#00FFFF">Kasus</td>
    <td width="250" align="center" valign="middle" bgcolor="#00FFFF">Meninggal</td>
	 <td width="250" align="center" valign="middle" bgcolor="#00FFFF">Sembuh</td>
    <td width="135" align="center" valign="middle" bgcolor="#00FFFF"><a href="create.php">TAMBAH</a></td>
  </tr>
            <?php foreach ($data as $value): ?>
                <tr>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $value['negara'] ?></td>
                    <td p align="left" bgcolor="#FFFFFF"><?php echo $value['kasus'] ?></td>
                    <td p align="left" bgcolor="#FFFFFF"><?php echo $value['meninggal'] ?></td>
					<td p align="left" bgcolor="#FFFFFF"><?php echo $value['sembuh'] ?></td>
                    <td p align="center" bgcolor="#FFFFFF">
                        <a href="edit.php?negara=<?php echo $value['negara']?>">Edit</a>
                        <a href="delete.php?negara=<?php echo $value['negara']?>">Delete</a>
                    </td>
                </tr>
	
<?php endforeach; ?>
</table>
<p align="center"><a href=http://farhanakhbar.com>farhanakhbar.com</a></p>
	</section>
 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
