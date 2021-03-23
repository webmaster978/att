<?php require('config/database.php');?>
<?php

$suc=20;
$sucs=sha1(20);
$er=2;
$ers=sha1(2);

     if (isset($_POST['ida']) AND ! empty($_POST['ida'])) {
   	if (isset($_POST['fin']) AND ! empty($_POST['fin'])) {
   		
   		$ida=htmlspecialchars($_POST['ida']);
   		$fin=htmlspecialchars($_POST['fin']);

   		$req=$connect->prepare('UPDATE services SET fin=:fin WHERE ida=:ida');

   		$res=$req->execute(array(
   			'ida'=>$ida,
   			'fin'=>$fin));

   		if ($res) {
   			header('location:fact.php?succ='.$suc.'&sucs='.$sucs);
   		}else{
   			header('location:fact.php?err='.$er.'&ers='.$ers);
   		}
   	}else{
         header('location:fact.php?err='.$er.'&ers='.$ers);
      }
   	
   }else{
      header('location:fact.php?err='.$er.'&ers='.$ers);
   } 



 ?>