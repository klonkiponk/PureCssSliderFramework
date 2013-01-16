<?php
    //echo "<div class='shadow'>";
    //print_r($_POST);
    //echo "</div>";   
    
    
    if (!empty($_POST['noteWriteToDB'])) {
        noteWriteToDB();
    }
    if (!empty($_POST['noteMarkDone'])) {
        noteMarkDone();
    }
    if (!empty($_POST['delete'])) {
        deleteFromDB();
    }
?>
