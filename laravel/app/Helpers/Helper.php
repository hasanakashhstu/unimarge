<?php
namespace App\Helpers;
class Helper
{
    public static function FindGrade($mark)
    {
  		if(($mark> 3.75) and ($mark<=4.00))
  		{
  			return "A+";
  		}
  		elseif(($mark> 3.50) and ($mark<=3.75))
  		{
  			return "A";
  		}
  		elseif(($mark> 3.25) and ($mark<=3.50))
  		{
  			return "A-";
  		}
  		elseif(($mark> 3.00) and ($mark<=3.25))
  		{
  			return "B+";
  		}
  		elseif(($mark> 2.75) and ($mark<=3.00))
  		{
  			return "B";
  		}
  		elseif(($mark> 2.50) and ($mark<=2.75))
  		{
  			return "B-";
  		}
  		elseif(($mark> 2.25) and ($mark<=2.50))
  		{
  			return "C+";
  		}
  		elseif(($mark> 2.00) and ($mark<=2.25))
  		{
  			return "C";
  		}
  		elseif(($mark> 0.00) and ($mark<=2.00))
  		{
  			return "D";
  		}
  		else
  		{
  			return "F";
  		}
    }
}