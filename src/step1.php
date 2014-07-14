<?php include("include/files.php") ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
	<head>
		<meta charset="UTF-8">
		<title>Marek - laptop - wybór plików</title>
		<link rel="stylesheet" href="style/wizard_steps.css">

		<script>
			function validateForm() {
				var form = document.forms["mainForm"];

				var name1 = form["input_file"];
				if (name1 == null || name1.value == null || name1.value == "") {
					alert("Proszę wybrać plik wejściowy!");
					return false;
				}

				var name2 = form["output_file"];
				if (name2 == null || name2.value == null || name2.value == "") {
					alert("Proszę podać nazwę pliku wyjściowego!");
					return false;
				}
			}
		</script>

	</head>
	
	<body>

		<ol class="wizard-steps">
			<li class="done"><span>Wybór pliku<i></i></span></li><li><span>Parametry<i></i></span></li><li><span>Konwersja<i></i></span></li>
		</ol>

		<h1>Konwerter wideo</h1>

		<form action="step1.php" method="post">

			<h2>Katalog roboczy:</h2>

			<select name="folder" onchange="this.form.submit();">
				<option disabled selected> -- wybierz katalog -- </option>
				<?php echo generateFolderOptions(stripslashes($_POST['folder'])); ?>
			</select>

		</form>

		<form name="mainForm" action="step2.php" method="post" onsubmit="return validateForm()">

			<input type="hidden" name="folder" value="<?php echo stripslashes($_POST['folder']); ?>" />

			<h2>Plik wejściowy:</h2>

			<?php
			try {
				$listOfFiles = generateListOfFiles(stripslashes($_POST['folder']));
			?>

			<select name="input_file" size="5">
				<?php echo $listOfFiles; ?>
			</select>

			<?php
				} catch (Exception $e) { echo "<font color='red'>Nie udało się odczytać katalogu!</font>\n"; }
			?>
			
			<h2>Plik wyjściowy:</h2>

			<p><input type="text" name="output_file" /></p>

			<p><input type="submit" value="Dalej >" /></p>

		</form>

	</body>

</html>
