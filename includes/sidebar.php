<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
        <?php if($sel['view_home']||$rolex=="0"){
          ?>
          <li class="active">
            <a class="" href="home.php">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
          </li><?php } ?>
          <?php 
          if($sel['add_employees']||$rolex=="0" || $sel['view_employees'] || $sel['edit_employees']|| $sel['delete_employees']|| $sel['view_employee_details']|| $sel['add_position']|| $sel['view_position']|| $sel['edit_position']|| $sel['delete_position']){
          ?>
          <li class="sub-menu">
            <a href="javascript:;" class=""><i class="icon_profile"></i><span>Employee Details</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
            <?php 
            if($sel['add_employees'] ||$rolex=="0"|| $sel['view_employees'] || $sel['edit_employees'] || $sel['delete_employees']|| $sel['view_employee_details']){
          ?>
              <li><a class="" href="employees.php"><span>View Employees</span></a></li>
              <?php }?>
          <?php if($sel['add_employees'] ||$rolex=="0" || $sel['view_employees'] || $sel['edit_employees'] || $sel['delete_employees']|| $sel['view_employee_details']){
          ?>
              <li><a class="" href="position.php"><span>Positions</span></a></li>
          <?php } ?>
            </ul>
            
          </li>
          <?php }?>
          <?php if($sel['add_document']||$rolex=="0" || $sel['view_document'] || $sel['edit_document'] || $sel['delete_document']|| $sel['view_document_details']){
          ?>
          <li class="sub-menu">
            <a href="javascript:;" class=""><i class="icon_documents_alt"></i><span>Documents</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="documents.php"><span>Add Document</span></a></li>
              
            </ul>
          </li>
          <?php } ?>

          <li>
            <?php 
            if($sel['add_salary']||$rolex=="0" || $sel['view_salary'] || $sel['edit_salary'] || $sel['delete_salary']){
          ?>
            <a class="" href="salary.php">
                          <i class="fa fa-money"></i>
                          <span>Salary Payments</span>
                      </a>
          </li>
          <?php } ?>
          <?php 
            if($sel['add_advance']||$rolex=="0" || $sel['view_advances'] || $sel['edit_advance'] || $sel['delete_advance']|| $sel['view_advance_details']){
          ?>
          <li>
            <a class="" href="advances.php">
                          <i class="fa fa-money"></i>
                          <span>Advances</span>
                      </a>
          </li>
          <?php } ?>
          <?php 
            if($sel['add_user']||$rolex=="0" || $sel['view_user'] || $sel['edit_user'] || $sel['delete_user']|| $sel['add_roles']|| $sel['view_roles']|| $sel['delete_roles']|| $sel['edit_roles']){
          ?>
          <li class="sub-menu">
            <a class="" href="javascript:;"><i class="icon_profile"></i>
                          <span>Manage Users</span><span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
            <?php if($sel['add_roles']||$rolex=="0" || $sel['view_roles'] || $sel['edit_roles'] || $sel['delete_roles']|| $sel['view_advance_details']){
          ?>
              <li><a class="" href="roles.php"><span>User Roles</span></a></li><?php } ?>
            <?php if($sel['add_user']||$rolex=="0" || $sel['view_user'] || $sel['edit_user'] || $sel['delete_user']){
          ?>
              <li><a class="" href="view_user.php"><span>View Users</span></a></li><?php } ?>
            <?php if($sel['view_permissions']||$rolex=="0"){
          ?>
              <li><a class="" href="permit.php"><span>Permissions</span></a></li><?php } ?>
            </ul>
            
          </li>
          <?php } ?>
          <?php if($sel['view_audits']||$rolex=="0"){
          ?>
          <li>
            <a class="" href="audits.php">
                          <i class="fa fa-file"></i>
                          <span>Audits</span>
                      </a>
          </li>
          <?php } ?>
          <?php if($sel['view_salaryreports']||$rolex=="0" || $sel['view_advance_reports']){
          ?>
          <li class="sub-menu">
            <a class="" href="javascript:;"><i class="fa fa-file"></i>
                          <span>Reports</span><span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
            <?php if($sel['view_salaryreports']||$rolex=="0"){
          ?>
              <li><a class="" href="reports.php"><span>Salary Report</span></a></li><?php } ?>
              <?php if($sel['view_advance_reports']||$rolex=="0"){
          ?>
              <li><a class="" href="adv_rep.php"><span>Advances Report</span></a></li><?php } ?>
    
            </ul>
            
          </li>
          <?php } ?>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>

