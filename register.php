 <?php
 include 'class/members/members.php';

 ?>
 <div class="page-header">
        <h1>Register</h1>
      </div>
<form class="form-horizontal" action="" method="post">

  <div class="control-group">
  <label class="control-label" for="textinput">Email</label>
  <div class="controls">
    <input id="email" name="email" type="text" placeholder="Email" class="input-xlarge">
  </div>
</div>

  <div class="control-group">
  <label class="control-label" for="textinput">Password</label>
  <div class="controls">
    <input id="password" name="password" type="password" placeholder="Password" class="input-xlarge">
  </div>
</div>

  <div class="control-group">
  <label class="control-label" for="textinput">Gender</label>
  <div class="controls">
<select class="form-control" name="gender">
  <option value="male">Male</option>
  <option value="female">Female</option>

</select>
</div>
</div>

<div class="control-group">

  <div class="controls">
    <button id="singlebutton" name="singlebutton" class="btn btn-success">Submit</button>
  </div>
</div>


</form>
<?php

if (isset($_POST['email']))
{
	Members::register($_POST['email'],$_POST['password'],$_POST['gender']);

}
?>


