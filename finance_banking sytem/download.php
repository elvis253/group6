

<!DOCTYPE html>
<html>
<head>
    
     <?php 
     $f="usermanual.pdf";
     $file=("$f");
     $filetype=filetype($file);
     $filename=basename($file);
     header("content-Type:".$filetype);
     header("content-length:".filesize($file));
      header("content-Disposition:attachment;filename=".$filename);
      readfile($file);


     ?>
           

    

</body>
</html>
