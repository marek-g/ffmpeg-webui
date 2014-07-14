<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
	<head>
		<meta charset="UTF-8">
		<title>Marek - laptop - wybór plików</title>
		<link rel="stylesheet" href="style/wizard_steps.css">

		<script>
			function generateCommand() {
				var form = document.forms["mainForm"];

				var folder = form["folder"].value;
				var input_file = form["input_file"].value;
				var output_file = form["output_file"].value;

				var command = "ffmpeg";

				// do not override existing file
				command += " -n";

				// input file
				command += " -i \"" + folder + "\\" + input_file + "\"";

				// audio bitrate
				val = document.getElementById('bitrateAudio');
				command += " -b:a " + val.value +"k"

				// video bitrate
				val = document.getElementById('bitrateVideo');
				command += " -b:v " + val.value + "k"

				// output file
				command += " \"" + folder + "\\" + output_file + "\"";

				form["command"].value = command;
			}
		</script>
	</head>
	
	<body onload="generateCommand()">

		<ol class="wizard-steps">
			<li class="done"><span><a href="step1.php">Wybór pliku</a><i></i></span></li><li class="done"><span>Parametry<i></i></span></li><li><span>Konwersja<i></i></span></li>
		</ol>

		<p>
			Folder: <?php echo stripslashes($_POST['folder']) ?>.<br/>
			Plik we: <?php echo stripslashes($_POST['input_file']) ?>.<br/>
			Plik wy: <?php echo stripslashes($_POST['output_file']) ?>.
		</p>

		<h2>Parametry video:</h2>

		Bitrate:

		<select id="bitrateVideo" onchange="generateCommand();">
			<option>200</option>
			<option>400</option>
			<option>600</option>
			<option>800</option>
			<option>900</option>
			<option>1000</option>
			<option>1100</option>
			<option selected>1200</option>
			<option>1300</option>
			<option>1400</option>
			<option>1500</option>
			<option>1600</option>
		</select>

		kbps

		<h2>Parametry audio:</h2>

		Bitrate:

		<select id="bitrateAudio" onchange="generateCommand();">
			<option>40</option>
			<option>48</option>
			<option>56</option>
			<option>64</option>
			<option>80</option>
			<option>96</option>
			<option>112</option>
			<option selected>128</option>
			<option>160</option>
			<option>192</option>
			<option>256</option>
			<option>320</option>
		</select>

		kbps

		<form name="mainForm" action="step3.php" method="post">
			
			<input type="hidden" name="folder" value="<?php echo stripslashes($_POST['folder']); ?>" />
			<input type="hidden" name="input_file" value="<?php echo stripslashes($_POST['input_file']); ?>" />
			<input type="hidden" name="output_file" value="<?php echo stripslashes($_POST['output_file']); ?>" />

			<h2>Komenda:</h2>
			
			<textarea name="command" cols="50" rows="5"></textarea>

			<p><input type="submit" value="Dalej >" /></p>
		</form>

	</body>

</html>
