<!DOCTYPE html>
<html>
<body>

<?php
// Opening Files
$myfile = fopen("TXTs/txt2.txt", "r") or die("Unable to open file!");

//Array to get the total
$sum  = array (0);

while(!feof($myfile)) 
{

 $redCounter = 1;
 $greenCounter = 1;
 $blueCounter = 1;

  //RegEx Patterns
    $patternA = '/red/i';
    $patternB = '/green/i';
    $patternC = '/blue/i';
 
$word = fgets($myfile);
$Game = explode(":",$word);
$Game[0];
//Getting game number
$GameNum = explode(" ",$Game[0]);


//ART IS AN EXPLOSION PART 2  

//Turns list into an array using : as the delimitter
$coloursOnly = explode(":", $word);
//Further turns it into an even smaller array
$coloursNoSemi = explode(";",$coloursOnly[1]);

//For Loop for the size of total number of Sets
for($i = 0; $i < count($coloursNoSemi);$i++)
{
     //Turns each individual value in the set into an array 
    $splitColour = explode(",",$coloursNoSemi[$i]);
    
    for ($j = 0; $j < count($splitColour); $j++)
    {
        // echo $splitColour[$j];

            //Final Explosion (for real this time) to retrive the values
        $numColour = explode(" ",$splitColour[$j]);

        //0 is blank space before //1 num // 2 colours
        // echo $numColour[2].",";

        
        //Checks if the Red in That particular game is the biggest
        if(preg_match($patternA,$numColour[2]))
        {
            if ($numColour[1] > $redCounter)
            {
                $redCounter = $numColour[1];
            }
        }
        //Checks if the Green in That particular game is the biggest
        if(preg_match($patternB,$numColour[2]))
        {
            if ($numColour[1] > $greenCounter)
            {
                $greenCounter = $numColour[1];
          
            }
        }
        //Checks if the Blue in That particular game is the biggest
        if(preg_match($patternC,$numColour[2]))
        {   
            
            if ($numColour[1] > $blueCounter)
            {
                $blueCounter = $numColour[1];
            }
        }
    }
}

//Multiplies the max of each colour on each line
$power = $redCounter*$greenCounter*$blueCounter;


//stores them in the "Stack"
     ($sum[] = $power);
   

// echo"<br>";

// echo $word."<br>";

}

 echo array_sum($sum); // Add them together
fclose($myfile);
?>

</body>
</html>
