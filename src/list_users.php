<?php
require_once('db_connect.php');

$query = "SELECT CONCAT(`US`.`first_name`, ' ', `US`.`last_name`) AS `full_name`,
`UT`.`type` AS `type`,
`US`.`date_of_birth` AS `dob`,
YEAR(CURRENT_DATE) - YEAR(`US`.`date_of_birth`) AS `age`,
`US`.`email` AS `email`,
`US`.`address` AS `address`,
`US`.`status` AS `status`
FROM
`mydb`.`users` AS `US`
LEFT JOIN `user_types` AS `UT` ON `UT`.`id` = `US`.`user_type`
WHERE `US`.`status` = 'Active'";

try {
    $result = $con->query($query);

    echo "<table border=1 cellpadding=4 style='border-collapse: collapse'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Full Name</th>";
    echo "<th>Type</th>";
    echo "<th>DoB</th>";
    echo "<th>Age</th>";
    echo "<th>Email</th>";
    echo "<th>Address</th>";
    echo "<th>Status</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    if ($result !== false) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
        } else {
           echo "<tr><td colspan=7>Empty results!</td></tr>";
        }
    } else {
        echo "<tr><td colspan=7>Error results!</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";
} catch (\Throwable $th) {
    echo "Error: (" . $th->getCode() . ") " . $th->getMessage();
}
?>