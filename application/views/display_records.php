<!DOCTYPE html>
<html>
<head>
    <title>Delete Records</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        th {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <h2>Student Records</h2>
    <table width="600">
        <tr>
            <th>Sr No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Delete</th>
        </tr>
        <?php
        $i = 1;
        if (!empty($data)) {
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row->First_name . "</td>";
                echo "<td>" . $row->Last_name . "</td>";
                echo "<td>" . $row->Email . "</td>";
                echo "<td><a href='deletedata?id=" .$row->id. "'>Delete</a></td>";
                echo "</tr>";
                $i++;
            }
        } else {
            echo "<tr><td colspan='4'>No records found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
