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
      switch($key) {
        case'first_name':
        case'last_name': 
        case'city': 
        case'emr_name': 
        case'emr_relation':
          $checkEmpty = $this->noempty($value, $key);
          if ($checkEmpty) {
            $errors[] = $checkEmpty;
          }
          $checkText = $this->alphavalid($value, $key);
          if ($checkText) {
            $errors[] = $checkText;
          }
        break;
        case 'address2': 
          if (strlen($value) > 0) {
              $params['address'] = $params['address'] . ' ' . $params[$key];
          } else {
              unset($params['address2']);
          }
        break;
        case 'cal_id':
          if ( (int) $value == 0 ) {
            $errors[] = array('field' => 'cal_id', 'message' => 'You cannot apply for a recommendation without the proper identification.');
          }
        break;
        default: 
        $checkEmpty = $this->noempty($value, $key);
          if ($checkEmpty) {
            $errors[] = $checkEmpty;
          }
        break;
      }

      // if ($key == 'email' || $key == 'phone'){
      //   $testEmail = $this->existingInfo($value, $key, 'chkBasic'); 
      //   if ($testEmail) {
      //     $errors[] = $testEmail;
      //     }
      //   }
    }

    if (empty($params['cal_id']) ) {
      $errors[] = array(
        "message" => "Please select a value ",
        "field"=> 'cal_id'
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
    
    $redirect = (isset($params['redirect_to']) ? $params['redirect_to'] : '');
    $params['dob'] = $params['dob-year'] . '-' . $params['dob-month'] . '-' . $params['dob-day'];
    $params['cal_id'] = (int) $params['cal_id'];
    //unset this after we have iterated over it for the no empty check
    unset($params['dob_day'], $params['dob_month'], $params['dob_year']);

    $api_result = $this->callYerbaVerde("patadd/contact", $params);

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
