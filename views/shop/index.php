<h1><?=$data["title"]?></h1>
<?php
foreach($data["catalogs"] as $url => $item){
	echo "<div><a href='".$path.$data["path_uri"].$url."'>".$item."</a></div>";
}
?>

