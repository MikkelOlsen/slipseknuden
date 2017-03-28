<?php
if( isset( $_GET['id']))
{
    $deleteEmpID = $_GET['id'];
    $sqliDeleteImg = $conn->query("SELECT pictures.id AS picID, pictures.filename, pictures.fk_pictureCategory, picturecategory.category, picturecategory.id AS catID, picturecategory.filepath, employees.fk_img, employees.id AS empID
                                   FROM pictures
                                   INNER JOIN picturecategory
                                   ON picturecategory.id = fk_pictureCategory
                                   INNER JOIN employees
                                   ON employees.fk_img = pictures.id
                                   WHERE employees.id = '$deleteEmpID'
                                   AND picturecategory.category = 'Ansat'");
    while($row = $sqliDeleteImg->fetch_assoc()) {
        $imgName = $row['filename'];
        $imgID = $row['picID'];
        $imgPath = $row['filepath'];
    }
    unlink('../img/'.$imgPath.'/'.$imgName);

    $sqli = "DELETE FROM employees WHERE employees.id='$deleteEmpID'";
    $conn->query( $sqli );

    $sqliImg = "DELETE FROM pictures WHERE pictures.id ='$imgID'";
    $conn->query($sqliImg);
}
header( 'Location: index.php?p=employees' );

?>
