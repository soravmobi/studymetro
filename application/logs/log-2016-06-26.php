<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-06-26 13:34:27 --> Severity: Parsing Error --> syntax error, unexpected ''include_group_on_user_homepag' (T_CONSTANT_ENCAPSED_STRING), expecting ')' /opt/lampp/htdocs/church-cms/application/helpers/group_helper.php 118
ERROR - 2016-06-26 13:37:49 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /opt/lampp/htdocs/church-cms/application/helpers/common_helper.php:42) /opt/lampp/htdocs/church-cms/system/core/Common.php 573
ERROR - 2016-06-26 13:54:55 --> Severity: Notice --> Array to string conversion /opt/lampp/htdocs/church-cms/system/database/DB_driver.php 1524
ERROR - 2016-06-26 13:54:55 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: UPDATE `groups_assignment` SET `assignment_value` = Array
WHERE `user_id` = '7'
AND `group_id` = '10'
AND `assignment_key` =0
