<?php

//COSTSHEETMANAGMENT

$app->get('/', function(){
});

/*
 * CREATE
 */

//CREATE A COST SHEET
$app->get('/create/costsheet/:idVisitor/:month', function($idVisitor,$month){
    echo createCostSheet($idVisitor, $month);
});

//CREATE DE PACKAGELINE
$app->get('/create/packageLine/:month/:quantity/:packageCostId/:costSheetId', function($month,$quantity,$packageCostId,$costSheetId){
    echo createPackageLine($month,$quantity,$packageCostId,$costSheetId);
});

//CREATE AN OUTPACKAGE LINE
$app->get('/create/outPackageLine/:month/:cost/:label/:costSheetId', function($month, $cost,$label,$costSheetId){
    echo createOutPackageLine($month, $cost, $label, $costSheetId);
});

//CREATE A PACKAGECOST
$app->get('/create/packageCost/:label/:cost', function($label, $cost){
    echo createPackageCost($label, $cost);
});

/*
 * READ
 */

//VISITOR BY MATRICULE @TODO appel a l'API RH
$app->get('/visitor/:id', function($id){
    
});

//ALL COST SHEET BY MONTH
$app->get('/costSheet/month/:month', function($month){
    echo readCostSheetsByMonth($month);
});
    
//COST SHEET BY VISITOR & BY MONTH
$app->get('/costSheet/visitor/:matricule/month/:month', function($matricule,$month){
    echo readCostSheetsByMonthVisitor($month,$matricule);
});

//ALL COST SHEET FOR ONE VISITOR
$app->get('/costSheet/visitor/:matricule', function($matricule){
    echo readCostSheetsByVisitor($matricule);
});

//ALL PACKAGE COST
$app->get('/costSheet/packageCost', function(){
    echo readPackageCost();
});

//ALL COST SHEET BY STATUS
$app->get('/costSheet/Status/:status', function($status){
    echo readCostSheetByStatus($status);
});

//ALL PACKAGE LINE FROM A COST SHEET
$app->get('/packageLine/:costSheetId', function($costSheetId){
    echo readPackageLineByCostSheet($costSheetId);
});

//ALL OUT PACKAGE LINE FROM A COST SHEET
$app->get('/outPackageLine/:costSheetId', function($costSheetId){
    echo readOutPackageLineByCostSheet($costSheetId);
});

/*
 * UPDATE
 */

//UPDATE COST SHEET STATUS
$app->get('/update/costSheet/status/:status/idCostSheet/:idCostSheet', function($status,$idCostSheet){
    echo updateCostSheetStatus($status,$idCostSheet);
});

//UPDATE A COST SHEET
$app->get('/update/costsheet/:id/:justificationNumber/:validCost', function($id,$justificationNumber,$validCost){
    echo updateCostSheet($id,$justificationNumber,$validCost);
});

//UPDATE AN OUTPACKAGE LINE
$app->get('/update/outpackageLine/:id/:cost/:label', function($id,$cost,$label){
    echo updateOutPackageLine($id,$cost,$label);
});

//UPDATE A PACKAGE LINE
$app->get('/update/packageLine/:id/:quantity/:packageCostId', function($id,$quantity,$packageCostId){
    echo updatePackageLine($id,$quantity,$packageCostId);
});

//UPDATE A PACKAGE COST
$app->get('/update/packageCost/:id/:cost/:label', function($id,$cost,$label){
    echo updatePackageCost($id,$cost,$label);
});

/*
 * DELETE
 */

//DELETE ALL COSTSHEET OLDER THAN A YEAR
$app->get('/delete/costSheet/month/:month', function($month){
    deleteCostSheetYear($month);
});

//DELETE OUTPACKAGE LINE FROM A COSTSHEET
$app->get('/delete/outpackageLine/costSheetId/:costSheetId', function($costSheetId){
    deleteOutPackageLine($costSheetId);
});

//DELETE PACKAGE LINE FROM A COSTSHEET
$app->get('/delete/packageLine/costSheetId/:costSheetId', function($costSheetId){
    deletePackageLine($costSheetId);
});


//DELETE ALL LINES FROM A COSTSHEET
$app->get('/delete/Line/costSheetId/:costSheetId', function($costSheetId){
    deleteOutPackageLine($costSheetId);
    deletePackageLine($costSheetId);
});

//DELETE A PACKAGE COST
$app->get('/delete/packageCost/:id', function($id){
    deletePackageCost($id);
});