<h1><?=$data["title"]?></h1>
<h2>list of subcatalogs:</h2>
<?php
foreach($data["subcatalogs"] as $url => $item){
	echo "<div><a href='".$path.$data["path_uri"].$url."'>".$item."</a></div>";
}
?>


