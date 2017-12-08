<?php
      include '../../dbConnection.php';
     
        function getDataBySQL($dbConn, $sql)
        {
            $conn = getDatabaseConnection('final_project');
            
                $sql = "SELECT name, equipment_id FROM equipment ORDER BY equipment_id";
            
            // 3. Prepare SQL
            $stmt = $conn->prepare($sql);
            
            // 4. Execute the statement
            $stmt->execute();
            
            // 5. Create and return associative array with data
            $records =$stmt->fetchAll(PDO::FETCH_ASSOC);
          
            
            return $records;
        }
        
        // Retrieves data from equipment table
        function populateDropdown($equipment_slot_id, $equipmentType)
        {
             $conn = getDatabaseConnection('final_project');
            
            // 2. Create SQL statement
            $sql = "SELECT * FROM equipment WHERE equipment_slot_id = '$equipment_slot_id'";
            
            // 3. Prepare SQL
            $stmt = $conn->prepare($sql);
            
            // 4. Execute the statement
            $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // 5. Create and return array with data
            echo '<select id="' . $equipmentType . '">';
            foreach ($records as $record)
            {
              // To-do: If session equipped item, set as selected, else echo normally
              echo '<option value="' . $record["equipment_id"] . '">' . $record["name"] . '</option>';
            }
            echo '</select>';
        }
        
        // Retrieves data from boss table
      
?>