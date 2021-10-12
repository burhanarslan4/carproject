<html>
<form action="https://localhost/todo/cars/addcar" method="POST" enctype="multipart/form-data">
    <p> Marka</p><input type="text" name="Brand" value="<?php if (!empty($_POST['Brand'])) {
        echo $_POST['Brand'];
    } ?>"<input>
    <?php if (isset($errors['Brand'])) { ?>
        <span style="color: red"> <?php echo $errors['Brand']; ?></span>
    <?php } ?>
    <p> Model</p><input type="text" name="Model" value="<?php if (!empty($_POST['Model'])) {
        echo $_POST['Model'];
    } ?>" </input>
    <?php if (isset($errors["Model"])) { ?>
        <span style="color: red" ></span><?php echo $errors["Model"]; ?></span>
    <?php } ?>
    <p> Yılı</p><input type="text" name="Year" value="<?php if (!empty($_POST['Year'])) {
        echo $_POST['Year'];
    } ?>" </input>
    <?php if (isset($errors["Year"])) { ?>
        <span style="color: red" ></span><?php echo $errors["Year"]; ?></span>
    <?php } ?>
    <p> Rengi</p><input type="text" name="Color" value="<?php if (!empty($_POST['Color'])) {
        echo $_POST['Color'];
    } ?>"  </input>
    <?php if (isset($errors["Color"])) { ?>
        <span style="color: red" ></span><?php echo $errors["Color"]; ?></span>
    <?php } ?>
    <p> MotorGucu</p><input type="text" name="MotorPower" value="<?php if (!empty($_POST['MotorPower'])) {
        echo $_POST['MotorPower'];
    } ?>"</input>
    <?php if (isset($errors["MotorPower"])) { ?>
        <span style="color: red"> <?php echo $errors["MotorPower"]; ?></span>
    <?php } ?>
    <br><br>
    <p>Arabanın Resmini Seçiniz</p><input type="file" name="uploadfile"  </input>
    <?php if (isset($errors["uploadfile"])) { ?>
        <span style="color: red" <?php echo $errors["uploadfile"]; ?></span>
    <?php } ?>
    <br><br> <input type="submit" name="cars">





</form>
</html>

