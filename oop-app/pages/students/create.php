<?php
require "../../app/bootstrap.php";
require_once "../../core/helpers.php";
require_once path("pages/inc/header.php");
?>
<h1>All Students</h1>
<a href="<?= url('pages/students/index.php') ?>" class="btn btn-primary my-3">Add New Students</a>
<?php
// unset($_SESSION['error']);
require_once path("pages/inc/message.php");
?>
<form action="<?= url('handlers/students/insert.php') ?>" method="POST">
    <div class="row">
        <div class="mb-3">
            <label for="name" class="form-label">Name : </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name..."
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email : </label>
            <input type="email" name="email" class="form-control" placeholder="Email Address..." id="email"
                aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone : </label>
            <input type="text" name="phone" placeholder="Phone..." class="form-control" id="phone">
        </div>
        <button type="submit" class="btn btn-primary my-3 w-auto">Add</button>
    </div>
</form>
<?php
require_once path("pages/inc/footer.php");
?>