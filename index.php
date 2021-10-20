<?php
$dubble = false;
if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["Names"])) {
        $_SESSION["Names"] = [];
    }
}
if (isset($_POST["Clear"])) {
    session_destroy();
    session_start();
    if (!isset($_SESSION["Names"])) {
        $_SESSION["Names"] = [];
    }
}
if (isset($_POST["Name"])) {
    $aantalNames = count($_SESSION["Names"]);
    for ($i = 0; $i < $aantalNames; $i++) {
        if ($_SESSION["Names"][$i] == $_POST["Name"]) {
            $dubble = true;
        }
    }
    if ($dubble == false) {
        array_push($_SESSION["Names"], $_POST["Name"]);
    }
}
if (isset($_POST["Select"])) {
    $aantalNames = count($_SESSION["Names"]);
    $aantalNames = $aantalNames - 1;
    $chosenName = rand(1, $aantalNames);
}
?>
<html>
    <head>
        <h1>Name Selector</h1>
    </head>
    <body>
    <?php
    if (isset($chosenName)) {
        $displayName = $_SESSION["Names"][$chosenName];
        ?><h1><?php echo "$displayName"?></h1><?php
    }
    
    ?>
        <form action="index.php" method="post">
        Name:<br/> <input type="text" name="Name">
        <input type="submit" name="submit" value="Add Name">
        <br>
        <input type="submit" name="Select" value="Select Random Name">
        <br>
        <input type="submit" name="Clear" value="Clear All Names">
        </form>
        <?php
        $aantalNames = count($_SESSION["Names"]);
        for ($i = 0; $i < $aantalNames; $i++) {
            $nameDisplay = $_SESSION["Names"][$i];
            echo "$nameDisplay";
            ?><br><?php
        }
        ?>
    </body>
</html>