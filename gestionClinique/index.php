<?PHP 
require 'gestionCliniqueFacturation/connect.php'; 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    <title>Accueil</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="gestionCliniqueFacturation/css/login.css" media="screen" type="text/css" />
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">    
     <link rel="stylesheet" href="css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="css/Normalize.css" rel="stylesheet">
     <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
      <script src="js/jquery-1.11.3.min.js"></script>

  </head>
<body>

<?php include 'gestionCliniqueFacturation/nav.php'; ?> 


<div class="container main" style="margin-top: 80px;">
<div class="row">
<div class="col-md-12" id="status">
          <div class="info-box yellow-bg">
		  <h1 align="center"><B>CONNEXION</B></h1>
</div>

 <div>
        <div id="container"  style="margin-bottom: 30px;">
            
            <form method="POST">
				<?php
$con=mysqli_connect("localhost","root","","clinique");
if(ISSET($_POST['submit'])){
$login=$_POST['username'];
$mopass=$_POST['password'];
$sql=$con -> query("SELECT password_responsable FROM responsable WHERE user_responsable= '$login'")or die('Erreur');
	if($ligne=mysqli_fetch_array($sql))
 {
 if($mopass==$ligne['password_responsable'])
 {
	 $_SESSION['user_responsable']=$login;
 header("location: gestionCliniqueFacturation/index.php");
 exit();
 }
 else
 {
	echo"<font color='red'>Mot de passe invalide</font>";
 }
 }
 else{
	 echo"<font color='red'>Responsable introuvable</font>";
 }
}
?>
                </br>
                <label><b>LOGIN</b></label>
                <input type="text" placeholder="Entrer le nom du responsable" name="username" required>
                <label><b>PASSWORD</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
				</br></br>
                <input type="submit" name="submit" id='submit' value='Enregistrer' >
            </form>
        </div>
 </div>
</div>
</div>		
                           
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>