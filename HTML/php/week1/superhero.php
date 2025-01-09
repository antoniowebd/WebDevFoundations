<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Hero Generator</title>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <header>
        <h1>Super Hero Generator</h1>
    </header>
    <main>
        <form method="POST">
            <button type="submit" class="button button2" name="generate">Generate Hero</button>
        </form>
        <?php

        //Handle Generation from the form
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['generate'])) {

            //Arrays for Heroes
            $heroes = ["Thor", "Black Widow", "Iron Man", "Spiderman", "Wonder Woman", "Hulk", "Doctor Strange", "Captain America", "Daredevil", "Aquaman", "Wolverine"];
            $adjectives = ["Intrepid", "Fearless", "Combative", "Strong", "Brave", "Courageous", "Bold", "Dauntless", "Gutsy"];
            $powers = ["fly", "super speed", "danger warning", "super intelligence", "heat vision", "claws", "X-ray vision", "telephaty", "invisibility", "energy projection", "invulnerability", "precognition"];
            $missions = ["protect the world", "defeat criminals", "fight against injustice", "establish peace", "help the weak"];
            
            #Function to generate a random hero name and description
            function generateHero($heroes, $adjectives, $powers, $missions)
                {
                $hero = $heroes[array_rand($heroes)];
                $adjective = $adjectives[array_rand($adjectives)];
                $power = $powers[array_rand($powers)];
                $mission = $missions[array_rand($missions)];

                //set hero name
                $heroName = "$hero";
                $heroDescription = "This hero is $adjective,has $power power, and the mission to $mission";

                //set hero description
                return [$heroName, $heroDescription];
            }
            #Displays Hero Name and Description
            //Call the function
            list($heroName, $heroDescription) = generateHero($heroes, $adjectives, $powers, $missions);

            //Display the hero information
            echo "<section id = 'hero'>
                <h2 id= 'hero_name'>$heroName</h2>
                <p id='hero_description'>$heroDescription</p>
                </section>";
        }
        ?>

    </main>
</body>
</html>