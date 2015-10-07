<?php
ini_set('max_execution_time',0);
require 'vendor/autoload.php';
require_once 'vendor/fzaninotto/faker/src/autoload.php';

$faker = Faker\Factory::create('fr_FR');

use RedBeanPHP\Facade as R;

R::setup('mysql:host=localhost;dbname=gsb_cost_managment', 'root', 'pwsio');

R::exec('CREATE VIEW visitor AS SELECT * FROM gsb_human_ressources.visitor');

$status = R::dispense('status');
$status->libelle='Créée';
R::store($status);
$status = R::dispense('status');
$status->libelle='Clôturée';
R::store($status);
$status = R::dispense('status');
$status->libelle='Validée';
R::store($status);
$status = R::dispense('status');
$status->libelle='Mise en paiement';
R::store($status);
$status = R::dispense('status');
$status->libelle='Remboursée';
R::store($status);

for ($i = 0; $i < 12960; $i++) {
    
    $cost_sheet = R::dispense('costsheet');
    $cost_sheet->month=$faker->month;
    $cost_sheet->visitor=R::findOne('visitor','id=?',[$faker->numberBetween($min = 1, $max = 540)]);
    $cost_sheet->status=R::findOne('status','id=?',[$faker->numberBetween($min = 1, $max = 5)]);
    $cost_sheet->justification_number=$faker->randomDigitNotNull;
    $cost_sheet->valid_amount=$faker->randomNumber($nbDigits = 3);
    $cost_sheet->modification_date=$faker->dateTime($max = 'now');
    R::store($cost_sheet);
}

for ($i = 0; $i < 20; $i++) {
    
    $package_cost = R::dispense('packagecost');
    $package_cost->libelle=$faker->realText($maxNbChars=20, $indexSize=2);
    $package_cost->amount=$faker->randomNumber($nbDigits = 3);
    R::store($package_cost);
}

for ($i = 0; $i < 1000; $i++) {
    $outpackage_line = R::dispense('outpackageline');
    $outpackage_line->date=$faker->dateTime($max = 'now');
    $outpackage_line->cost_sheet=R::findOne('costsheet','id=?',[$faker->numberBetween($min = 1, $max = 12960)]);
    $outpackage_line->amount=$faker->randomNumber($nbDigits = 3);
    $outpackage_line->libelle=$faker->realText($maxNbChars=20, $indexSize=2);
    R::store($outpackage_line);   
}

for ($i = 0; $i < 129600; $i++) {
    $package_line = R::dispense('packageline');
    $package_line->package_cost=R::findOne('packagecost','id=?',[$faker->numberBetween($min = 1, $max = 20)]);
    $package_line->cost_sheet=R::findOne('costsheet','id=?',[$faker->numberBetween($min = 1, $max = 12960)]);
    $package_line->month=$faker->month;
    $package_line->quantity=$faker->randomNumber($nbDigits = 3);
    R::store($package_line);
}






