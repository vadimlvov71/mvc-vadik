<!doctype html>
<html>
<?php
$path = "http://localhost/mvc-vadik/";
include 'head.php';
?>
<body>
	<main role="main" style="margin-top:80px">
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<h1><?=$data['title']?></h1>
				<div class="row">
					<div class="col-md-9">
						<?php 
						$this->content();
						?>
					</div>
					<div class="col-md-3">
						<?php
						echo "<pre>";
print_r($data["menu"]);
echo "</pre>";
						/*	foreach($data["menu"] as $url => $item){
								echo "<div><a href='".$url."'>".$item."</a></div>";
							}*/

							?>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
