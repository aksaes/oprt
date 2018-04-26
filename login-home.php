<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
if(isset($_POST['toll_id']))
{
$pay_time = $_POST['pay_time'];
$pieces = $_POST['toll_id'];
    if(!empty($_POST['toll_id'])){
 foreach($pieces as $selected){
        $update_toll ="UPDATE toll_data SET toll_status = 'Paid', pay_time = '".$pay_time."' WHERE toll_id = $selected";
        var_dump($update_toll);
$conn->query($update_toll);
} 

}

}
?>
<?php require 'header.php'; ?>
  <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
<div id='fg_membersite_content'>
Logged in as: <?= $fgmembersite->UserFullName(); ?>


<!-- Form Code Start -->
<div id='fg_membersite'>
<?php
$vehicle_number = $fgmembersite->Vehicle_number();
$sql = "SELECT * FROM toll_data WHERE vehicle_number='".$vehicle_number."' AND toll_status !='Paid' ";

$result = $conn->query($sql);
if ($conn->query($update_toll) === TRUE) { 
    $fgmembersite->RedirectToURL("payment.php");


}else { 
?>
<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sorry!</strong>Please choose any toll from below
</div>
<?php } ?>
<form id='pay_toll' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<input type='hidden' name='pay_time' id='pay_time' value='<?php echo date('d-m-Y H:i:s'); ?>'/>
<input type='hidden'  name='vehicle_number' id='vehicle_number' value='<?php echo $fgmembersite->Vehicle_number(); ?>' />

<table class="table table-striped">
</div>
     <thead>
        <tr class="row-name">
          <th>Check all/none</th>
           <th>Vehicle Number</th>
           <th>Image</th>
           <th>Price(In Rs)</th>
           <th>Generated Time</th>
           <th>Paid Time</th>
           <th>Status</th>
        </tr>
     </thead>   
     <tbody>
      <?php
      if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>
  <tr class="row-content">
           <td><input type="checkbox" name="toll_id[]" value="<?php echo $row['toll_id']; ?>"></td>
           <td><?php echo $row['vehicle_number']; ?></td>
      <td><img src="<?php echo $row['image_path']; ?>" width="50"></td>
           <td><?php echo $row['amount']; ?>/-</td>
      <td><?php echo $row['generated_time']; ?></td>          
      <td><?php echo $row['pay_time']; ?></td>          
      <td><?php echo $row['toll_status']; ?></td>          
        </tr>
      <?php
      }
}
?>
   <tr style="background: none;border: 0px"><td> <input  class="btn btn-success" type='submit' name='Submit' value='Pay Toll' /></td></tr>
       
     </tbody>
  </table>
</form>

<p><a href='pay-toll.php'>Your toll History</a></p>
<p><a href='recharge.php'>Recharge</a></p>
<br><br><br>
<p><a href='logout.php'>Logout</a></p>
<a href='login-home.php'>Home</a>
</p>
</div>
</div>
</div>
</div>
</section>
<?php require 'footer.php'; ?>
