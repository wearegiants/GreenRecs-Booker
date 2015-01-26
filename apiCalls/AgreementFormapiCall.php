<?php

namespace YerbaVerde;

class AgreementFormapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "Your Agreement";
  }

  function getUniqueName() {
    return "AgreementForm";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/agreementForm.php');
  }

  function hasPage() {
     return true;
  }


  function doSubmitProcess($params) {
    $errors = array();

    $this->checkPID($params);


    foreach($params as $key => $value) {
      switch($key) {
        case 'redirect_to':
        case 'pid':
        break;
        default:
        $checkEmptySig = $this->noempty($value, $key);
        // var_dump($checkEmptySig); die();
        if ($checkEmptySig) {
          $errors[] = $checkEmptySig;
        }
        break;
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
    unset($params['session_hash']);

    $redirect = (isset($params['redirect_to']) ? $params['redirect_to'] : '');
    unset($params['redirect_to']);

    // $api_result = $this->callYerbaVerde("patadd/agreement", $params);

 $this->echoJSONResponse(
      array(
        "status" => 0,
        "message" => "Finished Agreement",
        "msgtype" => "global",
        "redirect" => $redirect,
        "session_hash" => hash_hmac('sha256', mt_rand(0, 100), $this->getTheSalt())
      )
    );

  }
}
