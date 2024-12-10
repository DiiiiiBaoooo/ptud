<?php
session_start();

// Lấy thông báo từ session
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
$message_type = isset($_SESSION['message_type']) ? $_SESSION['message_type'] : '';

// Xóa thông báo sau khi hiển thị
unset($_SESSION['message']);
unset($_SESSION['message_type']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo đẹp</title>

    <style>
        /* CSS cho thông báo */
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50; /* Màu nền xanh */
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            z-index: 9999;
            display: none; /* Mặc định ẩn */
            transition: opacity 0.5s ease-in-out;
        }

        .alert.show {
            display: block;
            opacity: 1;
        }

        .alert.error {
            background-color: #f44336; /* Màu nền đỏ */
        }

        .alert.success {
            background-color: #4CAF50; /* Màu nền xanh */
        }

        .alert.info {
            background-color: #2196F3; /* Màu nền xanh dương */
        }

        .alert .close-btn {
            margin-left: 15px;
            font-size: 18px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- Thông báo -->
    <div id="alert" class="alert <?php echo $message_type; ?>">
        <span id="alert-message"><?php echo $message; ?></span>
        <span class="close-btn" onclick="closeAlert()">×</span>
    </div>

    <script>
        // Hàm hiển thị thông báo
        function showAlert(message) {
            var alertBox = document.getElementById('alert');
            var messageBox = document.getElementById('alert-message');
            messageBox.textContent = message;

            alertBox.classList.add('show');
            setTimeout(function () {    
                alertBox.classList.remove('show');
            }, 10000); // Ẩn sau 4 giây
        }

        // Hàm đóng thông báo
        function closeAlert() {
            document.getElementById('alert').classList.remove('show');
        }

        // Hiển thị thông báo nếu có thông báo trong session
        <?php if ($message != '') { ?>
            showAlert('<?php echo $message; ?>');
        <?php } ?>
    </script>

</body>

</html>
