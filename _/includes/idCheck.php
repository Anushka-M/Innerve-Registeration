<?php
/**
 * Created by PhpStorm.
 * User: AnushkaM
 * Date: ११-०७-२०१७
 * Time: ०४:१४
 */
   if($_POST['id']){
        $id =$_POST['id'];
        include '../DbConnect/Dbase.php';
        $obj = new DbConnect();
        $query = "Select `id` from `user_table`";
        $result = $obj->run_query($query);
        while($fetch = mysqli_fetch_assoc($result)){
            if($fetch['id']== $id){
                echo "Email Id already exist,please Login";
                break;
            }
        }
    }
?>