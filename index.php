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
	<!--<script src="js\jquery-3.3.1.min.js" type="text/javascript"></script>-->
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
					<li class="nav-item active">
						<a class="nav-link" href="index.php"><b>Listar</b> <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="insert.php">Inserir</a>
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

		<!--<form method="POST" action="index.php">
		  <div class="form-group row">
		    <div class="col-sm-12">
		      <button type="submit" class="btn btn-primary">Buscar</button>
		    </div>
		  </div>
		</form> -->



      	<!-- One colum of text below the carousel -->
      	<div class="row">
      		<div class="col-lg-12">

				<table class="table table-hover">
      				<thead class="thead-dark">
      					<tr>
      						<th scope="col">Nome</th>
      						<th scope="col">Descrição</th>
      						<th scope="col">Categoria</th>
      						<th scope="col">Publicação</th>
      						<th scope="col">Imagem</th>
      						<th scope="col">Editar</th>
      						<th scope="col">Excluir</th>
      					</tr>
      				</thead>
      				<tbody>
			<?php
						
					$json_file_movies = file_get_contents("https://unisal-webflix-new.herokuapp.com/api/v1/movie/all");
					//$json_file_movies = file_get_contents("base/weather.json");
					$json_str_movies = json_decode($json_file_movies);
						foreach($json_str_movies as $item_movie){

							$id = $item_movie->id;
							$name = $item_movie->name;
							$description = $item_movie->description;
							$created = $item_movie->created;

							$images = $item_movie->images;

							foreach($images as $item_images){
								$images_id = $item_images->id;
								$images_url = $item_images->url;
								$images_created = $item_images->created;
							}

							$publishIn = $item_movie->publishIn;

							$category = $item_movie->category;

							foreach($category as $item_category){
								$category_id = $item_category->id;
								$category_name = $item_category->name;
								$category_created = $item_category->created;
							}

							//echo $id;
							//echo '<br>';
							//echo $name;
							//echo '<br>';
							//echo $description;
							//echo '<br>';
							//echo $created;
							//echo '<br>';
							//echo $images_id;
							//echo '<br>';
							//echo $images_url;
							//echo '<br>';
							//echo $images_created;
							//echo '<br>';
							//echo $publishIn;
							//echo '<br>';
							//echo $category_id;
							//echo '<br>';
							//echo $category_name;
							//echo '<br>';
							//echo $category_created;
							//echo '<br>';

						echo "
						<tr>
      						<th scope='row'>".$name."</th>
      						<td>".$description."</td>
      						<td>".$category_name."</td>
      						<td>".$publishIn."</td>
      						<td><img width='210px' src='".$images_url."''></td>
      						<td><button type='button' class='btn btn-dark'>Edit</button></td>
      						<td><button type='button' class='btn btn-danger'>Delete</button></td>
      					</tr>
							";
						}
			?>

      				</tbody>
      			</table>
      		</div><!-- /.col-lg-12 -->
      	</div><!-- /.row -->


      	<!-- START THE FEATURETTES -->

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
    <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
		<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
