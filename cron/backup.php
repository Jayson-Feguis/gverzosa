<?php
    include_once('../utils/db_config.php');
    include_once('../utils/helper.php');

    $user_id = 1;
    $date_now = getDateNow();

    $sql_user = "SELECT * FROM tbl_user LIMIT 1";
    $result_user = $conn -> query($sql_user);

    while($row = mysqli_fetch_array($result_user)){
        $user_id =  $row['USER_ID'];
    }
    
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
        $file_name = 'backup_' . time() . '.sql';
        $backup_file_name = '../backup/'.$file_name;
        $fileHandler = fopen($backup_file_name, 'w+');
        $number_of_lines = fwrite($fileHandler, $sqlScript);
        fclose($fileHandler); 

        $sql_backup = "INSERT tbl_backup (USER_ID, BACKUP_DATE, BACKUP_FILE) values ('$user_id', '$date_now', '$file_name')";
        $result_backup = mysqli_query($conn, $sql_backup);

        
        $descriptionaudit = "Backed up Database " ; // description plus banner name
        $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$user_id', '$descriptionaudit' )";
        $query_audit = mysqli_query($conn, $audit);
    }
?>

<?php
    include_once('../utils/db_config.php');

    $user_id = 1;

    $sql_user = "SELECT * FROM tbl_user LIMIT 1";
    $result_user = $conn -> query($sql_user);

    while($row = mysqli_fetch_array($result_user)){
        $user_id =  $row['USER_ID'];
    }
    
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
        $file_name = 'backup_' . time() . '.sql';
        $backup_file_name = '../backup/'.$file_name;
        $fileHandler = fopen($backup_file_name, 'w+');
        $number_of_lines = fwrite($fileHandler, $sqlScript);
        fclose($fileHandler); 

        $sql_backup = "INSERT tbl_backup (USER_ID, BACKUP_FILE) values ('$user_id', '$file_name')";
        $result_backup = mysqli_query($conn, $sql_backup);

        
        $descriptionaudit = "Backed up Database " ; // description plus banner name
        $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$user_id', '$descriptionaudit' )";
        $query_audit = mysqli_query($conn, $audit);

        if($query_audit){
            echo 'Backup Success';
        }
    }
?>

