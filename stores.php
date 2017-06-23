<?php
$pageTitle ="canadian tire";
require_once('header.php');

?>

<main class="container">
    
    <?php

    //Step 1 - connect to the DB
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200359541',
        'gc200359541', 'wl3tDZWsQf');
    $conn->setAttribute(PDO::ERRMODE_EXCEPTION);
    $cityID = $_GET['cityId'];
    $sql = "SELECT * FROM stores WHERE cityID = :cityID";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':cityID', $cityID, PDO::PARAM_INT);
    //step 4 - execute and store the results
    $cmd->execute();
    $cities = $cmd->fetchAll();

    //step 5 - disconnect from the DB
    $conn = null;


    echo '<table class="table">
            <tr><th>Store Name</th>
                <th>Address</th>
				<th>Manager</th>
				<th>Phone</th>
				<th>Delete</th></tr>';


    foreach($cities as $city)
    {
        echo '<tr><td>'.$city['storeName'].'</td>
                      <td>'.$city['address'].'</td>
					   <td>'.$city['manager'].'</td>
					    <td>'.$city['phone'].'</td>
						  <td>'.$city['address'].'</td>
						  <td><a href="delete.php?storeID='.$city['storeID'].'?cityId='.$city['cityID'].'"
                                class="btn btn-danger confirmation">Delete</a></td>';
    }


    echo '</tr>';


    echo '</table></main>';


    ?>


