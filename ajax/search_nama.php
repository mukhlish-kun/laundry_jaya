<?php

         require('../koneksi.php');
         $keyword =$_REQUEST['id'];
         $query="SELECT * FROM `pelanggan` WHERE telp LIKE ?";
         $params= array("%$keyword%");
         $stmt = $db->prepare($query);
         $stmt->execute($params);
         $n=0;
         while ($data=$stmt->fetch()) {
             # code...
             if ($n!=0){
                 echo ", ";
             }
             echo $data['nama_lengkap'];
             $n++;
         };
         echo ".";
?>