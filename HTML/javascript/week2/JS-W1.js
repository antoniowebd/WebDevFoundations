//get the time
function greet(){
let greeting;
let name=document.getElementById("fname").value;
let hrs=new Date().getHours();
//validate the hour
if (hrs < 12) {
    greeting="Good Morning"+name+"! Thank you for reviewing my resume site.";
}
else if (hrs<18){
    greeting="Good Afternoon"+name+"! Thank you for reviewing my resume site.";
}
else{
    greeting="Good Evening "+name+"! Thank you for reviewing my resume site.";
}
//validate the input 
if (isNaN(name)){
    document.getElementById("time").innerHTML=greeting;
}
else {
    greeting="Input not valid";
    document.getElementById("time").innerHTML=greeting;
}
}