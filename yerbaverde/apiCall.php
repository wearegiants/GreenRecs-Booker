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
		$sendItem['signature'] = hash_hmac('sha256', implode(',',array_values($data)), $this->getTheSalt());
		$sendItem['sending_data'] = $data;

		$post = array( 'body' => $sendItem,
			'timeout'=> 500,
			'sslverify'=> 0);
		$endpoint = sprintf(GR_URL_API . '/%s', $method);
		$response = wp_remote_post($endpoint, $post);

		// var_dump($response);
		// die();
		if (isset($response->errors)) {
			if($response->errors['http_request_failed']) {
				trigger_error($this->ErrorMessaging(), E_USER_NOTICE);
				return false;
			}
		}

		if( is_wp_error($response) || $response['response']['code'] === 500 ){
			var_dump($response['body']);
			trigger_error($this->ErrorMessaging($response->errors), E_USER_NOTICE);
			return false;
		} else {
			$body = json_decode(trim($response['body']), true);
		}
		if (isset($body['type']) && $body['type'] == "error") {
			trigger_error($this->ErrorMessaging(), E_USER_NOTICE);
			return false;
		} else {
			if (is_array($body)) {
				if (!isset($body["status"])){
					$body["status"] = -1;
				}
				//go ahead code. 
			}
			return $body;
		}

	}
	public function booleanvalid ($value, $fieldname) {
		if (is_int($value) === false) {
			return array(
				"message" => "Please select a value ",
				"field"=> $fieldname
				);
		}
	}
	public function alphavalid($value, $fieldname) {
            if (!preg_match('/^[a-z .\-]+$/i', $value)) {
              return array(
                "message" => "This field can only contain alphabetic characters. ie. (A-Z).",
                "field" => $fieldname
              );
            } else if (strlen($value) < 2) {
              return array(
                "message" => "This field must be longer than 2 characters.",
                "field" => $fieldname
              );
            }
     }

     public function noempty($value, $fieldname) {
      if ( empty($value) ) {
        return array(
          "message" => "This is a required field and must be filled out to the best of your knowledge",
          "field" => $fieldname
          );
      } 
     }

     public function existingInfo($value, $fieldname, $type = 'chkDetail') {
     	$data = array($fieldname => $value);
     	$data[$type] = $type;
     	$api_check = $this->callYerbaVerde('check_exists', $data);
     	if (isset($api_check['doublecreation'])) {
     		return array(
     			"message" => "It appears we already have this information in our patient information. Please provide alternate information in this field or contact us.",
     			"field" => $fieldname
     		);
     	} else {
     		return false;
     	}
     }

    public function checkPID ($params) {
	     if (!isset($params['pid'])) {
	      return $this->echoJSONResponse(
	        array(
	          "status" => 2,
	          "cookieCheck" => false
	          )
	        );
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
	public function ErrorMessaging($error) {
		return json_encode(array('GreenRecsErrors' => $error));
	}
	public function getPageUrl($page = false) {
	    return controllerVerde::getPageUrl($page);
	}
	//appends a nonce to our form fields.
	public function getSubmitFields($action_name ) {
    	$output = '<input type="hidden" name="action" value="green_rec_form"><input type="hidden" name="method" value="'. $action_name .'">';
    	$output .= wp_nonce_field('green_rec_form_nonce', 'gr_wp_nonce', true, false);

    	return $output;
  	}

  	//simple json array formatter
  	public function echoJSONResponse($array) {
	    header('Content-Type: application/json');
	    echo json_encode($array);
	    die;
	  }





}