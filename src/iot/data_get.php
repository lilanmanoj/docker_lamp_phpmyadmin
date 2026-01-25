<?php
require_once(__DIR__ . '/db_connect.php');

date_default_timezone_set('Asia/Colombo');

// This file is part of the IoT Data Acquisition Module
if (
    isset($_GET['lasttime']) &&
    isset($_GET['timestamp']) &&
    isset($_GET['device']) &&
    !empty($_GET['lasttime']) &&
    !empty($_GET['timestamp']) &&
    !empty($_GET['device'])
) {
    $lasttime = $_GET['lasttime'];
    $timestamp = $_GET['timestamp'];
    $device = $_GET['device'];

    $query = "INSERT INTO lasttime_updates (lasttime, `timestamp`, device) VALUES (?, ?, ?)";

    $stmt = $con->prepare($query);
    $stmt->bind_param("sss", $lasttime, $timestamp, $device);
    $stmt->execute();

    echo "Last time received: " . htmlspecialchars($lasttime);
} else {
    $query = "SELECT * FROM `lasttime_updates` order by created_at desc";
?>
    <table border="1" cellpadding="4" style="border-collapse:collapse;">
            <tr>
                <th>Date Time Received</th>
                <th>Lasttime Value</th>
                <th>Timestamp</th>
                <th>Device</th>
            </tr>
<?php
    $sql = $con->prepare($query);
    $sql->execute();
    $result = $sql->get_result();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo "<td>" . $row['lasttime'] . "</td>";
            echo "<td>" . $row['timestamp'] . "</td>";
            echo "<td>" . $row['device'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No records found.</td></tr>";
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