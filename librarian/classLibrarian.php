<?php

class Lib
{
    
    public function register($libId, $password, $libFirstName, $libLastName, $libPhone, $libEmail) 
    {  
       
        $con = mysqli_connect("localhost","root","","library");
        $checkuser = mysqli_query($con, "SELECT libId from librarian where libId='$libId'");  
        $result = mysqli_num_rows($checkuser);  
        $prepeat=$_POST['pwdr'];
        if($password != $prepeat)//check if 2 password matches
        {
            echo "<h4 style='color:white;'><i> &nbsp; &nbsp;  Password do not match </i></h4>"; //if not match, display msg
            return false;
        } 
        else if ($result == 0) 
        {  
                $register = mysqli_query($con, "Insert into librarian (`libId`, `password`, `libFirstName`, `libLastName`, `libPhone`, `libEmail`)values  ('$libId','$password','$libFirstName','$libLastName','$libPhone','$libEmail')") or die(mysqli_error());
            
            return true;  
        } 
        else if($result>0)
        {
            echo "<h4 style='color:white;text-align:center;'><i> &nbsp; &nbsp;  Librarian ID already exists </i></h4>"; //if not match, display msg
            return false;
        }
        else 
        {  
            return false;  
        }  
    }


    public function login($libId, $password) 
    {  
        
        $con = mysqli_connect("localhost","root","","library"); 
        $check = mysqli_query($con, "SELECT* from librarian where libId='$libId' and password='$password'");  
        $data = mysqli_fetch_array($check);  
        $result = mysqli_num_rows($check);  
        if ($result == 1) {  
            $_SESSION['libSession'] = true;  
            $_SESSION['libId'] = $data['libId'];  
            return true;  
        } 
        else 
        {  
            return false;  
        }  
    }
  
    public function get_fullname($libId)
    {
        $con = mysqli_connect("localhost","root","","library"); 
        $sql="SELECT libFirstName, libLastName FROM librarian WHERE libId = $libId";
        $result = mysqli_query($con,$sql);
        $user_data = mysqli_fetch_array($result);
        echo $user_data['libFirstName']." ".$user_data['libLastName'] ;
    }

    public function session() 
    {  
        if (isset($_SESSION['libSession'])) 
        {  
            return $_SESSION['libSession'];  
        }  
    }  


    public function logout() 
    {  
        $_SESSION['libSession'] = false;  
        session_destroy();  
    }  
  
    
    
 }