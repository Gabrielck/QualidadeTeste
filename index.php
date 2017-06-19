<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
    <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>
	<script>
	function validar() {
		var senha = inputSenha.value;
		if(senha.length>=6) {
			return true;
		} else {
			window.alert("A senha deve possuir no minimo 6 caracteres");
			return false;
		}
	}
	</script>

  </head>

  <body>

    <div class="container">

      <form action="menu.php" method="post" onsubmit="return validar();" class="form-signin">
        <label for="inputNome" class="sr-only">Nome</label>
        <input type="text" id="inputNome" name="nome" class="form-control" placeholder="Nome" required autofocus>
        <label for="inputSenha" class="sr-only">Senha</label>
        <input type="password" id="inputSenha" name="senha" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
