<h1><?=$data["title"]?></h1>
<?php		
echo $data["content"]["text"]."<br>";
foreach($data["rows"] as $url => $item){
	echo "<div><a href='".$path.$data["path_uri"].$url."'>".$item."</a></div>";
}
?>


