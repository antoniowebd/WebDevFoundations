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
    document.getElementById("time").innerHTML=greeting;
}
}



//validate the input 
function validateName(name){
    var namePattern=/^[a-zA-Z\s-]+$/;
    var msj;
 
    if (!name){
        msj= "Name is required";
 
        document.getElementById("time").innerHTML=msj;
        return 0;
    }
    else if (!namePattern.test(name)){
        msj= "Invalid name";
        valido=0;
        document.getElementById("time").innerHTML=msj;
        return 0;
    }
    else{
    
    return 1;
    }
}