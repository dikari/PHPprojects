<?php
class  AdminModel extends Model{
    //获取所有的管理员
	public function getAdmins() {
		$sql = "SELECT * FROM {$this->table}";
		return $this->db->getAll($sql);
    
              }
              
	public function checkUser($username,$password){
		
		$sql = "SELECT * FROM {$this->table} WHERE 
		       admin_name = '$username' AND password = '$password'
		       LIMIT 1";
		// echo $sql;
		// exit;
		return $this->db->getRow($sql);

        }
       
        
        
}