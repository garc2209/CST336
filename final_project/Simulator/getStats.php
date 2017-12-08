<?php
        session_start();
        include '../../dbConnection.php';
      
      $conn = getDatabaseConnection('final_project');
        
        $equipment_id = $_POST['equipment_id'];
        
       
        $sql = "SELECT * FROM equipment WHERE equipment_id = '$equipment_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $name = $row['name'];
            
       
        $sql = "SELECT equipment_attribute.value AS value, equipment.image_url AS image_url
                FROM equipment, equipment_attribute 
                WHERE (equipment.equipment_id = '$equipment_id') AND (equipment_attribute.equipment_id = '$equipment_id')";
        $stmt = $conn->prepare($sql);
        

        $stmt->execute();
        
        
        $record = [];
        $row = $stmt->fetch();
        $primaryValue = $row['value'];
        $imageUrl = $row['image_url'];
        $return_arr[] = array("name" => $name, "primaryValue" => $primaryValue, "imageUrl" => $imageUrl);
        echo json_encode($return_arr);
?>