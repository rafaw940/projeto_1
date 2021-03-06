<?php
require_once "config/conexaoDB.php";

echo "### EXECUTANDO FIXTURE<br>";

$conn = conexaoDB();

echo "Removendo tabela<br>";
$conn->query("DROP TABLE IF EXISTS pg_conteudo;");
$conn->query("DROP TABLE IF EXISTS adm_user;");
echo " - OK<br>";
echo "Criando tabela<br>";
$conn->query("CREATE TABLE pg_conteudo (
	id INT NOT NULL AUTO_INCREMENT,
	`titulo` varchar(300) DEFAULT NULL,
  	`url` varchar(300) DEFAULT NULL,
 	`conteudo` text,
	PRIMARY KEY(id));");
$conn->query("CREATE TABLE adm_user (
	id_user INT NOT NULL AUTO_INCREMENT,
	`login` varchar(300) DEFAULT NULL,
  	`password` varchar(300) DEFAULT NULL,
	PRIMARY KEY(id_user));");
echo " - OK\n";

echo "inserindo dados<br>";


	$arrayTitulo = array("Home","Empresa","Produtos","Serviços","Contato");
	$arrayUrl = array("home","empresa","produtos","servicos","contato");
	$conteudoPadrao = "<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
	sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
	sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet 
	clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. 
	Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod 
	tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
	At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd 
	gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum 
	dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
	invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero 
	eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, 
	no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><p>Duis autem vel 
	eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel 
	illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio
	dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait
	nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
	nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
	</p>	";

	for($x = 0; $x<=4;$x++){
		$smt = $conn->prepare("INSERT INTO pg_conteudo (titulo, url, conteudo) VALUE(:titulo, :url, :conteudo);");
		$smt->bindParam(":titulo",$arrayTitulo[$x]);
		$smt->bindParam(":url",$arrayUrl[$x]);
		$smt->bindParam(":conteudo",$conteudoPadrao);
		$smt->execute();
		echo "{$x} - OK<br>";

	}

		$login = 'admin';
		$senha = password_hash("123456",PASSWORD_DEFAULT);
		$smt = $conn->prepare("INSERT INTO adm_user (login, password) VALUE(:login, :password);");
		$smt->bindParam(":login",$login);
		$smt->bindParam(":password",$senha);
		$smt->execute();
echo "##### CONCLÚIDO ####";




?>