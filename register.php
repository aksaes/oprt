<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("thank-you.php");
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
<legend>Register</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>
<input type='hidden'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
    <label for='name' >Your Full Name*: </label>
    <input type='text' name='name' id='name' value='<?php echo $fgmembersite->SafeDisplay('name') ?>' maxlength="50" class="form-control" />
    <span id='register_name_errorloc' class='error'></span>
    <label for='email' >Email Address*:</label>
    <input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50" class="form-control" />
    <span id='register_email_errorloc' class='error'></span>
    <label for='phone_number' >Phone Number*:</label>
    <input type='text' name='phone_number' id='phone_number' value='<?php echo $fgmembersite->SafeDisplay('phone_number') ?>' maxlength="50" class="form-control" />
    <span id='register_phone_number_errorloc' class='error'></span>
    <label for='vehicle_number' >Vehicle Number*:</label>
    <input type='text' name='vehicle_number' id='vehicle_number' value='<?php echo $fgmembersite->SafeDisplay('vehicle_number') ?>' maxlength="50" class="form-control" />
    <span id='register_vehicle_number_errorloc' class='error'></span>
    <label for='username' >UserName*:</label>
    <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" class="form-control" />
    <span id='register_username_errorloc' class='error'></span>
    <label for='password' >Password*:</label>
    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
    <noscript>
    <input type='text' name='password' id='password' class="form-control" maxlength="50" />
    </noscript>    
    <div id='register_password_errorloc' class='error' style='clear:both'></div>

    <input class="btn btn-success" type='submit' name='Submit' value='Submit' />

</fieldset>
</form>
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
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");
    frmvalidator.addValidation("phone_number","req","Please provide your phone number");
    frmvalidator.addValidation("vehicle_number","req","Please provide Vehicle number");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("username","req","Please provide a username");
    
    frmvalidator.addValidation("password","req","Please provide a password");

// ]]>
</script>
<?php 
require 'footer.php'; ?>