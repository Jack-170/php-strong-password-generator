<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head lang="<?php echo $str_language; ?>" xml:lang="<?php echo $str_language; ?>">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>php-strong-password-generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <style type="text/css">


    </style>

    <?php
    session_start();
    ?>


</head>

<body>


    <div class="container p-3 text-center">
        <form>
            <input type="number" name="user_number" placeholder="Enter a number" min="1" pattern="\d+">
            <input type="submit" value="Generate">
        </form>



    </div>

    <?php
    require_once __DIR__ . "/partials/functions.php";

    if (isset($_GET['user_number'])) {

        $password_length = filter_var($_GET['user_number'], FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));

        if ($password_length !== false) {

            $randomPassword = generateRandomPassword($password_length);
            echo "Password generata: " . $randomPassword;
            $_SESSION["randomPassword"] = $randomPassword;
            header('Location: ./password_result.php');
        } else {
            echo "Invalid input. Please enter a valid positive integer.";
        }
    }


    ?>




</body>

</html>