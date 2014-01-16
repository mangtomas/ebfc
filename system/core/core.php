<?php
/*
* Core file for the MVC framework
*
*/
if(!defined('APPS')) exit ('No direct access allowed');

//require the core files of the system
/*
*/
require_once APPS.'config/database'.EXT;
require_once APPS.'config/autoload'.EXT;
require_once APPS.'config/config'.EXT;
require_once CORE.'crackerjack'.EXT;
require_once CORE.'crackerjack_model'.EXT;
require_once CORE.'loader'.EXT;
require_once CORE.'router'.EXT;
require_once CORE.'registry'.EXT;
require_once CORE.'request'.EXT;

/*
* Create new object and catch the requested segments of url
*/
Router::route(new Request);
