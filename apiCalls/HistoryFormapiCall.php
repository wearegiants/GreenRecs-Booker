<?php

namespace YerbaVerde;

class HistoryFormapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "Your Medical History";
  }

  function getUniqueName() {
    return "HistoryForm";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/historyForm.php');
  }

  function hasPage() {
     return true;
  }

  function doSubmitProcess($params) {
    $errors = array();

    $this->checkPID($params);

    $expectedBooleans = [
      "use_prev_bool",
      "use_med_bool",
      "use_med_time",
      "use_change",
      "use_condition",
      "use_quit_bool"
    ];

    foreach($expectedBooleans as $key => $value) {
      if (!array_key_exists($expectedBooleans[$key], $params)) {
        $errors[] = array(
          "message" => "This is a required field and must be filled out to the best of your knowledge",
          "field" => $expectedBooleans[$key]
          );
      }
    }
    
    foreach ($params as $key => $value) {
      switch ($key) {
        case "redirect_to":
        case "use_prev_bool":
        case "use_med_bool":
        case "use_med_time":
        case "use_change":
        case "use_condition":
        case "use_quit_bool":
        break;
        case "use_consumpt":
        case "use_consumpt_other":
          if (empty($params['use_consumpt'])) {
           $useConsumpt = $this->noempty($params['use_consumpt_other'], 'use_consumpt_other');
             
            if ($useConsumpt) { 
              $errors[] = $useConsumpt; 
            } else { 
              $params['use_consumpt'] = $params['use_consumpt_other']; 
              unset($params['use_consumpt_other']);
            }

          } else {
              unset($params['use_consumpt_other']);
          }
        break;
        default:
          $checkEmpties = $this->noempty($value, $key);
          if ($checkEmpties) {$errors[] = $checkEmpties;}
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

    $api_result = $this->callYerbaVerde("patadd/history", $params);

 $this->echoJSONResponse(
      array(
        "status" => 0,
        "message" => "Finished updating the symptom fields",
        "msgtype" => "global",
        "redirect" => $redirect,
        "session_hash" => hash_hmac('sha256', mt_rand(0, 100), $this->getTheSalt())
      )
    );

  }
}
