<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/* Custom contant */
define('MEDIA_PICTURE','jpg,jpeg,png,gif');

define('MEDIA_FILE','pdf,doc,docx');

define('ADMIN_URL','superadmin/');

define('EMPLOYER_URL','employer/');

define('EMPLOYEE_URL','employee/');

define('TABLE_BLOG_TAG','hs_blog_tag');
define('TABLE_BLOG_CATEGORY','hs_blog_category');
define('TABLE_BLOG','hs_blog_management');
define('TABLE_BLOG_CAT_OPTION','hs_blog_category_option');
define('TABLE_BLOG_TAG_OPTION','hs_blog_tag_option');
define('TABLE_MEMBER_PLAN','hs_member_plans');
define('TABLE_TESTIMONIAL','hs_testimonial');
define('TABLE_SUPER_ADMINL','hs_super_admin');
define('TABLE_USERS','hs_users');
define('TABLE_TRANSACTION_HISTORY','hs_transaction_history');
define('TABLE_EMPLOYER_ENQUIRY','hs_employer_enquiry');
define('TABLE_NOTIFICATION','hs_notification');
define('TABLE_SETTINGS','hs_settings');
define('TABLE_EMPLOYER_DEPARTMENT','hs_employer_department');
define('TABLE_EMPLOYER_DESIGNATION','hs_employer_desination');
define('TABLE_USERS_EMPLOYER','hs_users_employer');

define('TABLE_COUNTRIES','hs_countries');
define('TABLE_STATES','hs_states');
define('TABLE_CITIES','hs_cities');
define('TABLE_HOLIDAY','hs_employer_holiday');
define('TABLE_EVENTS','hs_employer_event');
define('TABLE_LEAVE_TYPE','hs_employer_leave_type_management');
define('TABLE_LEAVE_TRACKING','hs_employee_leave_tracking');
define('TABLE_EMPLOYEE_ATTENDANCE','hs_employee_attendance');
define('TABLE_EMPLOYER_PROJECT','hs_employer_project');
define('TABLE_PROJECT_TECHNOLOGY','hs_project_technology');
define('TABLE_EMPLOYER_PROJECT_TEAM','hs_employer_project_team');
define('TABLE_BLOG_RSS','hs_blog_rss');
define('TABLE_BLOG_RSS_OPTION','hs_blog_rss_option');
define('TABLE_EMPLOYEE_FORM_PDF','hs_employee_form_pdf');