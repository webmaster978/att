<?php require('config/database.php');?>
<?php

$suc=20;
$sucs=sha1(20);
$er=2;
$ers=sha1(2);

     if (isset($_POST['ida']) AND ! empty($_POST['ida'])) {
   	if (isset($_POST['val']) AND ! empty($_POST['val'])) {
   		
   		$ida=htmlspecialchars($_POST['ida']);
   		$val=htmlspecialchars($_POST['val']);

   		$req=$connect->prepare('UPDATE services SET val=:val WHERE ida=:ida');

   		$res=$req->execute(array(
   			'ida'=>$ida,
   			'val'=>$val));

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