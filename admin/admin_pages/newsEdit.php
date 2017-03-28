<?php

if( isset( $_GET['newsID']))
    {
        $_SESSION['newsID'] = $_GET['newsID'];
    }
    if(isset($_POST['opdater']))
    {
        $editTitle = $_POST['editNewsTitle'];
        $editArticle = $_POST['editNewsArticle'];
        $newsId = $_SESSION['newsID'];
        $sqli = "UPDATE `news` SET `title`='$editTitle', `article`='$editArticle' WHERE id = '$newsId'";
        $conn->query($sqli);
    }

    header('Location:index.php?p=news');    
?>