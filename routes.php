<?php

//COSTSHEETMANAGMENT

//READ

//COSTSHEET BY VISITOR ID
$app->get('/visitor/:id', function($id){
        echo 'function';
});

//COSTSHEET BY DATE
$app->get('/date/:date', function($date){
        echo 'function';
});


//COSTSHEET BY VISITOR ID AND DATE
$app->get('/visitor/:id/date/:date', function($id, $date){
        echo 'function';
});


//CREATE

//CREATE COSTSHEET BY VISITOR ID AND DATE
$app->get('/create/:id/:date', function($id, $date){
        echo 'function';
});

//CREATE PACKAGELINE WITH : DATE, AMOUNT, LIBELLE, QUANTITY
$app->get('/create/packageline/:date/:amount/:libelle/:quantity', function($date, $amount, $libelle, $quantity){
        echo 'function';
});

//CREATE OUTPACKAGELINE WITH : DATE, AMOUNT, LIBELLE, QUANTITY
$app->get('/create/outpackageline/:date/:amount/:libelle/:quantity', function($date, $amount, $libelle, $quantity){
        echo 'function';
});