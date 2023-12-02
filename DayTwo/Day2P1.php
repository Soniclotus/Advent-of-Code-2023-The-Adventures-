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
//Check to see if Game would be valid
 $check = true;
 
 $redCounter = 0;
 $greenCounter = 0;
 $blueCounter = 0;

 //RegEx Patterns
    $patternA = '/red/i';
    $patternB = '/green/i';
    $patternC = '/blue/i';
 
$word = fgets($myfile);
$Game = explode(":",$word);

$Game[0];

//Getting game number
$GameNum = explode(" ",$Game[0]);

//ART IS AN EXPLOSION

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

        //Final Explosion to retrive the values

        $numColour = explode(" ",$splitColour[$j]);

        //0 is blank space before //1 num // 2 colours
        // echo $numColour[2].",";

        //Used to check if colour in set has reached the required criteria
        $pass = array(False);

        //Red Check per set
        if(preg_match($patternA,$numColour[2]))
        {
            $pass[1] = False;
             $redCounter += $numColour[1];
            
            if ($numColour[1] <= 12)
            {
                $pass[1] = True;
            }

            if($pass[1] != True)
            {
                $check = false;
            }
        }
        //Green Check Per set
        if(preg_match($patternB,$numColour[2]))
        {
            $pass[2]= False;
              $greenCounter += $numColour[1];

              if ($numColour[1] <= 13)
              {
                  $pass[2] = True;
              }
              if($pass[2] != True)
            {
                $check = false;
            }
          
        }
        //Blue Check Per Set
        if(preg_match($patternC,$numColour[2]))
        {   
            $pass[3] = False;
             $blueCounter += $numColour[1];
             if ($numColour[1] <= 14)
             {
                 $pass[3] = True;
             }
             if($pass[3] != True)
            {
                $check = false;
            }
        }
    }
}

// echo $GameNum[1]. " ";

//If the Checks have passed then add it to the  "Stack" to be added
if ($check)
{
      ($sum[] = $GameNum[1]);
    // echo "   GAME # POSSIBLE    ";
}

// echo"<br>";

// echo $word."<br>";

}

echo array_sum($sum); //Add that  bad boy
fclose($myfile);
?>

</body>
</html>
