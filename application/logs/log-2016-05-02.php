<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-05-02 13:00:32 --> Severity: Error --> Class 'Auth_model' not found /opt/lampp/htdocs/im-client-site/v4/application/controllers/Users.php 24
ERROR - 2016-05-02 13:01:20 --> Severity: Error --> Class 'Auth_model' not found /opt/lampp/htdocs/im-client-site/v4/application/controllers/Users.php 24
ERROR - 2016-05-02 14:03:56 --> Severity: Error --> Class 'Authorisation_model' not found /opt/lampp/htdocs/im-client-site/v4/application/libraries/authorisation/Authorisation_lib.php 8
ERROR - 2016-05-02 14:04:16 --> Severity: Error --> Class 'CI_Model' not found /opt/lampp/htdocs/im-client-site/v4/application/models/authorisation/Authorisation_model.php 14
ERROR - 2016-05-02 14:05:45 --> Severity: Error --> Class 'CI_Model' not found /opt/lampp/htdocs/im-client-site/v4/application/models/authorisation/Authorisation_model.php 14
ERROR - 2016-05-02 14:05:47 --> Severity: Error --> Class 'CI_Model' not found /opt/lampp/htdocs/im-client-site/v4/application/models/authorisation/Authorisation_model.php 14
ERROR - 2016-05-02 14:05:59 --> Severity: Error --> Class 'CI_Model' not found /opt/lampp/htdocs/im-client-site/v4/application/libraries/authorisation/Authorisation_lib.php 8
ERROR - 2016-05-02 14:06:38 --> Severity: Error --> Class 'CI_Model' not found /opt/lampp/htdocs/im-client-site/v4/application/libraries/authorisation/Authorisation_lib.php 8
ERROR - 2016-05-02 13:09:44 --> Severity: Error --> Class 'Authorisation_lib' not found /opt/lampp/htdocs/im-client-site/v4/application/views/templates/navbar.php 2
ERROR - 2016-05-02 14:10:25 --> Severity: Error --> Cannot access parent:: when current class scope has no parent /opt/lampp/htdocs/im-client-site/v4/application/libraries/authorisation/Authorisation_lib.php 13
ERROR - 2016-05-02 14:10:56 --> Severity: Error --> Class 'CI_Model' not found /opt/lampp/htdocs/im-client-site/v4/application/models/authorisation/Authorisation_model.php 14
ERROR - 2016-05-02 14:14:55 --> Unable to load the requested class: Authorisation_model
ERROR - 2016-05-02 13:28:36 --> Severity: Error --> Class 'Auth_model' not found /opt/lampp/htdocs/im-client-site/v4/application/controllers/Dashboard.php 46
ERROR - 2016-05-02 14:54:53 --> 404 Page Not Found: User/client
ERROR - 2016-05-02 14:07:44 --> Query error: Not unique table/alias: 'clients' - Invalid query: SELECT *
FROM `auth_user_role`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
JOIN `auth_roles` ON `auth_user_role`.`roleID`=`auth_roles`.`roleID`
WHERE `auth_user_role`.`userID` = '1'
ERROR - 2016-05-02 15:09:22 --> 404 Page Not Found: Search-users/index
ERROR - 2016-05-02 15:09:25 --> 404 Page Not Found: Search-users/index
ERROR - 2016-05-02 14:10:04 --> Query error: Not unique table/alias: 'clients' - Invalid query: SELECT *
FROM `auth_user_role`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
JOIN `auth_roles` ON `auth_user_role`.`roleID`=`auth_roles`.`roleID`
WHERE `auth_user_role`.`userID` = '1'
ERROR - 2016-05-02 14:14:49 --> Query error: Not unique table/alias: 'clients' - Invalid query: SELECT *
FROM `auth_user_role`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
JOIN `auth_roles` ON `auth_user_role`.`roleID`=`auth_roles`.`roleID`
WHERE `auth_user_role`.`userID` = '1'
ERROR - 2016-05-02 14:15:22 --> Query error: Not unique table/alias: 'clients' - Invalid query: SELECT *
FROM `auth_user_role`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
JOIN `auth_roles` ON `auth_user_role`.`roleID`=`auth_roles`.`roleID`
WHERE `auth_user_role`.`userID` = '1'
ERROR - 2016-05-02 14:16:37 --> Query error: Unknown column 'users.userID' in 'on clause' - Invalid query: SELECT *
FROM `auth_user_role`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
JOIN `auth_roles` ON `auth_user_role`.`roleID`=`auth_roles`.`roleID`
WHERE `auth_user_role`.`userID` = '1'
ERROR - 2016-05-02 14:17:39 --> Query error: Not unique table/alias: 'clients' - Invalid query: SELECT *
FROM `auth_user_role`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
JOIN `auth_roles` ON `auth_user_role`.`roleID`=`auth_roles`.`roleID`
WHERE `auth_user_role`.`userID` = '1'
ERROR - 2016-05-02 14:23:14 --> Severity: Error --> Call to undefined method CI_Loader::libriary() /opt/lampp/htdocs/im-client-site/v4/application/views/templates/navbar.php 2
ERROR - 2016-05-02 14:23:56 --> Query error: Not unique table/alias: 'clients' - Invalid query: SELECT *
FROM `auth_user_role`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
JOIN `auth_roles` ON `auth_user_role`.`roleID`=`auth_roles`.`roleID`
WHERE `auth_user_role`.`userID` = '1'
ERROR - 2016-05-02 14:29:11 --> Query error: Not unique table/alias: 'clients' - Invalid query: SELECT *
FROM `auth_user_role`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
JOIN `auth_roles` ON `auth_user_role`.`roleID`=`auth_roles`.`roleID`
WHERE `auth_user_role`.`userID` = '1'
ERROR - 2016-05-02 14:29:20 --> Severity: Notice --> Undefined property: Authorisation_lib::$authorisation_accessor /opt/lampp/htdocs/im-client-site/v4/application/views/templates/navbar.php 4
ERROR - 2016-05-02 14:29:20 --> Severity: Error --> Call to a member function hasPrivilege() on null /opt/lampp/htdocs/im-client-site/v4/application/views/templates/navbar.php 4
ERROR - 2016-05-02 14:32:24 --> Query error: Not unique table/alias: 'clients' - Invalid query: SELECT *
FROM `auth_user_role`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
JOIN `auth_roles` ON `auth_user_role`.`roleID`=`auth_roles`.`roleID`
WHERE `auth_user_role`.`userID` = '1'
ERROR - 2016-05-02 15:32:45 --> 404 Page Not Found: Upload-document/index
ERROR - 2016-05-02 14:32:56 --> Query error: Not unique table/alias: 'clients' - Invalid query: SELECT *
FROM `auth_user_role`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
LEFT JOIN `clients` ON `clients`.`userID` = `users`.`userID`
JOIN `auth_roles` ON `auth_user_role`.`roleID`=`auth_roles`.`roleID`
WHERE `auth_user_role`.`userID` = '1'
ERROR - 2016-05-02 15:35:12 --> 404 Page Not Found: Search-users/index
ERROR - 2016-05-02 15:37:32 --> 404 Page Not Found: Upload-document/index
ERROR - 2016-05-02 15:45:19 --> Severity: error --> Exception: Unable to locate the model you have specified: Client_model /opt/lampp/htdocs/im-client-site/v4/system/core/Loader.php 314
ERROR - 2016-05-02 15:47:27 --> 404 Page Not Found: Client/client
ERROR - 2016-05-02 15:48:32 --> 404 Page Not Found: Client/client
ERROR - 2016-05-02 15:48:38 --> 404 Page Not Found: Client/asdf
ERROR - 2016-05-02 15:49:55 --> 404 Page Not Found: Client/asdf
ERROR - 2016-05-02 16:03:23 --> 404 Page Not Found: Client/asdf
ERROR - 2016-05-02 16:12:36 --> Severity: Notice --> Undefined offset: 5 /opt/lampp/htdocs/im-client-site/v4/application/config/routes.php 84
ERROR - 2016-05-02 16:13:59 --> Severity: Notice --> Undefined offset: 5 /opt/lampp/htdocs/im-client-site/v4/application/config/routes.php 84
ERROR - 2016-05-02 16:14:43 --> Severity: Notice --> Undefined offset: 5 /opt/lampp/htdocs/im-client-site/v4/application/config/routes.php 84
ERROR - 2016-05-02 16:15:05 --> Severity: Notice --> Undefined offset: 5 /opt/lampp/htdocs/im-client-site/v4/application/config/routes.php 84
ERROR - 2016-05-02 16:15:51 --> Severity: Notice --> Undefined offset: 5 /opt/lampp/htdocs/im-client-site/v4/application/config/routes.php 84
ERROR - 2016-05-02 15:44:52 --> Severity: error --> Exception: Unable to locate the model you have specified: Application_model /opt/lampp/htdocs/im-client-site/v4/system/core/Loader.php 314
ERROR - 2016-05-02 15:45:59 --> Severity: Notice --> Undefined variable: type /opt/lampp/htdocs/im-client-site/v4/application/controllers/Application.php 93
ERROR - 2016-05-02 15:45:59 --> Severity: Error --> Call to undefined method User_Model::addNewApplication() /opt/lampp/htdocs/im-client-site/v4/application/controllers/Application.php 95
ERROR - 2016-05-02 16:47:27 --> Severity: Parsing Error --> syntax error, unexpected '(', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' /opt/lampp/htdocs/im-client-site/v4/application/controllers/Application.php 95
ERROR - 2016-05-02 15:47:55 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`client_site_v1_2`.`applications`, CONSTRAINT `fk_applications_clients1` FOREIGN KEY (`clientID`) REFERENCES `clients` (`clientID`) ON DELETE NO ACTION ON UPDATE NO ACTION) - Invalid query: INSERT INTO `applications` (`applicationReference`, `application_date`, `applicationType`) VALUES (24191, '2016-05-02 15:47:55', 'sipp')
ERROR - 2016-05-02 15:49:01 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`client_site_v1_2`.`applications`, CONSTRAINT `fk_applications_clients1` FOREIGN KEY (`clientID`) REFERENCES `clients` (`clientID`) ON DELETE NO ACTION ON UPDATE NO ACTION) - Invalid query: INSERT INTO `applications` (`applicationReference`, `application_date`, `applicationType`) VALUES (29706, '2016-05-02 15:49:01', 'sipp')
ERROR - 2016-05-02 16:49:51 --> Severity: Parsing Error --> syntax error, unexpected '}', expecting ',' or ';' /opt/lampp/htdocs/im-client-site/v4/application/controllers/Application.php 58
ERROR - 2016-05-02 15:58:54 --> Severity: Notice --> Undefined variable: applicationDetails /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 14
ERROR - 2016-05-02 15:58:54 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 14
ERROR - 2016-05-02 15:58:54 --> Severity: Notice --> Undefined variable: app_id /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 24
ERROR - 2016-05-02 15:58:54 --> Severity: Notice --> Undefined variable: transfer /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 26
ERROR - 2016-05-02 15:58:54 --> Severity: Notice --> Undefined variable: app_id /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 33
ERROR - 2016-05-02 15:58:54 --> Severity: Notice --> Undefined variable: contribution /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 35
ERROR - 2016-05-02 15:58:54 --> Severity: Notice --> Undefined variable: app_id /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 48
ERROR - 2016-05-02 15:58:54 --> Severity: Notice --> Undefined variable: investment /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 50
ERROR - 2016-05-02 16:01:24 --> Severity: Notice --> Undefined variable: clientID /opt/lampp/htdocs/im-client-site/v4/application/controllers/Application.php 57
ERROR - 2016-05-02 16:01:24 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 14
ERROR - 2016-05-02 16:01:24 --> Severity: Notice --> Undefined variable: app_id /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 24
ERROR - 2016-05-02 16:01:24 --> Severity: Notice --> Undefined variable: transfer /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 26
ERROR - 2016-05-02 16:01:24 --> Severity: Notice --> Undefined variable: app_id /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 33
ERROR - 2016-05-02 16:01:24 --> Severity: Notice --> Undefined variable: contribution /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 35
ERROR - 2016-05-02 16:01:24 --> Severity: Notice --> Undefined variable: app_id /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 48
ERROR - 2016-05-02 16:01:24 --> Severity: Notice --> Undefined variable: investment /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 50
ERROR - 2016-05-02 16:11:39 --> Severity: Notice --> Undefined variable: clientID /opt/lampp/htdocs/im-client-site/v4/application/controllers/Application.php 57
ERROR - 2016-05-02 16:11:39 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 14
ERROR - 2016-05-02 16:11:39 --> Severity: Notice --> Undefined variable: app_id /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 24
ERROR - 2016-05-02 16:11:39 --> Severity: Notice --> Undefined variable: transfer /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 26
ERROR - 2016-05-02 16:11:39 --> Severity: Notice --> Undefined variable: app_id /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 33
ERROR - 2016-05-02 16:11:39 --> Severity: Notice --> Undefined variable: contribution /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 35
ERROR - 2016-05-02 16:11:39 --> Severity: Notice --> Undefined variable: app_id /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 48
ERROR - 2016-05-02 16:11:39 --> Severity: Notice --> Undefined variable: investment /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 50
ERROR - 2016-05-02 16:12:32 --> Severity: Notice --> Undefined variable: clientID /opt/lampp/htdocs/im-client-site/v4/application/controllers/Application.php 57
ERROR - 2016-05-02 16:12:32 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 14
ERROR - 2016-05-02 16:12:32 --> Severity: Notice --> Undefined variable: transfer /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 26
ERROR - 2016-05-02 16:12:32 --> Severity: Notice --> Undefined variable: contribution /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 35
ERROR - 2016-05-02 16:12:32 --> Severity: Notice --> Undefined variable: investment /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 50
ERROR - 2016-05-02 16:13:28 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 14
ERROR - 2016-05-02 16:13:28 --> Severity: Notice --> Undefined variable: transfer /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 26
ERROR - 2016-05-02 16:13:28 --> Severity: Notice --> Undefined variable: contribution /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 35
ERROR - 2016-05-02 16:13:28 --> Severity: Notice --> Undefined variable: investment /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 50
ERROR - 2016-05-02 16:18:19 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 14
ERROR - 2016-05-02 16:18:19 --> Severity: Notice --> Undefined variable: transfer /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 26
ERROR - 2016-05-02 16:18:19 --> Severity: Notice --> Undefined variable: contribution /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 35
ERROR - 2016-05-02 16:18:19 --> Severity: Notice --> Undefined variable: investment /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 50
ERROR - 2016-05-02 16:24:06 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 14
ERROR - 2016-05-02 16:24:06 --> Severity: Notice --> Undefined variable: transfer /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 26
ERROR - 2016-05-02 16:24:06 --> Severity: Notice --> Undefined variable: contribution /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 35
ERROR - 2016-05-02 16:24:06 --> Severity: Notice --> Undefined variable: investment /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 50
ERROR - 2016-05-02 16:26:45 --> Severity: Notice --> Undefined variable: app_id /opt/lampp/htdocs/im-client-site/v4/application/controllers/Application.php 73
ERROR - 2016-05-02 16:26:45 --> Severity: Notice --> Undefined variable: app_id /opt/lampp/htdocs/im-client-site/v4/application/controllers/Application.php 75
ERROR - 2016-05-02 16:26:45 --> Severity: Notice --> Undefined variable: app_id /opt/lampp/htdocs/im-client-site/v4/application/controllers/Application.php 77
ERROR - 2016-05-02 16:26:45 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 14
ERROR - 2016-05-02 16:27:47 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 14
ERROR - 2016-05-02 16:28:46 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/im-client-site/v4/application/views/application/overview.php 14
