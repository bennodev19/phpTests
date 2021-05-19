<?php
require "../components/Footer.php";
require "../components/Header.php";
require "../src/controller/employeeController.php";
require "../src/controller/loginController.php";
require "../src/utils.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php
startSession();

$formValue = $_POST;
$showAddEmployeView = isset($formValue['btnAdd']);
$maxNumberOfRecords = $formValue["number_records"] ?? 10; // How many employees are displayed
$loginSession = $loginSession = getLoginSession();

// Check if User is logged in otherwise go to Login.php
if ($loginSession == null) {
    redirect('./Login.php');
}
?>

<head>
    <meta charset="UTF-8">
    <title>Mitarbeiter</title>
    <link rel="stylesheet" href="../styles.css" />
</head>

<body>

    <!-- Header -->
    <?php
    renderHeader('Mitarbeiter');
    ?>

    <!-- Content -->
    <div class="ContentContainer">
        <form method="post">
            <?php
            // Handle Add User Form
            if ($isset($formValue['btnSaveNew'])) {
                addEmployee($formValue['txtNachname']);
            }

            // Handle Delete User
            if ($isset($formValue['btnDelete'])) {
                deleteEmployee($formValue['btnDelete']);
            }

            // Handle Edit User
            if ($isset($formValue['btnEditSave'])) {
                updateEmployeeName($formValue['btnEditSave'], $formValue['txtNachname']);
            }


            // Display Add Employee View
            if ($showAddEmployeView) {
            ?>
                Nachname: <input type='text' name='txtNachname'> <br>
                <input type='submit' name='btnSaveNew'>
            <?php

                // Display Employees Table
            } else {

                // Get Employees
                $employees = getEmployees($maxNumberOfRecords);
            ?>
                <!-- Print Table -->
                <table style="border-collapse: collapse" border="1" cellpadding="5">
                    <thead>
                        <tr style="background-color: lightgrey; " align="left">
                            <th>ID</th>
                            <th>Nachnamen</th>
                            <th>Aktionen</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($employees as $employee) {
                            console_log($employee);

                            $id = $employee["id"];
                            $name = $employee["name"];
                        ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $name ?></td>
                                <td>
                                    <button type="submit" name="btnDelete" value='true'>
                                        <img src='../static/Delete.png' width='15px'>
                                    </button>
                                    <button type="submit" name="btnChangeName" value='true'>
                                        <img src='../static/Edit.png' width='15px'>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan=3 align=right>
                                <button type='submit' name='btnAdd' value='true'>
                                    <img src="../static/Add.png" width='15px'>
                                </button>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <br>

                <!-- Refresh -->
                <form method="POST">
                    <table>
                        <tr>
                            <td>
                                Anzahl Datensätze:
                                <input type="number" style="width:50px" name="number_records" value="<?php echo $maxNumberOfRecords ?>">
                            </td>
                            <td>
                                <button type="submit">
                                    <img src='../static/Refresh.png' width='15px'>
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
                <br>
            <?php
            }
            ?>
        </form>

        <p>Es ist zu beachten, dass das RFID System sich noch in der Test-Phase befindet!</p>
    </div>

    <!-- Footer -->
    <?php
    renderFooter();
    ?>

</body>

</html>