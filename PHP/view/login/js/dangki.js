
    document.querySelector('form').addEventListener('submit', function (event) {
        // Lấy các giá trị từ form
        const username = document.getElementById('username').value.trim();
        const email = document.getElementById('email').value.trim();
        const telephone = document.getElementById('telephone').value.trim();

        let isValid = true;

        // Kiểm tra họ tên
        if (username === '') {
            showError('username', 'Họ tên không được để trống.');
            isValid = false;
        } else {
            clearError('username');
        }

        // Kiểm tra email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.match(emailPattern)) {
            showError('email', 'Email không hợp lệ.');
            isValid = false;
        } else {
            clearError('email');
        }

        // Kiểm tra số điện thoại
        const phonePattern = /^[0-9]{10,12}$/; // Cho phép từ 10 đến 12 số
        if (!telephone.match(phonePattern)) {
            showError('telephone', 'Số điện thoại không hợp lệ (chỉ chứa số, từ 10 đến 12 ký tự).');
            isValid = false;
        } else {
            clearError('telephone');
        }

        // Ngăn form gửi đi nếu có lỗi
        if (!isValid) {
            event.preventDefault();
        }
    });

    // Hiển thị lỗi
    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const small = field.nextElementSibling.nextElementSibling;
        field.classList.add('is-invalid');
        small.innerText = message;
        small.style.color = 'red';
    }

    // Xóa lỗi
    function clearError(fieldId) {
        const field = document.getElementById(fieldId);
        const small = field.nextElementSibling.nextElementSibling;
        field.classList.remove('is-invalid');
        small.innerText = '';
    }
