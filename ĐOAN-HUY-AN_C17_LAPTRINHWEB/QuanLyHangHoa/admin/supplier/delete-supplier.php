<?php 
      require_once('../../database/database.php');
?>
<?php
       $sqlEHH = "UPDATE nhacungcap SET status=2 WHERE id = '$_GET[id]'";
       $db->update($sqlEHH);
       header('Location: ../supplier.php');
?>