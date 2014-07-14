<?php

include("config.php");

function executeBackgroundCommand($command, $workingDir, $stdoutFile)
{
	$command = $command . " 1>\"" . $stdoutFile ."\" 2>&1";

	$command="cmd /C $command";

	chdir($workingDir);

	$wshShell = new COM("WScript.Shell");
	
	// Exec() return correct PID but popups shell window
	//$exec = $wshShell->Exec($command);

	// Run() doesn't popup windows but doesn't return PID also :(
	$exec = $wshShell->Run($command, 0, false);

	return $exec->ProcessID;
}

function PsExists($pid)
{
	exec("pslist.exe $pid 2>&1", $output);

	while (list(,$row) = each($output))
	{
		$found = stristr($row, "process $pid was not found");
		if ($found !== false)
		{
			return false;
		}
	}
  
	return true;
}

function PsKill($pid)
{
	exec("pskill.exe $pid", $output);
}

?>
