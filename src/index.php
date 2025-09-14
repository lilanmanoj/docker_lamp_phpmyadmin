<!doctype html>
<html>
    <head>
        <title>Grade Calculator</title>
    </head>
    <body>
        <?php
            $submit = $_POST["submit"];
            $marks = $_POST["marks"];
            $input_history = !empty($_POST["input_history"]) ? json_decode($_POST["input_history"]) : array();
            $valid = false;
            $error = "";
            $grade = "";

            if ($submit && !empty($marks)) {
                if (!is_numeric($marks)) {
                    $error = "Input should be a number!";
                } else if ($marks < 0 || $marks > 100) {
                    $error = "Input should be between 0 and 100!";
                }

                if (empty($error)) {
                    $input_history[] = $marks;

                    if ($marks >= 80) {
                        $grade = "A";
                    } else if ($marks < 80 && $marks >= 70) {
                        $grade = "B";
                    } else if ($marks < 70 && $marks >= 50) {
                        $grade = "C";
                    } else if ($marks < 50 && $marks >= 20) {
                        $grade = "D";
                    } else if ($marks < 20) {
                        $grade = "F";
                    }

                    $valid = true;
                }
            }
        ?>
        <form method="post" action="/">
            <table cellspacing="5" border="0">
                <tr><td><h2>Grade Calculator</h2></td></tr>
                <tr><td><input type="number" id="txtMarks" name="marks" placeholder="Enter marks" 
                    value="<?php if (!empty($marks) && is_numeric($marks)) echo $marks;  ?>" /></td></tr>
                <tr><td>
                    <input type="hidden" name="input_history" 
                        value=<?php echo (!empty($input_history) ? json_encode($input_history) : ""); ?> >
                </td></tr>
                <tr><td><button value="true" name="submit" type="submit">Submit</button></td></tr>
            </table>
        </form>
        <?php
            if ($valid) {
                echo ("<h4 style=\"color:#f00;margin-left:5px;\">Grade is: " . $grade . "</h4>");
            } else {
                if (!empty($error)) {
                    echo ("<h4 style=\"color:#f00;margin-left:5px;\">Error: " . $error . "</h4>");
                }
            }

            if (!empty($input_history)) {
                print_r($input_history);
            }
        ?>

        <script type="text/javascript">            
            setTimeout(() => {
                const err = "<?php echo $error; ?>";

                if (err.length > 0) {
                    alert(err);
                }
            }, 500);
        </script>
    </body>
</html>