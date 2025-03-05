<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="../public/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="login">
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="/reset-password" method="POST">
                    <h1>Reset Password</h1>

                    <div>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-default submit">Reset Password</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">
                            Remembered? <a href="/login">Login</a>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</body>
</html>
