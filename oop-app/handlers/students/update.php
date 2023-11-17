<?php
require_once("../../app/bootstrap.php");
use App\Helpers\Request;
use App\Helpers\Validation;
use App\Helpers\ErrorMessage;
use App\Helpers\Session;
use App\Classes\Student;

if (Request::requestPost()) {
    $errors = new ErrorMessage();
    foreach (Request::allData() as $key => $value) {
        $$key = Validation::sanitize($value);
    }
    $id = Validation::sanitize(Request::get("student_id"));
    $student = Student::find($id);
    if (!empty($student)) {
        if (Validation::required($name))
            $errors->add("Name Is Required Value!");
        if (Validation::minVal($name, 3))
            $errors->add("Name Is Less Than 3");
        if (Validation::maxVal($name, 25))
            $errors->add("Name Is Greater Than 25");
        if (Validation::required($email))
            $errors->add("Email Is Required Value");
        if (Validation::unique($email, 'email', 'students', $id))
            $errors->add("Email Already Exist");
        if (Validation::emailVal($email))
            $errors->add("Please Enter Valid Email");

        if ($errors->errorExit()) {
            // There are errors
            Session::set("errors", $errors->all());
            redirect("pages/students/edit.php?id=$id");
        } else {
            $data = [
                "name" => $name,
                "email" => $email,
                "phone" => $phone ? $phone : null,
            ];
            if (Student::update($id, $data)) {
                Session::set("success", "Student Updated Successful");
                redirect("pages/students/index.php");
            } else {
                $errors->add("Error Updated Student");
                Session::set("errors", $errors->all());
                redirect("pages/students/edit.php?id=$id");
            }
        }
    } else {
        $errors->add("Error Update Student");
        Session::set("errors", $errors->all());
        redirect("pages/students/index.php");
    }


} else {
    echo "Emah";
}