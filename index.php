<?php
$path_prefix = '';

if ( isset( $_SERVER['PATH_INFO'] ) ) {
	$path_count = substr_count( $_SERVER['PATH_INFO'], '/' ) - 1;

	for ( $i = 0; $i < $path_count; $i++ ) {
		$path_prefix .= '../';
	}

	if ( strpos( $_SERVER['PATH_INFO'], '/api/whoami' ) !== false ) {
		header( 'Content-Type: application/json; charset=utf-8' );
		echo json_encode( [
			'ipaddress' => $_SERVER['REMOTE_ADDR'],
			'language' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
			'software' => $_SERVER['HTTP_USER_AGENT'],
		] );
		exit;
	} else {
		redirect_to_index();
	}
}

function redirect_to_index() {
	global $path_prefix;

	if ( $path_prefix == '' ) {
		$path_prefix = './';
	}

	header( "Location: $path_prefix" );
	exit;
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Request Header Parser Microservice</title>
	<meta name="description" content="freeCodeCamp - APIs and Microservices Project: Request Header Parser Microservice">
	<link rel="icon" type="image/x-icon" href="<?php echo $path_prefix; ?>favicon.ico">
	<link rel="stylesheet" href="<?php echo $path_prefix; ?>assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="p-4 my-4 bg-light rounded-3">
			<div class="row">
				<div class="col">
					<h1 id="title" class="text-center">Request Header Parser Microservice</h1>

					<h3>User Story:</h3>
					<ol>
						<li>I can get the IP address, preferred languages (from header <code>Accept-Language</code>) and system information (from header <code>User-Agent</code>) for my device.</li>
					</ol>

					<h3>Example Usage:</h3>
					<ul>
						<li><a href="<?php echo $path_prefix; ?>api/whoami" target="_blank">/api/whoami</a></li>
					</ul>

					<h3>Example Output:</h3>
					<p>
						<code>{"ipaddress":"0.0.0.0","language":"en-US,en;q=0.5","software":"Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0"}</code>
					</p>

					<div class="footer text-center">by <a href="https://www.freecodecamp.org" target="_blank">freeCodeCamp</a> & <a href="https://www.freecodecamp.org/adam777" target="_blank">Adam</a> | <a href="https://github.com/Adam777Z/freecodecamp-project-request-header-parser-php" target="_blank">GitHub</a></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>