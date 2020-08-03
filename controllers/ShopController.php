<?php

class ShopController extends BaseController {
	public $catalogs;
	
	////
	public function __construct() {
		parent::__construct(); 
		$this->catalogs = $this->model->getShopCatalogs();
		$this->pageData['secondmenu'] = $this->catalogs;
		$this->pageData['suburi'] = "shop/";
	}
	public function index() {
		$this->pageData['title'] = "The first page of Shop";
		$this->pageData['catalogs'] = $this->model->getShopCatalogs();
		$this->view->render("index", $this->pageData);
	}
	public function catalog($slug) {
		$catalogName = $this->catalogs[$slug["catalog"]];
		$this->pageData['subcatalogs'] = $this->model->getShopSubCatalogs($slug["catalog"]);
		$this->pageData['title'] = $catalogName;
		$this->pageData['catalog_uri'] = "shop/".$slug["catalog"];
		$this->view->render('catalog', $this->pageData);
	}
	public function subcatalog($slug) {
		$catalogName = $this->catalogs[$slug["catalog"]];
		$subcatalogs = $this->model->getShopSubCatalogs($slug["catalog"]);
		$subcatalogName = $subcatalogs[$slug["subcatalog"]];
		$this->pageData['catalog_name'] = $catalogName;
		$this->pageData['subcatalog_name'] = $subcatalogName;
		$this->pageData['shopitems'] = $this->model->getShopItems($slug["subcatalog"]);
		$this->pageData['path_uri'] = "shop/".$slug["catalog"]."/".$slug["subcatalog"]."/";
		$this->view->render('subcatalog', $this->pageData);
		echo "shop:::subcatalog";
	}
	public function itemdetail($arg) {
		//$this->pageData['title'] = "Вход в личный кабинет";
		//$this->view->render('index', $content);
		echo "arg:<pre>";
		print_r($arg);
		echo "</pre>";
		echo "shop:::itemdetail";
	}
}
