<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <!-- <style>
        .g_id_signin {
		justify-content: center;
		align-items: center;
		height: 100%;
		width: 50%;
	}
    </style> -->
</head>

<body>
    <div class="container mt-5">
        <h2 id="heading">Login</h2>
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
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>

                    <div class="check"><input type="checkbox" id="check" onclick="showPass()"> Show Password</div>
                </div>
                <div class="forget">
                    <p><a href="<?= base_url('forgot_password'); ?>">Forgot password?</a></p>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <!-- <button type="button" onclick="triggerGoogleSignIn()" class="googleSignIn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/8399/G-on-white.svg" alt="Google logo">
                    <span class="googleSignIn__text">Log in with Google</span>
                </button> -->
                <div class="col-6 google-signin-container" id="googleSignIn" style="margin-left: 12px; margin-top: 10px;">
                    <!--<div id="g_id_onload"
                       data-client_id="958381637717-pqb76l14artbk7jvrlbp2i3j6lfubpn9.apps.googleusercontent.com"
                       data-callback="handleCredentialResponse"
                       data-context="signin"
                       data-ux_mode="popup"
                       data-auto_prompt="false"
                       class="setPosition">
                  </div>

                  <div class="g_id_signin"
                       data-type="standard"
                       data-shape="pill"
                       data-theme="outline"
                       data-text="signin_with"
                       data-size="medium"
                       data-logo_alignment="left">
                  </div>-->
                    <div id="g_id_onload"
                        data-client_id="958381637717-pqb76l14artbk7jvrlbp2i3j6lfubpn9.apps.googleusercontent.com"
                        data-context="signin"
                        data-ux_mode="popup"
                        data-callback="handleCredentialResponse"
                        data-auto_prompt="false">
                    </div>

                    <div class="g_id_signin"
                        data-type="standard"
                        data-shape="rectangular"
                        data-theme="outline"
                        data-text="Log in with Google"
                        data-size="large"
                        data-logo_alignment="left">
                    </div>

                </div>

                <!-- /.col -->
            </div>
            <div class="signup">
                <p>Or Sign up using</p>
                <button type="button" id="signup"><a href="<?= base_url('Register'); ?>">SIGN UP</a></button>
            </div>
            <!-- Error Modal -->
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
    <?php $baseurl = base_url(); ?>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <div id="g_id_onload"
        data-client_id="958381637717-pqb76l14artbk7jvrlbp2i3j6lfubpn9.apps.googleusercontent.com"
        data-callback="handleCredentialResponse">
    </div>
    <!-- Bootstrap and JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to toggle password visibility
        function showPass() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
    <script>
        // Function to open Google Sign-In popup
        function triggerGoogleSignIn() {
            const googleSignInBtn = document.querySelector('.g_id_signin');
            if (googleSignInBtn) {
                googleSignInBtn.click(); // Simulates clicking the native Google Sign-In button
            }
        }

        // Callback function for handling the Google response
        function handleCredentialResponse(response) {
            console.log("Encoded JWT ID token: " + response.credential);
            // Send the ID token to your backend for verification and session handling
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jwt-decode@3.1.2/build/jwt-decode.min.js"></script>
<script>
    var ID;
    var fullName;
    var givenName;
    var picture;
    var emailId;
    function handleCredentialResponse(response) {
        console.log("test response", response);
        const responsePayload = jwt_decode(response.credential);

        const userData = {
            ID: responsePayload.sub,
            fullName: responsePayload.name,
            givenName: responsePayload.given_name,
            emailId: responsePayload.email
        };

        // Check if essential data is present before making an AJAX call
        if (userData.ID && userData.emailId) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('home/oauthgoogle') ?>",
                data: userData,
                success: function(response) {
                    console.log("Data sent to server: ", response);
                    window.location = "<?php echo base_url('dashboard'); ?>";
                },
                error: function(error) {
                    console.error("Error sending data to server: ", error);
                    window.location = "<?php echo base_url('home'); ?>";
                }
            });
        } else {
            console.log("Required user data is missing");
        }
    }
</script>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include Google Sign-In Platform Script -->
<!--<script src="https://apis.google.com/js/platform.js?onload=onLoadCallback" async defer></script>-->

<!-- jQuery -->
<!-- <script src="<?php echo $baseurl;?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo $baseurl;?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $baseurl;?>assets/dist/js/adminlte.min.js"></script> -->



</body>

</html>