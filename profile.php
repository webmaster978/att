<?php

//profile.php

include('header.php');

$teacher_name = '';
$teacher_address = '';
$teacher_emailid = '';
$teacher_password = '';
$teacher_grade_id = '';
$teacher_qualification = '';
$teacher_doj = '';
$teacher_image = '';
$error_teacher_name = '';
$error_teacher_address = '';
$error_teacher_emailid = '';
$error_teacher_grade_id = '';
$error_teacher_qualification = '';
$error_teacher_doj = '';
$error_teacher_image = '';
$error = 0;
$success = '';

if (isset($_POST["button_action"])) {
	$teacher_image = $_POST["hidden_teacher_image"];
	if ($_FILES["teacher_image"]["name"] != '') {
		$file_name = $_FILES["teacher_image"]["name"];
		$tmp_name = $_FILES["teacher_image"]["tmp_name"];
		$extension_array = explode(".", $file_name);
		$extension = strtolower($extension_array[1]);
		$allowed_extension = array('jpg', 'png');
		if (!in_array($extension, $allowed_extension)) {
			$error_teacher_image = "Format invalide";
			$error++;
		} else {
			$teacher_image = uniqid() . '.' . $extension;
			$upload_path = 'admin/teacher_image/' . $teacher_image;
			move_uploaded_file($tmp_name, $upload_path);
		}
	}

	if (empty($_POST["teacher_name"])) {
		$error_teacher_name = "Nom du prof est demander";
		$error++;
	} else {
		$teacher_name = $_POST["teacher_name"];
	}

	if (empty($_POST["teacher_address"])) {
		$error_teacher_address = "L'Adresse ne dois pas etre vide";
		$error++;
	} else {
		$teacher_address = $_POST["teacher_address"];
	}

	if (empty($_POST["teacher_emailid"])) {
		$error_teacher_emailid = "L'Adressse mail n dois pas etre vide";
		$error++;
	} else {
		if (!filter_var($_POST["teacher_emailid"], FILTER_VALIDATE_EMAIL)) {
			$error_teacher_emailid = "Format de L'adresse mail invalide";
			$error;
		} else {
			$teacher_emailid = $_POST["teacher_emailid"];
		}
	}
	if (!empty($_POST["teacher_password"])) {
		$teacher_password = $_POST["teacher_password"];
	}

	if (empty($_POST["teacher_grade_id"])) {
		$error_teacher_grade_id = 'Grade ne doit pas etre vide';
		$error++;
	} else {
		$teacher_grade_id = $_POST["teacher_grade_id"];
	}

	if (empty($_POST["teacher_qualification"])) {
		$error_teacher_qualification = "Qualification ne doit pas etre vide";
		$error++;
	} else {
		$teacher_qualification = $_POST["teacher_qualification"];
	}

	if (empty($_POST["teacher_doj"])) {
		$error_teacher_doj = "Date d'engagement n doit pas etre vide";
		$error++;
	} else {
		$teacher_doj = $_POST["teacher_doj"];
	}

	if ($error == 0) {
		if ($teacher_password != '') {
			$data = array(
				':teacher_name'            =>    $teacher_name,
				':teacher_address'        =>    $teacher_address,
				':teacher_emailid'        =>    $teacher_emailid,
				':teacher_password'        =>    password_hash($teacher_password, PASSWORD_DEFAULT),
				':teacher_qualification' =>    $teacher_qualification,
				':teacher_doj'            =>    $teacher_doj,
				':teacher_image'        =>    $teacher_image,
				':teacher_grade_id'        =>    $teacher_grade_id,
				':teacher_id'            =>    $_POST["teacher_id"]
			);
			$query = "
			UPDATE tbl_teacher 
		      SET teacher_name = :teacher_name, 
		      teacher_address = :teacher_address, 
		      teacher_emailid = :teacher_emailid, 
		      teacher_password = :teacher_password, 
		      teacher_grade_id = :teacher_grade_id, 
		      teacher_qualification = :teacher_qualification, 
		      teacher_doj = :teacher_doj, 
		      teacher_image = :teacher_image 
		      WHERE teacher_id = :teacher_id
			";
		} else {
			$data = array(
				':teacher_name'            =>    $teacher_name,
				':teacher_address'        =>    $teacher_address,
				':teacher_emailid'        =>    $teacher_emailid,
				':teacher_qualification' =>    $teacher_qualification,
				':teacher_doj'            =>    $teacher_doj,
				':teacher_image'        =>    $teacher_image,
				':teacher_grade_id'        =>    $teacher_grade_id,
				':teacher_id'            =>    $_POST["teacher_id"]
			);
			$query = "
			UPDATE tbl_teacher 
		      SET teacher_name = :teacher_name, 
		      teacher_address = :teacher_address, 
		      teacher_emailid = :teacher_emailid, 
		      teacher_grade_id = :teacher_grade_id, 
		      teacher_qualification = :teacher_qualification, 
		      teacher_doj = :teacher_doj, 
		      teacher_image = :teacher_image 
		      WHERE teacher_id = :teacher_id
			";
		}

		$statement = $connect->prepare($query);
		if ($statement->execute($data)) {
			$success = '<div class="alert alert-success">Profile modifier avec succes</div>';
		}
	}
}


$query = "
SELECT * FROM tbl_teacher 
WHERE teacher_id = '" . $_SESSION["teacher_id"] . "'
";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

?>


<div class="w3-content w3-margin-top" style="max-width:1400px;">

	<!-- The Grid -->
	<div class="w3-row-padding">

		<!-- Left Column -->
		<div class="w3-third">

			<div class="w3-white w3-text-grey w3-card-4">
				<div class="w3-display-container">
					<?php

					$service = $connect->prepare("
SELECT * FROM tbl_teacher 
WHERE teacher_id = '" . $_SESSION["teacher_id"] . "'
");
					$service->execute();
					$don = $service->fetchAll(PDO::FETCH_OBJ);
					foreach ($don as $s) :
					?>
						<img src="admin/teacher_image/<?= $s->teacher_image; ?>" class="img-thumbnail" width="300">
						<div class="w3-display-bottomleft w3-container w3-text-black">
							<h2><?= $s->teacher_name; ?></h2>
						</div>
				</div>
				<div class="w3-container">
					<p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?= $s->teacher_qualification; ?></p>
					<p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?= $s->teacher_address; ?></p>
					<p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?= $s->teacher_emailid; ?></p>

					<hr>
				<?php
					endforeach;


				?>
				<br>
				</div>
			</div><br>

			<!-- End Left Column -->
		</div>
		<span><?php echo $success; ?></span>
		<!-- Right Column -->
		<div class="w3-twothird">

			<div class="w3-container w3-card w3-white w3-margin-bottom">
				<form method="post" id="profile_form" enctype="multipart/form-data">

					<div class="w3-container">
						<label class="col-md-4 text-right">Nom du prof <span class="text-danger">*</span></label>
						<div class="col-md-12">
							<input type="text" name="teacher_name" id="teacher_name" class="form-control" />
							<span class="text-danger"><?php echo $error_teacher_name; ?></span>
						</div>

					</div>
					<div class="w3-container">
						<label class="col-md-4 text-right">Address <span class="text-danger">*</span></label>
						<div class="col-md-12">
							<textarea name="teacher_address" id="teacher_address" class="form-control"></textarea>
							<span class="text-danger"><?php echo $error_teacher_address; ?></span>
						</div>

					</div>
					<div class="w3-container">
						<label class="col-md-4 text-right">Address mail <span class="text-danger">*</span></label>
						<div class="col-md-12">
							<input type="text" name="teacher_emailid" id="teacher_emailid" class="form-control" />
							<span class="text-danger"><?php echo $error_teacher_emailid; ?></span>
						</div>
					</div>
					<div class="w3-container">
						<label class="col-md-4 text-right">Qualification <span class="text-danger">*</span></label>
						<div class="col-md-12">
							<input type="text" name="teacher_qualification" id="teacher_qualification" class="form-control" />
							<span class="text-danger"><?php echo $error_teacher_qualification; ?></span>
						</div>
					</div>
					<div class="w3-container">
						<label class="col-md-4 text-right">Grade <span class="text-danger">*</span></label>
						<div class="col-md-8">
							<select name="teacher_grade_id" id="teacher_grade_id" class="form-control">
								<option value="">Selectionner le Grade</option>
								<?php
								echo load_grade_list($connect);
								?>
							</select>
							<span class="text-danger"><?php echo $error_teacher_grade_id; ?></span>
						</div>
					</div>
					<div class="w3-container">
						<label class="col-md-4 text-right">Date d''engagement <span class="text-danger">*</span></label>
						<div class="col-md-8">
							<input type="text" name="teacher_doj" id="teacher_doj" class="form-control" readonly />
							<span class="text-danger"><?php echo $error_teacher_doj; ?></span>
						</div>
					</div>
					<div class="w3-container">
						<label class="col-md-4 text-right">Image <span class="text-danger">*</span></label>
						<div class="col-md-8">
							<input type="file" name="teacher_image" id="teacher_image" />
							<span class="text-muted">Seulement .jpg et .png </span><br />
							<span id="error_teacher_image" class="text-danger"><?php echo $error_teacher_image; ?></span>
						</div>
					</div>
					<div class="card-footer" align="center">
						<input type="hidden" name="hidden_teacher_image" id="hidden_teacher_image" />
						<input type="hidden" name="teacher_id" id="teacher_id" />
						<input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="Modifier" />
					</div>
				</form>
			</div>



			<!-- End Right Column -->
		</div>

		<!-- End Grid -->
	</div>

	<!-- End Page Container -->
</div>

</html>
</body>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="css/datepicker.css" />

<style>
	.datepicker {
		z-index: 1600 !important;
		/* has to be larger than 1050 */
	}
</style>

<script>
	$(document).ready(function() {

		<?php
		foreach ($result as $row) {
		?>
			$('#teacher_name').val("<?php echo $row["teacher_name"]; ?>");
			$('#teacher_address').val("<?php echo $row["teacher_address"]; ?>");
			$('#teacher_emailid').val("<?php echo $row["teacher_emailid"]; ?>");
			$('#teacher_qualification').val("<?php echo $row["teacher_qualification"]; ?>");
			$('#teacher_grade_id').val("<?php echo $row["teacher_grade_id"]; ?>");
			$('#teacher_doj').val("<?php echo $row["teacher_doj"]; ?>");
			$('#error_teacher_image').html("<img src='admin/teacher_image/<?php echo $row['teacher_image']; ?>' class='img-thumbnail' width='100' />");
			$('#hidden_teacher_image').val('<?php echo $row["teacher_image"]; ?>');
			$('#teacher_id').val("<?php echo $row["teacher_id"]; ?>");

		<?php
		}
		?>

		$('#teacher_doj').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true
		});

	});
</script>