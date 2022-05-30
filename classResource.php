<?php
date_default_timezone_set("Asia/Bangkok");//declare timezone

//class book
class Book
{
    //insert resource
    public function insert($bookId, $ISBN, $bookTitle, $bookAuthor, $bookPublisher,$bookStatus, $bookRegularcost, $bookExtendedcost, $type) 
    {  
       
        $con = mysqli_connect("localhost","root","","library");
        $checkbook = mysqli_query($con, "SELECT bookId from add_book where bookId='$bookId'");  
        $result = mysqli_num_rows($checkbook);  
        if ($result == 0) 
        {  
            $register = mysqli_query($con, "INSERT INTO `add_book`(`bookId`, `ISBN`, `bookTitle`, `bookAuthor`, `bookPublisher`, `bookStatus`, `bookRegularcost`, `bookExtentedcost`, `type`) VALUES ('$bookId','$ISBN','$bookTitle','$bookAuthor','$bookPublisher','$bookStatus','$bookRegularcost','$bookExtendedcost','$type')") or die(mysqli_error());
            
            return true;  
        } 
        else if($result>0)
        {
            echo "<h3 style='color:white;text-align:center;'><i> &nbsp; &nbsp;  Book ID already exists </i></h3>"; //if not match, display msg
            return false;
        }
        else 
        {  
            return false;  
        }  
    }

    public function getBookInfo($bookId)
    {
        $con = mysqli_connect("localhost","root","","library"); 
        $sql="SELECT * FROM add_book WHERE bookId = $bookId";
        $result = mysqli_query($con,$sql);
        $data = mysqli_fetch_array($result);
        
        echo "Edit Info "."<i class='fa fa-pencil square' aria-hidden='true'></i>"."<br>";
    }

     public function getBookingInfo($bookId)
    {
        $con = mysqli_connect("localhost","root","","library"); 
        $sql="SELECT * FROM add_book WHERE bookId = $bookId";
        $result = mysqli_query($con,$sql);
        $data = mysqli_fetch_array($result);
        
        echo "Borrowing Book ".$data['bookId']."<br>";
    }

    public function getExtendInfo($bookId)
    {
        $con = mysqli_connect("localhost","root","","library"); 
        $sql="SELECT * FROM add_book WHERE bookId = $bookId";
        $result = mysqli_query($con,$sql);
        $data = mysqli_fetch_array($result);
        
        echo "Extending Return Date for Resource ".$data['bookId']."<br>";
    }

    //display book details
    public function getBookDetails($bookId)
    {
        $con = mysqli_connect("localhost","root","","library"); 
        $sql="SELECT * FROM add_book WHERE bookId = $bookId";
        $result = mysqli_query($con,$sql);
        $bookRow = mysqli_fetch_array($result);
        ?>
        <table class="table table-user-information" align="center">
            <tbody>
                <tr>
                    <td>Status</td>
                    <td>
                        <select value="<?php echo $bookRow['bookStatus']; ?>" name="bookStatus" >
                        <option value="Available">Available</option>
                        <option value="Borrowed">Borrowed</option>
                        <option value="Extended">Extended</option>
                        </select><br>
                    </td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td> <input type ="text" value="<?php echo $bookRow['type']; ?>" name="type" readonly   required=""></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td><input type ="text" value="<?php echo $bookRow['bookId']; ?>" name="bookId"required="" readonly  ></td>
                        </tr>
                        <tr>
                            <td>ISBN</td>
                            <td><input type ="text" value="<?php echo $bookRow['ISBN']; ?>" name="ISBN"required="" readonly  ></td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td><input type ="text" value="<?php echo $bookRow['bookTitle']; ?>" name="Title"required="" readonly  ></td>
                        </tr>
                        <tr>
                            <td>Author</td>
                            <td><input type ="text" value="<?php echo $bookRow['bookAuthor']; ?>" name="bookAuthor" readonly   required="">
                            </td>
                        </tr>
                        <tr>
                            <td>Publisher</td>
                            <td><input type ="text" value="<?php echo $bookRow['bookPublisher']; ?>" name="bookPublisher" readonly   required="">
                            </td>
                        </tr>
                                                
                        <tr>
                            <td>Regular Cost</td>
                            <td><input type ="text" value="<?php echo $bookRow['bookRegularcost']; ?>" name="bookRegularcost" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>Extended Cost</td>
                            <td>
                                <input type ="text" value="<?php echo $bookRow['bookExtentedcost']; ?>" name="bookExtentedcost" required="">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php
    }

    //display borrowing book details
    public function getBookingDetails($bookId)
    {
        $con = mysqli_connect("localhost","root","","library"); 
        $sql="SELECT * FROM add_book WHERE bookId = $bookId";
        $result = mysqli_query($con,$sql);
        $bookRow = mysqli_fetch_array($result);
        ?>
        
        <table class="table table-user-information" align="center">
            <tbody>
                <tr>
                    <td colspan="2">Today Date<br> <input style="width:300px;padding-left: 5px;text-align: center"type ="text" value="<?php echo date('Y-m-d');?>" name="borrowDate" readonly   required=""></td>
                                                    
                </tr>
                                               
                <tr>
                    <td>Type</td>
                    <td> <input style="width:300px;padding-left: 5px;" type ="text" value="<?php echo $bookRow['type']; ?>" name="type" readonly   required=""></td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['bookId']; ?>" name="bookId"required="" readonly  ></td>
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['ISBN']; ?>" name="ISBN"required="" readonly  ></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['bookTitle']; ?>" name="Title"required="" readonly  ></td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['bookAuthor']; ?>" name="bookAuthor" readonly   required="">
                    </td>
                </tr>
                <tr>
                    <td>Publisher</td>
                        <td><input style="width:300px;padding-left: 5px;" type ="text" value="<?php echo $bookRow['bookPublisher']; ?>" name="bookPublisher" readonly   required="">
                    </td>
                </tr>
                                                
                <tr>
                    <td>Cost per Day</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo "$". $bookRow['bookRegularcost']; ?>" name="bookRegularcost"readonly  required="">
                    </td>
                </tr>
                <tr>
                    <td>Return Date</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" id="returnDate" value="<?php echo date('Y-m-d', strtotime('+1 days')); ?>" name="returnDate" required="">
                    </td>
                </tr>
                                                                                      
            </tbody>
        </table>
        <?php
    }

    //display extending book details
    public function getExtendDetails($bookId)
    {
        $con = mysqli_connect("localhost","root","","library"); 
        $sql="SELECT * FROM add_book WHERE bookId = $bookId";
        $result = mysqli_query($con,$sql);
        $bookRow = mysqli_fetch_array($result);
        ?>
        
        <table class="table table-user-information" align="center">
            <tbody>
                <tr>
                    <td colspan="2">Return Date<br> <input  style="width:300px;padding-left: 5px;text-align: center;"type ="text" id="datepicker" value="<?php echo $bookRow['returnDate']; ?>" name="returnDate"readonly  required=""></td>
                                                    
                </tr>
                <tr>
                    <td>Status</td>
                    <td> <input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['bookStatus']; ?>" name="type" readonly   required=""></td>
                </tr>
                <tr>
                   <td>Type</td>
                   <td> <input style="width:300px;padding-left: 5px;" type ="text" value="<?php echo $bookRow['type']; ?>" name="type" readonly   required=""></td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['bookId']; ?>" name="bookId"required="" readonly  ></td>
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['ISBN']; ?>" name="ISBN"required="" readonly  ></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['bookTitle']; ?>" name="Title"required="" readonly  ></td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['bookAuthor']; ?>" name="bookAuthor" readonly   required="">
                    </td>
                </tr>                         
                <tr>
                    <td> Extend Cost per Day</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['bookExtentedcost']; ?>" name="bookRegularcost"readonly  required="">
                    </td>
                </tr>
                <tr>
                    <td>Extend Return Date</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['returnDate']; ?>" name="extendDate" required="">
                    </td>
                </tr>
                                                                                 
            </tbody>
        </table>

        <?php
    }
    //display returning book details
    public function returnBook($bookId)
    {
        $con = mysqli_connect("localhost","root","","library"); 
        $sql="SELECT * FROM add_book WHERE bookId = $bookId";
        $result = mysqli_query($con,$sql);
        $bookRow = mysqli_fetch_array($result);
        ?>
        
        <table class="table table-user-information" align="center">
            <tbody>                           
                    <tr>
                    <td>Today Date</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo date("Y-m-d"); ?>" name="bookId"required="" readonly  ></td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['bookId']; ?>" name="bookId"required="" readonly  ></td>
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['ISBN']; ?>" name="ISBN"required="" readonly  ></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['bookTitle']; ?>" name="Title"required="" readonly  ></td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td><input  style="width:300px;padding-left: 5px;"type ="text" value="<?php echo $bookRow['bookAuthor']; ?>" name="bookAuthor" readonly   required="">
                    </td>
                </tr>                                   
            </tbody>
        </table>

        <?php
    }
}//end of class

