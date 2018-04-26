<?PHP
require_once("./include/membersite_config.php");
if(isset($_POST['submitted']))
{
   if($fgmembersite->AssignTOll())
   {
       
   }
}
 require 'header.php'; ?>
  <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
<div id='fg_membersite_content'>
<!-- Form Code Start -->
<div id='fg_membersite'>
<form id='pay_toll' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Assign toll here</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='hidden' name='id_user' id='id_user' value='<?php echo $fgmembersite->UserId(); ?>'/>
<input type='hidden' name='toll_time' id='toll_time' value='<?php echo date('d-m-Y H:i:s'); ?>'/>
<input type='hidden' name='toll_status' id='toll_status' value='Pending'/>


<div class='short_explanation'>* required fields</div>
<input type='hidden'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />
<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>


    <label for='vehicle_number' >Vehichle Number*:</label><br/>
     <input type='text'  name='vehicle_number' id='vehicle_number' value='<?php echo $fgmembersite->Vehicle_number(); ?>' maxlength="50" class="form-control" /><br/>
    <span id='register_vehicle_number_errorloc' class='error'></span>

    <label for='amount ' >Toll Amount*:</label><br/>
     <input type='text'  name='amount' id='amount   ' value='50' maxlength="50" class="form-control" /><br/>
    <span id='register_amount_errorloc' class='error'></span>

    <input  class="btn btn-success" type='submit' name='Submit' value='Assign Toll' />


</fieldset>
</form>
<?php

$sql = "SELECT * FROM toll_data";

$result = $conn->query($sql);
?>

<table class="table table-striped">
</div>
     <thead>
        <tr class="row-name">
           <th>Vehicle Number</th>
           <th>Image</th>
           <th>Price(In Rs)</th>
           <th>Time</th>
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
           <td><?php echo $row['vehicle_number']; ?></td>
    <td><img src="<?php echo $row['image_path']; ?>" width="50"></td>
           <td><?php echo $row['amount']; ?>/-</td>
      <td><?php echo $row['pay_time']; ?></td>          
      <td><?php echo $row['toll_status']; ?></td>          
        </tr>
      <?php
      }
}
?>
       
     </tbody>
  </table>

</div>
</div>
</div>
</div>
</section>
<?php require 'footer.php'; ?>