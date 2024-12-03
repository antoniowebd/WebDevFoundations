/*document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("survey-form");
    const responseDiv = document.getElementById("form-response");*/

    const form = document.getElementById("registration-form");

    form.addEventListener("submit", function(event) {
    event.preventDefault();

        // Validate inputs
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const age = document.getElementById("age").value.trim();
        const gender = document.querySelector('input[name="gender"]:checked');
        const interests = Array.from(document.querySelectorAll('input[name="interests"]:checked')).map(interest => interest.value);
        const country = document.getElementById("country").value;
        const comments = document.getElementById("comments").value.trim();

        if (!name || !email || !age || !gender) {
            alert("Please fill in all required fields.");
            return;
        }

        if (!validateEmail(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        // Display success message
        responseDiv.textContent = "Thank you for your submission!";
        responseDiv.style.display = "block";

        // Optionally, clear the form
        form.reset();
   

    });

    function matchEmailRegex(emailStr) {
        var emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return emailStr.match(emailRegex);
    };

    function validateEmail(emailField) {
        var emailStr = emailField.value;
        if (matchEmailRegex(emailStr)) {
            alert("Entered value is a valid email.");
            
            form.reset();
        } else {
            alert("Entered value is not an email.");
        }
        return false;
    }


    function validateName(firstName) {
        var namePattern = /^[a-zA-Z\s-]+$/;

        if (!firstName) {
            return "Name is required.";
        }

        if (!namePattern.test(firstName)) {
            return "Invalid Name.";
        }
        validateEmail(document.form.email)
        //return "Valid name.";
    }

    // Handle form submission
    function submitForm() {
        var firstName = document.getElementById("firstName").value;

        var validationMessage = validateName(firstName);
        alert("validationMessage");
        document.getElementById("result").textContent = validationMessage;
    }
/*})*/