<?php

require_once('ahp.class.php');

$ahp = new AHP('Buy a car');
$ahp->setCriteria(array('Cost', 'Safety', 'Style', 'Capacity'));
$ahp->setCriteria(array('Purchase Price', 'Fuel Costs', 'Maintenance Costs', 'Resale Value'), 'Cost');
$ahp->setCriteria(array('Cargo Capacity', 'Passenger Capacity'), 'Capacity');
$ahp->setAlternatives(array('Accord Sedan', 'Accord Hybrid', 'Pilot SUV', 'CR-V SUV', 'Element SUV', 'Odyssey Minivan'));

// echo '<br />Goal: "' . $ahp->goal . '"<br />';
// echo '<br />Criteria: <pre>'; print_r($ahp->criteria); echo '</pre><br />';
// echo '<br />Alternatives: <pre>'; print_r($ahp->alternatives); echo '</pre><br />';

echo '<pre>'; echo $ahp->getHierarchy(); echo '</pre>';