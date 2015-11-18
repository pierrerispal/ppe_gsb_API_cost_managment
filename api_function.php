<?php

use RedBeanPHP\Facade as R;

/*
 * READ
 */

/*
 * @TODO checker ce qu'est verification number et valid cost
 */
function createCostSheet($idVisitor,$month) {
    $costSheet = R::dispense('costsheet');
    $costSheet->visitor_id=$idVisitor;
    $costSheet->status=1;  
    $costSheet->month=$month;    
    R::store($costSheet); 
    return json_encode(R::exportAll($costSheet));
}

function createPackageLine($month,$quantity,$packageCostId,$costSheetId){
    $packageLine = R::dispense('packageline');
    $packageLine->month=$month;
    $packageLine->quantity=$quantity;
    $packageLine->package_cost_id=$packageCostId;
    $packageLine->cost_sheet_id=$costSheetId;
    R::store($packageLine);
    return json_encode(R::exportAll($packageLine));
}

function createOutPackageLine($month, $cost,$label,$costSheetId){
    $outPackageLine = R::dispense('outPackageLine');
    $outPackageLine->month=$month;
    $outPackageLine->cost=$cost;
    $outPackageLine->label=$label;
    $outPackageLine->cost_sheet_id=$costSheetId;
    R::store($outPackageLine);
    return json_encode(R::exportAll($outPackageLine));
}

function createPackageCost($label, $cost){
    $packageCost = R::dispense('packageCost');
    $packageCost->label=$label;
    $packageCost->cost=$cost;
    return json_encode(R::exportAll($packageCost));
}

/*
 * READ
 */
function readCostSheetsByMonth($month)
{
    $costSheets=R::find('costsheet','month = ?', [$month]);
    return json_encode(R::exportAll($costSheets));
}

function readCostSheetsByMonthVisitor($month,$matricule)
{
    $costSheets=R::find('costsheet','month = ? AND visitor_id=?', [$month,$matricule]);
    return json_encode(R::exportAll($costSheets));
}

function readCostSheetsByVisitor($matricule)
{
    $costSheets=R::find('costsheet','visitor_id= ?', [$matricule]);
    return json_encode(R::exportAll($costSheets));
}

function readPackageCost()
{
    $packageCost=R::findAll('packagecost');
    return json_encode(R::exportAll($packageCost));
}

function readCostSheetByStatus($status)
{
    $costSheets=R::find('costsheet','status_id=?',[$status]);
    return json_encode(R::exportAll($costSheets));
}

function readPackageLineByCostSheet($costSheet)
{
    $packageLine=R::find('packageline','cost_sheet_id=?',[$costSheet]);
    return json_encode(R::exportAll($packageLine));
}

function readOutPackageLineByCostSheet($costSheet)
{
    $outPackageLine=R::find('outpackageline','cost_sheet_id=?',[$costSheet]);
    var_dump($outPackageLine);

    return json_encode(R::exportAll($outPackageLine));
}

/*
 * UPDATE
 * @TODO changer la date lors de la modif
 */
function updateCostSheetStatus($status,$idCostSheet)
{
    $costSheet = R::load('costsheet',$idCostSheet);
    $costSheet->status_id=$status;
    R::store($costSheet);
    return json_encode(R::exportAll($costSheet));
}

function updateCostSheet($idCostSheet,$justificationNumber,$validCost)
{
    $costSheet = R::load('costsheet',$idCostSheet);
    $costSheet->justification_number=$justificationNumber;
    $costSheet->valid_cost=$validCost;
    R::store($costSheet);
    return json_encode(R::exportAll($costSheet));
}

function updateOutPackageLine($id,$cost,$label)
{
    $outPackageLine = R::load('outpackageline',$id);
    $outPackageLine->cost=$cost;
    $outPackageLine->label=$label;
    R::store($outPackageLine);
    return json_encode(R::exportAll($outPackageLine));
}

function updatePackageLine($id,$quantity,$packageCostId)
{
    $packageLine = R::load('packageline',$id);
    $packageLine->quantity=$quantity;
    $packageLine->package_cost_id=$packageCostId;
    R::store($packageLine);
    return json_encode(R::exportAll($packageLine));
}

function updatePackageCost($id,$cost,$label)
{
    $packageCost = R::load('packagecost',$id);
    $packageCost->cost=$cost;
    $packageCost->label=$label;
    R::store($packageCost);
    return json_encode(R::exportAll($packageCost));
}

/*
 * DELETE
 */
function deleteCostSheetYear($month)
{
    $costSheets = R::find('costsheet','month=?',[$month]);
    R::trashAll( $costSheets );
}
function deleteOutPackageLine($costSheetId)
{
    $outPackageLine = R::find('outpackageline','cost_sheet_id=?',[$costSheetId]);
    R::trashAll($outPackageLine);
}
function deletePackageLine($costSheetId)
{
    $packageLine = R::find('packageline','cost_sheet_id=?',[$costSheetId]);
    R::trashAll($packageLine);
}
function deletePackageCost($id)
{
    $packageCost = R::find('packagecost','id=?',[$id]);
    R::trashAll($packageCost);
}