<?php

namespace YerbaVerde;

class SymptomFormapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "Your Symptom Info";
  }

  function getUniqueName() {
    return "SymptomForm";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/symptomForm.php');
  }

  function hasPage() {
     return true;
  }


  function doSubmitProcess($params) {
    $errors = array();

     if (!isset($params['event'])) {
      $errors[] = array (
            "message" => "You do not have an appointment. Please choose a time on the calendar. ",
            "field" => '[event]'
            );
     }
    
     parse_str($params['event'], $new_params);

    $final_params = array (
      'appointment_hash' => hash_hmac('sha256', mt_rand(0, 800), $this->getTheSalt()),
      ); 
    

    if(count($errors) > 0) {
      return $this->echoJSONResponse(
        array(
          "status" => 1,
          "msgtype" => "bulk",
          "errors" => $errors
        )
      );
    }

$redirect = (isset($params['redirect_to']) ? $params['redirect_to'] : '');
    $api_result = $this->callYerbaVerde("eventPost", $final_params);

 $this->echoJSONResponse(
      array(
        "status" => 0,
        "message" => "Successfully submitted a schedule time",
        "msgtype" => "global",
        "redirect" => $redirect,
        "appt_cookie" => $final_params['appointment_hash']
      )
    );

  }
}
