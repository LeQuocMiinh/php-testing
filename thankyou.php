<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Testing</title>
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background: #e9ecef; height: 100vh;">
    <div class="container d-flex align-items-center justify-content-center w-100 h-100" style="padding: 5% 0px;">
        <div class="wrapper w-100">
            <div class="d-flex justify-content-between" style="background: #fff;">
                <div class="w-100 d-flex flex-column" style="padding: 4rem; gap: 2rem;">
                    <div class="heading d-flex align-items-center justify-content-between">
                        <h2 class="fw-bold" style="color: #17478d;">Thank you for contacting us</h2>
                    </div>
                    <div class="sub-heading">
                        We will be back in touch with you within one business day using the information you just
                        provided below:
                    </div>
                    <div class="content d-flex flex-column gap-2">
                        <div class="d-flex align-items-center">
                            <span class="fw-bold" style="flex: 0 0 15%;">Name:</span>
                            <span style="flex: 0 0 70%;"><?php echo $_SESSION['form']['name']; ?></span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="fw-bold" style="flex: 0 0 15%;">Phone:</span>
                            <span style="flex: 0 0 70%;"><?php echo $_SESSION['form']['phone']; ?></span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="fw-bold" style="flex: 0 0 15%;">Email Address:</span>
                            <a href="mailto:<?php echo $_SESSION['form']['email']; ?>"
                                style="flex: 0 0 70%;"><?php echo $_SESSION['form']['email']; ?></a>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="fw-bold" style="flex: 0 0 15%;">Company:</span>
                            <span style="flex: 0 0 70%;"><?php echo $_SESSION['form']['company']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/handle-form.js"></script>

</html>