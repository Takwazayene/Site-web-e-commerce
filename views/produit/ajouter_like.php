<?php

include '../../base.php';
$commentaireC=new CommentaireC();
$commentaireC->ajouterLike($_GET['id_comment']);

header('location:single-product.php?id='.$_GET['id_prod']);
?>