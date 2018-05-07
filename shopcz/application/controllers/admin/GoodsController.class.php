<?php

class GoodsController extends BaseController{
   public function indexAction(){
       include CUR_VIEW_PATH ."goods_list.html";
       
}
   public function addAction(){
       //获取所有的商品分类 
		$categoryModel = new CategoryModel('category');
		$cats = $categoryModel->getCats();
		//获取所有的品牌
		$brandModel = new BrandModel('brand');
		$brands = $brandModel->getBrands();
		//获取所有的商品类型
		$typeModel = new TypeModel('goods_type');
		$types = $typeModel->getTypes();
		include CUR_VIEW_PATH ."goods_add.html";
   
       
}
   public function insertAction(){
       
       
}
   public function editAction(){
       include CUR_VIEW_PATH ."goods_edit.html";
       
}
   public function updateAction(){
      
       
}
   public function deleteAction(){
      
       
}
    
    
    
    
}

