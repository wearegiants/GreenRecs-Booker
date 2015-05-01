<?php

namespace YerbaVerde;

class SymptomFormapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "Your Symptom Info";
  }

  function getUniqueName() {
    return "SymptomForm";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/symptomForm.php');
  }

  function hasPage() {
     return true;
  }


  function doSubmitProcess($params) {
    $errors = array();

    $this->checkPID($params);
    $treatstr = "";
    if (empty($params['can_sympt_treat'])) {
      $errors[] = array(
          "message" => "Please select atleast one condition from this section.",
          //silly hack for this 
          "field" => "can_sympt_treat]["
          );
    } else {
      foreach ($params['can_sympt_treat'] as $item) {
        if ($item == 'Other' ) {
          if (empty($params['can_sympt_treat_other'])) {
            $errors[] = array(
              "message" => "Please what other conditions you have sought to treat your problem.",
              "field" => "can_sympt_treat_other"
              );
            }
          } else {
            $treatstr .= $item . " , ";  
          }
        }
      }
      if (!empty($params['can_sympt_treat_other'])) {
        $treatstr .= $params['can_sympt_treat_other'];
      } else {
        unset($params['can_sympt_treat_other']);
      }
      $params['can_sympt_treat'] = $treatstr;

    
    foreach ($params as $key => $value) {
      switch ($key) {
        case "redirect_to":
        case "can_sympt_treat":
        break;
        default:
          $checkEmpties = $this->noempty($value, $key);
          if ($checkEmpties) {$errors[] = $checkEmpties;}
        break;
      }
    }

    $rdios = [
          'can_sympt_bool',
          'can_sympt_diag_bool',
          'can_sympt_doc_time',
          'can_sympt_start_time',
          'can_sympt_prim_care_bool',
          'can_sympt_phys_val',
          'pain_area_img', 
          'privacy'
      ];
      foreach ($rdios as $item) {
        if ( array_key_exists($item, $params) ) {
            $errors[] = array('field' => $item,
            'message' => 'This is a required field, please select an answer.');
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

    $api_result = $this->callYerbaVerde("patadd/symptoms", $params);

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
