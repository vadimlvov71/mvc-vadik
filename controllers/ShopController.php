<?php

class ShopController extends BaseController {
	public $catalogs;
	public $request;
	////
	public function __construct($request) {
		parent::__construct($request); 
		$this->catalogs = $this->model->getShopCatalogs();
		$this->pageData['secondmenu'] = $this->catalogs;
		
	}
	public function index() {
		$this->pageData['title'] = "The first page of Shop";
		$this->pageData['catalogs'] = $this->model->getShopCatalogs();
		$this->pageData['path_uri'] = "/shop/";
		$this->view->render("index", $this->pageData);
	}
	public function catalog($request) {
		$catalog = $request->attributes->getAttribute("catalog");
		//echo "get:".$get."<br>";
		$catalogName = $this->catalogs[$catalog];
		$this->pageData['subcatalogs'] = $this->model->getShopSubCatalogs($catalog);
		$this->pageData['title'] = $catalogName;
		$this->pageData['path_uri'] = "/shop/".$catalog."/";
		$this->pageData['breadcrumbs'][$catalog] = $catalogName;
		$this->view->render('catalog', $this->pageData);
	}
	public function subcatalog($request) {
			
		$catalog = $request->attributes->getAttribute("catalog");
		$subcatalog = $request->attributes->getAttribute("subcatalog");
		$catalogName = $this->catalogs[$catalog];
		$subcatalogs = $this->model->getShopSubCatalogs($catalog);
		$subcatalogName = $subcatalogs[$subcatalog];
		$this->pageData['title'] = $subcatalogName;
		$this->pageData['catalog_name'] = $catalogName;
		$this->pageData['subcatalog_name'] = $subcatalogName;
		$this->pageData['shopitems'] = $this->model->getShopItems($subcatalog);
		$this->pageData['path_uri'] = "/shop/".$catalog."/".$subcatalog."/";
		$this->pageData['breadcrumbs'][$catalog] = $catalogName;
		$this->pageData['breadcrumbs'][$subcatalog] = $subcatalogName;

		$this->view->render('subcatalog', $this->pageData);
		echo "shop:::subcatalog";
	}
	public function itemdetail($request) {
		$catalog = $request->attributes->getAttribute("catalog");
		$subcatalog = $request->attributes->getAttribute("subcatalog");
		$itemdetail = $request->attributes->getAttribute("itemdetail");
		$shopitems = $this->model->getShopItems($subcatalog);
		$subcatalogs = $this->model->getShopSubCatalogs($catalog);
		$subcatalogName = $subcatalogs[$subcatalog];
		$catalogName = $this->catalogs[$catalog];
		$itemDetailName = $shopitems[$itemdetail];
		$this->pageData['shopitems'] = $this->model->getShopItems($subcatalog);
		$this->pageData['catalog_name'] = $catalogName;
		$this->pageData['subcatalog_name'] = $subcatalogName;
		$this->pageData['content'] = $itemDetailName;
		$this->pageData['title'] = $itemDetailName;
		$this->pageData['secondmenu'] = $subcatalogs;
		$this->pageData['path_uri'] = "/shop/".$catalog."/".$subcatalog."/";
		$this->pageData['breadcrumbs'][$catalog] = $catalogName;
		$this->pageData['breadcrumbs'][$subcatalog] = $subcatalogName;
		$this->pageData['breadcrumbs'][$itemdetail] = $itemDetailName;
		$this->view->render('itemdetail', $this->pageData);
		
		echo "shop:::itemdetail";
	}
}
