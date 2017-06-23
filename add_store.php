<?php

require_once('header.php');

?>
<h1>ADD A NEW STORE</h1>
<form method="post" action="stores.php">

    <div>

<fieldset>
        <label for="racerName">Store name</label>
        <input name="store name" id="store name" required />
    </div>
    <div>
        <label for="address">address</label>
        <input name="address" id="address"  required />
    </div>
</form>

       <!-- <form method="post" action="savecar.php">   -->
            <fieldset class="form-group">
                <label for="city" class="col-sm-1">Choose city:</label>
                <select name="cityId" id="city">
                    <?php
                    //Step 1 - connect to the DB
                    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200359541',
                        'gc200359541', 'wl3tDZWsQf');
                    $conn->setAttribute(PDO::ERRMODE_EXCEPTION);
                    //Step 2 - create the SQL statement
                    $sql = "SELECT cityId FROM cities";
                    //Step 3 - prepare & execute the SQL statement
                    $cmd = $conn->prepare($sql);
                    $cmd->execute();
                    $cities = $cmd->fetchAll();
                    //Step 4 - loop over the results to build the list with <option> </option>
                    foreach ($cities as $city) {
                        echo '<option>'. $city['cities'] .'</option>';
                    }
                    //Step 5 - disconnect from the DB
                    $conn = null;
                    ?>
                </select>
            </fieldset>

                <fieldset class="form-group">
                    <label for="phone" class="col-sm-2">Phone: *</label>
                    <input name="phone" id="phone" value="<?php echo $phone?>"  required type="phone" />
                </fieldset>
                <fieldset class="form-group">
                    <label for="manager" class="col-sm-2">Manager Name: </label>
                    <input name="manager" id="manager" value="<?php echo $manager?>" placeholder="Manager name"/>
                </fieldset>
<button class="btn btn-success col-sm-offset-2">SAVE STORE</button>
</form>





