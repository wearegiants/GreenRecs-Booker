<?php 
/*
Plugin Name: GreenRecs Scheduler Calendar
Author: scneptune
Description: A plugin to allow patients to schedule an appt with a doctor.
Version: 0.0.1
*/

//index.php
if(defined("ABSPATH") && defined("WPINC")) {
  define("GR_PLUGIN_PATH", dirname(__FILE__));
  define("GR_PLUGIN_URL", plugin_dir_url(__FILE__));
  define("GR_URL_API", getenv("GR_URL_API"));
  define('CSRF_SALT', getenv('CSRF_SALT'));

  include_once ABSPATH.WPINC.'/class-http.php';

//API Routing

  include_once "yerbaverde/controllerVerde.php";
  include_once "yerbaverde/apiCall.php";
  include_once "yerbaverde/apiCallProperties.php";


  include_once "apiCalls/VerifyapiCall.php";
  include_once "apiCalls/ContactFormapiCall.php";
  include_once "apiCalls/SymptomFormapiCall.php";
  include_once "apiCalls/LegalFormapiCall.php";
  include_once "apiCalls/HistoryFormapiCall.php";
  include_once "apiCalls/CalendarFormapiCall.php";
  include_once "apiCalls/AgreementFormapiCall.php";
  include_once "apiCalls/SignupapiCall.php";
  include_once "apiCalls/ScheduleEventapiCall.php";

$yvApi = \YerbaVerde\controllerVerde::getInstance();

  register_activation_hook(__FILE__,  function() use ($yvApi) {
    $yvApi->doEnable();
  });

  register_deactivation_hook(__FILE__, function() use ($yvApi) {
    $yvApi->doDisable();
  });
 }
