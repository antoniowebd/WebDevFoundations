document.addEventListener("submit", function(){ 
    const form = document.getElementById("survey-form");
    const responseDiv = document.getElementById("form-response");


form.addEventListener("submit", function(event) {
    event.preventDefault();

    // Validate inputs
    const firstname = document.getElementById("fname").value.trim();
    const email = document.getElementById("email").value.trim();
    const age = document.getElementById("age").value.trim();
    const gender = document.querySelector('input[name="gender"]:checked');
    const interests = Array.from(document.querySelectorAll('input[name="interests"]:checked')).map(interest => interest.value);
    const country = document.getElementById("country").value;
    const comments = document.getElementById("comments").value.trim();

    if (!validateName(firstname)) {
        alert("Please enter a valid NAME.");
        return;
    }
});

function validateName(firstname){
    let n=firstname;
    var namePattern=/^[a-zA-Z\s-]+$/;
    if (!firstname){
        alert("Name is required")
        return;
        }
    else if (!namePattern.test(firstname)){
        alert("Invalid name");
        return;
        }
    else{
    return 1;
        }
    }
   });

