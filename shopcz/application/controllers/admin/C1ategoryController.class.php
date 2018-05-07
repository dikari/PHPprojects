<?php
//商品分类显示器

class CategoryController extends Controller {
    
       public function indexAction(){
                //获取所有的分类
		$categoryModel = new CategoryModel('category');
		$cats = $categoryModel->getCats(); //结果是二维数组
           
           
           include CUR_VIEW_PATH ."cat_list.html";
     }
    
    
    public function addAction(){
        //获取所有的分类
		$categoryModel = new CategoryModel('category');
		$cats = $categoryModel->getCats(); //结果是二维数组
		//载入表单页面
		include CUR_VIEW_PATH ."cat_add.html";
        
  
     }
     public function editAtion(){
         include CUR_VIEW_PATH ."cat_edit.html";
     }
      public function updateAction(){
         
     }
     
     
             //完成商品入库功能
      public function insertAction(){
         //1.收集表单数据,以关联数组的形式
		//快捷键 CTRL + shift + D复制一行
		//选中一个，使用CTRL  + D 选中下一个，以此类推
		$data['cat_name'] = trim($_POST['cat_name']);
		$data['unit'] = trim($_POST['unit']);
		$data['sort_order'] = trim($_POST['sort_order']);
		$data['cat_desc'] = trim($_POST['cat_desc']);
		$data['parent_id'] = $_POST['parent_id'];
		$data['is_show'] = $_POST['is_show'];
		//2.做相应的验证和处理
		if ($data['cat_name'] == '') {
			$this->jump('index.php?p=admin&c=category&a=add','分类名称不能为空');
		}
		//3.调用模型完成入库并给出提示
		$categoryModel = new CategoryModel('category');
		if ($categoryModel->insert($data)) {
			$this->jump('index.php?p=admin&c=category&a=index','添加分类成功',2);
		} else {
			$this->jump('index.php?p=admin&c=category&a=add','添加分类失败');
		}
     }
      public function deleteAction(){
         
     }
    
    
    
}

