<?php 
      require_once('../../database/database.php');
?>
<?php
       $sqlEHH = "UPDATE daily SET status=2 WHERE id = '$_GET[id]'";
       $db->update($sqlEHH);
       header('Location: ../customer.php');
?>