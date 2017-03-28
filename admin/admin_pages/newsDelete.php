<?php
if( isset( $_GET['id']))
{
    $deleteNewsID = $_GET['id'];
    $sqliDeleteImg = $conn->query("SELECT pictures.id AS picID, pictures.filename, pictures.fk_pictureCategory, picturecategory.category, picturecategory.id AS catID, picturecategory.filepath, news.fk_img, news.id AS prodID
                                   FROM pictures
                                   INNER JOIN picturecategory
                                   ON picturecategory.id = fk_pictureCategory
                                   INNER JOIN news
                                   ON news.fk_img = pictures.id
                                   WHERE news.id = '$deleteNewsID'
                                   AND picturecategory.category = 'Nyhed'");
    while($row = $sqliDeleteImg->fetch_assoc()) {
        $imgName = $row['filename'];
        $filePath = $row['filepath'];
        $imgID = $row['picID'];
    }
    unlink('../img/'.$filePath.'/'.$imgName);

    $sqli = "DELETE FROM news WHERE news.id='$deleteNewsID'";
    $conn->query( $sqli );

    $sqliImg = "DELETE FROM pictures WHERE pictures.id ='$imgID'";
    $conn->query($sqliImg);
}

?>