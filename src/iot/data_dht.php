<?php
error_reporting(0);

// Ensure errors are not displayed to the user
ini_set('display_errors', 0);

require_once(__DIR__ . '/db_connect.php');

date_default_timezone_set('Asia/Colombo');

$json_stream = file_get_contents('php://input');
$data = json_decode($json_stream, true);

if (!empty($data)) {
    $timestamp = date("Y-m-d H:i:s", $data['timestamp']);

    echo ("Test OK \r\n");
    echo ("Timestamp: " . $timestamp . "\r\n");
    echo ("Temperature: " . $data['temperature'] . "\r\n");
    echo ("Humidity: " . $data['humidity'] . "\r\n");
    echo ("Device ID: " . $data['device'] . "\r\n");

    $query = "INSERT INTO dht11_data (`timestamp`, `device_id`, `temperature`, `humidity`) VALUES (?, ?, ?, ?)";

    $stmt = $con->prepare($query);
    $stmt->bind_param("ssss", $timestamp, $data['device'], $data['temperature'], $data['humidity']);
    $res = $stmt->execute();
} else {
    $query = "SELECT * FROM `dht11_data` order by created_at desc";
?>
    <table border="1" cellpadding="4" style="border-collapse:collapse;">
            <tr>
                <th>Timestamp</th>
                <th>Device ID</th>
                <th>Temperature</th>
                <th>Humidity</th>
                <th>Created At</th>
            </tr>
<?php
    $sql = $con->prepare($query);
    $sql->execute();
    $result = $sql->get_result();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['timestamp'] . "</td>";
            echo "<td>" . $row['device_id'] . "</td>";
            echo "<td>" . $row['temperature'] . "</td>";
            echo "<td>" . $row['humidity'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No records found.</td></tr>";
    }
?>
    </table>
<?php
}
?>

<script type="text/javascript">
    function autoRefresh() {
        window.location = window.location.href;
    }

    setInterval('autoRefresh()', 6000);
</script>