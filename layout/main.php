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
					<div class="col-md-2">
						<?php
							foreach($data["menu"] as $url => $item){
								echo "<div><a href='".$path.$url."'>".$item."</a></div>";
							}
						?>
					</div>
					<div class="col-md-7">
						<?php 
						$this->content($path);
						?>
					</div>
					<div class="col-md-3">
						<div style="padding-top:260px;">
						<?php
							foreach($data["secondmenu"] as $url => $item){
								$subUri = $data["suburi"];
								echo "<div><a href='".$path.$subUri.$url."'>".$item."</a></div>";
							}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
