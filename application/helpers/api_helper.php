<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Admin Helper
* Author: Siddharth Pandey
* Author Email: sid@mobiwebtech.com
* Description: This file is auto loaded in this application and we can use all these functions globally in the application.
* version: 1.0
*/

/**
* check for required value in rest api
* @param Array $chk_params, $converted_array
* @return missed params
*/
if(!function_exists('check_required_value')) {
	function check_required_value($chk_params, $converted_array) {
        foreach ($chk_params as $param) {
            if (array_key_exists($param, $converted_array) && ($converted_array[$param] != '')) {
                $check_error = 0;
            } else {
                $check_error = array('check_error' => 1, 'param' => $param);
                break;
            }
        }
        return $check_error;
	}
}

if(!function_exists('check_request_type')) {
    function check_request_type($req) {
        if ($_SERVER['REQUEST_METHOD'] === $req) {
            return true;
        }else{
            echo json_encode(array('status' => false, 'error' => 'Invalid request type'));exit;
        }
    }
}

if(!function_exists('get_user_type_name')) {
    function get_user_type_name($type) {
        switch ($type) {
            case '2':
                return 'student';
                break;
            case '3':
                return 'agent';
                break;
            case '4':
                return 'trainer';
                break;
            case '5':
                return 'university';
                break;
            case '6':
                return 'frainchsee';
                break;                    
            default:
                return 'unknown';
                break;
        }
    }
}


?>