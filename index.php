<?php 
/*
Plugin Name: GreenRecs Scheduler Calendar
Author: scneptune
Description: A plugin to allow patients to schedule an appt with a doctor.
Version: 0.0.1
*/

//index.php

  define("GR_PLUGIN_PATH", dirname(__FILE__));
  define("GR_PLUGIN_URL", plugin_dir_url(__FILE__));
  define("GR_URL_API", getenv("GR_URL_API"));
  define('CSRF_SALT', getenv('CSRF_SALT'));

  include_once ABSPATH.WPINC.'/class-http.php';
 // Calendar Front End
  include_once "calendar/grCalBoot.php";
  new \GreenRecs\grCalBoot();

//Routing

  include_once "yerbaverde/controllerVerde.php";
  include_once "yerbaverde/apiConnect.php";


