<?php 
      require_once('../../database/database.php');
?>
<?php
       $sqlEHH = "UPDATE hanghoa SET status=2 WHERE id = '$_GET[id]'";
       $db->update($sqlEHH);
       header('Location: ../goods.php');
?>