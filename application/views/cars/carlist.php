


    <?php foreach ($cars as $carname):
        ?>
        <a class="big"
           href="../cars/cardetail/<?php echo $carname['Car']['Id'] ?>/<?php echo strtolower(str_replace(" ", "-", $carname['Car']['brand'])) ?>">

    <?php echo $carname['Car']['brand'] ?>
        <?php echo $carname['Car']['Model'] ?>/<?php echo $carname['Car']['Year'] ?>/<?php echo $carname['Car']['Color'] ?>/<?php echo $carname['Car']['MotorPower'] ?>

        </a><br/>
    <?php endforeach ?>

