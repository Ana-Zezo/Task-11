<?php
use App\Helpers\DB;
use App\Classes\Student;

require "../../app/bootstrap.php";
require_once "../../core/helpers.php";
require_once path("pages/inc/header.php");
?>
<h1>All Students</h1>
<?php require_once path("pages/inc/message.php");
$students = Student::getAll();
$count = 1;
$db = new db();
?>
<a href="<?= url('pages/students/create.php') ?>" class="btn btn-primary my-3">Add Student</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($students as $student) {
            ?>
        <tr>
            <th scope="row">
                <?= $count++ ?>
            </th>
            <td>
                <?= $student["name"] ?>
            </td>
            <td>
                <?= $student["email"] ?>
            </td>
            <td>
                <?= $student["phone"] ?>
            </td>
            <td>

                <a href="<?= url("pages/students/edit.php?id={$student['id']}") ?>" class="btn
                    btn-primary">Edit</a>
                <a href="<?= url("handlers/students/delete.php?id={$student['id']}") ?>"
                    class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
require_once path("pages/inc/footer.php");
?>