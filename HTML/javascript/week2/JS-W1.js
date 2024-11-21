//get the time
function greet(){
let greeting;
let name=prompt("Please enter your name");
let hrs=new Date().getHours();
let n=validateName(name);
//validate the hour

if (hrs>=5 && hrs < 12) {
    greeting="Good Morning "+name+"! Thank you for reviewing my resume site.";
}
else if (hrs>=12 && hrs<18){
    greeting="Good Afternoon "+name+"! Thank you for reviewing my resume site.";
}
else{
    greeting="Good Evening "+name+"! Thank you for reviewing my resume site.";
}
if (n==1){
    alert(greeting);
}
}



//validate the input 
function validateName(name){
    var namePattern=/^[a-zA-Z\s-]+$/;
    if (!name){
        alert("Name is required")
        return;
    }
    else if (!namePattern.test(name)){
        alert("Invalid name");
        return;
    }
    else{
    
    return 1;
    }
}