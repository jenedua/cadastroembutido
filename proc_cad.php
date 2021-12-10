<?php
//Iniciando as sessions e os errors
session_start();
error_reporting(0);
ini_set("display_errors", 0);
//incluindo o arquivo de conexao
include_once 'connect.php';
//conexao ao banco com PDO
try {

    $pdo = new PDO('mysql:host=localhost;dbname=systemlogin', 'root', '');
} catch (PDOException $e) {
    echo "Falha:" . $e->getMessage();
}
// declaraçao dos variavels
$nome       = addslashes($_POST['nome']);
$cpf        = addslashes($_POST['cpf']);
$nascimento = addslashes($_POST['nascimento']);
$email      = addslashes($_POST['email']);
$senha      = password_hash($_POST['senha'], PASSWORD_DEFAULT);
//$status 	=0;
//Tratar caractéres espeçias no campo de senha
if (stristr($_POST['senha'], "'")) {
	$_SESSION['msg'] = " 
		<div id='alert' class='alert alert-danger' style='font-family:Montserrat; font: 10pt Verdana, Geneva, sans-serif;'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
			Caracter(') utilizado na senha é invalido!
		</div>
		<script >
			$('.close').click(function(event){
			$('#alert').fadeOut();
			event.preventDefault();
			});
		</script>
			";
    header("location: cadastrar.php");
    exit();
}
//verifique si  o campo de cpf tem 11 digitos
elseif ((strlen($_POST['cpf']) < 11)) {
		$_SESSION['msg'] = " 
		<div id='alert' class='alert alert-danger' style='font-family:Montserrat; font: 10pt Verdana, Geneva, sans-serif;'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
			CPF invalido!
		</div>
		<script >
			$('.close').click(function(event){
			$('#alert').fadeOut();
			event.preventDefault();
			});
		</script>
			";
    header("location: cadastrar.php");
    exit();
	
	
}
	//campo CPF sem os pontos
	elseif (stristr($_POST['cpf'], ".")) {
		$_SESSION['msg'] = " 
		<div id='alert' class='alert alert-danger' style='font-family:Montserrat; font: 10pt Verdana, Geneva, sans-serif;'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
			Digite  CPF  sem os pontos!
		</div>
		<script >
			$('.close').click(function(event){
			$('#alert').fadeOut();
			event.preventDefault();
			});
		</script>
			";
	
    header("location: cadastrar.php");
} 
// Verifique si este CPF já existe
else {
    $result_usuario = "SELECT id FROM cadastro WHERE cpf ='$cpf' ";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if (($resultado_usuario) AND ( $resultado_usuario->num_rows != 0)) {
			$_SESSION['msg'] = " 
					<div id='alert' class='alert alert-danger' style='font-family:Montserrat; font: 10pt Verdana, Geneva, sans-serif;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
						</button>
						Este CPF já esta  sendo utilizado!
					</div>
					<script >
						$('.close').click(function(event){
						$('#alert').fadeOut();
						event.preventDefault();
						});
					</script>
					";
        header("location: cadastrar.php"); 
        exit();
    }
	// Verifique si esta data de nascimento já existe
    $result_usuario = "SELECT id FROM cadastro WHERE nascimento ='$nascimento' ";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if (($resultado_usuario) AND ( $resultado_usuario->num_rows != 0)) {
			$_SESSION['msg'] = " 
				<div id='alert' class='alert alert-danger' style='font-family:Montserrat; font: 10pt Verdana, Geneva, sans-serif;'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
					Data de nascimento já esta  sendo utilizado!
				</div>
				<script >
					$('.close').click(function(event){
					$('#alert').fadeOut();
					event.preventDefault();
					});
				</script>
					";
        header("location: cadastrar.php");
        exit();
    }
		// Verifique si este email já existe
    $result_usuario = "SELECT id FROM cadastro WHERE email ='$email' ";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if (($resultado_usuario) AND ( $resultado_usuario->num_rows != 0)) {
			$_SESSION['msg'] = " 
				<div id='alert' class='alert alert-danger' style='font-family:Montserrat; font: 10pt Verdana, Geneva, sans-serif;'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
					 E-mail já esta  sendo utilizado!
				</div>
				<script >
					$('.close').click(function(event){
					$('#alert').fadeOut();
					event.preventDefault();
					});
				</script>
					";
        header("location: cadastrar.php");
        exit();
    }
}
	// Inserir dados com PDO
$pdo->query("INSERT INTO cadastro SET nome ='$nome',cpf='$cpf',nascimento='$nascimento' ,email='$email', senha='$senha', data_cadastro=now()");
if ($pdo) {
	$_SESSION["msgcad"] = " 
		<div id='alert' class='alert alert-success' style='font-family:Montserrat; font: 10pt Verdana, Geneva, sans-serif;'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>			
			Cadastro realizado com successo...
		</div>
		<script >
			$('.close').click(function(event){
			$('#alert').fadeOut();
			event.preventDefault();
			});
		</script>
			";
            header("location: index.php");
} else {
    $_SESSION["msg"] = "Erro ao cadastro ";
}
?>
