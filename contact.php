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
                <div style="flex: 1 0 60%; padding: 3.5rem;">
                    <div class="heading d-flex align-items-center justify-content-between mb-4">
                        <h2 style="color: #17478d">Send us a Message</h2>
                        <svg width="50px" height="50px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                            fill="#74a8ec" stroke="#74a8ec">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g data-name="19. Send" id="_19._Send">
                                    <path class="cls-1"
                                        d="M21,16.6a3,3,0,0,1-1.66-.51l-4.89-3.26a1,1,0,0,1,1.1-1.66l4.9,3.26a1,1,0,0,0,1.1,0l4.9-3.26a1,1,0,0,1,1.1,1.66l-4.89,3.26A3,3,0,0,1,21,16.6Z">
                                    </path>
                                    <path class="cls-1"
                                        d="M29,25H13a3,3,0,0,1-3-3V10a3,3,0,0,1,3-3H29a3,3,0,0,1,3,3V22A3,3,0,0,1,29,25ZM13,9a1,1,0,0,0-1,1V22a1,1,0,0,0,1,1H29a1,1,0,0,0,1-1V10a1,1,0,0,0-1-1Z">
                                    </path>
                                    <path class="cls-2" d="M7,19H5a1,1,0,0,1,0-2H7a1,1,0,0,1,0,2Z"></path>
                                    <path class="cls-2" d="M7,15H3a1,1,0,0,1,0-2H7a1,1,0,0,1,0,2Z"></path>
                                    <path class="cls-2" d="M7,11H1A1,1,0,0,1,1,9H7a1,1,0,0,1,0,2Z"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="form-container d-flex flex-column">
                        <form class="d-flex flex-wrap" style="row-gap: 18px;">
                            <div class="col-6 form-group d-flex flex-column gap-2" style="padding-right: 0.5rem">
                                <label class="text-gray" for="name">Your Name</label>
                                <input class="custom-input text-primary" type="text" name="name" id="name" required>
                            </div>
                            <div class="col-6 form-group d-flex flex-column gap-2" style="padding-left: 0.5rem">
                                <label class="text-gray" for="email">Email Address</label>
                                <input class="custom-input text-primary" type="email" name="email" id="email" required>
                            </div>
                            <div class="col-6 form-group d-flex flex-column gap-2" style="padding-right: 0.5rem">
                                <label class="text-gray" for="phone">Phone</label>
                                <input class="custom-input text-primary" type="number" name="phone" id="phone"
                                    maxlength="10" required>
                            </div>
                            <div class="col-6 form-group d-flex flex-column gap-2" style="padding-left: 0.5rem"
                                required>
                                <label class="text-gray" for="company">Company</label>
                                <input class="custom-input text-primary" type="text" name="company" id="company"
                                    required>
                            </div>
                            <div class="col-12 form-group d-flex flex-column gap-2">
                                <label class="text-gray" for="message">Message</label>
                                <textarea required class="custom-input text-primary" name="message" rows="5"
                                    id="message"></textarea>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="align-self-end custom-button mt-4" type="submit">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div style="flex: 0 0 40%; background: #17478d; padding: 3.5rem;">
                    <div class="heading">
                        <h2 class="text-white">Contact Infomation</h2>

                        <div class="list-item text-white d-flex flex-column gap-5" style="margin-top: 5rem">
                            <div class="item d-flex align-items-center gap-2">
                                <i class="bi bi-geo-alt" style="color: #8e959c; font-size: 24px"></i>
                                <div class="text fs-5">
                                    360 King Street <br>
                                    Feasterville Trevose, PA, 19053
                                </div>
                            </div>
                            <div class="item d-flex align-items-center gap-2">
                                <i class="bi bi-phone-vibrate" style="color: #8e959c; font-size: 24px"></i>
                                <div class="text fs-5">
                                    (800) 900-200-300
                                </div>
                            </div>
                            <div class="item d-flex align-items-center gap-2">
                                <i class="bi bi-envelope-paper" style="color: #8e959c; font-size: 24px"></i>
                                <div class="text fs-5">
                                    abcd@gmail.com
                                </div>
                            </div>
                            <div class="item d-flex align-items-center gap-4" style="color: #8e959c; font-size: 24px">
                                <i class="bi bi-twitter"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-instagram"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="loading d-none">
        <div class="wrapper">
            <div class="loader"></div>
        </div>
    </div>
</body>
<script src="js/handle-form.js"></script>

</html>