<?php 
    //1st pattern
    //Like Right Triangle
    /* This pattern will be like this:
        * 
        * *
        * * *
        * * * *
        * * * * *
    */
    echo "First Pattern: \n";
    $firstPattern = 5;
    for($i = 0; $i < $firstPattern; $i++){
        for($j = 0; $j <= $i; $j++){
            echo "* ";
        }
        echo PHP_EOL;
    }


    //1st pattern
    //Look like Pyramid
    /* This pattern will be like this:
            *
           * *
          * * *
         * * * *
        * * * * *
    */
    echo "Second Pattern: \n";
    $secondPattern = 5;
    //Outer loop
    for($i = 1; $i <= $secondPattern; $i++){
        //space loop
        for($j = $secondPattern-1; $j >= $i; $j--){
            echo " ";
        }
        //print star loop
        for($k = 1; $k <= $i; $k++){
            echo "* ";
        }
        echo PHP_EOL;
    }

    //Look like Pyramid
    /* This pattern will be like this:
        * * * * *
         * * * *
          * * *
           * *
            *    
    */
    $thirdPattern = 5;
    echo "Third pattern: \n";
    for($i = $thirdPattern; $i >= 1; $i--){
        for ($j = $thirdPattern -1; $j >= $i; $j--){
            echo " ";
        }
        for($k = 1; $k <= $i; $k++){
            echo "* ";
        }
        echo PHP_EOL;
    }
    

    // Make a ternary operator where 4 condition will be run
    $a = 5;
    $b = 6;
    $c = 7;
    $d = 4;
    $whoIsLarger = $a>$b && $a>$c && $a>$d ? "The larger number is $a" : ($b>$a && $b>$c && $b>$d ? "The largest number is $b" : ($c>$a && $c>$b && $c>$d ? "The largest number is $c" : "The largest number is $d"));
    echo $whoIsLarger;


    //Alhamdulillah home work done




    



?>