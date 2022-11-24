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
        } elseif ($action == "updated") {
            update($db, $body, $id);
        } elseif ($action == "deleted") {
            delete($db, $id);
        }
        break;
    default:
        throw new Exception("Unexpected Method");
        break;
}

function read($db)
{
    $sql = "SELECT * FROM tbl_appointment";
    $result = $db->query($sql);
    $events = array();
    while ($row = mysqli_fetch_array($result)) {
        $temp = array();
        $temp['id'] =  $row['APP_ID'];
        $temp['start_date'] =  $row['START_DATE'];
        $temp['end_date'] = $row['END_DATE'];
        $temp['text'] =  $row['TEXT'];
        $temp['type'] =  $row['APP_STATUS'];
        array_push($events, $temp);
    }
    return $events;
}

function create($db, $event)
{
    $sql = "INSERT tbl_appointment (START_DATE, END_DATE, TEXT) values ('" . $event["start_date"] . "', '" . $event["end_date"] . "', '" . $event["text"] . "')";
    $result = mysqli_query($db, $sql);
    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Created an appointment"; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($db, $audit);
    return $result;
}
// update an event
function update($db, $event, $id)
{
    $sql = "UPDATE tbl_appointment SET START_DATE = '" . $event["start_date"] . "', END_DATE='" . $event["end_date"] . "', TEXT='" . $event["text"] . "' WHERE APP_ID = '" . $id . "'";
    $result = mysqli_query($db, $sql);

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Updated an appointment id " . $id; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($db, $audit);
    return $result;
}
// delete an event
function delete($db, $id)
{
    $sql = "DELETE FROM tbl_appointment WHERE APP_ID = '" . $id . "'";
    $result = mysqli_query($db, $sql);
    return $result;
}

header("Content-Type: application/json");
echo json_encode($result);

    // $sql = "SELECT * FROM tbl_appointment";
    // $result = $conn -> query($sql);
    // $appointment = array();
    // while($row = mysqli_fetch_array($result)){
    //     $temp = array();
    //     $temp['APP_ID'] =  $row['APP_ID'];
    //     $temp['APP_NAME'] =  $row['APP_NAME'];
    //     $temp['APP_EMAIL'] = $row['APP_EMAIL'];
    //     $temp['APP_MOBILE_NUMBER'] =  $row['APP_MOBILE_NUMBER'];
    //     $temp['APP_APPLY_DATE'] =  $row['APP_APPLY_DATE'];
    //     $temp['START_DATE'] =  $row['START_DATE'];
    //     $temp['END_DATE'] =  $row['END_DATE'];
    //     $temp['APP_STATUS'] =  $row['APP_STATUS'];
    //     $temp['REMARKS'] =  $row['REMARKS'];
    //     $temp['SERVICE_ID'] =  $row['SERVICE_ID'];
    //     array_push($appointment, $temp);
    // }
    // echo json_encode($appointment);
