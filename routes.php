<?php

//COSTSHEETMANAGMENT

$app->get('/', function(){
});

/*
 * CREATE
 */

//CREATE A COST SHEET
$app->get('/create/costsheet/:id/:date', function($id,$date){
    
});

//CREATE DE PACKAGELINE
$app->get('/create/packageLine/:month/:quantity/:packageCostId/:costSheetId', function($month,$quantity,$packageCostId,$costSheetId){
    
});

//CREATE AN OUTPACKAGE LINE
$app->get('/create/outPackageLine/:month/:cost/:label/:costSheetId', function($month, $cost,$label,$costSheetId){
        
});

//CREATE A PACKAGECOST
$app->get('/create/packageCost/:label/:cost', function($label, $cost){
        
});

/*
 * READ
 */

//VISITOR BY MATRICULE @TODO appel a l'API RH
$app->get('/costSheet/visitor/:id', function($id){
    
});

//ALL COST SHEET BY MONTH
$app->get('/costSheet/month/:month', function($month){
    
});
    
//COST SHEET BY VISITOR & BY MONTH
$app->get('/costSheet/visitor/:id/month/:month', function($id,$month){
    
});

//ALL COST SHEET FOR ONE VISITOR
$app->get('/costSheet/visitor/:id', function($id){
    
});

//ALL PACKAGE COST
$app->get('/costSheet/packageCost', function(){
    
});

//ALL COST SHEET BY STATUS
$app->get('/costSheet/Status/:status', function($status){
    
});

//ALL PACKAGE LINE FROM A COST SHEET
$app->get('/packageLine/:costSheetId', function($costSheetId){
    
});

//ALL OUT PACKAGE LINE FROM A COST SHEET
$app->get('/outPackageLine/:costSheetId', function($costSheetId){
    
});

/*
 * UPDATE
 */

