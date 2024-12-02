

form.addEventListener("submit", function(event) {
    event.preventDefault();

   

});

function matchEmailRegex(emailStr) {
    var emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return emailStr.match(emailRegex);
};

function validateEmail(emailField) {
    var emailStr = emailField.value;
    if (matchEmailRegex(emailStr)) {
        alert("Entered value is a valid email.");
    } else {
        alert("Entered value is not an email.");
    }
    return false;
}


function validateName(firstName, lastName) {
    var namePattern = /^[a-zA-Z\s-]+$/;

    if (!firstName || !lastName) {
        return "First name and last name are required.";
    }

    if (!namePattern.test(firstName) || !namePattern.test(lastName)) {
        return "Invalid first name or last name.";
    }

    return "Valid name.";
}

// Handle form submission
function submitForm() {
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;

    var validationMessage = validateName(firstName, lastName);

    document.getElementById("result").textContent = validationMessage;
}