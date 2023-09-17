<?php
try {
    // Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=soil_moisture;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the count of distinct sensor IDs
    $stmt = $pdo->query("SELECT COUNT(DISTINCT SensorID) FROM soilmoisturereadings");
    $sensorCount = $stmt->fetchColumn();

    // Prepare an array to hold the updated chart data
    $chartData = [];

    // Loop through the sensor IDs and fetch the updated data for each one
    for ($i = 1; $i <= $sensorCount; $i++) {
        $sensorID = "Sensor " . $i;
        $sql = "SELECT * FROM soil_moisture.soilmoisturereadings WHERE SensorID = :sensorID ORDER BY ReadingTime ASC LIMIT 20";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sensorID' => $sensorID]);
        $soilMoistureValue = [];
        $labels = [];
        while ($row = $stmt->fetch()) {
            $soilMoistureValue[] = $row["SoilMoistureValue"];
            $labels[] = $row["ReadingTime"];
        }

        // Prepare the chart data for this sensor ID
        $chartData[$i] = [
            'labels' => $labels,
            'data' => $soilMoistureValue
        ];
    }

    // Return the chart data as JSON
    header('Content-Type: application/json');
    echo json_encode($chartData);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
