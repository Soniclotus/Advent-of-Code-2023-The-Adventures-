<!DOCTYPE html>
<html>
<body>
<?php
// Opening Files
$myfile = fopen("TXTs/txt1.txt", "r") or die("Unable to open file!");

//Array to get the total
$sum  = array (0);

while(!feof($myfile)) 
{
 
  $word = fgets($myfile);
  $num = 0;


//Concatenates all the numbers on the line
  for ($i = 0 ; $i < strlen($word); $i++)
  {
    if(preg_match('/(\d)/', $word[$i]))
    {
       $num = $num.$word[$i];
      
    } 
  }

// Retrives the first digit and last digit of concatenated number
   $val = substr($num, 0,2). substr($num, -1);
 

// echo $num ."<br>";


//Adds each new number to the array to be added
if($num !=0 )
{
  ($sum[] =$val);  //array_push($sum,$val) is an alterantive if adding multiple values to the array
}
 
//  echo $word . "<br>";
}

// gets the sum of the array
  echo array_sum($sum);

fclose($myfile);
?>

</body>
</html>
