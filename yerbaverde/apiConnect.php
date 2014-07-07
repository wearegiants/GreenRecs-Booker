<?php 

//apiConnect.php

namespace YerbaVerde;
class apiCall {
	/**
	 *  Master call to Yerba Verde
	 * @author SCNEPTUNE 
	 * @param string $method method route name
	 * @param array $data array of form data
	 */
	public function callYerbaVerde($method, $data) {
		$sendItem = array();
		$sendItem['signature'] = hash_hmac('sha256', implode($data), $this->getTheSalt());
		$sendItem['sending_data'] = $data;

		$post = array( 'body' => $sendItem,
			'timeout'=> 500,
			'sslverify'=> 0);
		$endpoint = sprintf(GR_URL_API . '/%s', $method);
		$response = wp_remote_post($endpoint, $post);
		
		if (isset($response->errors)) {
			if($response->errors['http_request_failed']) {
				trigger_error($this->ErrorMessaging(), E_USER_NOTICE);
				return false;
			}
		}

		if( is_wp_error($response) || $response['response']['code' === 500] ){
			trigger_error($this->ErrorMessaging($response->errors), E_USER_NOTICE);
			return false;
		} else {
			$body = json_decode(trim($response['body']), true);
		}

		if (isset($body['type']) && $body['type'] == "error") {
			trigger_error($this->ErrorMessaging(), E_USER_NOTICE);
			return false;
		} else {
			if (!isset($body["status"])) {
				$body["status"] = -1;
			}
			return $body;
		}

	}
	//where our end point goes
	function getFormActionUrl() {
    		return admin_url('admin-ajax.php');
  	}
  	// get the salt value from env
	public function getTheSalt(){
		return CSRF_SALT;
	}
	//error message prefix template
	function ErrorMessaging($error) {
		return 'GreenRecs :' . $error;
	}
	function getPageUrl($page = false) {
	    return controllerVerde::getPageUrl($page);
	}
	//appends a nonce to our form fields.
	function getSubmitFields($action_name) {
    	$output = '<input type="hidden" name="action" value="gr_wp_nonce"><input type="hidden" name="method" value="'.$action_name.'">';
    	$output .= wp_nonce_field('gr_wp_nonce','green_rec_form_nonce', true, false);
    	return $output;
  	}

  	//simple json array formatter
  	 function echoJSONResponse($array) {
	    header('Content-Type: application/json');
	    echo json_encode($array);
	    die;
	  }





}