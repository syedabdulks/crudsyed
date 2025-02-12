<!DOCTYPE html>
<html>
<head>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    td, th {
        border: 3px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
</head>
<body>
    <h2>Employee List</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
        </tr>
       <tr>
        <td><?=$user->name?></td>
        <td><?=$user->email?></td>
        <td><?=$user->Country?></td>
       
       </tr>
    </table>
</body>
</html>