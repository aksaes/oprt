<?php
require_once("./include/membersite_config.php");
$argv1=$argv[1]; //vehicle number
$argv2=$argv[2]; //vehicle image
$current_time = date('d-m-Y H:i:s');
$amount = 50;
echo $argv1;
echo "\n";
echo $argv2;
/* $argv1 ='KL16K1169';
$argv2 ='images/2.jpg'; */
if($argv1){
$vehicle_number = $argv1;
$image_path = $argv2;
  //Checking theft
  $theft_data = "SELECT * FROM theft_data WHERE vehicle_number = '".$vehicle_number."'";
  $if_theft = $conn->query($theft_data);
  if ($if_theft->num_rows > 0) {
    echo "This vehicle is theft by someone!!!";
     $check_user_data = "SELECT * FROM fgusers3 WHERE vehicle_number = '".$vehicle_number."'";
        $check_user_data_sms = $conn->query($check_user_data);
        if ($check_user_data_sms->num_rows > 0) {
                    while($row2 = $check_user_data_sms->fetch_assoc()) {
$ph = $row2['phone_number'];
$name = $row2['name'];
$name=str_replace(' ', '%20',$name);
$number = $row2['vehicle_number'];
    }  
$ch = curl_init();
// set URL and other appropriate options
$URL = "http://192.168.43.1:8080/send/?pass=&number=".$ph."&data=Hi%20".$name."Your%20stolen%20hasbeen%20detected%20at%20one%20of%20our%20toll%20booth%20.Please%20contact%20authorities%20immediatly%20:%20.%20Vehicle%20Number:".$vehicle_number."&submit=&id=";
echo $URL;
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
        }

  }else{


        $fgusers3 = "SELECT * FROM fgusers3 WHERE vehicle_number = '".$vehicle_number."'";
		$result2 = $conn->query($fgusers3);
		if ($result2->num_rows > 0) {
			echo "\nchecking databse";
			while($row2 = $result2->fetch_assoc()) {
$ph = $row2['phone_number'];
$recharge = $row2['recharge'];//first data on recharge
$calculated_amount_to_be_paid = ($recharge - 50);
$name = $row2['name'];
$name=str_replace(' ', '%20',$name);
$number = $row2['vehicle_number'];
    }

$update_toll ="UPDATE fgusers3 SET recharge =".$calculated_amount_to_be_paid."  WHERE vehicle_number = '".$vehicle_number."'";
$conn->query($update_toll);
if ($conn->query($update_toll) === TRUE) {
    $sql = "INSERT INTO toll_data (amount, vehicle_number, toll_status,generated_time,image_path,recharge)
VALUES ('".$amount."', '".$vehicle_number."','Pending','".$current_time."','".$image_path."',".$calculated_amount_to_be_paid.")";
    }

if ($conn->query($sql) === TRUE) {
    echo "Toll created Successfully!";
        $ch = curl_init();
// set URL and other appropriate options
$URL = "http://192.168.43.1:8080/send/?pass=&number=".$ph."&data=Hi%20".$name."%20a%20toll%20of%20amount%2050%20has%20been%20charged%20on%20your%20Vehicle%20number:%20".$number.".%20Your%20current%20balance%20is%20".$calculated_amount_to_be_paid.". &submit=&id=";
echo $URL;
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
        

    }else{
        echo "Sorry no match found!";
    }
  }

$conn->close();
 }
 ?>
