<h1><?=$data["subcatalog_name"]?></h1>
<h2><?=$data["catalog_name"]?></h2>

<h3>list of items:</h3>
<?php		

foreach($data["shopitems"] as $url => $item){
	echo "<div><a href='".$path.$data["path_uri"].$url."'>".$item."</a></div>";
}
?>


