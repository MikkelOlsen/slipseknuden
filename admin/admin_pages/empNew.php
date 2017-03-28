<?php
if(isset($_POST['Opret']))
    {
        $editFirstName = $_POST['firstName'];
        $editLastName = $_POST['lastName'];
        $editEmail = $_POST['email'];
        $editRole = $_POST['role'];

            echo 'beginning';
            $sqliImg = $conn->query("SELECT picturecategory.filepath 
                                     FROM picturecategory
                                     WHERE picturecategory.category = 'Ansat'");
            while($row = $sqliImg->fetch_assoc()) {
                $filepath = $row['filepath'];
            }

            $target_dir = '../img/'.$filepath.'/';
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["opdater"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$success = '<div class="alert alert-danger" role="alert">File is an image - " . $check["mime"] . ".</div>';
			$uploadOk = 1;
		} else {
			$success = '<div class="alert alert-danger" role="alert">File is not an image.</div>';
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
        $success = '<div class="aler alert-danger" role="alert">Billedet eksistere allerede</div>';
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		$success = '<div class="alert alert-danger" role="alert">Sorry, your file is too large.</div>';
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		$success = '<div class="alert alert-danger" role="alert">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>';
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$success = '<div class="alert alert-danger" role="alert">Dit produkt blev ikke oprettet - Prøv igen</div>';
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$success = '<div class="alert alert-success" role="alert">Dit produkt er nu oprettet!</div>';
			$fileName = basename( $_FILES["fileToUpload"]["name"]);            
            
                                }

                            
                }
                //Insert Image information into pictures databse
    $cat = $conn->query("SELECT id FROM picturecategory WHERE category = 'Ansat'");
    while($category = $cat->fetch_assoc()) {
    	$imgCat = $category['id'];
    }
    $stmtImg = $conn->prepare("INSERT INTO pictures (filename, fk_pictureCategory) 
                               VALUES (?, ?)");
    $stmtImg->bind_param('si', $fileName, $imgCat);
    $stmtImg->execute();
    $lastId = mysqli_insert_id($conn);
    $stmtImg->close();

	//Insert creation information into log databse
	$text = "Oprettet Ansat -";
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $logChange = $text . ' ' . $fName . ' ' . $lName;;
	$stmtCreated = $conn->prepare("INSERT INTO log (logDate, logChange)
								   VALUES (NOW(), ?)");
	$stmtCreated->bind_param('s', $logChange);
	$stmtCreated->execute();
	$createdId = mysqli_insert_id($conn);
	$stmtCreated->close();

	//Insert product informaion into product databse
	$stmt = $conn->prepare("INSERT INTO employees (first_name, last_name, email, fk_role, fk_img, fk_hired)
													VALUES (?, ?, ?, ?, ?, ?)");
	$stmt->bind_param('sssiii', $_POST['firstName'],
															$_POST['lastName'],
															$_POST['email'],
                                                            $_POST['role'],
                                                            $lastId,
															$createdId);
	$stmt->execute();
	$stmt->close();

            
		} 

        
header('Location: index.php?p=employees');
?>