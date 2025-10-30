<?php
    require_once(__DIR__ . '/db_connect.php');
    require_once(__DIR__ . '/auth.php');

    if (empty($auth)) {
        header("Location: ./index.php");
        exit();
    }
?>
<!doctype html>
<html>
    <head>
        <title>UMS - Dashboard</title>
    </head>
    <body>
        <?php echo "<h2>Welcome, " . htmlspecialchars($auth['name']) . "!</h2>"; ?>
        <a href="./logout.php">Logout</a>
        
        <br><br>
        <a href="./add_new_employee.php">Add New Employee</a>
        <br><br>
        <a href="./employee_list.php">Employee List</a>
        <br><br>

        <h3>All Employees</h3>
        <table border="1">
            <tr>
                <th>Employee ID</th>
                <th>Name Initials</th>
                <th>Name Full</th>
                <th>NIC</th>
                <th>Mobile No</th>
                <th>Email</th>
                <th>DoB</th>
                <th>Age</th>
                <th>Department</th>
                <th>Address</th>
                <th>Username</th>
                <th>User Level</th>
                <th>Registered Date</th>
                <th>Last Updated Date</th>
            </tr>
            <?php
                $sql = $con->prepare("SELECT
                    EMP.employee_id,
                    EMP.name_initials,
                    EMP.first_name,
                    EMP.mid_name,
                    EMP.last_name,
                    EMP.nic_no,
                    EMP.mobile_no,
                    EMP.email,
                    EMP.dob,
                    TIMESTAMPDIFF(YEAR, EMP.dob, CURDATE()) AS age,
                    DEP.department_name,
                    EMP.address_no,
                    EMP.address_street,
                    EMP.address_city,
                    EMP.address_state,
                    EMP.address_country,
                    EMP.address_zip_code,
                    EMP.username,
                    LVL.user_level_name,
                    DATE(EMP.registered_on) AS registered_date,
                    DATE(EMP.last_updated_on) AS last_updated_date
                FROM employees AS EMP
                LEFT JOIN departments AS DEP ON EMP.department_id = DEP.department_id
                LEFT JOIN user_levels AS LVL ON EMP.user_level_id = LVL.user_level_id
                ORDER BY EMP.employee_id ASC");
                $sql->execute();
                $result = $sql->get_result();

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['employee_id'] . "</td>";
                        echo "<td>" . $row['name_initials'] . "</td>";
                        echo "<td>" .
                            implode(' ', array_filter([
                                $row['first_name'],
                                $row['mid_name'],
                                $row['last_name']
                            ]))
                        . "</td>";
                        echo "<td>" . $row['nic_no'] . "</td>";
                        echo "<td>" . $row['mobile_no'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['dob'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['department_name'] . "</td>";
                        echo "<td>" . 
                            implode(', ', array_filter([
                                $row['address_no'],
                                $row['address_street'],
                                $row['address_city'],
                                $row['address_state'],
                                $row['address_country'],
                                $row['address_zip_code']
                            ]))
                        . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['user_level_name'] . "</td>";
                        echo "<td>" . $row['registered_date'] . "</td>";
                        echo "<td>" . $row['last_updated_date'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No employees found.</td></tr>";
                }
            ?>
        </table>
    </body>
</html>