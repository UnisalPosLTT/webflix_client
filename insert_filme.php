<?php
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $imagem = $_POST["imagem"];
            $ano = $_POST["ano"];
            $opcao = $_POST["opcao"];

            function postToApi($url, $json){
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type : application/json',
                    'Cache-Control : no-cache' . strlen($json))
            );
                $jsonRet = json_decode(curl_exec($ch));
                $teste = json_encode($jsonRet);
                return $teste;
            }           

            

            $urlImage="https://unisal-webflix-new.herokuapp.com/api/v1/image";
            $arrayImagem = array("url" => $imagem);
            $json =  json_encode($arrayImagem);
            $idImagem=json_decode(postToApi($urlImage,$json))->id;

            $urlFilme="https://unisal-webflix-new.herokuapp.com/api/v1/movie";

            $arrayImagem = array(array("id"=>$idImagem));
            $arrayCategoria = array(array("id" => $opcao));

            $array = array("category" => $arrayCategoria,"description" => $descricao, "name" => $nome, "name" => $nome, "images" => $arrayImagem, "publishIn" => $ano);

            $json = json_encode($array);
            $teste=postToApi($urlFilme,$json);        


            echo "
            <!doctype html>
<html lang='pt-br'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='icon' href='favicon.png'>
    <title>WebFlix - Resultado</title>
    <link href='dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='carousel.css' rel='stylesheet'>
</head>
<body>
    <header>
        <nav class='navbar navbar-expand-md navbar-dark fixed-top bg-dark'>
            <a class='navbar-brand' href='#' style='color: red; font-size: 25px;'><b>WEBFLIX</b></a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse' aria-controls='navbarCollapse' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarCollapse'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item'>
                        <a class='nav-link' href='index.php'>Listar</a>
                    </li>
                    <li class='nav-item active'>
                        <a class='nav-link' href='insert.php'><b>Inserir</b> <span class='sr-only'>(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main role='main'>
      <div id='myCarousel' class='carousel slide' data-ride='carousel'>
      </div>
    <div class='col-lg-12'>
            <h2>JSON Gerado com Sucesso!</h2>
            <p>".$json."<br/>" .$teste."</p>
            <p><a class='btn btn-secondary' href='index.php' role='button'>Voltar »</a></p>
    </div>
    <div class='container marketing'>
        <hr class='featurette-divider'>
    </div>
    <footer class='container'>
       <p class='float-right'><a href='#'>Back to top</a></p>
       <p>&copy; 2018 WebFlix, Inc. &middot; <a href='#'>Privacy</a> &middot; <a href='#'>Terms</a></p>
    </footer>
    </main>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script>window.jQuery || document.write('<script src='../../../../assets/js/vendor/jquery-slim.min.js'><\/script>')</script>
    <script src='assets/js/vendor/popper.min.js'></script>
    <script src='dist/js/bootstrap.min.js'></script>
    <script src='assets/js/vendor/holder.min.js'></script>
</body>
</html>";

  ?>