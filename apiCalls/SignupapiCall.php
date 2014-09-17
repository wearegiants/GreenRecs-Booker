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
            return array(
              "message" => "This is a required field and must be filled out to the best of your knowledge",
              "field" => $fieldname
              );
          } 
      }

      function patient_sign ($value, $fieldname, $params) {
        if ($params['sign1'] != $value) {
          return array (
            "message" => "Your initaled signature does not match in this field",
            "field" => $fieldname
            );
        }
      }
  function doSubmitProcess($params) {
      $params['dob'] = $params['dob-year'] . '-' . $params['dob-month'] . '-' . $params['dob-day'];
      $errors = array();
      if (isset($params['can_sympt_treat']) || isset($params['can_sympt_treat_other'])) {
            $value = $params['can_sympt_treat'];
            $newTreat = implode(" , ", $value) . (isset($params['can_sympt_treat_other']) ? ', ' . $params['can_sympt_treat_other'] : '');
              unset($params['can_sympt_treat']);
             $params['can_sympt_treat'] = $newTreat;
           } else {
            $errors[] = "missing treatment options";
           }
      ($params['appointment_hash'] ? $params['appointment_hash'] : $errors[] = "missing appointment hash");
    foreach( $params as $key => $value) {
      if (count($params[$key]) == 0) {
        if ($key != 'address2' || $key != 'can_sympt_treat_other' || $key != 'can_sympt_treat' || $key != 'can_sympt_med' || $key != 'legal_can' || $key != 'legal_prob'){
          $testEmpty = $this->noempty($value, $key);
          ($testEmpty ? $errors[] = $testEmpty : false); 
          }
      }
       if( $key == 'city' || $key == 'first_name' || $key == 'last_name' || $key == 'emr_name' || $key == 'emr_rel' || $key == 'can_sympt_condition')  {
           //reseting these because they get overwritten in the next check
           $testAlpha = $this->alphavalid($value, $key);
          ($testAlpha ? $errors[] = $testAlpha : false);
       }
      if ($key == 'sign2' || $key ==  'sign3' ||$key ==  'sign4' ||$key ==  'sign5' ||$key ==  'sign6' ||$key ==  'sign7' ) {
         $testPat = $this->patient_sign($value, $key, $params);
         ($testPat ? $errors[] = $testPat : $params['pat_sign'] = $value);
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

    $api_result = $this->callYerbaVerde("patient_add", $params);

 $this->echoJSONResponse(
      array(
        "status" => 0,
        "message" => "Successfully submitted an application",
        "msgtype" => "global"
      )
    );

  }
}
