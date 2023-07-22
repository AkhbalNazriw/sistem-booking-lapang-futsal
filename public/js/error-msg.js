document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("login-form");
    form.addEventListener("submit", function(event) {
        var usernameInput = document.getElementById("username");
        var passwordInput = document.getElementById("password");

        if (usernameInput.value.trim() === "" || passwordInput.value.trim() === "") {
            event.preventDefault();
            var errorContainer = document.getElementById("error-container");
            errorContainer.textContent = "Mohon isi semua field.";
            errorContainer.style.display = "block";
        }
    });
});