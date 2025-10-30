<?php
    require_once(__DIR__ . '/db_connect.php');
    require_once(__DIR__ . '/auth.php');

    if (empty($auth)) {
        header("Location: ./index.php");
        exit();
    }

    if (isset($_POST['add_employee'])) {
        $query = "INSERT INTO employees (
            name_initials, first_name, mid_name, last_name, nic_no, mobile_no, email, dob,
            department_id, address_no, address_street, address_city, address_state,
            address_country, address_zip_code, username, password, user_level_id,
            registered_on) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $con->prepare($query);
        $enc_password = md5($_POST['password']);
        $stmt->bind_param(
            "ssssssssissssssssi",
            $_POST['name_initials'],
            $_POST['first_name'],
            $_POST['mid_name'],
            $_POST['last_name'],
            $_POST['nic_no'],
            $_POST['mobile_no'],
            $_POST['email'],
            $_POST['dob'],
            $_POST['department_id'],  // integer
            $_POST['address_no'],
            $_POST['address_street'],
            $_POST['address_city'],
            $_POST['address_state'],
            $_POST['address_country'],
            $_POST['address_zip_code'],
            $_POST['username'],
            $enc_password,
            $_POST['user_level_id']  // this is treated as string since we're binding from $_POST
        );
        $stmt->execute();
        header("Location: ./employee_list.php");
        exit();
    }
?>
<!doctype html>
<html>
    <head>
        <title>UMS - Add New Employee</title>
    </head>
    <body>
        <h2>Add New Employee</h2>
        <a href="./dashboard.php">Go back to dashboard</a>
        
        <form method="POST" action="./add_new_employee.php">
            <label for="name_initials">Name With Initials*:</label>
            <input type="text" id="name_initials" name="name_initials" required><br><br>

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name"><br><br>

            <label for="mid_name">Mid Name:</label>
            <input type="text" id="mid_name" name="mid_name"><br><br>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name"><br><br>

            <label for="nic_no">NIC No*:</label>
            <input type="text" id="nic_no" name="nic_no" required><br><br>

            <label for="mobile_no">Mobile No:</label>
            <input type="text" id="mobile_no" name="mobile_no"><br><br>

            <label for="email">Email*:</label>
            <input type="text" id="email" name="email" required><br><br>

            <label for="dob">Date of Birth*:</label>
            <input type="date" id="dob" name="dob" required><br><br>

            <label for="department_id">Department*:</label>
            <select id="department_id" name="department_id" required>
                <option value="" selected disabled>--Select Department--</option>
                <?php
                    $sql = $con->prepare("SELECT department_id, department_name FROM departments WHERE is_active = 1 ORDER BY department_name ASC");
                    $sql->execute();
                    $result = $sql->get_result();

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['department_id'] . "'>" . $row['department_name'] . "</option>";
                        }
                    }
                ?>
            </select>
            <br><br>

            <label for="address_no">Address No*:</label>
            <input type="text" id="address_no" name="address_no" required><br><br>

            <label for="address_street">Address Street:</label>
            <input type="text" id="address_street" name="address_street"><br><br>

            <label for="address_city">Address City*:</label>
            <input type="text" id="address_city" name="address_city" required><br><br>

            <label for="address_state">Address State:</label>
            <input type="text" id="address_state" name="address_state"><br><br>

            <label for="address_country">Address Country*:</label>
            <input type="text" id="address_country" name="address_country" required><br><br>

            <label for="address_zip_code">Address Zip Code*:</label>
            <input type="text" id="address_zip_code" name="address_zip_code" required><br><br>

            <label for="username">Username*:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password*:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="user_level_id">User Level*:</label>
            <select id="user_level_id" name="user_level_id" required>
                <option value="" selected disabled>--Select User Level--</option>
                <?php
                    $sql = $con->prepare("SELECT user_level_id, user_level_name FROM user_levels WHERE is_active = 1 ORDER BY user_level_name ASC");
                    $sql->execute();
                    $result = $sql->get_result();

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['user_level_id'] . "'>" . $row['user_level_name'] . "</option>";
                        }
                    }
                ?>
            </select>
            <br><br>

            <input type="submit" name="add_employee" value="Add Employee">
        </form>
    </body>
</html>