#!/usr/bin/php -q
<?php

function pushData($data) {
	$url = "http://aquapp.utbweb.co/sync/".$data;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	if(curl_errno($ch)) {
		echo "error ".curl_error($ch)."\n";
		return false;
	}else{
		echo $data."\n";
		return true;
	}
	curl_close($ch);
}

function spoolProcess() {
	$spool = dirname(__FILE__)."/spool/";
	$sent  = dirname(__FILE__)."/sent/";
	$fileList = array_diff(scandir($spool), array('..', '.','.spool'));
	foreach($fileList as  $id => $file){
		if(pushData(
			implode(";",
				explode("\t",
					file_get_contents($spool.$file))
				)
			)
		) {
			rename($spool.$file,$sent.$file);
		}
	}
}

spoolProcess();
