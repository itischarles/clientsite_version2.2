<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-05-06 03:55:08 --> Severity: Error --> Call to undefined method Investment_model::getInvestmentDataById() /opt/lampp/htdocs/im-client-site/svn-v2.2/trunk/application/controllers/Application.php 72
ERROR - 2016-05-06 04:34:11 --> Severity: Notice --> Undefined property: stdClass::$investmentPercent /opt/lampp/htdocs/im-client-site/svn-v2.2/trunk/application/views/investment/investmentForm.php 56
ERROR - 2016-05-06 04:34:11 --> Severity: Error --> Call to undefined function form_number() /opt/lampp/htdocs/im-client-site/svn-v2.2/trunk/application/views/investment/investmentForm.php 61
ERROR - 2016-05-06 04:57:58 --> Query error: Unknown column 'investmentID' in 'where clause' - Invalid query: UPDATE `investment_intructions` SET `investmentTypeID` = NULL, `investmentPercent` = NULL, `investmentTargetDate` = '2016-05-24'
WHERE `applicationID` = '1'
AND `investmentID` = '1'
ERROR - 2016-05-06 04:58:32 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`client_site_v2.2`.`investment_intructions`, CONSTRAINT `fk_investment_intructions_1` FOREIGN KEY (`investmentTypeID`) REFERENCES `investment_type` (`investmentTypeID`) ON DELETE NO ACTION ON ) - Invalid query: UPDATE `investment_intructions` SET `investmentTypeID` = NULL, `investmentPercent` = NULL, `investmentTargetDate` = '2016-05-24'
WHERE `applicationID` = '1'
AND `investmentInstructionID` = '1'
ERROR - 2016-05-06 06:29:22 --> 404 Page Not Found: Client/asdf
ERROR - 2016-05-06 05:56:03 --> Severity: Error --> Call to undefined method Application_model::getClientByUserId() /opt/lampp/htdocs/im-client-site/svn-v2.2/trunk/application/controllers/Application.php 111
ERROR - 2016-05-06 06:00:21 --> Severity: Error --> Call to undefined method Application_model::getApplicationDataById() /opt/lampp/htdocs/im-client-site/svn-v2.2/trunk/application/controllers/Application.php 126
ERROR - 2016-05-06 10:12:28 --> 404 Page Not Found: Faviconico/index
