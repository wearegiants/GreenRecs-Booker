<?php

namespace YerbaVerde;

class CalendarFormapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "";
  }

  function getUniqueName() {
    return "CalendarForm";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/calendarForm.php');
  }

  function hasPage() {
     return true;
  }

  function doSubmitProcess($params) {
    $errors = array();
    $this->checkPID($params);

    if (!isset($params['apptdata'])) {
      $errors[] = array(
        "field" => "apptdata",
        "message" => "You are missing the time appointment"
        );
    }

    if(count($errors) > 0) {
      return $this->echoJSONResponse(
        array(
          "status" => 1,
          "msgtype" => "bulk",
          "errors" => $errors
        )
      );
    }
    unset($params['session_hash']);

    $redirect = (isset($params['redirect_to']) ? $params['redirect_to'] : '');
    unset($params['redirect_to']);

    $api_result = $this->callYerbaVerde("/book", $params);
    
 $this->echoJSONResponse(
      array(
        "status" => 0,
        "message" => "Finished updating the symptom fields",
        "msgtype" => "global",
        "redirect" => $redirect,
        "appointment_base" => base64_encode(serialize($api_result)),
        "session_hash" => hash_hmac('sha256', mt_rand(0, 100), $this->getTheSalt())
      )
    );

  }
}
