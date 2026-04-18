<?php
    //Check if error variable is set
    if(isset($_SESSION['error']))
    {
        //Show that error
        echo '<div class="err">' . $_SESSION['error'] . '</div>';

        // Unsetting that error
        unset($_SESSION['error']);
    }

    //Check if success variable is set
    if(isset($_SESSION['success']))
    {
        // Show success msg
        echo '<div class="suc">' . $_SESSION['success'] . '</div>';

        // Unsetting success msg
        unset($_SESSION['success']);
    }
?>