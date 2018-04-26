<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
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
$sql = "SELECT * FROM toll_data WHERE vehicle_number='".$vehicle_number."' ";

$result = $conn->query($sql);
?>
<input type='hidden' name='pay_time' id='pay_time' value='<?php echo date('d-m-Y H:i:s'); ?>'/>
<input type='hidden'  name='vehicle_number' id='vehicle_number' value='<?php echo $fgmembersite->Vehicle_number(); ?>' />

<table class="table table-striped">
</div>
     <thead>
        <tr class="row-name">
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
           <td><?php echo $row['vehicle_number']; ?></td>
      <td><img src="images/1.jpg" width="50"></td>
           <td><?php echo $row['amount']; ?>/-</td>
      <td><?php echo $row['generated_time']; ?></td>          
      <td><?php echo $row['pay_time']; ?></td>          
      <td><?php echo $row['toll_status']; ?></td>          
        </tr>
      <?php
      }
}
?>
       
     </tbody>
  </table>

<p><a href='logout.php'>Logout</a></p>
<a href='login-home.php'>Home</a>
</p>
</div>
</div>
</div>
</div>
</section>
<?php require 'footer.php'; ?>
