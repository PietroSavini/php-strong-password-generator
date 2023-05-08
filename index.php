<?php 
    session_start();
    $_SESSION["Password"] = "";
    
    
    $upp_case ='ABCDEFGHILJKMNOPQRSTUVWZ';
    $low_case = 'abcdefghiljkmnopqrstuwvz';
    $num = '0123456789';
    $spec = '._-#*=%&$£"!@';

    $all = "$upp_case$low_case$num$spec";
    $letters_only ="$upp_case$low_case";

    include_once __DIR__ . "/functions/generatePassword.php";

    if(isset($_GET['length'])){
        $length = $_GET['length'];
        $psw_type;
        //controllo checkbox / filtri
        $type = $_GET['type'] ?? [];
        if(count($type) === 0){
            $psw_type = $all;
        }else{
            if(in_array('L', $type)){
                $psw_type .= $letters_only;
            }
            if(in_array('N', $type)){
                $psw_type .= $num;
            }
            if(in_array('S', $type)){
                $psw_type .= $spec;
            }
        }
        
        $_SESSION["password"] = generateRndPassword($psw_type, $length);
        header("Location: password.php");
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
            <input type="number" name="length" id="length" min="5" value="<?php echo $_GET['length'] ?? '5'?>">
            <input type="submit" value="genera">

            <br>
            <label for="repat-y">consenti ripetizioni di caratteri: </label>
            <span>si</span>
            <input type="radio" name="repeat" id="repeat-y">
            <span>no</span>
            <input type="radio" name="repeat" id="repeat-n">
            <br>
            <label for="letters">lettere</label>
            <input type="checkbox" name="type[]" id="letters" value="L">
            <br>
            <label for="type[]">numeri</label>
            <input type="checkbox" name="type[]" id="numbers" value="N">
            <br>
            <label for="special">speciali</label>
            <input type="checkbox" name="type[]" id="special" value="S">

            <?php if(isset($_GET['length'])){?>
                    <a href="password.php">visualizza password</a>
            <?php } ?>
        </form>
    </div>
</body>
</html>