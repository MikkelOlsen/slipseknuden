<h1 class="page-header">Nyheder </h1>


<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#new">
                <i class="fa fa-plus" aria-hidden="true"></i>
                </button> - Tilføj Nyhed</h3></div>
            </div>
            <div class="panel-body">
                <div class="row row-eq-height">
            <?php
                $showImgQuery = $conn->query("SELECT news.id AS newsID, news.title, news.article, news.fk_created, news.fk_edited, news.fk_img, pictures.filename, pictures.id AS picID, pictures.fk_pictureCategory, picturecategory.filepath,  c.logDate AS created
                                              FROM news
                                              INNER JOIN pictures
                                              ON news.fk_img = pictures.id
                                              INNER JOIN picturecategory
                                              ON picturecategory.id = pictures.fk_pictureCategory
											  INNER JOIN log c
                                              ON news.fk_created = c.id
                                              ORDER BY c.logDate
                                              DESC");
                while($row = $showImgQuery->fetch_assoc()){
                    $created = date('d/m/Y', strtotime($row['created']));

                     echo '<div class="col-xs-18 col-sm-6 col-md-3" style="min-height:300px; max-height:300px; overflow:hidden;">
                        <div class="thumbnail">
                            <div class="caption" style="min-height:200px; max-height:200px; overflow:hidden;">
                                <h4>'.$row['title'].'</h4>
                                <p class="text-muted">'.$created.'</p>
                                <p>'.$row['article'].'</p>
                            </div>

                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#show'.$row['newsID'].'">
                                        Vis Nyhed
                            </button>

                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit'.$row['newsID'].'">
                                        Rediger Nyhed
                            </button>

                            <a  href="javascript:void();" onclick="confirmDelete(\'Er du sikker på, du vil slette nyheden - '.$row['title'].'?\', '.$row['newsID'].')">
                                    <button type="button" class="btn btn-danger btn-sm pull-right">
                                        Slet Nyhed
                                    </button>
                                </a>
                        </div>
                    </div>



                    <div class="modal fade" id="show'.$row['newsID'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">'.$row['title'].'</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>'.$row['article'].'</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Luk</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit'.$row['newsID'].'">
                                        Rediger Nyhed
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    
                    <div class="modal fade" id="edit'.$row['newsID'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content form-horizontal">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabelEdit">Rediger Nyhed - <span class="text-muted">'.$row['title'].'</span></h4>
                                    </div>
                                    <div class="modal-body">

                                        <form action="index.php?p=newsEdit&newsID='.$row['newsID'].'" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="editNewsTitle">Nyheds Titel</label>  
                                            <div class="col-md-4">
                                                <input id="editNewsTitle" name="editNewsTitle" placeholder="Title" class="form-control input-md" required="" type="text" value="'.$row['title'].'">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="editNewsArticle">Nyheds Artikel</label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" id="editNewsArticle" name="editNewsArticle">'.$row['article'].'</textarea>
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
            ?>
            </div>
            </div>
            <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Nyhed</h4>
                            </div>
                            <div class="modal-body">

                                <form action="index.php?p=newsNew" method="post" class="form-horizontal" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="newsTitle">Titel</label>  
                                        <div class="col-md-4">
                                            <input id="newsTitle" name="newsTitle" placeholder="Title" class="form-control input-md" required="" type="text">
                                        </div>
                                    </div>

                                    <!-- Textarea -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="newsArticle">Artikel</label>
                                        <div class="col-md-4">
                                            <textarea class="form-control" id="newsArticle" name="newsArticle"></textarea>
                                        </div>
                                    </div>
                                    
                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="Opret"></label>
                                        <div class="col-md-4">
                                            <button id="Opret" name="Opret" class="btn btn-success">Opret</button>
                                        </div>
                                    </div>

                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>


        </div>
    </div>
</div>

<script>
function confirmDelete(msg, id) {
	var r=confirm(msg);
	if (r) {
		//write redirection code
		window.location = "index.php?p=newsDelete&id=" + id;
	} else {
		//do nothing
	}
}
</script>