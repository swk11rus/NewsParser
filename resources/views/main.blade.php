<?php
  include("getnews.php");

  $limit = isset($_GET['limit']) ? $_GET['limit'] : 9;
  $page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;

  $start = ($page - 1) * $limit + 1;
  $stop = $start + $limit;
  $url = "https://lenta.ru/rss/news";
  $items = getItems($url);
  $count = $items -> channel -> item -> count();
  $pages = ceil($count / $limit); 

  $Prev = $page - 1;
  $Next = $page + 1;
?>

<!DOCTYPE html>
<html lang="ru">
  	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS --> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<title>RSS Main</title>
  	</head>
  	<body>
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-12 col-md-4">
				  	<h1 class="text-center text-md-left mt-2"> RSS Лента</h1>
				</div>
				<div class="col-12 col-md-3">
					<div class="dropdown mt-3 text-center text-md-right mb-4">
		  				<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LIMIT</a>
		  				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		    				<a class="dropdown-item" href="?limit=3">3</a>
		    				<a class="dropdown-item" href="?limit=9">9</a>
		    				<a class="dropdown-item" href="?limit=27">27</a>
		  				</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<nav aria-label="Page navigation" >
						<ul class="pagination justify-content-center">
							<li class="page-item">
								<a class="page-link" href="?page=<?= $Prev; ?>&limit=<?= $limit; ?>" aria-label="Предыдущая">
									<span aria-hidden="true">&laquo</span>
								</a>
							</li>

							<?php for($i = 1; $i <= $pages; $i++):?>
							<?php if ($i ==$page):?>

							<li class="page-item"><a class="page-link" href="?page=<?= $i; ?>&limit=<?= $limit; ?>"><?= $i ?></a></li>

							<?php endif; ?>
							<?php endfor; ?> 

							<li class="page-item">
								<a class="page-link" href="?page=<?= $Next; ?>&limit=<?= $limit; ?>" aria-label="Следующая">
									<span aria-hidden="true">&raquo</span>
								</a>
							</li>
						</ul>
					</nav>  
				</div>
			</div>	
			<div class="row row-cols-1 row-cols-md-3">

				<?php for ($i = $start; $i < $stop; $i++):?>
				<?= getNews($items, $i); ?>

				<div class="col mb-4">
				    <div class="card h-100">
				      	<img src="<?= $imgUrl; ?>" class="card-img-top">
				      	<div class="card-body">
					       	<h5 class="card-title"><?= $title; ?></h5>
					    </div>
					    <div class="card-footer"> 
					       	<a href="/view?id=<?= $i; ?>" class="btn btn-secondary btn-lg btn-block">Читать новость</a>
						</div>
					</div>
				</div>

				<?php endfor;?>

			</div>
			<div class="row">
				<div class="col">
					<nav aria-label="Page navigation" >
						<ul class="pagination justify-content-center">
							<li class="page-item">
								<a class="page-link" href="?page=<?= $Prev; ?>&limit=<?= $limit; ?>" aria-label="Предыдущая">
									<span aria-hidden="true">&laquo</span>
								</a>
							</li>

							<?php for($i = 1; $i <= $pages; $i++):?>
							<?php if ($i ==$page):?>

							<li class="page-item">
								<a class="page-link" href="?page=<?= $i; ?>&limit=<?= $limit; ?>"><?= $i ?></a>
							</li>
									
							<?php endif; ?>
							<?php endfor; ?> 

							<li class="page-item">
								<a class="page-link" href="?page=<?= $Next; ?>&limit=<?= $limit; ?>" aria-label="Следующая">
									<span aria-hidden="true">&raquo</span>
								</a>
							</li>
						</ul>
					</nav>  
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  	</body>
</html>