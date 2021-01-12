<?php
  session_start();
  include("conexao.php");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FONTAWESOME -->
    <link href="fontawesome/css/all.css" rel="stylesheet">

        <!--Iconic-->
        <link href="iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">

        <!-- HTML5Shiv -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <![endif]-->
    
        <!-- Estilo customizado -->
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

    <title>Cadastro de Clientes</title>
    <link rel="icon" href="img/logowr.png">


  </head>
  <body class="bg-dark">
    
    <!-- Início capa -->
    <section id="home">
      <div class="container">
        <div class="row">
          <div class="col-md-6 d-none d-md-block mx-auto">
            <h1 class="font-weight-bold text-center text-light">Cadastro de clientes</h1>
          </div>
        </div>
      </div>
    </section>
    <!-- Fim capa Home -->

    <header class="sticky-top">
        <nav class="navbar navbar-expand-sm navbar-dark shadow">
            <div class="container">
                <div class="collapse navbar-collapse" id="nav-principal">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="cadastro.php" class="nav-link">Cadastrar</a>
                        </li>

                        <li class="nav-item">
                            <a href="consultar.php" class="nav-link">Consultar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>   
    </header>
    <!--Início sobre-->
    <section class="bg-light pt-4 shadow">
    <?php
        if(isset($_GET['exclui']) && $_GET['exclui'] == 'deletado'){
      ?>
      <div class="alert alert-success col-md-4 mx-auto" role="alert">
        Serviço excluido com sucesso!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } ?>

    <?php
        if(isset($_GET['edita']) && $_GET['edita'] == 'sucesso'){
      ?>
      <div class="alert alert-success col-md-4 mx-auto" role="alert">
        Edição de serviço realizada com sucesso!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } ?>

      <?php
        if(isset($_GET['descricao']) && $_GET['descricao'] == 'sucesso'){
      ?>
      <div class="alert alert-success col-md-4 mx-auto" role="alert">
        Cadastro de serviço realizado com sucesso!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php 
        }
        $usu_codigo = $_GET['codigo'];

        $busca = "SELECT * FROM cliente WHERE id = '$usu_codigo'";
        $query = mysqli_query($conexao, $busca);
        $row = $query->fetch_array();
                  
        $id_cliente = $usu_codigo;
                            
      ?>
      <div class="container pl-5 pr-5">
            <div class="row">
              <div class="col-md-8 d-flex mb-4 mt-5 mt-md-0 text-black mx-auto">
                  <div class="align-self-center mx-auto card">
                    <form class="form card-body" action="cadastrar_servico.php" method="POST">
                      
                      <input type='hidden' name='nome' value='<?php echo $row['nome'] ?>'/>
                      <input type='hidden' name='id_cliente' value='<?php echo $id_cliente ?>'/>

                      <div class="entrada">
                        Descrição do serviço + valor:* <input name="desc_servico" type="text" class="form-control input" placeholder="Descrição do serviço + valor:" required/>
                      </div>

                      <div class="entrada">
                        Peças compradas + valor: <input name="desc_produto" type="text" class="form-control input" placeholder="Peças compradas + valor:" />
                      </div>
                      
                      <button type="submit" class="btn btn-success btn-lg btn-block">Cadastrar Serviço</button>
                    </form>
                  </div>
              </div>
            </div>
        </div>
      <?php
      $consulta = "SELECT * FROM compras WHERE id_cliente = '$usu_codigo'"; 
      $con = mysqli_query($conexao, $consulta) or die($mysqli->error); 
      $row = mysqli_num_rows($con);
      if($row != 0){
      ?>
      <div class="container pl-5 pr-5">
        <div class="row">
          <div class="col-md-12 d-flex mb-4 mt-5 mt-md-0 text-black mx-auto">
              <div class="align-self-center mx-auto card">
                <div class="card-body">
                  <div class="entrada2">                  

                    <table class="mx-auto centro" border='1' cellpadding="5px" cellspacing="0">
                    <tr>  
                      <td>Nome</td> 
                      <td>Descrição de serviço</td> 
                      <td>Peça comprada</td> 
                      <td>Data da compra</td> 
                      <td></td> 
                    </tr> 
                    <?php while($dado = $con->fetch_array()) { ?> 
                    <tr> 
                      <td><?php echo $dado['nome']; ?></td>
                      <td><?php echo $dado['desc_servico']; ?></td> 
                      <td><?php echo $dado['desc_produto']; ?></td> 
                      <td><?php echo date('d/m/Y', strtotime($dado['data_compra'])) . "<br>"; ?></td> 
                      <td> 
                        <a class="btn btn-warning" href="descricaoEdita.php?codigo_compra=<?php echo $dado['id_compra'] ?>">Editar</a> 
                        <a class="btn btn-danger" href="descricaoExclui.php?codigo_compra=<?php echo $dado['id_compra'] ?>&id_cliente=<?php echo $dado['id_cliente'] ?>">Excluir</a> 
                      </td> 
                    </tr>
                    <?php } ?> 
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php 
      } else { ?>
        <div class="d-flex mb-5">
          <div class="col-md-4 alert alert-danger mx-auto" role="alert">
          Este cliente não possui serviços cadastrados!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      <?php }?> 


    </section>
    <!--Fim sobre-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>