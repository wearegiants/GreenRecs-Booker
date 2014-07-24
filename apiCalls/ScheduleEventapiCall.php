<?php

namespace YerbaVerde;

class ScheduleEventapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {}

  function getUniqueName() {
    return "ScheduleEvent";
  }

  function getTemplate() {
    return false;
  }

  function hasPage() {
     return true;
  }


  function doSubmitProcess($params) {
     

    if(count($errors) > 0) {
      return $this->echoJSONResponse(
        array(
          "status" => 1,
          "msgtype" => "bulk",
          "errors" => $errors
        )
      );
    }

    $api_result = $this->callYerbaVerde("patient_add", $params);

// var_dump($api_result);

 $this->echoJSONResponse(
      array(
        "status" => 0,
        "message" => "Successfully submitted a schedule time",
        "msgtype" => "global"
      )
    );

  }
}
