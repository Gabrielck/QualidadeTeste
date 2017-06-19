<?php include("senha.php") ?>
<?php
$connection = ConnectionDB::getInstance();
$query = $connection->prepare("insert into funcionario values (?,?,?,?,?,?,?,?,?)");
$query->bindValue(1, $_POST['cpf']);
$query->bindValue(2, $_POST['nome']);
$query->bindValue(3, $_POST['endereco']);
$query->bindValue(4, $_POST['cidade']);
$query->bindValue(5, $_POST['estado']);
$query->bindValue(6, $_POST['pais']);
$query->bindValue(7, $_POST['email']);
$query->bindValue(8, $_POST['setor']);
$query->bindValue(9, $_POST['profissao']);
$query->execute();
?><script>
window.location='menu.php';
</script>