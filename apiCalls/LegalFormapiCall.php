<?php

namespace YerbaVerde;

class LegalFormapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "Legal Information";
  }

  function getUniqueName() {
    return "LegalForm";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/legalForm.php');
  }

  function hasPage() {
     return true;
  }


  function doSubmitProcess($params) {
    $errors = array();

    $this->checkPID($params);
     
    foreach($params as $key => $value) {
      switch($key) {
        case "legal_prob_bool":
          if (filter_var($value, FILTER_VALIDATE_BOOLEAN)){
            $probInfo = $this->noempty($params['legal_prob'], "legal_prob");
            if ($probInfo) {$errors[] = $probInfo;}
          }
        break;
        case "legal_can_bool":
          if (filter_var($value, FILTER_VALIDATE_BOOLEAN)){
            $canInfo = $this->noempty($params['legal_can'], "legal_can");
            if ($canInfo) {$errors[] = $canInfo;}
          }
        break;
        default:
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

$redirect = (isset($params['redirect_to']) ? $params['redirect_to'] : '');
    $api_result = $this->callYerbaVerde("patadd/legal", $params);

 $this->echoJSONResponse(
      array(
        "status" => 0,
        "message" => "Update Legal Patient Information",
        "msgtype" => "global",
        "redirect" => $redirect,
        "session_hash" => hash_hmac('sha256', mt_rand(0, 100), $this->getTheSalt())
      )
    );

  }
}
