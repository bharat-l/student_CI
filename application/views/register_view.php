<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/css/register.css') ?>" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Amazon_icon.png">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
    <div class="container">
        <form action="<?php echo base_url('register/register_user'); ?>" method="POST" autocomplete="off">
            <h2>Registration</h2>

            <?php if ($this->input->get('error')): ?>
                <p style="color: red;"><?php echo htmlspecialchars($this->input->get('error')); ?></p>
            <?php elseif ($this->input->get('success')): ?>
                <p style="color: green;"><?php echo htmlspecialchars($this->input->get('success')); ?></p>
            <?php endif; ?>
            <div class="content">
                <div class="form-group">
                    <label for="fname">Full Name</label>
                    <input type="text" name="name" id="fname" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="uname">User Name</label>
                    <input type="text" name="username" id="uname" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="emailid">Email</label>
                    <input type="email" name="email" id="emailid" placeholder="Enter valid email address" required>
                </div>
                <div class="form-group">
                    <label for="phno">Phone Number</label>
                    <input type="tel" name="phnumber" id="phno" maxlength="10" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <label for="passw">Password</label>
                    <input type="password" name="password" id="passw" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="confpass">Confirm Password</label>
                    <input type="password" name="confpass" id="confpass" placeholder="Confirm your password" required>
                </div>
            </div>
            <label class="gender-title">Gender</label>
            <div class="gender-selection">
                <input type="radio" name="gender" id="male" value="Male"> <label for="male"> Male </label>
                <input type="radio" name="gender" id="female" value="Female"> <label for="female"> Female </label>
                <input type="radio" name="gender" id="other" value="Other"> <label for="other"> Other </label>
            </div>
    
            <div class="para">
                <p> By clicking Sign Up, You agree to our <a href="#">Terms, </a><a href="#"> Privacy Policy</a> and<a href="#"> Cookies Policy</a>. You may receive SMS notifications from us and can opt out at any time. </p>
            </div>
            <div class="registerbtn">
                <button type="submit" id="registration">Register</button>
            </div>
            <div class="backlink">
                <a href="loginController">Already have an account? <b>Click here</b></a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#registration').on('click', function(event) {
                event.preventDefault();
                if ($('#passw').val() !== $('#confpass').val()) {
                    alert("Passwords do not match");
                } else {
                    $(this).closest('form').submit();
                }
            });
        });
    </script>
</body>

</html>