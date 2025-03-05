<?php
require_once __DIR__ . '/../../core/Session.php';

use App\Core\Session; 

Session::start();

$error = $error ?? Session::getFlash('error');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CIT | Login | Register</title>

    <!-- Bootstrap -->
    <link href="../public/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../public/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../public/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../public/assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../public/assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
                <div>
                    <img src="../public/assets/images/cit.png" alt="Company Logo" style="max-width: 150px; margin-bottom: 15px;">
                </div>
              <!-- Show error message -->
              <?php if (!empty($error)): ?>
                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
                <form action="login" method="POST">
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" class="form-control" name="username_or_email" placeholder="Username or Email" required>
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Log in</button><br>
                        <a href="reset_password.php">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="#signup" class="to_register"> Create Account </a>
                        </p>
                        <div class="clearfix"></div>
                        <br />
                    </div>
                </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
    <section class="login_content">
            <div>
                <img src="../public/assets/images/cit.png" alt="Company Logo" style="max-width: 150px; margin-bottom: 15px;">
            </div>

        <form action="/register-post" method="POST">
            <h1>Student Account</h1>

            <div>
                <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
            </div>

            <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>

            <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>

            <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <div>
                <input type="text" class="form-control" name="student_id" placeholder="Student ID" required>
            </div>

            <div>
                <input type="text" class="form-control" name="block" placeholder="Block" required>
            </div>

            <div>
                <input type="text" class="form-control" name="course" placeholder="Course" required>
            </div>

            <div>
                <button type="submit" class="btn btn-default submit">Register</button>
            </div>

                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link">Already a member?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>
                    <div class="clearfix"></div>
                    <br />
                    </div>
                </form>
            </section>
        </div>
      </div>
    </div>
  </body>
</html>
