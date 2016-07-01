<?php include __DIR__ . '/../top.php'; ?>

<?php

if( !empty($msgSuccess) )
?> <div class="text-center bg-success "><p><?php echo $msgSuccess; ?></p></div>

<?php //if( !isset($msgError) )  $msgError="";
if( !empty($msgError) )
?>
<div class="text-center bg-danger "><p><?php echo $msgError; ?></p></div>
<h2> <?php echo $libelleForm; ?>. </h2>
<?php

include 'formCreateUpdate.php';

include __DIR__ . '/../bottom.php';

?>
