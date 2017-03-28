<h1 class="page-header">Produkter </h1>

<div class="container-fluid">
    <div class="row row-eq-height col-md-12">
        <?php
            $sqlQuery = $conn->query("SELECT products.id as prodId, products.name AS productName, products.description, products.price, products.priceDiscount, products.fk_created, products.fk_edited, products.fk_brand, 
                                             products.fk_img, pictures.filename, brands.name AS brandName, brands.id AS brandId, c.logDate AS created
                                      FROM products
                                      INNER JOIN pictures 
                                      ON pictures.id = products.fk_img
                                      INNER JOIN brands
                                      ON brands.id = products.fk_brand
                                      INNER JOIN log c
                                      ON c.id = products.fk_created
                                      ORDER BY c.logDate
                                      DESC");
                                      
            echo '<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#new">
    <i class="fa fa-plus" aria-hidden="true"></i>
</button> - Tilføj Produkt</h3></div>
  <table class="table table-hover">
    <tr>
        <th></th>
        <th>Navn</th>
        <th>Mærke</th>
        <th>Pris</th>
        <th>Tilbud</th>
        <th>Oprettet</th>
        <th>Rediger</th>
        <th>Slet</th>
        <th class="text-muted">Sidst Redigeret</th>
    </tr>';


            while($row = $sqlQuery->fetch_assoc()){
                $created = date('d/m/Y', strtotime($row['created']));
                echo '<tr>
                        <td><img src="../prod_img/'.$row['filename'].'" alt="'.$row['productName'].'" height="40" width="40"></td>
                        <td>'.$row['productName'].'</td>
                        <td class="text-muted" >'.$row['brandName'].'</td>
                        <td>'.$row['price'].'</td>
                        <td>'.$row['priceDiscount'].' %</td>
                        <td>'.$created.'</td>
                        <td><a href="#"><i class="fa fa-pencil" data-toggle="modal" data-target="#edit'.$row['prodId'].'" ></i></a></td>
                        <td><a  href="javascript:void();" onclick="confirmDelete(\'Er du sikker på, du vil slette produktet - '.$row['productName'].'?\', '.$row['prodId'].')">
                                    <i class="fa fa-trash"></i>
                                </a></td>
                        <td class="text-muted"></td>
                      </tr>


                      
                        <div class="modal fade" id="show'.$row['prodId'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">'.$row['productName'].' - <span class="text-muted">'.$row['brandName'].'</span></h4>
                                    </div>
                                    <div class="modal-body">
                                        <img src="../prod_img/'.$row['filename'].'" alt="'.$row['productName'].'" height="150" width="150">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Luk</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit'.$row['prodId'].'">
                                        Edit Product
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>




                        
                        <div class="modal fade" id="edit'.$row['prodId'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content form-horizontal">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabelEdit">Rediger Produkt - <span class="text-muted">'.$row['productName'].'</span></h4>
                                    </div>
                                    <div class="modal-body">

                                        <form action="index.php?p=prodEdit&prodID='.$row['prodId'].'" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="editProductTitle">Produkt Navn</label>  
                                            <div class="col-md-4">
                                                <input id="editProductTitle" name="editProductTitle" placeholder="Title" class="form-control input-md" required="" type="text" value="'.$row['productName'].'">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="editBrand">Mærke</label>
                                            <div class="col-md-4">
                                                <select id="editBrand" name="editBrand" class="form-control">
                                                        <option value="'.$row['brandId'].'">'.$row['brandName'].'</option>'.PHP_EOL.';
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="editProductDetails">Produkt Beskrivelse</label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" id="editProductDetails" name="editProductDetails">'.$row['description'].'</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="editProductPrice">Produkt Pris</label>  
                                            <div class="col-md-4">
                                                <input id="editProductPrice" name="editProductPrice" placeholder="Price" class="form-control input-md" required="" type="number" value="'.$row['price'].'">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="editProductDiscount">Produkt Tilbud (%)</label>  
                                            <div class="col-md-4">
                                                <input id="editProductDiscount" name="editProductDiscount" placeholder="Tilbud" class="form-control input-md" required="" type="number" min="0" max="100" value="'.$row['priceDiscount'].'">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="editProductPicture" class="col-md-4 control-label">Produkt billede</label>
                                            <div class="col-md-4">
                                                <input type="file" name="editFileToUpload" id="editProductPicture">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="opdater"></label>
                                            <div class="col-md-4">
                                                <button id="opdater" name="opdater" class="btn btn-success">Opdater</button>
                                            </div>
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        

            }

            echo '</table></div>';
        ?>
                       <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Nyt Produkt</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                    if(!empty($success)) {
                        echo $success;
                    }
                ?>

<form action="index.php?p=prodNew" method="post" class="form-horizontal" enctype="multipart/form-data">

<!-- Text input-->
<div class="form-group">
	<label class="col-md-4 control-label" for="productTitle">Produkt Navn</label>  
	<div class="col-md-4">
		<input id="productTitle" name="productTitle" placeholder="Title" class="form-control input-md" required="" type="text">
	</div>
</div>

<!-- Select Basic -->
<div class="form-group">
	<label class="col-md-4 control-label" for="brand">Mærke</label>
	<div class="col-md-4">
		<select id="brand" name="brand" class="form-control">
			<?php
			$result = $conn->query("SELECT id, name FROM brands");
			while ($row = $result->fetch_assoc()) {
				echo '<option value="'.$row['id'].'">'.$row['name'].'</option>'.PHP_EOL;
			}
			?>
		</select>
	</div>
</div>

<!-- Textarea -->
<div class="form-group">
	<label class="col-md-4 control-label" for="productDetails">Produkt Beskrivelse</label>
	<div class="col-md-4">
		<textarea class="form-control" id="productDetails" name="productDetails"></textarea>
	</div>
</div>

<!-- Text input-->
<div class="form-group">
	<label class="col-md-4 control-label" for="productPrice">Produkt Pris</label>  
	<div class="col-md-4">
		<input id="productPrice" name="productPrice" placeholder="Price" class="form-control input-md" required="" type="number">
	</div>
</div>

<!-- Text input-->
<div class="form-group">
	<label class="col-md-4 control-label" for="productDiscount">Produkt Tilbud (%)</label>  
	<div class="col-md-4">
		<input id="productDiscount" name="productDiscount" placeholder="Tilbud" class="form-control input-md" required="" type="number" min="0" max="100">
	</div>
</div>

<!-- Image input-->
<div class="form-group">
	<label for="productPicture" class="col-md-4 control-label">Product Image</label>
	<div class="col-md-4">
		<input type="file" name="fileToUpload" id="productPicture" required="">
	</div>
</div>


<!-- Button -->
<div class="form-group">
	<label class="col-md-4 control-label" for="Opret"></label>
	<div class="col-md-4">
		<button id="Opret" name="Opret" class="btn btn-success">Create</button>
	</div>
</div>

</form>



                        </div>
                        </div>


                        
    </div>
</div>

<script>
function confirmDelete(msg, id) {
	var r=confirm(msg);
	if (r) {
		//write redirection code
		window.location = "index.php?p=prodDeleted&id=" + id;
	} else {
		//do nothing
	}
}
</script>