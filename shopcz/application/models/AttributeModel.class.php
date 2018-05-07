<?php

class AttributeModel extends Model{
  //第三版，获取指定类型下的属性，需要连表获取类型名称
	public function getAttrs($type_id,$offset,$limit){
		$type_table = $GLOBALS['config']['prefix'] . "goods_type";
		$sql = "SELECT * FROM {$this->table} AS a 
				INNER JOIN $type_table AS b
				ON a.type_id = b.type_id
				WHERE a.type_id = $type_id
				LIMIT $offset,$limit";
		return $this->db->getAll($sql);  
    
}
}

