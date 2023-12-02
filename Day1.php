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
 
  //Checking for troublesome instances and replacing them

  $patternA = '/oneight/i';
  $patternB = '/twone/i';
  $patternC = '/threeight/i';
  $patternD = '/fiveight/i';
  $patternE = '/sevenine/i';
  $patternF = '/eightwo/i';
  $patternG = '/eighthree/i';
 
 
  $preword = fgets($myfile);

$str = $preword;
$preword = preg_replace($patternA, "oneeight", $str);
$str = $preword;
$preword = preg_replace($patternB, "twoone", $str);
$str = $preword;
$preword = preg_replace($patternC, "threeeight", $str);
$str = $preword;
$preword = preg_replace($patternD, "fiveeight", $str);
$str = $preword;
$preword = preg_replace($patternE, "sevennine", $str);
$str = $preword;
$preword = preg_replace($patternF, "eighttwo", $str);
$str = $preword;
$preword = preg_replace($patternG, "eightthree", $str);

// Replaces Words with there respective digits
$pattern0 = '/one/i';
$pattern1 = '/two/i';
$pattern2 = '/three/i';
$pattern3 = '/four/i';
$pattern4 = '/five/i';
$pattern5 = '/six/i';
$pattern6 = '/seven/i';
$pattern7 = '/eight/i';
$pattern8 = '/nine/i';


$word = $preword;
$str = $word;
$word = preg_replace($pattern0, 1, $str);
$str = $word;
$word = preg_replace($pattern1, 2, $str);
$str = $word;
$word = preg_replace($pattern2, 3, $str);
$str = $word;
$word = preg_replace($pattern3, 4, $str);
$str = $word;
$word = preg_replace($pattern4, 5, $str);
$str = $word;
$word = preg_replace($pattern5, 6, $str);
$str = $word;
$word = preg_replace($pattern6, 7, $str);
$str = $word;
$word = preg_replace($pattern7, 8, $str);
$str = $word;
$word = preg_replace($pattern8, 9, $str);

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
