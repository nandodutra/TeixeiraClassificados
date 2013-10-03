<?php

$app->get('/', function() use ($app) {

    $vendas = Announcement::find('all');

	$app->render('home/index.twig.html', [
           'vendas' => $vendas
        ]);
});