
<?php
        session_start();
          include '../../dbConnection.php';
        

        $dbConn = getDatabaseConnection('final_project'); 
            

        $sql = "SELECT equipment.equipment_slot_id AS slot, COUNT(equipment.equipment_slot_id) AS total
                FROM equipment
                GROUP BY slot
                ORDER BY total DESC";
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        

        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        echo json_encode($records);
?>