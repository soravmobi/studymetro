<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-09-29 14:37:07 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:37:07 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:37:07 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:37:07 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:37:07 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:37:07 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:37:07 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:37:07 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:38:11 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:38:11 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:38:11 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:38:11 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:38:11 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:38:11 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:38:11 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:38:11 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:38:11 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:38:11 --> Severity: Notice --> Undefined index: university /opt/lampp/htdocs/study_metro/application/modules/admin/views/programs/view-all-programs.php 56
ERROR - 2016-09-29 14:46:04 --> Query error: Column 'program_name' cannot be null - Invalid query: INSERT INTO `programs` (`university_id`, `program_name`, `location`, `course_type`, `ielts_toefl_pte`, `esl_program`, `gre_sat`, `application_fee`, `criteria`, `intake_date`, `bank_statement`, `duration`, `tution_fee`, `university_scholarship`, `website_lnik`, `study_metro_scholarship`, `country`, `added_date`) VALUES ('141', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 'Canada', '2016-09-29 14:46:04')
ERROR - 2016-09-29 14:59:25 --> Query error: Undeclared variable: USA - Invalid query:  SELECT * FROM `universities` WHERE `country` LIKE 'USA' LIMIT USA OFFSET  32
ERROR - 2016-09-29 15:38:37 --> Severity: Error --> Cannot use object of type stdClass as array /opt/lampp/htdocs/study_metro/application/modules/front/controllers/Home.php 67
ERROR - 2016-09-29 16:12:09 --> Severity: Warning --> Missing argument 4 for Common_model::getAllRecordsOrderById(), called in /opt/lampp/htdocs/study_metro/application/helpers/front_helper.php on line 127 and defined /opt/lampp/htdocs/study_metro/application/models/Common_model.php 36
ERROR - 2016-09-29 16:12:09 --> Severity: Notice --> Undefined variable: conditions /opt/lampp/htdocs/study_metro/application/models/Common_model.php 42
ERROR - 2016-09-29 16:12:09 --> Severity: Warning --> Missing argument 4 for Common_model::getAllRecordsOrderById(), called in /opt/lampp/htdocs/study_metro/application/helpers/front_helper.php on line 127 and defined /opt/lampp/htdocs/study_metro/application/models/Common_model.php 36
ERROR - 2016-09-29 16:12:09 --> Severity: Notice --> Undefined variable: conditions /opt/lampp/htdocs/study_metro/application/models/Common_model.php 42
ERROR - 2016-09-29 19:13:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '')
FROM `universities`
WHERE `universities`.`country` = 'Canada'' at line 1 - Invalid query: SELECT DISTINCT *, ( select COUNT(programs.university_id) as total_programs_1 from programs where products.university_id=universities.id) as total_programs_2')
FROM `universities`
WHERE `universities`.`country` = 'Canada'
ERROR - 2016-09-29 19:14:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
FROM `universities`
WHERE `universities`.`country` = 'Canada'' at line 1 - Invalid query: SELECT DISTINCT *, ( select COUNT(programs.university_id) as total_programs_1 from programs where products.university_id=universities.id) as total_programs_2)
FROM `universities`
WHERE `universities`.`country` = 'Canada'
ERROR - 2016-09-29 19:14:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '')
FROM `universities`
WHERE `universities`.`country` = 'Canada'' at line 1 - Invalid query: SELECT DISTINCT *, ( select COUNT(programs.university_id) as total_programs_1 from programs where products.university_id=universities.id) as total_programs_2')
FROM `universities`
WHERE `universities`.`country` = 'Canada'
ERROR - 2016-09-29 19:16:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
FROM `universities`
WHERE `universities`.`country` = 'Canada'' at line 1 - Invalid query: SELECT DISTINCT *, ( select COUNT(programs.university_id) as total_programs_1 from programs where products.university_id=universities.id) as total_programs_2)
FROM `universities`
WHERE `universities`.`country` = 'Canada'
ERROR - 2016-09-29 19:19:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
FROM `universities`
WHERE `universities`.`country` = 'Canada'' at line 1 - Invalid query: SELECT DISTINCT *, ( select COUNT(programs.university_id) as total_programs from programs where programs.university_id=universities.id) as total_programs)
FROM `universities`
WHERE `universities`.`country` = 'Canada'
