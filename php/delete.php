<?php
  include('dbconnect.php');
  $id_group = $_POST['id_group'];
  $table = $_POST['table'];
  $str;
  // foreach ($id_group as $key) {
  //   $str = $str.','.$key;
  // }
  if(count($id_group) == 1){
    $str = $id_group[0];
    $sql = 'DELETE FROM '.$table.' WHERE id = '.$str.'';
    if(mysql_query($sql)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else {
      die(mysql_error());
    }
  }else{
  $s = implode(",",$id_group);
  $sql = 'DELETE FROM '.$table.' WHERE id in ('.$s.')';
  if(mysql_query($sql)){
      header('Location: ' . $_SERVER['HTTP_REFERER']);
  }else {
    die(mysql_error());
    die
  }
}
 ?>
