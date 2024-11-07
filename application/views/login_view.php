<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(to right, hsl(216, 71%, 54%), hsl(310, 54%, 55%));

        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 450px;
            background-color: #fff;
            margin: 0 20px;
            border-radius: 10px;
            padding: 30px;
            overflow: hidden;
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.2);
            height: 580px;
            position: relative;
        }

        .content {
            margin: 39px 0 0 0;
            padding: 20px 0;

        }

        #forms {
            width: 95%;
            height: 95%;
        }

        #heading {
            text-align: center;
            padding: 20px 0;
            margin: 20px 0;
            position: absolute;
            top: 0;
            left: 165px;
            right: auto;
            font-family: Arial, Helvetica, sans-serif;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            margin: 5px 0;
        }

        textarea:focus,
        input:focus {
            outline: none;
        }

        #check {
            margin-top: 12px;
        }

        .bottom {
            width: 100%;
            padding: 10px 0 2px 0;
            margin: 2px 0 2px 0;
            border: none;
            border-bottom: 2px solid grey;
            box-sizing: border-box;
            transition: border color 0.2s;
        }

        .forget {
            text-align: right;

        }

        .forget p a {
            text-decoration: none;
            font-weight: bold;
            color: black;
            font-size: 13px;
        }

        .loginbtn {
            width: 100%;
            background-image: linear-gradient(to right, hsl(216, 71%, 54%), hsl(310, 54%, 55%));
            margin: 28px 0 20px 0;
            padding: 10px;
            padding: 20px o;
            border-radius: 50px;
            border: none;
            transition: 0.3s;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 45px;

        }

        .loginbtn button {
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: transparent;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 15px;


        }

        .loginbtn a {
            text-decoration: none;
            color: lightgoldenrodyellow;
        }

        .loginbtn:hover {
            background-image: linear-gradient(to right, hsl(310, 54%, 55%), hsl(216, 71%, 54%));
        }

        .signup {
            margin: 30px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 50px;
        }

        .signup p {
            font-size: 13px;
            color: grey;
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        .signup button {
            margin: 13px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            background-color: #fff;
            border: none;
        }

        #signup button a:hover {
            color: #380036;
            text-decoration: underline;
        }

        #signup a {
            color: black;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Login</h2>

        <!-- Display error message if there is any -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Login form -->
        <form action="<?= base_url('LoginController/login'); ?>" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username or Email</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <input type="checkbox" id="check" onclick="showPass()"> Show Password
            </div>
            <div class="forget">
                <p><a href="forgot_page.php">Forgot password?</a></p>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <div class="signup">
                <p>Or Sign up using</p>
                <button type="button" id="signup"><a href="registration_page.php">SIGN UP</a></button>
            </div>


            <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="max-width: 500px; margin: auto;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="errorModalLabel">Login Error</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Invalid username or password. Please try again.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>