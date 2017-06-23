<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle ?></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="css/styles.css">

</head>
<body>

<nav class="nav navbar-inverse">
    <ul class="nav navbar-nav">


        <?php

        session_start();


        //Step 1 - connect to the DB
        $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200359541',
            'gc200359541', 'wl3tDZWsQf');
        $conn->setAttribute(PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM cities ";
        $cmd = $conn->prepare($sql);

        //step 4 - execute and store the results
        $cmd->execute();
        $cities = $cmd->fetchAll();
        //step 5 - disconnect from the DB
        foreach($cities as $city) {
            $cityID = $city['cityID'];
            echo '<li><a href="stores.php?cityID=' . $cityID . '">' . $city['city'] . '</a></li>';

        }
        $conn = null;
        echo'<li><a href="add_store.php">Add a new store</a></li>
                 
                  </ul>';

        ?>
    </ul>
</nav>
</body>
</html>
