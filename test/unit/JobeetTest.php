<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__).'/../bootstrap/unit.php';
 
$t = new lime_test(9);
 
$t->comment('::slugify()');
$t->is(Jobeet::slugify('Sensio'), 'sensio','::slugify() converts all characters to lower case');
$t->is(Jobeet::slugify('sensio labs'), 'sensio-labs');
$t->is(Jobeet::slugify('sensio   labs'), 'sensio-labs');
$t->is(Jobeet::slugify('paris,france'), 'paris-france');
$t->is(Jobeet::slugify('  sensio'), 'sensio');
$t->is(Jobeet::slugify('sensio  '), 'sensio');
$t->is(Jobeet::slugify(''), 'n-a', '::slugify() converts the empty string to n-a');
$t->is(Jobeet::slugify(' - '), 'n-a', '::slugify() converts a string that only contains non-ASCII characters to n-a');
$t->is(Jobeet::slugify('Développeur Web'), 'developpeur-web', '::slugify() removes accents');
?>
