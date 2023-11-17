<?php
require "../../app/bootstrap.php";
require_once path("pages/inc/header.php");
use App\Helpers\DB;
use App\Helpers\Request;
use App\Helpers\Session;
use App\Helpers\ErrorMessage;
use App\Classes\Student;

if (Request::requestGet()) {
    $db = new DB();
    $id = Request::get("id");
    $student = Student::find($id);
    if (!empty($student)) {
        // Student::delete($id);
        // Session::set("success", "Successful Update Student");

        ?>
<h1 class="text-center mb-5">Edit Students</h1>
<!-- <a href="<?= url('pages/students/index.php') ?>" class="btn btn-primary my-3">Add New Students</a> -->
<?php
        // unset($_SESSION['error']);
        require_once path("pages/inc/message.php");
        ?>
<form action="<?= url('handlers/students/update.php') ?>" method="POST">
    <input type="hidden" name="student_id" value="<?= $student["id"] ?>" id="">
    <div class="row">
        <div class="mb-3">
            <label for="name" class="form-label">Name : </label>
            <input type="text" class="form-control" id="name" value="<?= $student["name"] ?>" name="name"
                placeholder="Enter Name..." aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email : </label>
            <input type="email" name="email" class="form-control" value="<?= $student["email"] ?>"
                placeholder="Email Address..." id="email" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone : </label>
            <input type="text" name="phone" placeholder="Phone..." value="<?= $student["phone"] ?>" class="form-control"
                id="phone">
        </div>
        <button type="submit" class="btn btn-primary my-3 w-auto">Update</button>
    </div>
</form>
<?php
        require_once path("pages/inc/footer.php");
    } else {
        $errors = new ErrorMessage();
        $errors->add("Id Not Found!");
        Session::set("errors", $errors->all());
        redirect("pages/students/index.php");
    }
}
?>