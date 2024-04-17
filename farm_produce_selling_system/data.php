<html lang="en" dir="1tr">

<head>
    <meta char="utf-8" />
    <title>Database Page</title>

</head>
<style>
table {
    margin: auto;
}

tr td {
    border: none;
}
</style>

<body>
    <table border=1 cellspacing=0 cellspacing=10>
        <tr>

        </tr>


        <?php
require "connection.php";
$rows=mysqli_query($conn, "SELECT * FROM farmersdetails ORDER BY farmerId DESC");
$i=1;


foreach($rows as $row):

?>
        <tr>
            <td><?php echo $i++; ?></td>
        <tr>
            <td>
                <h3>First Name:</h3><?php echo $row["fName"];?>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Last Name:</h3><?php echo $row["lName"];?>
            </td>
        </tr>
        <tr>
            <td>
                <h3>email</h3><?php echo $row["email"]?>
            </td>
        </tr>
        <tr>
            <td style="width:750px; height:750px;"><iframe
                    src='https://www.google.com/maps?q=<?php echo $row["latitude"];?>,<?php echo $row["longitude"]; ?>&h1=es;z=14&output=embed'
                    style="width:100%;height:100%;"></iframe></td>
        </tr>
        <td></td>
        </tr>


        <?php endforEach; ?>
    </table>
    <br>
    <a href="seller.html">index page</a>

</body>

</html>