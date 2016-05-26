<?php 

require_once 'inc/class.TemplatePower.inc.php';
require_once 'inc/functions.php';

// create a new TemplatePower object using a template file
$tpl = new TemplatePower( "tpl/monthrow.tpl" );
$tpl->prepare();

$tpl->assign('name', 'Peter');


$numbers = range(1,24);
AddMonthrowToTemplate($tpl, $numbers);

$days = CreateArrayWith24Dates();
$today = new DateTime();
$pos = array_search($today->format('d/m'), $days );
AddMonthrowToTemplate($tpl, $days, $pos);

$days = CreateArrayWith24Dates('D');
AddMonthrowToTemplate($tpl, $days, 6);


// print the resulting html
$tpl->printToScreen();