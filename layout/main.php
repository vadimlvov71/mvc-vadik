<!doctype html>
<html>
<?php
$path = "http://localhost/mvc-vadik";
include 'head.php';
?>
<body>
	<main role="main" style="margin-top:80px">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<!--<h1></h1>-->
					<div class="row">
						<div class="col-md-2">
							<?php
							$this->leftMenu($path, $data["menu"]);
								
							?>
						</div>
						<div class="col-md-10">
							<?php 
							/*
							echo "!!!!!!<pre>";
								print_r($data["rows"]);
							echo "</pre>";
							* */
							$this->breadcrumbs($path, $data["breadcrumbs"]);
							$this->content($path);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
