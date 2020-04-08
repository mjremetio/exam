
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Registration</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head>
<body>
    <div class="container" style="margin-top: 30px;">
        <div id="login_content" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Sign Up</h2>
                    </div>

                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="Full Name" id="full_name"><br>
                        <input type="email" class="form-control" placeholder="Email Address" id="email_address"><br>
                        <input type="password" class="form-control" placeholder="Password (Max 8 characters)" id="s_password"><br>
                        <input type="password" class="form-control" placeholder="Confirm Password" id="c_password"><br>
                        <input type="text" class="form-control" placeholder="Birth Date" id="birthdate"><br>
                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" data-dismiss="modal" value="Close" id="closeBtn" style="display: none;">
                        <input type="button"  onclick="save_data('add_new')" value="Register" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
            <div class="login-box">
                <div class="card">
                    <div class="card-body login-card-body">
                    
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form>
                        <div class="input-group mb-3">
                        <input type="email" class="form-control" id="login_email" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fa fa-user"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                        <input type="password" class="form-control" id="login_password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fa fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <form action="#" id="my_captcha_form">
                                    <div class="g-recaptcha" 
                                data-sitekey="6LfrFKQUAAAAAMzFobDZ7ZWy982lDxeps8cd1I2i" 
                                ></div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <button type="button" id="btn_login" class="btn btn-primary btn-block btn-flat">Login</button>          
                            </div>
                            <div class="col-sm-5">
                                <button type="button" id="btn_sign_up" class="btn btn-danger btn-block btn-flat">Sign Up</button>          
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
       
        $(document).ready(function() {
            $("#btn_sign_up").on('click', function () {
               $("#login_content").modal('show');
            });
            $("#login_content").on('hidden.bs.modal', function () {
               $("#full_name").val("");
               $("#email_address").val("");
               $("#s_password").val("");
               $("#c_password").val("");
               $("#birthdate").val("");
            });
            document.getElementById("s_password").maxLength = "8";
            document.getElementById("c_password").maxLength = "8";

        });

        function save_data(key) {
            var full_name = $("#full_name");
            var email_address = $("#email_address");
            var s_password = $("#s_password");
            var c_password = $("#c_password");
            var birthdate = $("#birthdate");

            if (isNotEmpty(full_name) && isNotEmpty(email_address) && isNotEmpty(s_password) && isNotEmpty(birthdate)) {
               
                $.ajax({
                   url: 'includes/user_data.php',
                   method: 'POST',
                   dataType: 'text',
                   data: {
                       key: key,
                       full_name: full_name.val(),
                       email_address: email_address.val(),
                       s_password: s_password.val(),
                       birthdate: birthdate.val()
                   }, success: function (response) {
                       if (response != "success"){
                        alert(response);
                        location.reload();
                       }
                           

                   }
                });
               
            }
        }
          
            $("#btn_login").on('click', function() {
                var login_email = $("#login_email").val();
                var login_password = $("#login_password").val();
                if (login_email == "" || login_password == "") {
                    alert('Please check your inputs!');
                } else {
                    $.ajax({
                        url: 'includes/user_data.php',
                        method: 'POST',
                        data: {
                            login: 1,
                            login_email: login_email,
                            login_password: login_password,
                            key:'login_data'
                        },
                        success: function(response) {
                            if (response.indexOf('success') >= 0) {
                                window.location = 'index.php';
                            }
                            if (response.indexOf('invalid') >= 0) {
                                alert('Invalid Email and Password!');
                            }
                        },
                        dataType: 'text'
                    });
                }

            });
            //if empty input
        function isNotEmpty(caller) {
            if (caller.val() == '') {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
</body>
</html>