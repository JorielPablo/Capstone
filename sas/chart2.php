<?php
try {
    // Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=soil_moisture;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the count of distinct sensor IDs
    $stmt = $pdo->query("SELECT COUNT(DISTINCT SensorID) FROM soilmoisturereadings");
    $sensorCount = $stmt->fetchColumn();

    // Loop through the sensor IDs and create a chart data for each one
    $chartData = [];
    for ($i = 1; $i <= $sensorCount; $i++) {
        // Get the data for this sensor ID
        $sensorID = "Sensor " . $i;
        $sql = "SELECT * FROM soil_moisture.soilmoisturereadings WHERE SensorID = :sensorID ORDER BY ReadingTime ASC LIMIT 10";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sensorID' => $sensorID]);
        $soilMoistureValue = [];
        $labels = [];
        while ($row = $stmt->fetch()) {
            $soilMoistureValue[] = $row["SoilMoistureValue"];
            $labels[] = $row["ReadingTime"];
        }

        // Add the chart data to the array
        $chartData[] = [
            "sensorID" => $sensorID,
            "soilMoistureValue" => $soilMoistureValue,
            "labels" => $labels,
        ];
    }

    // Output the chart data as JSON
    header('Content-Type: application/json');
    echo json_encode($chartData);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
