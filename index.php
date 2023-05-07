<?php session_start();
    $_SESSION["Password"] = "";
    
    
    $upp_case ='ABCDEFGHILJKMNOPQRSTUVWZ';
    $low_case = 'abcdefghiljkmnopqrstuwvz';
    $num = '0123456789';
    $spec = '._-#*=%&$£"!@';

    $all = "$upp_case$low_case$num$spec";
    $no_num = "$upp_case$low_case$spec";
    $no_spec ="$upp_case$low_case$num";
    $specNnum_only ="$num$spec";

    include_once __DIR__ . "/functions/generatePassword.php";

    if(isset($_GET['length'])){
        $length = $_GET['length'];
        $_SESSION["password"] = generateRndPassword($all, $length);
        
        
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>PASSWORD GENERATOR</h1>
        <form action="index.php" method="GET">
            <label for="length">Lunghezza password :</label>
            <input type="number" name="length" id="length" min="5" value="5">
            <input type="submit" value="genera">
            <?php if(isset($_GET['length'])){?>
                    <a href="password.php">visualizza password</a>
            <?php } ?>
        </form>
    </div>
</body>
</html>