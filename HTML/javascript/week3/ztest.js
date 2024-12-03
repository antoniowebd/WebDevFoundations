// Get the form element
const registrationForm = document.getElementById("registration-form");

// Add an event listener for form submission
registrationForm.addEventListener("submit", function(event) {
  // Prevent the default form submission
  event.preventDefault();

  // Get the email input value
  const emailInput = document.getElementById("email");
  const userEmail = emailInput.value;

  // Validate the email address
  if (isValidEmail(userEmail)) {
    // If valid, submit the form
    registrationForm.submit();
  } else {
    // If invalid, display an error message
    const errorElement = document.getElementById("email-error");
    errorElement.textContent = "Please enter a valid email address.";
  }
});

// Function to validate email address
function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}
