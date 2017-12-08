<?php
        session_start();
        include '../../dbConnection.php';
        // Retrieves equipment stats from DB
    
      $conn = getDatabaseConnection('final_project');
            
        // 2. Create SQL statement
    
        $sql = "SELECT equipment.equipment_slot_id AS slot, ROUND(AVG(equipment_attribute.value), 2) AS value
                FROM equipment, equipment_attribute 
                WHERE (equipment.equipment_id = equipment_attribute.equipment_id)
                AND (equipment_attribute.attribute_id = 1)
                GROUP BY slot
                ORDER BY value DESC";
        
    
    
        $stmt = $conn->prepare($sql);
        
        // 4. Execute the statement
    
        $stmt->execute();
        
        // 5. Create and return array with data
        $records =$stmt->fetchAll(PDO::FETCH_ASSOC);
       
        
        echo json_encode($records);
?>