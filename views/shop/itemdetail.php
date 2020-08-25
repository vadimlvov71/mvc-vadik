<h1><?=$data["title"]?></h1>
<hr>
<h2><?=$data["subcatalog_name"]?></h2>
<h4><?=$data["catalog_name"]?></h4>




Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

<h3>list of items:</h3>
<?php
echo "path:".$path."<br>";
foreach($data["shopitems"] as $url => $item){
	echo "<div><a href='".$path.$data["path_uri"].$url."'>".$item."</a></div>";
}
?>
