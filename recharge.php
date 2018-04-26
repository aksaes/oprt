<?PHP
require_once("./include/membersite_config.php");
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
$vehicle_number = $_POST['theft_vehicle'];

$recharge_amount = $_POST['recharge_amount'];
$vehicle_number = $_POST['vehicle_number'];
    if(!empty($recharge_amount)){




        $fgusers3 = "SELECT * FROM fgusers3 WHERE vehicle_number = '".$vehicle_number."'";
    $result2 = $conn->query($fgusers3);
    if ($result2->num_rows > 0) {
      echo "\nchecking databse";
      while($row2 = $result2->fetch_assoc()) {
$ph = $row2['phone_number'];
$recharge = $row2['recharge'];//first data on recharge
$calculated_amount_to_be_paid = ($recharge + $recharge_amount);
$name = $row2['name'];
$name=str_replace(' ', '%20',$name);
$number = $row2['vehicle_number'];
    }
            $ch = curl_init();
// set URL and other appropriate options
$URL = "http://192.168.43.1:8080/send/?pass=&number=".$ph."&data=Hi%20".$name."%20recharge%20of%20amount%20".$recharge_amount."%20has%20been%20done%20on%20your%20vehicle%20".$number.".%20Your%20current%20balance%20is%20".$calculated_amount_to_be_paid.". &submit=&id=";
// echo $URL;
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
if ($result2 === TRUE) {
        $update_toll2 ="UPDATE fgusers3 SET recharge =$calculated_amount_to_be_paid  WHERE vehicle_number = '".$vehicle_number."'";
$conn->query($update_toll2);
//      $update_toll ="UPDATE toll_data SET recharge =$calculated_amount_to_be_paid  WHERE vehicle_number = '".$vehicle_number."'";
// $conn->query($update_toll);
}
  }



}




require 'header.php';
?>
  <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
<!-- Form Code Start -->
<div id='fg_membersite'>

<form id='register' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >

<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='hidden'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
   <input type='text' readonly="" name='vehicle_number'class="form-control" id='vehicle_number' value='<?php echo $fgmembersite->Vehicle_number(); ?>' />
    <input type='text' name='recharge_amount' id='recharge_amount'  maxlength="50" class="form-control" />
    <input class="btn btn-success" type='submit' name='Submit' value='Recharge' />

</fieldset>
</form>

<table class="table table-striped">
</div>
     <thead>
        <tr class="row-name">
           <th>Balance</th>
        </tr>
     </thead>   
     <tbody>
      <?php
      $vehicle_number = $fgmembersite->Vehicle_number();
$sql = "SELECT * FROM fgusers3 WHERE vehicle_number='".$vehicle_number."'  ";

$result = $conn->query($sql);
      if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>
  <tr class="row-content">
      <td><?php echo $row['recharge']; ?></td>          
        </tr>
      <?php
      }
}
?>
       
     </tbody>
  </table>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->
</div>
</div>
</section>
<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('thepwddiv','password');
    pwdwidget.MakePWDWidget();
    
    var frmvalidator  = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("","req","Please provide registration number");



// ]]>
</script>
<?php 
$conn->close();
require 'footer.php'; ?>