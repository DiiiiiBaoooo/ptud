// Function to show the alert
function showAlert(title, message, onConfirm, onCancel) {
    const alertOverlay = document.createElement("div");
    alertOverlay.className = "alert-overlay";

    const alertBox = document.createElement("div");
    alertBox.className = "alert-box";

    alertBox.innerHTML = `
        <h3>${title}</h3>
        <p>${message}</p>
        <button class="alert-btn confirm">Xác nhận</button>
        <button class="alert-btn cancel">Hủy</button>
    `;

    alertOverlay.appendChild(alertBox);
    document.body.appendChild(alertOverlay);

    // Add show animation
    setTimeout(() => {
        alertOverlay.classList.add("show");
        alertBox.classList.add("show");
    }, 10);

    // Event listeners for buttons
    const confirmBtn = alertBox.querySelector(".confirm");
    const cancelBtn = alertBox.querySelector(".cancel");

    confirmBtn.addEventListener("click", () => {
        onConfirm && onConfirm();
        closeAlert(alertOverlay);
    });

    cancelBtn.addEventListener("click", () => {
        onCancel && onCancel();
        closeAlert(alertOverlay);
    });
}

// Function to close the alert
function closeAlert(alertOverlay) {
    alertOverlay.classList.remove("show");
    setTimeout(() => {
        document.body.removeChild(alertOverlay);
    }, 300);
}

// Example usage
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("testAlert").addEventListener("click", () => {
        showAlert(
            "Xác nhận Xóa",
            "Bạn có chắc chắn muốn xóa nhân viên này không?",
            () => alert("Đã xác nhận!"),
            () => alert("Đã hủy!")
        );
    });
});
