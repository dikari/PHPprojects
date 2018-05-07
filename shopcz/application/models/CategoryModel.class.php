<?php

//商品分类模型

 class categoryModel extends Model{
     public function getCats(){
         $sql = "SELECT * FROM {$this->table}";
          $cats = $this->db->getAll($sql);
		//对获取的分类进行重新排序
		return $this->tree($cats);
	}

	//对给定的数组进行重新排序
	public function tree($arr,$pid = 0,$level=0){
		static $res = array();
		foreach ($arr as $v){
			if ($v['parent_id'] == $pid) {
				//说明找到，先保存
				$v["level"]= $level;
				$res[] = $v;
				//改变条件，递归查找
				$this->tree($arr,$v['cat_id'],$level+1);
			}
		}
		return $res;
        }
        
        
	//指定一个cat_id,获取其后代所有分类的cat_id
	public function getSubIds($cat_id){
		$sql = "SELECT * FROM {$this->table}";
		$cats = $this->db->getAll($sql);
		$cats = $this->tree($cats,$cat_id);
		$ids = array();
		foreach ($cats as $cat) {
			$ids[] = $cat['cat_id'];
		}
		//将自己也追加进来
		$ids[] = $cat_id;
		return $ids;
	}
 }