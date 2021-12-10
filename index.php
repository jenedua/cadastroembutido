<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Acesso Restrito</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
	
   
</head>

    <body class="container">
    
   
    
       <header class="topbar container" style="height:60px">
	   
	           <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                
                <h1 class="text-white"style="font-family: Montserrat ;font: 25px Verdana, Geneva, sans-serif;margin-left: 500px "> Gestão de Projetos</h1> 
            </nav>
            <!--<nav class="navbar top-navbar navbar-expand-md navbar-light">
                <a class="navbar-brand"  href="#"style="margin-left:-15px;padding-top:0px;padding-bottom:12px"><img class="light-logo"  alt="logo" src="./imagens/logo5.png"></a>
                <div class="navbar-collapse">
                   
                    <ul class="navbar-nav my-lg-0">
                        <h1 class="text-body"style="font-family: Montserrat ;font: 22px Verdana, Geneva, sans-serif; margin-left: 400px"> Gestão de Projetos</h1> 
                      
                    </ul>
                </div>
            </nav>-->
        </header>
		 <?php
		if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
				}
		if(isset($_SESSION['msgcad'])){
		echo $_SESSION['msgcad'];
		unset($_SESSION['msgcad']);
				}
	?>
    
    <section id="wrapper container">
        <!--<div class="login-register" style="background-image:url(assets/images/background/banco.jpg);"> -->  
        <div class="login-register container" style="background-color:lavender;">
            <div class="login-box card" style="margin-top: -91px">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform"  method="post" action="login.php">
                    <h2 class="title has-text-grey"  style="font-family: Montserrat;font-size:16px;color: blue;text-align: center;font: 25px Verdana, Geneva, sans-serif ">Acessar</h2>
                     
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" autocomplete="off" name="email" required="" placeholder="Email" autofocus=""> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="senha" required="" placeholder="Senha"> </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <input type="submit" class="btn btn-block tx-tfm" name="btnLogin" style="font-family: Montserrat;font-size:16px;color: whitesmoke;background-color: #1e88e5;font: 15px Verdana, Geneva, sans-serif " value="Entrar"><br>
                        <!--<p class="text-center" style="font-family: Montserrat;font-size:20px;color:#1e88e5;font: 15px Verdana, Geneva, sans-serif">Esqueceu sua senha? <a href="recuperar_senha.php" id="signup" style='font-family: Montserrat;font-size:10px;font: 15px Verdana, Geneva, sans-serif;color: #ef3e2e'>Clique aqui </a> </p>-->
                        <p class="text-center" style="font-family: Montserrat;font-size:15px"> <a href="cadastrar.php" id="signup" style='font-family: Montserrat;font-size:10px;font: 15px Verdana, Geneva, sans-serif;color: #ef3e2e'>Cadastre-se </a> </p>
                    </div>
                </form>
                       </div>
          </div>
              
    </section>
	<footer class="footer container" style="font-family: Montserrat ;font: 13px Verdana, Geneva, sans-serif;background-color:lavender;padding:1px"> 
		    Sistema de gestão projeto <span class="flaticon-telephone-1"></span> <span class="flaticon-email-filled-closed-envelope">  © 2021  </span>
	</footer>
   
   
</body>

</html>
