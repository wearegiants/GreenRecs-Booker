<?php

namespace YerbaVerde;

class ContactFormapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "Your Contact Info";
  }

  function getUniqueName() {
    return "ContactForm";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/contactForm.php');
  }

  function hasPage() {
     return true;
  }

  function doSubmitProcess($params) {
    $errors = array();
    
    $params['dob'] = $params['dob-year'] . '-' . $params['dob-month'] . '-' . $params['dob-day'];
    
    foreach ($params as $key => $value) {

      $checkEmpty = $this->noempty($value, $key);
      if ($checkEmpty && $key !== 'address2') {
        $errors[] = $checkEmpty;
      }
      
      switch($key) {
        case'first_name':
        case'last_name': 
        case'city': 
        case'emr_name': 
        case'emr_rel':
          $checkText = $this->alphavalid($value, $key);
          if ($checkText) {
            $errors[] = $checkText;
          }
        break;
        default: 
        break;
      }

    }

    $params['address'];
    $params['address2'];
    $params['zip'];
    $params['email'];
    $params['phone'];
    $params['emr_phone'];
    $params['cal_id_bool'];

    $final_params = array (
      'session_hash' => hash_hmac('sha256', mt_rand(0, 800), $this->getTheSalt()),
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
    unset($params['dob_day'], $params['dob_month'], $params['dob_year']);

$redirect = (isset($params['redirect_to']) ? $params['redirect_to'] : '');
    $api_result = $this->callYerbaVerde("patadd/contact", $params);

 $this->echoJSONResponse(
      array(
        "status" => 0,
        "message" => "Successfully submitted a schedule time",
        "msgtype" => "global",
        "redirect" => $redirect,
        "session_cookie" => $final_params['session_hash']
      )
    );

  }
}
