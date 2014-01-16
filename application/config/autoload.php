<?php

/*
* Autoloading models class and helpers
* 
*/

/*loading models automatically e.g. array('db','model1');
*default models
*	-db
*/
$config['models'] = array('db','acl','crud','user','compute');

//Helpers
//e.g. array('default','helper1');
$config['helpers'] = array('generals','natsession','hours_computations');

//Libararies
$config['libraries'] = array('session','form','hash','template');