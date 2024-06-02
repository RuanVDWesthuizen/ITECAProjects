<?php
// Database connection function
function connectDB() {
    $servername = "localhost";//"ProjectDB";
    $username = "public_User";
    $password = "ILuvCoding76";
    $dbname = "iteca";//"my_ITECA_Project";

    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
}
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// Function to call a stored procedure
function callStoredProcedure($params) {
    try {
        // Connect to the database
        $pdo = connectDB();

        $placeholders = array_map(function($key) { return ":$key"; }, array_keys($params));
        $placeholderString = implode(', ', $placeholders);

        // Prepare the SQL statement to call the stored procedure
        $sql = "CALL insertNewUser($placeholderString)";
        $stmt = $pdo->prepare($sql);

        // Bind the parameters dynamically
        foreach ($params as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        // Execute the statement
        $stmt->execute();

         // Fetch results if needed
        $result = $stmt->fetchAll();
        return $result; // Return results or handle as needed

    } catch (PDOException $e) {
        // Handle database connection or execution errors
        die("Error calling stored procedure: " . $e->getMessage());
    }
}

// Handle AJAX request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $params = $_POST;

    $results = callStoredProcedure($_POST);
    echo json_encode($results); // Return results as JSON
}
?>
