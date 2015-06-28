<?php

namespace YerbaVerde;

class thankYouapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {
    return "Thank You";
  }

  function getUniqueName() {
    return "thankYou";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/thankYou.php');
  }

  function hasPage() {
    return true;
  }

  function doSubmitProcess($params) {
  }
}