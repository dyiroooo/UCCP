<?php
session_start();
require 'dbcon.php';
//remove query
if(isset($_POST['btnremove']))
{
    $news = mysqli_real_escape_string($con, $_POST['btnremove']);

    $query = "DELETE FROM uccp_news_tbl WHERE id='$news' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "News Removed Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "News Not Removed";
        header("Location: admin.php");
        exit(0);
    }
}

?>
