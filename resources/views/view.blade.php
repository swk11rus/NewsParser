<?php 
	include("D:\php\lenta\public\getnews.php");
	
	$id = $_GET['id'] < 1 ? 0 : $_GET['id'] ;
	$url = "https://lenta.ru/rss/news";
	$items = getItems($url);
    getNews($items, $id);
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <title>RSS View</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="mt-2 text-center text-md-left"> RSS Лента</h1>
                </div>
            </div>
            <div class="row">
                <div class="card text-center">
                    <div class="card-header">
                        <h5><?= $title; ?></h5>
                    </div>
                    <div class="card-body" >
                        <div class="row">
                            <div id="col" class="col-12 col-lg-6 " style="background-image: url(<?= $imgUrl; ?>); background-position: center; min-height: 300px; background-size: cover; "> 
                            </div>
                            <div id="col" class="col-12 col-lg-6 ">
                                <p class="card-text font-italic text-justify ml-0 mr-0 ml-sm-4 mr-sm-4 mt-4 mt-lg-0"><?= $description; ?></p>
                            </div>  
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row">
                            <div id="col" class="col-12 col-sm mt-1">
                                <a href="/main" class="btn btn-secondary btn-lg btn-block">На главную</a>
                            </div>
                            <div id="col" class="col-6 col-sm-auto mt-1">
                                <a href="?id=<?= $id-1; ?>" class="btn btn-secondary btn-lg btn-block">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                </a>
                            </div>
                            <div id="col" class="col-6 col-sm-auto mt-1">
                                <a href="?id=<?= $id+1; ?>" class="btn btn-secondary btn-lg btn-block">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </a>
                            </div>
                            <div id="col" class="col-12 col-sm-4 mt-1">
                                <a href="<?= $link; ?>" class="btn btn-secondary btn-lg btn-block">Читать в источнике</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</html>
