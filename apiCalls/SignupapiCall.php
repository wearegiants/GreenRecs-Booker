<?php

namespace YerbaVerde;

class SignupapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "Sign Up";
  }

  function getUniqueName() {
    return "Signup";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/signupform.php');
  }

  function hasPage() {
    return true;
  }

  function doSubmitProcess($params) {

    $errors = array();
  
    // var_dump($params);
    function alphavalid($value) {
            if (!preg_match('/^[a-z .\-]+$/i', $value)) {
              $errors[] = array(
                "message" => "This field can only contain alphabetic characters. ie. (A-Z).",
                "field" => $value
              );
            }
      }
      
    foreach( $params as $key => $value) {
       if( $key == 'city' || $key == 'first_name' || $key == 'last_name' || $key == 'emr_name' || $key == 'emr_rel')  {
          alphavalid($value);
       }

    }

   

    if(count($errors) > 0) {
      $this->echoJSONResponse(
        array(
          "status" => 1,
          "msgtype" => "bulk",
          "errors" => $errors
        )
      );
    }

    $api_result = $this->callYerbaVerde("testApi", $params);

    $this->echoJSONResponse(
      array(
        "status" => 0,
        "message" => "Successfully submitted an application",
        "msgtype" => "global"
      )
    );

  }
}
