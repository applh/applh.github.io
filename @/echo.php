<?php

$data=trim($_REQUEST['data']);
$enc=trim($_REQUEST['enc']);
$md5=basename(trim($_REQUEST['md5'])); // NEEDS SOME PROTECTION HERE
$mode=trim($_REQUEST['mode']);

if ($enc == "base64") {
	//$data=strtr($data, '-_', '+/');
	$data=base64_decode($data);
}


if (($mode == "write") && !empty($data) && $md5) {
	$tmpfile=__DIR__."/tmp/$md5.html";
	file_put_contents(__DIR__."/tmp/$md5.html", $data);
}
else if (($mode == "read") && $md5) {
	$tmpfile=__DIR__."/tmp/$md5.html";
	if (is_file($tmpfile)) {
		$data=file_get_contents(__DIR__."/tmp/$md5.html");
	}
	else {
		$data="NOT FOUND ".date("H:i:s");
	}
	echo $data;
}
