<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database1.php';
    include_once '../class/employees.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Employee($db);
    $stmt = $items->getEmployees();
    $itemCount = $stmt->rowCount();

    echo json_encode($itemCount);
    if($itemCount > 0){
        
        $employeeArr = array();
        $employeeArr["body"] = array();
        $employeeArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "board" => $board,
                "temperature" => $temperature,
                "humidity" => $humidity,
                "status_read_sensor_dht11" => $status_read_sensor_dht11,
                "LED_01" => $LED_01,
				"LED_02" => $LED_02,
                "time" => $time,
                "date" => $date
            );
            array_push($employeeArr["body"], $e);
        }
        echo json_encode($employeeArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>