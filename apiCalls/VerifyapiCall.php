<?php

namespace YerbaVerde;

class VerifyapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "Verify Patient";
  }

  function getUniqueName() {
    return "Verify";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/verifyTempl.php');
  }

  function hasPage() {
    return true;
  }

 function alphavalid($value, $fieldname) {
            if (!preg_match('/^[a-z .\-]+$/i', $value)) {
              return array(
                "message" => "This field can only contain alphabetic characters. ie. (A-Z).",
                "field" => $fieldname
              );
            }
      }
      function noempty($value, $fieldname) {
          if( empty($value) ){
            return $errors[] = array(
              "message" => "This is a required field and must be filled out to the best of your knowledge",
              "field" => $fieldname
              );
          } 
      }

  function doSubmitProcess($params) {
      $errors = array();
      $params['dob'] = $params['dob-year'] . '-' . $params['dob-month'] . '-' . $params['dob-day'];

      
    foreach( $params as $key => $value) {      
      if ($key == 'approval_hash' && (strlen($value) !== 12)) {
        $errors[] = array (
            "message" => "Please recheck the value your entered in this field, there appears to be some missing characters",
            "field" => $key
            );
      } else {
        $this->noempty($value, $key);
      }
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

    $api_result = $this->callYerbaVerde("verify", $params);


     $this->echoJSONResponse(
          $api_result
        );

  }
}
