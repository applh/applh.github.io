<?php

$data=trim($_REQUEST['data']);
$enc=trim($_REQUEST['enc']);

if ($enc == "base64") {
	$data=base64_decode($data);
}

echo $data;