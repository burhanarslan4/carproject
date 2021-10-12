<?php

class CarsController extends Controller
{

    function carlist()
    {
        $this->set('title', 'AllCars- CarList App');
        $this->set('cars', $this->Car->selectall());

    }

    function cardetail($id = null, $name = null)
    {


        $this->set('title', $name . ' - Cars List App');
        $this->set('cars', $this->Car->select($id));


    }

    function addCar(){

        $this->set('title','Success - Car List App');
        //DIR O ANDAKİ DIRECTION
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Brand= $_POST['Brand']; $Model =$_POST['Model']; $Year = $_POST['Year'];
            $Color =$_POST['Color']; $MotorPower =$_POST['MotorPower'];
            $errors = array();
            foreach ($_POST as $key=>$value){ //is can be empty or not defined
                if(!isset($value) || $value == ""){$errors[$key] = "Please type a  ".$key."...";}
            }
            if (empty($_FILES['uploadfile']['name'])) {
                $errors['uploadfile'] = "Please upload a file";
            } else {
                $targetDir = "C:/xampp/htdocs/resources/";
                $filename = basename($_FILES['uploadfile']['name']);
                $targetFilePath = $targetDir . $filename;
            }

          //githubdenemesi

            if(empty($errors)) {

                move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
                $sql = "insert into cars (Brand,Model,Year,Color,MotorPower,Photo) values('$Brand','$Model','$Year','$Color','$MotorPower','$filename')";
                $this->set('cars', $this->Car->query($sql));


                header("location: https://localhost/todo/cars/carlist");
            }
            else{
                $this->setError('errors',$errors);
            }
        }

    }


    function deletecar($id = null)
    {
        $this->set('title', 'Success - Cars list App');
        $this->set('cars', $this->Car->query('delete from cars where id = \'' . mysqli_real_escape_string($this->Car->_dbHandle, $id) . '\''
        ));
    }


}

