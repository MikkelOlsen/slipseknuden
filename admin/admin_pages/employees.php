<h1 class="page-header">Ansatte</h1>

<div class="container-fluid">
    <div class="row row-eq-height col-md-12">
        <?php
            $sqlQuery = $conn->query("SELECT employees.id AS empID, employees.first_name, employees.last_name, employees.email, employeerole.title, employeerole.id AS roleID, pictures.filename, picturecategory.filepath,
                                             employees.fk_hired, log.logDate
                                     FROM employees
                                     INNER JOIN employeerole
                                     ON fk_role = employeerole.id
                                     INNER JOIN pictures
                                     ON fk_img = pictures.id
                                     INNER JOIN picturecategory
                                     ON pictures.fk_pictureCategory = picturecategory.id
                                     INNER JOIN log 
                                     ON employees.fk_hired = log.id
                                     ORDER BY employees.fk_role
                                     ASC");
                                      
            echo '<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#new">
    <i class="fa fa-plus" aria-hidden="true"></i>
</button> - Ny Ansat</h3></div>
  <table class="table table-hover">
    <tr>
        <th></th>
        <th>Fornavn</th>
        <th>Efternavn</th>
        <th>E-mail</th>
        <th>Stilling</th>
        <th>Ansat</th>
        <th>Rediger</th>
        <th>Slet</th>
        <th class="text-muted">Sidst Logget Ind</th>
    </tr>';


            while($row = $sqlQuery->fetch_assoc()){
                $created = date('d/m/Y', strtotime($row['logDate']));
                echo '<tr>
                        <td><img src="../img/'.$row['filepath'].'/'.$row['filename'].'" alt="'.$row['title'].'" height="80" width="80"></td>
                        <td>'.$row['first_name'].'</td>
                        <td>'.$row['last_name'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['title'].'</td>
                        <td>'.$created.'</td>
                        <td><a href="#"><i class="fa fa-pencil" data-toggle="modal" data-target="#edit'.$row['empID'].'" ></i></a></td>
                        <td><a  href="javascript:void();" onclick="confirmDelete(\'Er du sikker på, du vil slette produktet - '.$row['first_name'].'?\', '.$row['empID'].')">
                                    <i class="fa fa-trash"></i>
                                </a></td>
                        <td class="text-muted"></td>
                      </tr>
                        
                        <div class="modal fade" id="edit'.$row['empID'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content form-horizontal">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabelEdit">Rediger Ansat - <span class="text-muted">'.$row['first_name'].' '.$row['last_name'].'</span></h4>
                                    </div>
                                    <div class="modal-body">

                                        <form action="index.php?p=empEdit&empID='.$row['empID'].'" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="editFirstName">Fornavn</label>  
                                            <div class="col-md-6">
                                                <input id="editFirstName" name="editFirstName" placeholder="Fornavn" class="form-control input-md" required="" type="text" value="'.$row['first_name'].'">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="editLastName">Efternavne</label>
                                            <div class="col-md-6">
                                                <input id="editLastName" name="editLastName" placeholder="Efternavn" class="form-control input-md" required="" type="text" value="'.$row['last_name'].'">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="editEmail">E-Mail</label>
                                            <div class="col-md-6">
                                                <input id="editEmail" name="editEmail" placeholder="E-Mail" class="form-control input-md" required="" type="email" value="'.$row['email'].'">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="editRole">Stilling</label>  
                                            <div class="col-md-6">
                                                <select id="editRole" name="editRole" class="form-control">
                                                        <option value="'.$row['roleID'].'">'.$row['title'].'</option>'.PHP_EOL.';
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="editEmpImg" class="col-md-4 control-label">Medarbejder Billede</label>
                                            <div class="col-md-4">
                                                <input type="file" name="editFileToUpload" id="editEmpImg">
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
                            <h4 class="modal-title" id="myModalLabel">Ny Ansat</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                    if(!empty($success)) {
                        echo $success;
                    }
                ?>

<form action="index.php?p=empNew" method="post" class="form-horizontal" enctype="multipart/form-data">

<!-- Text input-->
<div class="form-group">
	<label class="col-md-4 control-label" for="firstName">Fornavn</label>  
	<div class="col-md-4">
		<input id="firstName" name="firstName" placeholder="Fornavn" class="form-control input-md" required="" type="text">
	</div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="lastName">Efternavn</label>  
	<div class="col-md-4">
		<input id="lastName" name="lastName" placeholder="Efternavn" class="form-control input-md" required="" type="text">
	</div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="lastName">E-mail</label>  
	<div class="col-md-4">
		<input id="email" name="email" placeholder="E-mail" class="form-control input-md" required="" type="text">
	</div>
</div>


<!-- Select Basic -->
<div class="form-group">
	<label class="col-md-4 control-label" for="role">Stilling</label>
	<div class="col-md-4">
		<select id="role" name="role" class="form-control">
			<?php
			$result = $conn->query("SELECT id, title FROM employeerole ORDER BY id ASC");
			while ($row = $result->fetch_assoc()) {
				echo '<option value="'.$row['id'].'">'.$row['title'].'</option>'.PHP_EOL;
			}
			?>
		</select>
	</div>
</div>

<!-- Image input-->
<div class="form-group">
	<label for="empImg" class="col-md-4 control-label">Medarbejder Billede</label>
	<div class="col-md-4">
		<input type="file" name="fileToUpload" id="empImg" required="">
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

<script>
function confirmDelete(msg, id) {
	var r=confirm(msg);
	if (r) {
		//write redirection code
		window.location = "index.php?p=empDelete&id=" + id;
	} else {
		//do nothing
	}
}
</script>