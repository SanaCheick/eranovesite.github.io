document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        fetch('contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert("Message envoyé avec succès !");
            document.getElementById("contactForm").reset();
        })
        .catch(error => console.error('Error:', error));
    });
});
