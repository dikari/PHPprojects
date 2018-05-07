<?php
 class  LoginController extends Controller{
     
     public function loginAction(){
         
         include CUR_VIEW_PATH."login.html";
     }
       public function signinAction(){
        //1.获取用户名和密码
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		//
                $captchad =trim($_POST['captcha']);
                if (strtolower($_SESSION["captcha"])!= $captchad){
                    $this ->jump("index.php?p=admin&c=login&a=login","hahahah",'3');
                    
                    
                    
                }
                    
		

		//3.调用模型来完成验证操作并给出提示
		$adminModel = new AdminModel('admin');
		$user = $adminModel->checkUser($username,$password);
		if ($user) {
			//登录成功,保存登录标识符
			$_SESSION['admin'] = $user;
			//跳转
			$this->jump('index.php?p=admin&c=index&a=index','',0);
		} else {
			//失败
			$this->jump('index.php?p=admin&c=login&a=login','用户名或密码错误');
                }
       }
       public  function logoutAction(){
           unset($_SESSION["admin"]);
           session_destroy();
           
           $this ->jump("index.php?p=admin&c=login&a=login","zhxiaole","1");
       }
       
       
       //生成验证码
       public function captchaAction(){
           $this ->library("Captcha");
           $captcha = new Captcha();
           $captcha ->generateCode();
           $_SESSION["captcha"] =$captcha ->getCode();
           
           
           
           
           
       }
      
 }       
       
