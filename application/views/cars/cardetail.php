
<h2><?php echo $cars['Car']['Id'];  echo $cars['Car']['brand'];
   echo $cars['Car']['Model'];echo $cars['Car']['Year'];echo $cars['Car']['Color'];echo $cars['Car']['MotorPower'];?></h2>

 <img src= "<?php echo "http://localhost/resources/".$cars['Car']['Photo'];?>" width="100px" height="100px"/>


<a class="big" href="../../../cars/delete.car/<?php echo $cars['Car']['Id'] ?>">
	<span class="car">
	Delete this car
	</span>
</a><br/>

