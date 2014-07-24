<?php

namespace YerbaVerde;

class ScheduleEventapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {}

  function getUniqueName() {
    return "ScheduleEvent";
  }

  function getTemplate() {
    return include_once(GR_PLUGIN_PATH . '/templates/grCal.php');
  }

  function hasPage() {
     return false;
  }


  function doSubmitProcess($params) {
    $errors = array();
     if (!isset($params['event'])) {
      $errors[] = array (
            "message" => "You do not have an appointment. Please choose a time on the calendar. ",
            "field" => '[event]'
            );
     }
    $redirect = (isset($params['redirect_to']) ? $params['redirect_to'] : '');
    parse_str($params['event'], $new_params);

    $final_params = array (
      'appointment_hash' => hash_hmac('sha256', mt_rand(0, 800), $this->getTheSalt()),
      'appointment_start' => $new_params['start'],
      'appointment_end' => $new_params['end'],
      'doc_name' => $new_params['doc_name']
      ); 
    
    setcookie('appointment_hash', $final_params['appointment_hash'], time()+3600);
    
    if(count($errors) > 0) {
      return $this->echoJSONResponse(
        array(
          "status" => 1,
          "msgtype" => "bulk",
          "errors" => $errors
        )
      );
    }

    $api_result = $this->callYerbaVerde("eventPost", $final_params);
 $this->echoJSONResponse(
      array(
        "status" => 0,
        "message" => "Successfully submitted a schedule time",
        "msgtype" => "global",
        "redirect" => $redirect
      )
    );

  }
}
