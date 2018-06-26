<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png">

    <title>WebFlix - Client</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#" style="color: red; font-size: 25px;"><b>WEBFLIX</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Listar</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="insert.php"><b>Inserir</b> <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">

      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

<form name="insert" action="insert_filme.php" method="post">
  <div class="form-group row">
    <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nome" placeholder="Nome do Filme" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputDescricao" class="col-sm-2 col-form-label">Descrição</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="descricao" placeholder="Descrição do Filme" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputCategoria" class="col-sm-2 col-form-label">Categoria</label>
    <div class="col-sm-10">
    <select class="form-control" name='opcao'>


<?php
            
          $json_file_movies = file_get_contents("https://unisal-webflix-new.herokuapp.com/api/v1/category/all");
          //$json_file_movies = file_get_contents("base/weather.json");
          $json_str_movies = json_decode($json_file_movies);
            foreach($json_str_movies as $item_movie){

              $id = $item_movie->id;
              $name = $item_movie->name;
              $created = $item_movie->description;
              

            echo "
              <option value='".$id."'>".$name."</option>
              ";
            }

?>
    </select>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputImagem" class="col-sm-2 col-form-label">Imagem</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="imagem" placeholder="https://cache.olhardigital.com.br/uploads/acervo_imagens/2015/07/20150702113911_660_420.jpg" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputAno" class="col-sm-2 col-form-label">Ano de Publicação</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="ano" placeholder="Ano" min="1" max="9999" required>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="salvar">Cadastrar</button>
    </div>
  </div>
</form>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->

    <!-- FOOTER -->
    <footer class="container">
       <p class="float-right"><a href="#">Back to top</a></p>
       <p>&copy; 2018 WebFlix, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
   </footer>
</main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
</body>
</html>
