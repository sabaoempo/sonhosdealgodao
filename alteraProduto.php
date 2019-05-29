
<?php include('headAdmin.php'); 
include('preco.php'); 

//   session_start();
        $servername = 'localhost';
        $nome_db    = "sonhosdealgodao_sonhos";
        $user_db    = "sonhosdealgodao_dev";
        $pass_db    = "$0nh0_d3_algod4o";
        $connect;
        $cont = 0;
        
        $dado;

        $connect = mysqli_connect($servername, $user_db, $pass_db, $nome_db);
        mysqli_query($connect, "SET NAMES 'utf8'");
        mysqli_query($connect, 'SET character_set_connection=utf8');
        mysqli_query($connect, 'SET character_set_client=utf8');
        mysqli_query($connect, 'SET character_set_results=utf8');
         
        mysqli_select_db($connect, $nome_db);
        $query_products = "SELECT * FROM products";
        $result = mysqli_query($connect, $query_products);
        $dados=mysqli_fetch_array($result);
   
        ?>
<head>
    <title>Altera Produto</title>
     <link rel="stylesheet" type="text/css" href="produtoA.css" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <script>function apagar(id)
        {
            if(window.confirm("Deseja realmente excluir  ?")){
                window.location='delete.php?id='+id;
            }
        }
    </script>
    <title>Alterar produto</title>
</head>
<header>

	    <center>

			<h1>Produtos</h1>

		</center>

</header>
<body>
<!--<?php if (!empty($_SESSION['message'])) : ?>-->
<!--	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">-->
<!--		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
<!--		<?php echo $_SESSION['message']; ?>-->
<!--	</div>-->
<!--	<?php clear_messages(); ?>-->
<!--<?php endif; ?>-->

<!--<hr>-->


     <div  class="table-css">
         <table class="table" style="overflow-x:auto;">
            <thead class="thead-dark">
                <tr>
            		<th class="cabecalho">ID</th>
            		<th class="cabecalho">Tipo</th>
            		<th class="cabecalho">Nome</th>
            		<th class="cabecalho">Tamanho</th>
            		<th class="cabecalho">Descrição</th>
            		<th class="cabecalho">Preço</th>
            		<th class="cabecalho">Imagem</th>
			        <th class="cabecalho"><a class="btn btn-primary" href="CadastroProdutoTeste.php"><i class="fa fa-plus"></i> Novo Produto</a></th>
	            </tr>
            </thead>
            <tbody>
                <center>
                <?php
                    do {     
                        mysqli_query($connect, "SET NAMES 'utf8'");
                        mysqli_query($connect, 'SET character_set_connection=utf8');
                        mysqli_query($connect, 'SET character_set_client=utf8');
                        mysqli_query($connect, 'SET character_set_results=utf8');
                        echo"<tr> <th>$dados[id]</th>";
                        echo"<th>$dados[type]</th>";
                        echo"<th>$dados[name]</th>";
                        echo" <th>$dados[size]</th>";
                        echo" <th>$dados[description]</th>";
                        echo" <th>$dados[price]</th>";
                        echo" <th>$dados[image]</th>";
                        echo"<td class='actions text-right'>
		                  <a href='alt.php?id=".$dados[id]."' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</a>";
		              ?>
		               <td class='actions text-right'>
                                            <button class='btn btn-sm btn-danger' onclick="apagar('<?php echo $dados['id']?>');">Excluir </button> 
                                
                                </td>
                            </tr>
		           <!--   <button class="btn btn-sm btn-danger" onclick=-->
				         <!--<a href='delete.php?id=".$dados[id]."' class='btn btn-sm btn-danger' name='delete'id='delete' >-->
				         <!--  <i class='fa fa-trash' ></i> Excluir</a>-->
		           <!--       </td>";-->
                        
                     <?php  
                        }while($dados = mysqli_fetch_array($result));
                    ?>
                    </center>
</tbody>
</thead>
</table>
</div>

<?php include('footer.php'); mysqli_close($connect);?>
</body>
    
