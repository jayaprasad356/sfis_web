<?php
session_start();

// set time for session timeout
$currentTime = time() + 25200;
$expired = 3600;

// if session not set go to login page
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

// if current time is more than session timeout back to login page
if ($currentTime > $_SESSION['timeout']) {
    session_destroy();
    header("location:index.php");
}

// destroy previous session timeout and create new one
unset($_SESSION['timeout']);
$_SESSION['timeout'] = $currentTime + $expired;

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


include_once('../includes/custom-functions.php');
$fn = new custom_functions;
include_once('../includes/crud.php');
include_once('../includes/variables.php');
$db = new Database();
$db->connect();

if (isset($config['system_timezone']) && isset($config['system_timezone_gmt'])) {
    date_default_timezone_set($config['system_timezone']);
    $db->sql("SET `time_zone` = '" . $config['system_timezone_gmt'] . "'");
} else {
    date_default_timezone_set('Asia/Kolkata');
    $db->sql("SET `time_zone` = '+05:30'");
}
if (isset($_GET['table']) && $_GET['table'] == 'users') {
    $offset = 0;
    $limit = 10;
    $where = '';
    $sort = 'id';
    $order = 'DESC';
    if (isset($_GET['offset']))
        $offset = $db->escapeString($fn->xss_clean($_GET['offset']));
    if (isset($_GET['limit']))
        $limit = $db->escapeString($fn->xss_clean($_GET['limit']));

    if (isset($_GET['sort']))
        $sort = $db->escapeString($fn->xss_clean($_GET['sort']));
    if (isset($_GET['order']))
        $order = $db->escapeString($fn->xss_clean($_GET['order']));

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $db->escapeString($fn->xss_clean($_GET['search']));
        $where .= "WHERE id like '%" . $search . "%' OR email like '%" . $search . "%' OR first_name like '%" . $search . "%' OR mobile like '%" . $search . "%' OR joined_date like '%" . $search . "%' OR pincode like '%" . $search . "%' OR state like '%" . $search . "%'";
    }
    if (isset($_GET['sort'])){
        $sort = $db->escapeString($_GET['sort']);

    }
    if (isset($_GET['order'])){
        $order = $db->escapeString($_GET['order']);

    }        
    $sql = "SELECT COUNT(`id`) as total FROM `users`" . $where;
    $db->sql($sql);
    $res = $db->getResult();
    foreach ($res as $row)
        $total = $row['total'];

    $sql = "SELECT * FROM users ". $where ." ORDER BY " . $sort . " " . $order . " LIMIT " . $offset . "," . $limit;
    $db->sql($sql);
    $res = $db->getResult();

    $bulkData = array();
    $bulkData['total'] = $total;

    $rows = array();
    $tempRow = array();
    foreach ($res as $row) {
    
        $tempRow['id'] = $row['id'];
        $tempRow['first_name'] = $row['first_name'];
        $tempRow['mobile'] = $row['mobile'];
        $tempRow['email'] = $row['email'];
        $tempRow['city'] = $row['city'];
        $tempRow['pincode'] = $row['pincode'];
        $tempRow['state'] = $row['state'];
        $tempRow['referred_by'] = $row['referred_by'];
        $tempRow['joined_date'] = $row['joined_date'];
        $rows[] = $tempRow;
        }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));
}

//vehicle details table goes here
if (isset($_GET['table']) && $_GET['table'] == 'vehicle_details') {
    $offset = 0;
    $limit = 10;
    $where = '';
    $sort = 'id';
    $order = 'DESC';
    if (isset($_GET['offset']))
        $offset = $db->escapeString($fn->xss_clean($_GET['offset']));
    if (isset($_GET['limit']))
        $limit = $db->escapeString($fn->xss_clean($_GET['limit']));

    if (isset($_GET['sort']))
        $sort = $db->escapeString($fn->xss_clean($_GET['sort']));
    if (isset($_GET['order']))
        $order = $db->escapeString($fn->xss_clean($_GET['order']));

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $db->escapeString($fn->xss_clean($_GET['search']));
        $where .= "WHERE id like '%" . $search . "%' OR registration_number like '%" . $search . "%' OR permanent_address like '%" . $search . "%' OR owner_mobile_no like '%" . $search . "%' OR manufacturer like '%" . $search . "%' OR manufacturer_model like '%" . $search . "%'";
    }
    if (isset($_GET['sort'])){
        $sort = $db->escapeString($_GET['sort']);

    }
    if (isset($_GET['order'])){
        $order = $db->escapeString($_GET['order']);

    }        
    $sql = "SELECT COUNT(`id`) as total FROM `vehicle_details`" . $where;
    $db->sql($sql);
    $res = $db->getResult();
    foreach ($res as $row)
        $total = $row['total'];

    $sql = "SELECT * FROM vehicle_details ". $where ." ORDER BY " . $sort . " " . $order . " LIMIT " . $offset . "," . $limit;
    $db->sql($sql);
    $res = $db->getResult();

    $bulkData = array();
    $bulkData['total'] = $total;

    $rows = array();
    $tempRow = array();
    foreach ($res as $row) {
    
        $tempRow['id'] = $row['id'];
        $tempRow['registration_number'] = $row['registration_number'];
        $tempRow['rc_status'] = $row['rc_status'];
        $tempRow['chassis_number'] = $row['chassis_number'];
        $tempRow['engine_number'] = $row['engine_number'];
        $tempRow['owner_name'] = $row['owner_name'];
        $tempRow['father_name'] = $row['father_name'];
        $tempRow['registration_date'] = $row['registration_date'];
        $tempRow['fuel_type'] = $row['fuel_type'];
        $tempRow['norms_type'] = $row['norms_type'];
        $tempRow['vehicle_category'] = $row['vehicle_category'];
        $tempRow['vehicle_class'] = $row['vehicle_class'];
        $tempRow['number_of_cylinder'] = $row['number_of_cylinder'];
        $tempRow['owner_serial_number'] = $row['owner_serial_number'];
        $tempRow['standing_capacity'] = $row['standing_capacity'];
        $tempRow['sleeper_capacity'] = $row['sleeper_capacity'];
        $tempRow['body_type'] = $row['body_type'];
        $tempRow['owner_mobile_no'] = $row['owner_mobile_no'];
        $tempRow['ownership'] = $row['ownership'];
        $tempRow['colour'] = $row['colour'];
        $tempRow['manufacturer'] = $row['manufacturer'];
        $tempRow['manufacturer_model'] = $row['manufacturer_model'];
        $tempRow['seating_capacity'] = $row['seating_capacity'];
        $tempRow['insurance_policy_no'] = $row['insurance_policy_no'];
        $tempRow['insurance_company_name'] = $row['insurance_company_name'];
        $tempRow['insurance_validity'] = $row['insurance_validity'];
        $tempRow['financer'] = $row['financer'];
        $tempRow['puc_number'] = $row['puc_number'];
        $tempRow['puc_valid_upto'] = $row['puc_valid_upto'];
        $tempRow['current_address'] = $row['current_address'];
        $tempRow['permanent_address'] = $row['permanent_address'];
        $tempRow['rc_registration_location'] = $row['rc_registration_location'];
        $tempRow['manufacturingYear'] = $row['manufacturingYear'];
        $tempRow['unladden_weight'] = $row['unladden_weight'];
        $tempRow['wheelbase'] = $row['wheelbase'];
        $tempRow['gross_vehicle_weight'] = $row['gross_vehicle_weight'];
        $tempRow['blacklist_status'] = $row['blacklist_status'];
        $tempRow['fitness_upto'] = $row['fitness_upto'];
        $tempRow['mv_tax_upto'] = $row['mv_tax_upto'];
        $tempRow['permit_type'] = $row['permit_type'];
        $tempRow['permit_no'] = $row['permit_no'];
        $tempRow['permit_validity_upto'] = $row['permit_validity_upto'];
        $tempRow['npermit_no'] = $row['permit_no'];
        $tempRow['npermit_upto'] = $row['permit_no'];
        $tempRow['npermit_issued_by'] = $row['permit_no'];
        $tempRow['noc_valid_upto'] = $row['permit_no'];
        $tempRow['noc_details'] = $row['permit_no'];
        $tempRow['noc_status'] = $row['permit_no'];
        $tempRow['noc_issue_date'] = $row['permit_no'];
        $rows[] = $tempRow;
        }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));
}


$db->disconnect();
