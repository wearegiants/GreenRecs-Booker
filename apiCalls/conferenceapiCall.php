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

    $api_result = $this->callYerbaVerde("verify/appointment", $params);


      $this->echoJSONResponse(
            array(
              "status" => $api_result['status'],
              "msgtype" => "global",
              'session_hash' => hash_hmac('sha256', mt_rand(0, 100), $this->getTheSalt()),
              "pid" => $api_result['id'],
              "redirect" => $redirect
            )
          );

    }
}
