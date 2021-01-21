<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin:*');
require('config.php');
$id=$_POST['id'];
// $total="select id from word";
// $number=mysqli_num_rows(mysqli_query($con,$total));
// echo $number;
// 返回数据总数
if($id==NULL){
    // id为空的情况下返回正常数据
    $data=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `word` ORDER BY RAND() LIMIT 1"));
    // echo var_dump($data);
    echo "data".json_encode(array('id'=>$data['id'],'sentence'=>$data['sentence'],'love'=>$data['love']));
}else{
    $bool=mysqli_fetch_array(mysqli_query($con,"select * from word where id='$id'"));
    if(!is_null($bool)){
        // id存在的情况下修改当前id的love数据
        $love=$bool['love'];
        $love++;
        mysqli_query($con,"update word set love='$love' where id='$id'");
        echo "data".json_encode(array('code'=>1,'love'=>$love));
        // 返回1
    }else{
        echo "data".json_encode(array('code'=>0)).";";
        // 返回0
    }
}
