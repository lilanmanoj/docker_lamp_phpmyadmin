<?php
require_once(__DIR__ . '/db_connect.php');

date_default_timezone_set('Asia/Colombo');

// This file is part of the IoT Data Acquisition Module
if (
    isset($_POST['lasttime']) &&
    isset($_POST['timestamp']) &&
    isset($_POST['device']) &&
    !empty($_POST['lasttime']) &&
    !empty($_POST['timestamp']) &&
    !empty($_POST['device'])
) {
    $lasttime = $_POST['lasttime'];
    $timestamp = $_POST['timestamp'];
    $device = $_POST['device'];

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
            echo "<td>" . date("Y-m-d H:i:s e", $row['timestamp']). "</td>";
            echo "<td>" . $row['device'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No records found.</td></tr>";
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