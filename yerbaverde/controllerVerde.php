<?php 

namespace YerbaVerde;
class controllerVerde {

//controllerVerde.php

const NAMESPACE_STRING = "YerbaVerde\\";
const SYSTEM_PAGE_KEY = "_yv_system_page";
const PAGE_SHORTCODE = "yv_page";
const REDIRECT_KEY = "gr_fwd";

private static $_instance;
private $_pages = array();
private $_page_ids = array();

function __construct() {
    add_action('wp_ajax_green_rec_form', array(&$this, 'doFormSubmit'));
    add_action('wp_ajax_nopriv_green_rec_form', array(&$this, 'doFormSubmit'));
    add_action('init', array(&$this, 'setYVPages'));
    add_shortcode("yv_page", array(&$this, 'doActionShortcode'));
    add_action('wp_enqueue_scripts', array(&$this, 'process_ajax'));
}


function process_ajax() {
  wp_enqueue_script('gr_ajax', GR_PLUGIN_URL.'js/grajax.js', 'jquery' ,null ,true);
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
      self::$_instance = new controllerVerde();
    }
    return self::$_instance;
  }

 /**
   * Determines process to perform on post data based on POST input criteria
   * @since 0.1
   * @author SCNEPTUNE
   */
  public function doFormSubmit() {
    if(!empty($_POST) && wp_verify_nonce($_POST['gr_wp_nonce'], 'green_rec_form_nonce')) {
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

  /**
   * Gets page permalink from system page registry
   * @since 0.1
   * @author SCNEPTUNE
   * @param string $name unique page name
   */
  static function getPageUrl($name, $redirect = false) {

    if(empty($name)) {
      return false;
    }

    $yv = controllerVerde::getInstance();
    $page_id = $yv->getPageId($name);
    if($page_id) {
      return get_permalink($page_id);
    } else {
      return false;
    }
  }
   public function getPluginPath() {
    return GR_PLUGIN_PATH;
  }

  public function getPageId($name) {
    if(isset($this->_page_ids[$name])) {
      return $this->_page_ids[$name];
    } else {
      return false;
    }
  }
  /**
    * Creates a system page and tags it with system meta values
    * @since 0.1
    * @author SCNEPTUNE
    * @param object $object action object
    */
  private function createSystemPage($object) {
    global $wpdb, $wp_rewrite;

    $pages = $wpdb->get_results("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '".self::SYSTEM_PAGE_KEY."' AND meta_value = '".$object->getUniqueName()."'", ARRAY_A);
    if(count($pages) == 0) {
      $post = array(
        'post_title' => $object->getDefaultTitle(),
        'slug' => $object->getUniqueName(),
        'post_status' => 'publish',
        'post_type' => 'page',
        'comment_status' => "closed",
        'visibility' => "public",
        'ping_status' => "closed",
        'post_category' => array(1),
        'post_content' => "[".self::PAGE_SHORTCODE." id=".$object->getUniqueName()."]"
      );
      $post_id = wp_insert_post($post);
      add_post_meta($post_id, self::SYSTEM_PAGE_KEY, $object->getUniqueName());
      $wp_rewrite->flush_rules();
    }
  }

    /**
    * Grabs system pages from database, caches result
    * @since 0.1
    * @author SCNEPTUNE
    */
  public function setYVPages() {
    global $wpdb;
    $result = wp_cache_get('yv_pages');
    if(false === $result) {
      $output = array(
        "by_id" => array(),
        "by_name" => array()
      );
      $db_results = $wpdb->get_results("SELECT meta_value, post_id FROM $wpdb->postmeta WHERE meta_key = '".self::SYSTEM_PAGE_KEY."'", ARRAY_A);
      foreach($db_results as $array) {
        $output["by_name"][$array['meta_value']] = $array["post_id"];
        $output["by_id"][$array['post_id']] = $array["meta_value"];
      }
      wp_cache_set('yv_pages', $output);
      $result = $output;
    }
    $this->_page_ids = $result["by_name"];
    $this->_pages = $output["by_id"];
  }
  
  function doActionShortcode($attrs) {
    if(isset($attrs['id'])) {
      $object = $this->getActionClassName($attrs['id']);
      return $object->getTemplate();
    }
  }

/**
* Create system pages upon activation
* @since 0.1
* @author SCNEPTUNE
*/
  public function doEnable() {
    foreach($this->getPluginActions() as $class_name) {
      $object = new $class_name;
      if($object->hasPage()) {
        $this->createSystemPage(new $class_name);
      }
    }
  }

    /**
    * Delete system pages upon disable
    * @since 0.1
    * @author SCNEPTUNE
    */
  public function doDisable() {
    global $wpdb;
    $pages = $wpdb->get_results("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '".self::SYSTEM_PAGE_KEY."'", ARRAY_A);
    if(!empty($pages)) {
      foreach($pages as $page) {
        delete_post_meta($page["post_id"], self::SYSTEM_PAGE_KEY);
        wp_delete_post($page["post_id"], true);
      }
    }
    wp_cache_delete("yv_pages");
  }

}
