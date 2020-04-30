<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Maruti Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../asset/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../asset/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../asset/css/maruti-login.css" />
    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="login.php" method="post">
				 <div class="control-group normal_text"> <h3><img src="../asset/img/Logo Siharkepo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" id="name" name="username" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" /></span>
                </div>
            </form>
        </div>
        
        <script src="../asset/js/jquery.min.js"></script>  
        <script src="../asset/js/maruti.login.js"></script> 
    </body>

</html>





