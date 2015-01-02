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
    if (empty($params['can_sympt_treat'])) {
      $errors[] = array(
          "message" => "Please select atleast one condition from this section.",
          //silly hack for this 
          "field" => "can_sympt_treat]["
          );
    } else {
      $treatstr = "";
      foreach ($params['can_sympt_treat'] as $item) {
        if ($item == 'Other' && empty($params['can_sympt_treat_other'])) {
          $errors[] = array(
            "message" => "Please what other conditions you have sought to treat your problem.",
            "field" => "can_sympt_treat_other"
            );
        }
        $treatstr .= $item . " , ";

      }
      if (!empty($params['can_sympt_treat_other'])) {
        $treatstr .= $params['can_sympt_treat_other'];
      } else {
        unset($params['can_sympt_treat_other']);
      }
      unset($params['can_sympt_treat']);
      $params['can_sympt_treat'] = $treatstr;

    }
    
    foreach ($params as $key => $value) {
      $checkEmpties = $this->noempty($value, $key);
      if ($checkEmpties) {$errors[] = $checkEmpties;}
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
    var_dump($params); die();

$redirect = (isset($params['redirect']) ? $params['redirect'] : '');
    $api_result = $this->callYerbaVerde("patadd/symptoms", $final_params);

 $this->echoJSONResponse(
      array(
        "status" => 0,
        "message" => "Successfully submitted a schedule time",
        "msgtype" => "global",
        "redirect" => $redirect,
        "appt_cookie" => $final_params['appointment_hash']
      )
    );

  }
}
