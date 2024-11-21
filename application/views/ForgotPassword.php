<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= base_url('/assets/images/login.png'); ?>">
    <title>Forgot Password</title>
    <link rel="icon" type="image/x-icon" href="Amazon_icon.png">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/assets/css/forgotpassword.css'); ?>">
</head>

<body>
    <div class="container">
        <div class="content">
            <h2><b> Forgot Password </b></h2>
            <label> Enter Your Email: </label>
            <input type="text" name="email" placeholder="Enter Your Email or Username" id="mailinput" required>

            <button type="submit" name="submit" id="submit">SUBMIT</button>
            <button type="button" id="back"><a href="<?= base_url('LoginController'); ?>">BACK</a></button>
            <p id="remem"><a href="<?= base_url('LoginController'); ?>">Remember Password? <b id="backbtn">Click here</b></a></p>
            <div class="overlay" id="overlay"></div>
            <div class="popupv" id="popupv">
                <i class="fas fa-exclamation-triangle warning-icons"></i>
                <p id="popupMessagev"></p>
                <button onclick="closePopupv()">Close</button>
            </div>
            <div class="popup" id="popup">
                <i class="fas fa-exclamation-triangle warning-icon"></i>
                <p>Password reset link was sent to your email ID:</p>
                <p id="popupMessage"></p>
                <button onclick="closePopup()">Close</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#submit').on('click', function (event) {
                event.preventDefault();
                const email = $('#mailinput').val().trim();
                if (email === '') {
                    $('#popupMessagev').text('Please enter your email address.');
                    $('#popupv').show();
                    $('#overlay').show();
                } else {
                    $.ajax({
                        url: 'ForgotPassword/submit_email',
                        method: 'POST',
                        data: { email },
                        success: function (response) {
                            const res = JSON.parse(response);
                            if (res.status === 'error') {
                                $('#popupMessagev').text(res.message);
                                $('#popupv').show();
                                $('#overlay').show();
                            } else if (res.status === 'success') {
                                $('#popupMessage').text(res.message);
                                $('#popup').show();
                                $('#overlay').show();
                            }
                        }
                    });
                }
            });
        });

        function closePopup() {
            $('#overlay').hide();
            $('#popup').hide();
        }

        function closePopupv() {
            $('#overlay').hide();
            $('#popupv').hide();
        }
    </script>
</body>

</html>
