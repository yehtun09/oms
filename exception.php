<?php

$marks=[200,70,"fail",78,"pass"];
try{
   for($index=0;$index<count($marks);$index++)
   {
    if(is_numeric($marks[$index]))
    {
        echo $marks[$index];
    }else
    {
        throw new Exception("$marks[$index] is not numeric");
    }
   }
}
 
 catch(Exception $e)
 {
    echo $e->getMessage();
 };

 function Devision(){
    $num1=45;
    $num2=5;
    $division=$num1/$num2;//why not in use %
    try{
        if($division==0)
        {
            throw new DivisionByZerroError("This is division in :$division");
        }else
        {
            throw new InvalidArgumentException("This is division in Argument Error is :$division");
        }
    }
    catch(DevisionByZerroError $e)
    {
        echo $e->getMessage();
    }
    catch(InvalidArgumentException $e)
    {
        echo $e->getMessage();
    }
 }
 Devision();
?>