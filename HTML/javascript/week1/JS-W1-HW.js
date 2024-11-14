// Arrays of sentence fragments

// Add an array of at least 5 Hero Adjectives
const adjectives = ["Intrepid", "Fearless", "Combative", "Strong", "Brave", "Courageous", "Bold", "Dauntless", "Gutsy"];
// Add an array of at least 5 Hero Nouns
const nouns = ["Thor", "Black Widow", "Iron Man", "Spiderman", "Wonder Woman", "Hulk", "Doctor Strange", "Captain America", "Daredevil", "Aquaman", "Wolverine"];
// Add an array of at least 5 Super Hero Powers
const powers = ["fly", "super speed", "danger warning", "super intelligence", "heat vision", "claws", "X-ray vision", "telephaty", "invisibility", "energy projection", "invulnerability", "precognition"];
// Add an array of at least 5 Super Hero Purpose/Mission Statements
const missions = ["protect the world", "defeat criminals", "fight against injustice", "establish peace", "help the weak"];

// Create a function to generate a random superhero name and description
function generate() {
    const adjective = adjectives[Math.floor(Math.random() * adjectives.length)];
    const noun = nouns[Math.floor(Math.random() * nouns.length)];    
    const power = powers[Math.floor(Math.random() * powers.length)];
    const mission = missions[Math.floor(Math.random() * missions.length)];

// Save the super hero name and description as variables
    const hero = adjective.concat(" ",noun);
    const start = "This superhero has the amazing power of "
    const description = start.concat(power," and the mission to ",mission);

    //Display the super hero name and description inside the DOM
    document.getElementById("hero-name").textContent = hero;
    document.getElementById("hero-description").textContent = description;
}

// Add event listener to the button
document.getElementById("generate-button").addEventListener("click", generate);