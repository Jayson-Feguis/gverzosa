<?php
include_once('../utils/db_config.php');

if(isset($_POST['backup'])){
    $user_id = $_POST['userID'];
    
    // Get connection object and set the charset
    $conn->set_charset("utf8");
    
    // Get All Table Names From the Database
    $tables = array();
    $sql = "SHOW TABLES";
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];
    }
    
    $sqlScript = "";
    foreach ($tables as $table) {
        
        // Prepare SQLscript for creating table structure
        $query = "SHOW CREATE TABLE $table";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($result);
        
        $sqlScript .= "\n\n" . $row[1] . ";\n\n";
        
        
        $query = "SELECT * FROM $table";
        $result = mysqli_query($conn, $query);
        
        $columnCount = mysqli_num_fields($result);
        
        // Prepare SQLscript for dumping data for each table
        for ($i = 0; $i < $columnCount; $i ++) {
            while ($row = mysqli_fetch_row($result)) {
                $sqlScript .= "INSERT INTO $table VALUES(";
                for ($j = 0; $j < $columnCount; $j ++) {
                    $row[$j] = $row[$j];
                    
                    if (isset($row[$j])) {
                        $sqlScript .= '"' . $row[$j] . '"';
                    } else {
                        $sqlScript .= '""';
                    }
                    if ($j < ($columnCount - 1)) {
                        $sqlScript .= ',';
                    }
                }
                $sqlScript .= ");\n";
            }
        }
        
        $sqlScript .= "\n"; 
    }
    
    if(!empty($sqlScript))
    {
        // Save the SQL script to a backup file
        $file_name = $database_name . '_backup_' . time() . '.sql';
        $backup_file_name = '../backup/'.$file_name;
        $fileHandler = fopen($backup_file_name, 'w+');
        $number_of_lines = fwrite($fileHandler, $sqlScript);
        fclose($fileHandler); 

        $sql_backup = "INSERT tbl_backup (USER_ID, BACKUP_FILE) values ('$user_id', '$file_name')";
        $result_backup = mysqli_query($conn, $sql_backup);

        $idaudit =  $_SESSION['user_id']; //id
        $descriptionaudit = "Backed up Database " ; // description plus banner name
        $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
        $query_audit = mysqli_query($conn, $audit);

        if($result_backup){
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = 'Database backed up successfully';
            header("Location: ../pages/admin_backup.php");
            
            // Download the SQL backup file to the browser
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($backup_file_name));
            ob_clean();
            flush();
            readfile($backup_file_name);
            exec('rm ' . $backup_file_name); 

           
        }
        else{
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Oops!";
            $_SESSION['alert-text'] = 'Something went wrong';
            header("Location: ../pages/admin_backup.php");
        }
    }
    else{
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Oops!";
        $_SESSION['alert-text'] = 'Something went wrong';
        header("Location: ../pages/admin_backup.php");
    }
}
