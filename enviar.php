<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once ('include/header.php') ?>
</head>
<body>
<div id="tudo">
	<?php require_once ('include/topo.php') ?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Contato</h1>
		</div>
	</header>
	<div class="container">

		<div class="span8">
			<h4>Dados enviados com sucesso, abaixo seguem os dados que você enviou.</h4>

			<?php
			echo '<strong>Nome:</strong> ' . $_POST['nome'] . '<br>';
			echo '<strong>E-mail:</strong> ' . $_POST['email'] . '<br>';
			echo '<strong>Assunto:</strong> ' . $_POST['assunto'] . '<br>';
			echo '<strong>Mensagem:</strong> ' . $_POST['mensagem'] . '<br>';
			?>
		</div>
	</div>
	<?php require_once ('include/footer.php') ?>
</div>
</body>
</html>