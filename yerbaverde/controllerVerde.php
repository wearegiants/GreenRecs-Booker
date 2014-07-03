<?php 

namespace YerbaVerde;
class controllerVerde {

//controllerVerde.php

const NAMESPACE_STRING = "YerbaVerde\\";

private static $_instance;

function __construct() {
    add_action('wp_ajax_green_rec_form', array(&$this, 'doFormSubmit'));
    add_action('wp_ajax_nopriv_green_rec_form', array(&$this, 'doFormSubmit'));
}


/**
    * Gets list of loaded actions that can be executed by this plugin, caches result
    * @since 0.0
    * @author SCNEPTUNE
    * @param object $object action object
    */
  public function getPluginActions() {
    $result = wp_cache_get('gr_actions');
    if(false === $result) {
      $output = array();
      foreach(get_declared_classes() as $class_name) {
        if(is_subclass_of($class_name, self::NAMESPACE_STRING."apiCall", true)) {
          $output[] = $class_name;
        }
      }
      wp_cache_set('gr_actions', $output);
      $result = $output;
    }
    return $result;
  }

  /**
    * Get Action class name
    * @since 0.1
    * @author SCNEPTUNE
    */
  public function getActionClassName($action) {
    $class_name = self::NAMESPACE_STRING.$action."apiCall";
    return new $class_name;
  }

  /**
   * Creates singleton instance
   * @since 0.0
   * @author SCNEPTUNE
   */
  static function getInstance() {
    if(is_null(self::$_instance)) {
      self::$_instance = new Plugin();
    }
    return self::$_instance;
  }

 /**
   * Determines process to perform on post data based on POST input criteria
   * @since 0.1
   * @author SCNEPTUNE
   */
  public function doFormSubmit() {
    if(!empty($_POST) && wp_verify_nonce($_POST['green_rec_form_nonce'], 'gr_wp_nonce')) {
      if(isset($_POST["method"])) {
        $object = $this->getActionClassName($_POST["method"]);
        if($object) {
          $object->doSubmitProcess($_POST["data"]);
          wp_redirect($_POST['_wp_http_referer']);
          die;
        } else {
          trigger_error(self::ERROR_PREFIX." : Action '".$_POST["action"]."' does not exist.");
        }
      } else {
        trigger_error(self::ERROR_PREFIX." : No form action set.");
      }
    } else {
      trigger_error(self::ERROR_PREFIX." : Form action does not exist.");
    }
    wp_redirect($_POST['_wp_http_referer']);
    die;
  }



   public function doEnable() {
    foreach($this->getPluginActions() as $class_name) {
      $object = new $class_name;

}
