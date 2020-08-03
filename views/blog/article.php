<?php		
echo $data["content"]["text"]."<br>";
foreach($data["row"] as $url => $item){
	echo "<div><a href='".$path.$url."'>".$item."</a></div>";
}
?>


