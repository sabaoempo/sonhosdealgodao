<html>
<?php include('CadastroSabor.php'); ?>
<head>

<title> Cadastro de Sabor</title>

</head>

<body>

<form method="POST" action="CadastroSabor.php">

<label>Nome:</label><input type="text" name="nome" id="nome" required="required"><br>

<label>Descrição:</label><input type="text" name="descricao" id="descricao"><br>

<input type="submit" value='Cadastrar' id="cadastrar" name="cadastrar">
<input type="submit" value='Delete' id="delete" name="delete">
<input type="submit" value='Adicionar Descricao' id="addDescricao" name="addDescricao">

</form>

</body>

</html>
