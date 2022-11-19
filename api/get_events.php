<?php 
    include_once('../utils/db_config.php');
    $db = $conn;
    switch ($_SERVER["REQUEST_METHOD"]) {
        case "GET":
            $result = read($db, $_GET);
            break;
        case "POST": 
            $requestPayload = json_decode(file_get_contents("php://input")); 
            $id = $requestPayload->id; 
            $action = $requestPayload->action; 
            $body = (array) $requestPayload->data; 
            $result = [ 
                "action" => $action 
            ]; 
            if ($action == "inserted") {; 
                $databaseId = create($db, $body); 
                $result["tid"] = $databaseId; 
            } elseif($action == "updated") { 
                update($db, $body, $id); 
            } elseif($action == "deleted") { 
                delete($db, $id); 
            } 
        break; 
        default: 
            throw new Exception("Unexpected Method"); 
        break;
    }

    function read($db){
        $sql = "SELECT * FROM `event`";
        $result = $db -> query($sql);
        $events = array();
        while($row = mysqli_fetch_array($result)){
            $temp = array();
            $temp['id'] =  $row['id'];
            $temp['start_date'] =  $row['start_date'];
            $temp['end_date'] = $row['end_date'];
            $temp['text'] =  $row['text'];
            array_push($events, $temp);
        }
        return $events;
    }

    function create($db, $event){
        $sql = "INSERT `event` (start_date, end_date, text) values ('".$event["start_date"]."', '".$event["end_date"]."', '". $event["text"]."')";
        $result = mysqli_query($db, $sql);
        return $result;
    }
    // update an event
    function update($db, $event, $id){
        $sql = "UPDATE `event` SET start_date = '".$event["start_date"]."', end_date='".$event["end_date"]."', text='".$event["text"]."' WHERE id = '".$id."'";
        $result = mysqli_query($db, $sql);
        return $result;
    }
    // delete an event
    function delete($db, $id){
        $sql = "DELETE FROM `event` WHERE id = '".$id."'";
        $result = mysqli_query($db, $sql);
        return $result;
    }
 
    header("Content-Type: application/json");
    echo json_encode($result);
?>