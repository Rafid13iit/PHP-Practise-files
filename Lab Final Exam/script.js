document.addEventListener("DOMContentLoaded", function() {
    const contactForm = document.getElementById("contactForm");

    contactForm.addEventListener("submit", function(event) {
        event.preventDefault();

        // Validate form fields
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const subject = document.getElementById("subject").value;
        const message = document.getElementById("message").value;

        if (name === "" || email === "" || subject === "" || message === "") {
            alert("All fields are required");
            return;
        }

        // Submit form
        this.submit();
    });
});
