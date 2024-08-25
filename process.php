<?php
require_once __DIR__ . '/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

session_start();
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$company = isset($_POST['company']) ? $_POST['company'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';
$args = [
    "name" => $name,
    "email" => $email,
    "phone" => $phone,
    "company" => $company,
    "message" => $message,
];
$temp = [];
foreach ($args as $key => $value) {
    $res = isEmpty($value, $key);
    if (!$res['status']) {
        array_push($temp, $res['data']);
    }
}
$isEmpty = empty($temp) ? true : false;
$_SESSION["form"] = $isEmpty ? $args : '';
$sendMail = false;
if ($isEmpty) {
    $sendMail = sendMail($args);
}
echo json_encode(['status' => $isEmpty, 'data' => $temp, 'sent_email' => $sendMail]);


/**
 * Hàm kiểm tra trường dữ liệu có rỗng hay không 
 * @param mixed $value giá trị
 * @param mixed $key từ khoá
 * @return array
 */
function isEmpty($value, $key)
{
    $bolean = empty($value) ? false : true;
    $data = $bolean ? "" : $key;
    return ["status" => $bolean, "data" => $data];
}

/**
 * Summary of sendMail
 * @param mixed $infor
 * @return bool|string
 */
function sendMail($infor)
{
    $mail = new PHPMailer(true); // Khởi tạo biến mail để truy cập các phương thức 
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // Sử dụng thư viện phpdotenv để lưu trữ và quản lý các biến môi trường
    $dotenv->load();

    try {
        // Cấu hình trên server 
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->Username = $_ENV['email'];
        $mail->Password = $_ENV['password'];
        $mail->setFrom('noreply@gmail.com', 'Mistake'); // Email người gửi

        // Cấu hình thông tin người nhận và nội dung
        $mail->addAddress($infor['email'], $infor['name']); // Email người nhận
        $mail->isHTML(true); // Cho phép gửi html
        $mail->Subject = 'Thank you for contacting us';
        $mail->Body = templateEmail($infor); // nội dung

        $mail->send();
        return true;
    } catch (\Throwable $th) {
        return $mail->ErrorInfo;
    }
}

/**
 * Giao diện Email
 * @param mixed $info
 * @return bool|string
 */
function templateEmail($info)
{
    ob_start();
    ?>
    <div class="template-email" style="background: #fff;">
        <div class="w-100 d-flex flex-column" style="padding: 1rem; gap: 2rem;">
            <div class="heading d-flex align-items-center justify-content-between">
                <h2 style="font-weight: bold;color: #17478d;">Thank you for contacting us</h2>
            </div>
            <div class="sub-heading">
                We will be back in touch with you within one business day using the information you just
                provided below:
            </div>
            <div class="content d-flex flex-column gap-2">
                <div style="display:flex; align-items: center; gap: 10px;">
                    <span style="font-weight: bold; flex: 0 0 10%;">Name:</span>
                    <span style="flex: 0 0 70%;"><?php echo $info['name']; ?></span>
                </div>
                <div style="display:flex; align-items: center; gap: 10px;">
                    <span style=" font-weight: bold;; flex: 0 0 10%;">Phone:</span>
                    <span style="flex: 0 0 70%;"><?php echo $info['phone']; ?></span>
                </div>
                <div style="display:flex; align-items: center; gap: 10px;">
                    <span style="font-weight: bold; flex: 0 0 10%; ">Email Address:</span>
                    <a href="mailto:<?php echo $info['email']; ?>" style="flex: 0 0 70%;"><?php echo $info['email']; ?></a>
                </div>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="font-weight: bold;flex: 0 0 10%;">Company:</span>
                    <span style="flex: 0 0 70%;"><?php echo $info['company']; ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php

    $html = ob_get_clean();
    return $html;
}