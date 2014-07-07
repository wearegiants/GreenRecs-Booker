<?php

namespace YerbaVerde;

class SignupapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "Sign Up";
  }

  function getUniqueName() {
    return "patientsignup";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/signupform.php');
  }

  function hasPage() {
    return true;
  }

  function doSubmitProcess($params) {
    $fieldCheck = array($params['first_name'], $params["last_name"], 
      $params['city'], $params['address'], $params['emr_name'], 
      $params['emr_rel']);

    $errors = array();

    foreach ($fieldCheck as $value) {
        if (!preg_match('/^[a-z .\-]+$/i', $value)) {
          $errors[] = array(
            "message" => "This field can only contain alphabetic characters. ie. (A-Z).",
            "field" => $value
          );
        }
      }

    if(count($errors) > 0) {
      $this->echoJSONResponse(array(
          "status" => 1,
          "msgtype" => "bulk",
          "errors" => $errors
        )
      );
    }

    $api_result = $this->callYerbaVerde("testApi", $params);

    $this->echoJSONResponse(array(
        "status" => 0,
        "message" => "Successfully submitted an application",
        "msgtype" => "global"
      )
    );

  }
}
