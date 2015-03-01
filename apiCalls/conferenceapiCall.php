<?php

namespace YerbaVerde;

class conferenceapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "conference";
  }

  function getUniqueName() {
    return "conference";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/conference.php');
  }

  function hasPage() {
     return true;
  }

  function doSubmitProcess($params) {
    $errors = array();
    foreach ($params as $key => $value) {

      if ($key == 'email'){
        $testEmail = $this->existingInfo($value, $key, 'chkBasic'); 
        if (!$testEmail) {
          $errors[] = $testEmail;
          }
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
    
    $redirect = (isset($params['redirect_to']) ? $params['redirect_to'] : '');
    $params['dob'] = $params['dob-year'] . '-' . $params['dob-month'] . '-' . $params['dob-day'];
    //unset this after we have iterated over it for the no empty check
    unset($params['dob_day'], $params['dob_month'], $params['dob_year']);
    
    $api_result = $this->callYerbaVerde("reset/appointment", $params);

      $this->echoJSONResponse(
            array(
              "status" => $api_result['status'],
              "message" => "Successfully submitted a schedule time",
              "msgtype" => "global",
              'session_hash' => hash_hmac('sha256', mt_rand(0, 100), $this->getTheSalt()),
              "pid" => $api_result['id'],
              "redirect" => $redirect
            )
          );

    }
}
