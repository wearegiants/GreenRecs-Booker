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
    $params['phone'] = preg_replace('/\D+/', '', $params['phone']);
    foreach ($params as $key => $value) {

      $checkEmpty = $this->noempty($value, $key);

      if ($checkEmpty && $key !== 'address2') {
        $errors[] = $checkEmpty;
      }
      
      if ( $key == 'address2' ) {
        if (strlen($value) > 0) {
          $params['address'] = $params['address'] . ' ' . $params[$key];
        } else {
          unset($params['address2']);
        }
      }

      switch($key) {
        case'first_name':
        case'last_name': 
        case'city': 
        case'emr_name': 
        case'emr_relation':
          $checkText = $this->alphavalid($value, $key);
          if ($checkText) {
            $errors[] = $checkText;
          }
        break;
        default: 
        break;
      }

      if ($key == 'email' || $key == 'phone'){
        $testEmail = $this->existingInfo($value, $key, 'chkBasic'); 
        if ($testEmail) {
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
    

    $api_result = $this->callYerbaVerde("patadd/contact", $params);

      $this->echoJSONResponse(
            array(
              "status" => $api_result['status'],
              "message" => "Successfully submitted a schedule time",
              "msgtype" => "global",
              'session_hash' => hash_hmac('sha256', mt_rand(0, 800), $this->getTheSalt()),
              "pid" => $api_result['id'],
              "redirect" => $redirect
            )
          );

    }
}
