$(document).ready(function () {

    // Nhấn nút gửi 
    $('button').on('click', function (e) {
        e.preventDefault();
        const name = $('#name').val(),
            email = $('#email').val(),
            phone = $('#phone').val(),
            company = $('#company').val(),
            message = $('#message').val();
        $.ajax({
            url: 'process.php',
            dataType: 'json',
            type: 'post',
            data: {
                name: name,
                email: email,
                phone: phone,
                company: company,
                message: message
            },
            beforeSend: function (params) {
                $('.loading').removeClass('d-none');
            },
            success: function (response) {
                $('.loading').addClass('d-none');
                if (!response.status) {
                    const keys = response.data;
                    Swal.fire({
                        html: `
                            <h2>Face Plant!</h2>
                            <p class="mt-3">Ooops, Something went wrong!</p>
                            <i class="bi bi-x-circle" style="color: #d33; font-size: 100px;"></i>
                        `,
                        width: 350,
                        showConfirmButton: true,
                        confirmButtonColor: "#d33",
                        showCancelButton: false,
                        confirmButtonText: "Try Again",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            keys.forEach(key => {
                                $(`#${key}`).addClass('error');
                            });
                            $("button").prop('disabled', !response.status);
                        }
                    });
                }
                if (response.status && response.sent_email) {
                    window.location.assign('/php-testing/thankyou.php');
                }
            }
        });
    });

    /**
     * Xử lý lỗi
     * @param {*} element 
     * @param {*} boolean 
     */
    function isError(element, boolean) {
        if (!boolean) {
            element.addClass('error');
        } else {
            element.removeClass('error');
        }
    }

    /**
     * Hàm ràng buộc email
     * @param {*} email 
     * @returns 
     */
    function isEmail(email) {
        const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{3,4}$/g;
        return regex.test(email);
    }

    /**
     * Hàm ràng buộc sđt
     * @param {*} phone 
     * @returns 
     */
    function isPhone(phone) {
        const regex = /^\+?(\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/;
        return regex.test(phone);
    }

    const inputs = $('.form-group input, .form-group textarea'); // Get all input
    if (inputs) {
        let email = { status: false, element: $('input[name="email"]') };
        let phone = { status: false, element: $('input[name="phone"]') };
        let isValidForm = email.status && phone.status;
        $("button").prop('disabled', !isValidForm);

        // Loop inputs 
        inputs.each((index, input) => {
            $(input).on('input', function (e) {
                if ($(this).hasClass('error')) {
                    $(this).removeClass('error');
                }

                if ($(this).attr('name') === "email") {
                    email = {
                        status: isEmail($(this).val()),
                        element: $('input[name="email"]')
                    }
                }

                if ($(this).attr('name') === "phone") {
                    if (e.target.value.length > 10) {
                        e.target.value = e.target.value.slice(0, 10);
                    }
                    phone = {
                        status: isPhone($(this).val()),
                        element: $('input[name="phone"]')
                    }
                }

                isValidForm = email.status && phone.status;

                [email, phone].forEach(field => {
                    if (field.element) {
                        isError(field.element, field.status);
                    }
                });

                $("button").prop('disabled', !isValidForm);
            });
        });
    }

}); 