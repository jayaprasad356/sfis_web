<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once('../includes/crud.php');

$db = new Database();
$db->connect();


if (empty($_POST['first_name'])) {
    $response['success'] = false;
    $response['message'] = "First Name is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['mobile'])) {
    $response['success'] = false;
    $response['message'] = "Mobile is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['email'])) {
    $response['success'] = false;
    $response['message'] = "Email Id is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['city'])) {
    $response['success'] = false;
    $response['message'] = "City is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['pincode'])) {
    $response['success'] = false;
    $response['message'] = "Pincode is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['state'])) {
    $response['success'] = false;
    $response['message'] = "State is Empty";
    print_r(json_encode($response));
    return false;
}


$first_name = $db->escapeString($_POST['first_name']);
$last_name = $db->escapeString($_POST['last_name']);
$mobile = $db->escapeString($_POST['mobile']);
$email = $db->escapeString($_POST['email']);
$city = $db->escapeString($_POST['city']);
$pincode = $db->escapeString($_POST['pincode']);
$state = $db->escapeString($_POST['state']);
$mobile = $db->escapeString($_POST['mobile']);
$referred_by = (isset($_POST['referred_by']) && !empty($_POST['referred_by'])) ? $db->escapeString($_POST['referred_by']) : "";
$sql = "SELECT * FROM users WHERE mobile = '$mobile'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num >= 1){
    $response['success'] = false;
    $response['message'] = "Mobile number Already Registered";
    print_r(json_encode($response));
}
else{
    do {
        $random_number = mt_rand(10000,99999);
        $sql = "SELECT * FROM users WHERE refer_code = $random_number";
        $db->sql($sql);
        $res = $db->getResult();
        if(!$res) {
            break;
        }
    } while(1);
    if(empty($referred_by)){
        $refer_code = MAIN_REFER . $random_number;

    }
    else{
        $admincode = substr($referred_by, 0, -5);
        $sql = "SELECT refer_code FROM admin WHERE refer_code='$admincode' OR refer_code='$referred_by'";
        $db->sql($sql);
        $result = $db->getResult();
        $num = $db->numRows($result);
        if($num>=1){
            $admincode = $result[0]['refer_code'];
            $refer_code = $admincode . $random_number;
        }
        else{
            $refer_code = MAIN_REFER . $random_number;
        }
    }
    $currentdate = date('Y-m-d');
    $sql = "INSERT INTO users (`first_name`,`last_name`,`email`,`mobile`,`city`,`pincode`,`state`,`referred_by`,`refer_code`,`joined_date`) VALUES ('$first_name','$last_name','$email','$mobile','$city','$pincode','$state','$referred_by','$refer_code','$currentdate')";
    $db->sql($sql);
    $sql = "SELECT * FROM users WHERE mobile = '$mobile'";
    $db->sql($sql);
    $res = $db->getResult();
    $response['success'] = true;
    $response['message'] = "User Registered Successfully";
    $response['data'] = $res;
    print_r(json_encode($response));


}



?>