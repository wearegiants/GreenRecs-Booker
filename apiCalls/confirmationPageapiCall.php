<?php

namespace YerbaVerde;

class confirmationPageapiCall extends apiCall implements apiCallProperties {

  function getDefaultTitle() {}

  function getUniqueName() {
    return "confirmationPage";
  }

  function getTemplate() {
    include_once(GR_PLUGIN_PATH . '/templates/confirmationPage.php');
  }

  function hasPage() {
     return true;
  }


  function doSubmitProcess($params) {
  }
    
}
