<?php

// Step 1: Connect to the database
$host = "localhost";
$username = "u743445510_sfis";
$password = "Sfis@2023";
$database = "u743445510_sfis";
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (empty($_POST['vehicle_number'])) {
    $response['success'] = false;
    $response['message'] = "Vehicle Number is Empty";
    print_r(json_encode($response));
    return false;
}
$api_key = "BI3ZTX6A8R770A2GEFC5POQYMVC34D9LD92JB8U5K601NWH4S1";
$agent_code = "ABC123";
$client_order_id = "345678";
$vehicle_number = $_POST['vehicle_number'];

$url = "https://g2c.softpayapi.com/api/rc_verification/vehicle_verify?apikey=" . $api_key . "&agent_code=" . $agent_code . "&client_order_id=" . $client_order_id . "&vehicle_number=" . $vehicle_number;

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

curl_close($curl);

echo $response;

$response_data = json_decode($response, true);

$registration_number = $response_data['vehicleDetails']['registration_number'];
$rc_status = $response_data['vehicleDetails']['rc_status'];
$chassis_number = $response_data['vehicleDetails']['chassis_number'];
$engine_number = $response_data['vehicleDetails']['engine_number'];
$owner_name = $response_data['vehicleDetails']['owner_name'];
$father_name = $response_data['vehicleDetails']['father_name'];
$registration_date = $response_data['vehicleDetails']['registration_date'];
$fuel_type = $response_data['vehicleDetails']['fuel_type'];
$norms_type = $response_data['vehicleDetails']['norms_type'];
$vehicle_category = $response_data['vehicleDetails']['vehicle_category'];
$vehicle_class = $response_data['vehicleDetails']['vehicle_class'];
$number_of_cylinder = $response_data['vehicleDetails']['number_of_cylinder'];
$owner_serial_number = $response_data['vehicleDetails']['owner_serial_number'];
$standing_capacity = $response_data['vehicleDetails']['standing_capacity'];
$sleeper_capacity = $response_data['vehicleDetails']['sleeper_capacity'];
$body_type = $response_data['vehicleDetails']['body_type'];
$owner_mobile_no = $response_data['vehicleDetails']['owner_mobile_no'];
$ownership = $response_data['vehicleDetails']['ownership'];
$colour = $response_data['vehicleDetails']['colour'];
$manufacturer = $response_data['vehicleDetails']['manufacturer'];
$manufacturer_model = $response_data['vehicleDetails']['manufacturer_model'];
$seating_capacity = $response_data['vehicleDetails']['seating_capacity'];
$insurance_policy_no = $response_data['vehicleDetails']['insurance_policy_no'];
$insurance_company_name = $response_data['vehicleDetails']['insurance_company_name'];
$insurance_validity = $response_data['vehicleDetails']['insurance_validity'];
$financer = $response_data['vehicleDetails']['financer'];
$puc_number = $response_data['vehicleDetails']['puc_number'];
$puc_valid_upto = $response_data['vehicleDetails']['puc_valid_upto'];
$current_address = $response_data['vehicleDetails']['current_address'];
$permanent_address = $response_data['vehicleDetails']['permanent_address'];
$rc_registration_location = $response_data['vehicleDetails']['rc_registration_location'];
$manufacturingYear = $response_data['vehicleDetails']['manufacturingYear'];
$unladden_weight = $response_data['vehicleDetails']['unladden_weight'];
$wheelbase = $response_data['vehicleDetails']['wheelbase'];
$gross_vehicle_weight = $response_data['vehicleDetails']['gross_vehicle_weight'];
$blacklist_status = $response_data['vehicleDetails']['blacklist_status'];
$fitness_upto = $response_data['vehicleDetails']['fitness_upto'];
$cubic_capacity = $response_data['vehicleDetails']['cubic_capacity'];
$mv_tax_upto = $response_data['vehicleDetails']['mv_tax_upto'];
$permit_type = $response_data['vehicleDetails']['permit_type'];
$permit_no = $response_data['vehicleDetails']['permit_no'];
$permit_validity_upto = $response_data['vehicleDetails']['permit_validity_upto'];
$npermit_no = $response_data['vehicleDetails']['npermit_no'];
$npermit_upto = $response_data['vehicleDetails']['npermit_upto'];
$npermit_issued_by = $response_data['vehicleDetails']['npermit_issued_by'];
$noc_valid_upto = $response_data['vehicleDetails']['noc_valid_upto'];
$noc_details = $response_data['vehicleDetails']['noc_details'];
$noc_status = $response_data['vehicleDetails']['noc_status'];
$noc_issue_date = $response_data['vehicleDetails']['noc_issue_date'];

$sql="SELECT * FROM vehicle_details WHERE registration_number='$registration_number'";
$conn->query($sql);
$result = $conn->query($sql);
$num = mysqli_num_rows($result);
if($num>=1){
 
    $sql="UPDATE `vehicle_details` SET `rc_status`='$rc_status',`chassis_number`='$chassis_number',`engine_number`='$engine_number',`owner_name`='$owner_name',`father_name`='$father_name',`registration_date`='$registration_date',`fuel_type`='$fuel_type',`norms_type`='$norms_type',`vehicle_category`='$vehicle_category',`vehicle_class`='$vehicle_class',`number_of_cylinder`='$number_of_cylinder',`owner_serial_number`='$owner_serial_number',`standing_capacity`='$standing_capacity',`sleeper_capacity`='$sleeper_capacity',`body_type`='$body_type',`owner_mobile_no`='$owner_mobile_no',`ownership`='$ownership',`colour`='$colour',`manufacturer`='$manufacturer',`manufacturer_model`='$manufacturer_model',`seating_capacity`='$seating_capacity',`insurance_policy_no`='$insurance_policy_no',`insurance_company_name`='$insurance_company_name',`insurance_validity`='$insurance_validity',`financer`='$financer',`puc_number`='$puc_number',`puc_valid_upto`='$puc_valid_upto',`current_address`='$current_address',`permanent_address`='$permanent_address',`rc_registration_location`='$rc_registration_location',`manufacturingYear`='$manufacturingYear',`unladden_weight`='$unladden_weight',`wheelbase`='$wheelbase',`gross_vehicle_weight`='$gross_vehicle_weight',`blacklist_status`='$blacklist_status',`fitness_upto`='$fitness_upto',`cubic_capacity`='$cubic_capacity',`mv_tax_upto`='$mv_tax_upto',`permit_type`='$permit_type',`permit_no`='$permit_no',`permit_validity_upto`='$permit_validity_upto',`npermit_no`='$npermit_no',`npermit_upto`='$npermit_upto',`npermit_issued_by`='$npermit_issued_by',`noc_valid_upto`='$noc_valid_upto',`noc_details`='$noc_details',`noc_status`='$noc_status',`noc_issue_date`='$noc_issue_date' WHERE registration_number='$registration_number'";
    
    $conn->query($sql);

}
else{
    $sql="INSERT INTO `vehicle_details` (`registration_number`, `rc_status`, `chassis_number`, `engine_number`, `owner_name`, `father_name`, `registration_date`, `fuel_type`, `norms_type`, `vehicle_category`, `vehicle_class`, `number_of_cylinder`, `owner_serial_number`, `standing_capacity`, `sleeper_capacity`, `body_type`, `owner_mobile_no`, `ownership`, `colour`, `manufacturer`, `manufacturer_model`, `seating_capacity`, `insurance_policy_no`, `insurance_company_name`, `insurance_validity`, `financer`, `puc_number`, `puc_valid_upto`, `current_address`, `permanent_address`, `rc_registration_location`, `manufacturingYear`, `unladden_weight`, `wheelbase`, `gross_vehicle_weight`, `blacklist_status`, `fitness_upto`, `cubic_capacity`, `mv_tax_upto`, `permit_type`, `permit_no`, `permit_validity_upto`, `npermit_no`, `npermit_upto`, `npermit_issued_by`, `noc_valid_upto`, `noc_details`, `noc_status`, `noc_issue_date`) VALUES ('$registration_number','$rc_status','$chassis_number','$engine_number','$owner_name','$father_name','$registration_date','$fuel_type','$norms_type','$vehicle_category','$vehicle_class','$number_of_cylinder','$owner_serial_number','$standing_capacity','$sleeper_capacity','$body_type','$owner_mobile_no','$ownership','$colour','$manufacturer','$manufacturer_model','$seating_capacity','$insurance_policy_no','$insurance_company_name','$insurance_validity','$financer','$puc_number','$puc_valid_upto','$current_address','$permanent_address','$rc_registration_location','$manufacturingYear','$unladden_weight','$wheelbase','$gross_vehicle_weight','$blacklist_status','$fitness_upto','$cubic_capacity','$mv_tax_upto','$permit_type','$permit_no','$permit_validity_upto','$npermit_no','$npermit_upto','$npermit_issued_by','$noc_valid_upto','$noc_details','$noc_status','$noc_issue_date')
";
$conn->query($sql);

}


$conn->close();

?>
