<?php
require_once("../../app/bootstrap.php");
use App\Helpers\Request;
use App\Helpers\Validation;
use App\Helpers\ErrorMessage;
use App\Helpers\Session;
use App\Classes\Student;

if (Request::requestGet()) {
    $id = Request::get("id");
    echo $id;
    $student = Student::find($id);
    // if ($student) {
    //     Student::delete($id);
    //     Session::set("success", "Successful Delete Student");
    //     redirect("pages/students/index.php");
    // } else {
    //     redirect("pages/students/index.php");
    //     $errors = new ErrorMessage();
    //     $errors->add("Id Not Found!");
    //     Session::set("errors", $errors->all());
    // }
    // Example usage in delete.php

    if (!empty($student)) {
        Student::delete($id);
        Session::set("success", "Successful Delete Student");
    } else {
        $errors = new ErrorMessage();
        $errors->add("Id Not Found!");
        Session::set("errors", $errors->all());
    }
    redirect("pages/students/index.php");

} else {
    echo "Emah";
}