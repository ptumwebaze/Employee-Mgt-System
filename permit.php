<?php include "includes/head.php" ?>
<?php include "includes/sessions.php" ?>
<body>
  <!-- container section start -->
  <section id="container" class="">

 <?php include "includes/db.php" ?>
    <?php include "includes/nav.php" ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include "includes/sidebar.php" ?> 
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 style="color:green" class="page-header text-center"><b>User Permissions</b></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>View Permissions</li>
            </ol>
          </div>
        </div>

<table id="sort" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
     <th>Permission</th>
     <?php 
     $head = mysqli_fetch_array(mysqli_query($con, "SELECT * from register where name !='$uid'"))['name'];
     $role="SELECT * from roles where role_id!='$rolex'";
     if ($result = mysqli_query($con, $role)) {
      while ($row = mysqli_fetch_array($result)){
      $name=$row['role_name'];
      
    
    ?>
      
        <th class="text-center"><?php echo $name ?></th>
      <?php
      }
    }
      ?>
    </tr>
  </thead>
  <tbody>
  <tr>
    <td>Home Page</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_home']==1 ){
            ?>
            <input type="checkbox" value="view_home|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_home|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
  <tr>
    <td>Add Employee</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['add_employees']==1) {
            ?>
            <input type="checkbox" value="add_employees|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="add_employees|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Edit Employee</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['edit_employees']==1) {
            ?>
            <input type="checkbox" value="edit_employees|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="edit_employees|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Delete Employee</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['delete_employees']==1) {
            ?>
            <input type="checkbox" value="delete_employees|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="delete_employees|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View Employee</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_employees']==1) {
            ?>
            <input type="checkbox" value="view_employees|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_employees|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View Employee Details</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_employee_details']==1) {
            ?>
            <input type="checkbox" value="view_employee_details|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_employee_details|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Add Position</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['add_position']==1) {
            ?>
            <input type="checkbox" value="add_position|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="add_position|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View Position</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_position']==1) {
            ?>
            <input type="checkbox" value="view_position|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_position|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Edit Position</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['edit_position']==1) {
            ?>
            <input type="checkbox" value="edit_position|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="edit_position|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Delete Position</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['delete_position']==1) {
            ?>
            <input type="checkbox" value="delete_position|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="delete_position|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Add Document</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['add_document']==1) {
            ?>
            <input type="checkbox" value="add_document|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="add_document|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View Document</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_document']==1) {
            ?>
            <input type="checkbox" value="view_document|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_document|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View Document Details</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_document_details']==1) {
            ?>
            <input type="checkbox" value="view_document_details|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_document_details|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Edit Document</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['edit_document']==1) {
            ?>
            <input type="checkbox" value="edit_document|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="edit_document|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Delete Document</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['delete_document']==1) {
            ?>
            <input type="checkbox" value="delete_document|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="delete_document|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Add Salary</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['add_salary']==1) {
            ?>
            <input type="checkbox" value="add_salary|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="add_salary|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View Salary</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_salary']==1) {
            ?>
            <input type="checkbox" value="view_salary|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_salary|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Edit Salary</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['edit_salary']==1) {
            ?>
            <input type="checkbox" value="edit_salary|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="edit_salary|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Delete Salary</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['delete_salary']==1) {
            ?>
            <input type="checkbox" value="delete_salary|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="delete_salary|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Add Advance</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['add_advance']==1) {
            ?>
            <input type="checkbox" value="add_advance|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="add_advance|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Edit Advance</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['edit_advance']==1) {
            ?>
            <input type="checkbox" value="edit_advance|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="edit_advance|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View Advance</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_advances']==1) {
            ?>
            <input type="checkbox" value="view_advances|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_advances|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View Advance Details</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_advance_details']==1) {
            ?>
            <input type="checkbox" value="view_advance_details|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_advance_details|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Delete Advance</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['delete_advance']==1) {
            ?>
            <input type="checkbox" value="delete_advance|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="delete_advance|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Add User</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['add_user']==1) {
            ?>
            <input type="checkbox" value="add_user|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="add_user|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View User</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_user']==1) {
            ?>
            <input type="checkbox" value="view_user|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_user|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Edit User</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['edit_user']==1) {
            ?>
            <input type="checkbox" value="edit_user|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="edit_user|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Delete User</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['delete_user']==1) {
            ?>
            <input type="checkbox" value="delete_user|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="delete_user|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Add Roles</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['add_roles']==1) {
            ?>
            <input type="checkbox" value="add_roles|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="add_roles|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View Roles</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_roles']==1) {
            ?>
            <input type="checkbox" value="view_roles|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_roles|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Delete Roles</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['delete_roles']==1) {
            ?>
            <input type="checkbox" value="delete_roles|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="delete_roles|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Edit Roles</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['edit_roles']==1) {
            ?>
            <input type="checkbox" value="edit_roles|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="edit_roles|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>Permissions</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_permissions']==1) {
            ?>
            <input type="checkbox" value="view_permissions|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_permissions|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View Audits</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_audits']==1) {
            ?>
            <input type="checkbox" value="view_audits|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_audits|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View Salary Report</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_salaryreports']==1) {
            ?>
            <input type="checkbox" value="view_salaryreports|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_salaryreports|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>
<tr>
    <td>View Advance Report</td>

    <?php
  $roleselected=mysqli_query($con,"SELECT *,(SELECT role_name FROM roles where roles.role_id=permissions.role_id) as role FROM permissions where role_id!='$rolex'");
  
    while($perm=mysqli_fetch_array($roleselected)) {
        ?>
        <td>
        <?php
        if ($perm['view_advance_reports']==1) {
            ?>
            <input type="checkbox" value="view_advance_reports|<?php echo $perm['perm_id']?>|0" onchange="UpdatePermission(this.value)" checked />
            <?php
        }else{
            ?>
            <input type="checkbox" value="view_advance_reports|<?php echo $perm['perm_id']?>|1" onchange="UpdatePermission(this.value)"/>
            <?php
        }
        ?>
  
        </td>
        <?php
    }
    ?>

</tr>

</tbody>
 
</table>



      </section>
      <?php include "includes/footer.php" ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.min.js'></script>
<script>
$(document).ready(function() {
    $("#sort").DataTable({
       columnDefs : [
     { type : 'date', targets : [3] }
 ],  
    });
});
</script>
      <script type = "text/javascript">
            function confirmationDelete(anchor){
            var conf = confirm("Are you sure you want to delete this Employee?");
            if(conf){
                window.location = anchor.attr("href");
            }
            }
      </script>
<script type="text/javascript">
          function UpdatePermission(val){
          var vls = val.split("|")
          var colum=vls[0]
          var perm=vls[1]
          var value=vls[2]
          var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                    var response=this.responseText;
              }
            };
            xhttp.open("GET", "permission_update.php?perm="+perm+"&colum="+colum+"&value="+value, true);
            xhttp.send();
          }
            
</script>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
<?php include "includes/scripts.php" ?>

</body>

</html>
