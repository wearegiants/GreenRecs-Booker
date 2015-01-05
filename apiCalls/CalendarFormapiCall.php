<?php

namespace YerbaVerde;

class CalendarFormapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "Book Your Appointment";
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

    var_dump($params);
    die();

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

    $api_result = $this->callYerbaVerde("patadd/history", $params);

 $this->echoJSONResponse(
      array(
        "status" => 0,
        "message" => "Finished updating the symptom fields",
        "msgtype" => "global",
        "redirect" => $redirect,
        "session_hash" => hash_hmac('sha256', mt_rand(0, 100), $this->getTheSalt())
      )
    );

  }
}
