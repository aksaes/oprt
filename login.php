<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {
        $fgmembersite->RedirectToURL("login-home.php");
   }
}

?>
<?php require 'header.php'; ?>
  <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
<div id='fg_membersite'>

<form id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>



<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>

    <label for='username' >UserName*:</label><br/>
    <input type='text' name='username' class="form-control" id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
    <span id='login_username_errorloc' class='error'></span>

    <label for='password' >Password*:</label><br/>
    <input type='password' name='password' class="form-control" id='password' maxlength="50" /><br/>
    <span id='login_password_errorloc' class='error'></span>

    <input type='submit' name='Submit'  class="btn btn-success" value='Submit' />

<div class='short_explanation'><a href='reset-pwd-req.php'>Forgot Password?</a></div>
</fieldset>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("username","req","Please provide your username");
    
    frmvalidator.addValidation("password","req","Please provide the password");

// ]]>
</script>
</div>
</div>
</div>
</div>
</section>
<?php require 'footer.php'; ?>