
<?php 

   $nameZip = date('d-m-Y').".zip"; 
   $archiveFolder = "../backups/files"; 

   $zip = new ZipArchive();
   $zip->open($nameZip, ZipArchive::CREATE);

   
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($archiveFolder),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file)
    {
   
        if (!$file->isDir())
        {
   
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($archiveFolder) + 1);
            
            $zip->addFile($filePath, $relativePath);
        }
    }

    $fileName = $zip->filename; 
    $zip->close();

        

        if (headers_sent())
            echo 'HTTP header already sent';
        else 
        {
            if (!is_file($nameZip)) 
            {
                header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
                echo 'File not found';
            } 
            else if (!is_readable($nameZip)) 
            {
                header($_SERVER['SERVER_PROTOCOL'].' 403 Forbidden');
                echo 'File not readable';
            }    
            else 
            {
           
                    
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . $nameZip);
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($nameZip));

                ob_clean();
               // flush();
                
                readfile($nameZip);
                unlink($nameZip);
                
                exit;
            }
        }    


?>

