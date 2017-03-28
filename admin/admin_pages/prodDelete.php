<?php
if( isset( $_GET['id']))
{
    $deleteProdID = $_GET['id'];
    $sqliDeleteImg = $conn->query("SELECT pictures.id AS picID, pictures.filename, pictures.fk_pictureCategory, picturecategory.category, picturecategory.id AS catID, picturecategory.filepath, products.fk_img, products.id AS prodID
                                   FROM pictures
                                   INNER JOIN picturecategory
                                   ON picturecategory.id = fk_pictureCategory
                                   INNER JOIN products
                                   ON products.fk_img = pictures.id
                                   WHERE products.id = '$deleteProdID'
                                   AND picturecategory.category = 'Produkt'");
    while($row = $sqliDeleteImg->fetch_assoc()) {
        $imgName = $row['filename'];
        $imgID = $row['picID'];
    }
    unlink('../prod_img/' . $imgName);

    $sqli = "DELETE FROM products WHERE products.id='$deleteProdID'";
    $conn->query( $sqli );

    $sqliImg = "DELETE FROM pictures WHERE pictures.id ='$imgID'";
    $conn->query($sqliImg);
}
header( 'Location: index.php?p=products' );

?>