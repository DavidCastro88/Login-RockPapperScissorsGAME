<!DOCTYPE html>
<head><title>David Castro MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash of a four digit pin and check all 10,000 possible four digit PINs to determine the PIN.</p>
<pre>
Debug Output:
<?php
$valor = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $comienzo = microtime(true);
    $md5 = $_GET['md5'];
    // This is numbers from 0 to 9
    $numeros = "0123456789";
    $cont = 15;
    for($i=0; $i<strlen($numeros); $i++ ) {
        $ch1 = $numeros[$i];   // The first of two characters
        for($j=0; $j<strlen($numeros); $j++ ) {
            $ch2 = $numeros[$j];  // second character
            for($k=0; $k<strlen($numeros); $k++ ) {
                $ch3 = $numeros[$k];// third character
                for($h=0; $h<strlen($numeros); $h++ ) {
                    $ch4 = $numeros[$h]; // four character
            // Concatenate the 4 numbers together to 
            // form the "possible" pre-hash text
                        $num = $ch1.$ch2.$ch3.$ch4;

            // Run the hash and then check to see if we match
                        $check = hash('md5', $num);
                        if ( $check == $md5 ) {
                            $valor = $num;
                            break;   // Exit the inner loop
                        }
                        if ( $cont > 0 ) {
                        print "$check $num\n";
                        $cont = $cont - 1;
                        }
                }
            }
        }
    }
    print "<br>";
    $final = microtime(true);
    print "Ellapsed time: ";
    print $final-$comienzo;
    print "\n";
}
?>
</pre>
<p>PIN: <?= htmlentities($valor); ?></p>
<form>
<input type="text" name="md5" size="40">
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
</ul>
</body>
</html>
