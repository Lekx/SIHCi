
<?php 

   $nameZip = date('Y-m-d').".zip"; 
   $archiveFolder = "../backups/files"; 

   $zip = new ZipArchive();
   $zip->open($nameZip, ZipArchive::CREATE);

    // Create recursive directory iterator
    /** @var SplFileInfo[] $files */
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($archiveFolder),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file)
    {
        // Skip directories (they would be added automatically)
        if (!$file->isDir())
        {
            // Get real and relative path for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($archiveFolder) + 1);

            // Add current file to archive
            $zip->addFile($filePath, $relativePath);
        }
    }

    $fileName = $zip->filename; 
    $zip->close();
    echo "Archive created successfully.";    

    ob_start();
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"".$nameZip."\"");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: ".filesize($filepath.$nameZip));
    ob_end_flush();
     ob_flush();
       ob_clean();
        @readfile($filepath.$nameZip);
        //unlink($nameZip);
       exit;

        


?>

