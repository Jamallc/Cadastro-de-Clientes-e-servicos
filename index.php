<?php 
session_start();
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
                            <a href="cadastro.php" class="nav-link active">Cadastrar</a>
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
        if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'sucesso'){
      ?>
      <div class="alert alert-success col-md-4 mx-auto" role="alert">
        Cadastro realizado com sucesso!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php 
        }
      ?>

      <?php
        if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'erro'){
      ?>
      <div class="alert alert-danger col-md-4 mx-auto" role="alert">
        Email já cadastrado na nossa base de dados
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php 
        }
      ?>


        <div class="container pl-5 pr-5">
            <div class="row">
              <div class="col-md-8 d-flex mb-4 mt-5 mt-md-0 text-black mx-auto">
                  <div class="align-self-center mx-auto card">
                    <form class="form card-body" action="cadastrar.php" method="POST">
                      <div class="entrada">
                        Nome: <input name="nome" type="text" class="form-control input" placeholder="Nome" required/>
                      </div>

                      <div class="entrada">
                        Email: <input name="email" type="email" class="form-control input" placeholder="E-mail" required/>
                      </div>

                      <div class="entrada">
                        Telefone: <input name="telefone" type="tel" class="form-control input" placeholder="Telefone" required/>
                      </div>
                      
                      <button type="submit" class="btn btn-success btn-lg btn-block">Cadastrar Cliente</button>
                    </form>
                  </div>
              </div>
            </div>
        </div>
    </section>
    <!--Fim sobre-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>