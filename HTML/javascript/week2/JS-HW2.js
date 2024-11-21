// TODO: Function to calculate tip and total amount
function calculations(){
const st = parseFloat(document.getElementById('stotal').value);
const per = parseFloat(document.getElementById('percentage').value);

// Validate the input
if (isNaN(st) || isNaN(per) || st <= 0 || per < 0) {
    alert('Please enter valid values.');
    return;
}

//Calculations
const tip = st * (per/100);
const total = st +tip;

//Display results
document.getElementById('tip-amount').textContent=`Tip amount : $${tip.toFixed(2)}`;
document.getElementById('total-amount').textContent=`Total amount = $${total.toFixed(2)}`;

}

document.getElementById('calculate').addEventListener('click', calculations);
