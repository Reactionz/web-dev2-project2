<?php DEFINE("STYLESHEET", "project2.css"); 
$userName = ( isset($_SESSION['username']) ? $_SESSION['username'] : null);
?>

<head>
        <link href = "<?=STYLESHEET?>" rel ="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
