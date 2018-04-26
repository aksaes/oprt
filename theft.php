<?PHP
require_once("./include/membersite_config.php");
$vehicle_number = $_POST['theft_vehicle'];
if(isset($_POST['submitted']))
{
 $sql = "INSERT INTO theft_data (theft_id,vehicle_number)
VALUES ('','".$vehicle_number."')";
$conn->query($sql); 
var_dump($sql);

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
<legend>Enter registration number of the stolen vehicle</legend>
<?php
if ($conn->query($sql) === TRUE) {
echo "Theft vehicle added successfully";
}
?>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='hidden'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
    <label for='theft' >Stolen Vehicle Number: </label>
    <input type='text' name='theft_vehicle' id='theft_vehicle'  maxlength="50" class="form-control" />
    <input class="btn btn-success" type='submit' name='Submit' value='Submit' />

</fieldset>
</form>
<?php $sql2 = "SELECT * FROM theft_data "; 
$result2 = $conn->query($sql2);
 if ($result2->num_rows > 0) {
?>
<table class="table table-striped">
</div>
     <thead>
        <tr class="row-name">
           <th>Vehicle Number</th>
           
        </tr>
     </thead>   
     <tbody>
      <?php
     
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
      ?>
  <tr class="row-content">
           <td><?php echo $row2['vehicle_number']; ?></td>
        </tr>
      <?php
      }

?>
       
     </tbody>
     <?php } ?>
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