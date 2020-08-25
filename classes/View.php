<?php

class View {

	public $controllerName;
	public $pageName;
	public $data;
	public $parts;
	//////
	public function render($view, $data) {
		$this->controllerName = $data["controllerName"];
		$this->pageName = $view;
		$this->data = $data;
		include_once '../layout/main.php';
		
	}
	public function content($path) {
		//echo $path."<br>";
		$controllerName = $this->controllerName;
		$pageName = $this->pageName;
		$data = $this->data;
		include_once '../views/'.$controllerName.'/'.$pageName.'.php';
	}
	public function breadcrumbs($path, $breadcrumbs = null) {
		
		if($breadcrumbs != null){
		
			?>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
				<?php
					$x = 1;
					$urlNew = "";
					foreach($breadcrumbs as $url => $part){
						 
						if($urlNew == ""){
							$urlNew = $url;
						}else{
							$urlNew = $urlNew."/".$url;
						}
						if($x === 2){
							$urlNew = "/".$urlNew;
						 }
						if (!next($breadcrumbs)) {
								echo "<li class='breadcrumb-item active'>".$part."</li>";
						}else {
							  // echo "url".$url."<br>";
							   echo "<li class='breadcrumb-item'><a href='".$path.$urlNew."'>".$part."</a></li>";
						}
						 $x++;
					}
					?>
				</ol>
			</nav>
			<?php
		}else{
			echo "null";
		}
	}
	public function leftMenu($path, $menu) {
		foreach($menu as $url => $item){
			if($this->controllerName == "index"){
				$uri = $this->pageName;
			}else{
				$uri = $this->controllerName;
			}
			if($uri == $url){
				echo "<div>".$item."</div>";
			}else{
				echo "<div><a href='".$path."/".$url."'>".$item."</a></div>";
			}
		}
	}					
}
