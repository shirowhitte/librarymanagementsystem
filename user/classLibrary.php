<?php

class User
{
	
    public function register($userId, $password, $userFirstName, $userLastName, $userPhone, $userEmail) 
    {  
       
		$con = mysqli_connect("localhost","root","","library");
        $checkuser = mysqli_query($con, "SELECT userId from user where userId='$userId'");  
        $result = mysqli_num_rows($checkuser);  
        $prepeat=$_POST['pwdr'];
        if($password != $prepeat)//check if 2 password matches
        {
            echo "<h4 style='color:white;'><i> &nbsp; &nbsp;  Password do not match </i></h4>"; //if not match, display msg
            return false;
        } 
        else if ($result == 0) 
        {  
            	$register = mysqli_query($con, "Insert into user (`userId`, `password`, `userFirstName`, `userLastName`, `userPhone`, `userEmail`)values  ('$userId','$password','$userFirstName','$userLastName','$userPhone','$userEmail')") or die(mysqli_error());
        	
			return true;  
        } 
        else if($result>0)
        {
        	echo "<h4 style='color:white;'><i> &nbsp; &nbsp;  User ID already exists </i></h4>"; //if not match, display msg
            return false;
        }
        else 
        {  
            return false;  
        }  
    }


    public function login($userId, $password) 
    {  
  		
		$con = mysqli_connect("localhost","root","","library");	
        $check = mysqli_query($con, "SELECT* from user where userId='$userId' and password='$password'");  
        $data = mysqli_fetch_array($check);  
        $result = mysqli_num_rows($check);  
        if ($result == 1) {  
            $_SESSION['userSession'] = true;  
            $_SESSION['userId'] = $data['userId'];  
            return true;  
        } else {  
            return false;  
        }  
    }
  
    public function get_fullname($userId){
    		$con = mysqli_connect("localhost","root","","library");	
    		$sql="SELECT userFirstName, userLastName FROM user WHERE userId = $userId";
	        $result = mysqli_query($con,$sql);
	        $user_data = mysqli_fetch_array($result);
	        echo $user_data['userFirstName']." ".$user_data['userLastName'] ;
    	}

    public function session() 
    {  
        if (isset($_SESSION['userSession'])) {  
            return $_SESSION['userSession'];  
        }  
    }  


    public function logout() {  
        $_SESSION['userSession'] = false;  
        session_destroy();  
    }  
  
    
    
 }