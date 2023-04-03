<!DOCTYPE html>
<html>

<head>
    <?php
    include 'includes/db.php';
    include "includes/sessions.php";

    ?>

</head>

<body onload="exportTableToExcel('tblData')">
    <table border="1" width="100%" id="tblData">
        <thead>
                        <tr>
                        <th>S/No.</th>
                        <th>Name</th>
                        <th>Contacts</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Added By</th>
                        
                         
                        </tr>
                    </thead>
                   <tbody>
                   <?php

$query = "SELECT * FROM register where status=1";
$number=0;
if ($result = mysqli_query($con, $query)) {
    while ($row = mysqli_fetch_array($result)){
$number++;
$id=$row['register_id'];
$name=$row['name'];
$name2 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$name'"))['name'];
$cont=$row['contact'];
$email=$row['email'];
$role=$row['role'];
$role2 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM roles where role_id='$role'"))['role_name'];
$by=$row['added_by'];
$on=$row['addedon'];
$name1 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$by'"))['name'];
             
 ?>  
                        <tr>
                        <td><?php echo $number; ?></td>
                        <td><?php echo $name2; ?></td> 
                        <td><?php echo $cont; ?></td> 
                        <td><?php echo $email; ?></td>
                        <td><?php echo $role2; ?></td>
                        <td><?php echo $name1; ?></td> 
                        
                          
                        </tr>
                        <?php }}?>
                    </tbody>
                      

                </table>
</body>


<script>
    function exportTableToExcel(tableID, filename = 'Users') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
        window.location.replace("view_user.php");
    }
</script>
</html>