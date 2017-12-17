<!DOCTYPE html>
<?php
if(isset($_GET['logout']))
{
session_unset($_SESSION['currentUser']);
session_destroy();
}
 ?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Experiment Management</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel='stylesheet' type='text/css' href='login.css'/>
</head>

  <body>
    <div id="fullscreen_bg" class="fullscreen_bg"/>

     <form class="form-signin" action="loginValidation.php" method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-signin">
                             <h2>  התחברות<br/><br/></h2>
                            <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input type="text" class="form-control" placeholder="Username"name="usernameInput"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" class="form-control" placeholder="Password" name="passwordInput"/>
                            </div>    </div>

    		<button class="btn btn-lg btn-primary btn-block" type="submit">  התחבר</button>
        <br>
        <div id="errorMsg">
         <?php
         if(isset($_GET['errorMsg']))
          echo "שם משתמש או סיסמא שגויים";
          ?>
        </div>
        <br>

    	</form>
         </div>
                    </div>
                   </div>
            </div>
        </div>
    </div>
    </form>




  </body>
</html>
