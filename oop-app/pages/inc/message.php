<?php
use App\Helpers\Session;

if (Session::has('success')) {
    echo "<div class='alert alert-success'>" . Session::flash("success") . "</div>";
} elseif (Session::has("errors")) {
    ?>
<div class='alert alert-danger'>
    <ul>
        <?php
            foreach (Session::flash('errors') as $error) {
                echo "<li>$error</li>";
            }
            ?>
    </ul>
</div>
<?php } ?>