<?php

namespace YerbaVerde;

class conferenceapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "Conference";
  }

  function getUniqueName() {
    return "Conference";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/conference.php');
  }

  function hasPage() {
     return true;
  }

  function doSubmitProcess($params) {

    $api_result = $this->callYerbaVerde("verify/appointment", $params);

    var_dump($api_result);
    die();
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
