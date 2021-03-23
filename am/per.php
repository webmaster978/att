<?php require('config/database.php');?>
<?php
$succ=10;
$succs=sha1(10);
$err=1;
$errs=sha1(1);
     if (isset($_POST['ida']) AND ! empty($_POST['ida'])) {
   	if (isset($_POST['per']) AND ! empty($_POST['per'])) {
   		
   		$ida=htmlspecialchars($_POST['ida']);
   		$per=htmlspecialchars($_POST['per']);

   		$req=$connect->prepare('UPDATE services SET per=:per WHERE ida=:ida');

   		$res=$req->execute(array(
   			'ida'=>$ida,
   			'per'=>$per));

   		if ($res) {
   			header('location:fact.php?succ='.$succ.'&succs='.$succs);
   		}else{
   			header('location:fact.php?err='.$err.'&errs='.$errs);
   		}
   	}else{
         header('location:fact.php?err='.$err.'&errs='.$errs);
      }
   	
   }else{
      header('location:fact.php?err='.$err.'&errs='.$errs);
   } 



 ?>