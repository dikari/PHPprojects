<?php

class TypeModel extends Model {
    public function getTypes(){
        
        $sql ="SELECT * FROM {$this ->table}";
        return $this ->db ->getAll($sql);
    }
    public function getPageTypes($offset,$limit){
        $sql = "SELECT * FROM {$this ->table} ORDER BY type_id DESC LIMIT $offset,$limit";
        return $this -> db ->getAll($sql);
            
        
        
    }
    
}

