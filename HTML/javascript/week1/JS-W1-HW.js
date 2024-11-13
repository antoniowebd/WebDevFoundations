// Arrays of sentence fragments

// Add an array of at least 5 Hero Adjectives
const heroAdjectives = ["Clever", "Kind", "Combative", "Strong", "Brave"];
// Add an array of at least 5 Hero Nouns
const heroNouns = ["Superman", "Black Widow", "Iron Man", "Spiderman", "Wonder Woman"];
// Add an array of at least 5 Super Hero Powers
const powers = ["persuasion", "super speed", "danger warning", "super intelligence", "heat vision"];
// Add an array of at least 5 Super Hero Purpose/Mission Statements
const missions = ["protect the city", "save the world", "fight injustice", "defend the weak", "seeking justice"];

// Create a function to generate a random superhero name and description
function generateSuperHero() {
    const adjective = heroAdjectives[Math.floor(Math.random() * heroAdjectives.length)];
    const noun = heroNouns[Math.floor(Math.random() * heroNouns.length)];    
    const power = powers[Math.floor(Math.random() * powers.length)];
    const mission = missions[Math.floor(Math.random() * missions.length)];

// Save the super hero name and description as variables
    const heroName = `${adjective} ${noun}`;
    const heroDescription = `This super hero has the power of ${power} and their mission is to ${mission}.`;

    //Display the super hero name and description inside the DOM
    document.getElementById("hero-name").textContent = heroName;
    document.getElementById("hero-description").textContent = heroDescription;
}

// Add event listener to the button
document.getElementById("generate-button").addEventListener("click", generateSuperHero);