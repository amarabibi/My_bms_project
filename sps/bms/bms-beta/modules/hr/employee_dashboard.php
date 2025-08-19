<?php include(__DIR__ . "/../../includes/header.php");?>
<link href="../../assets/js/dashboard_functions/function_supervisor.js"  />
<?php include(__DIR__ . "/../../includes/navbar.php");?>

<div class="d-flex" style="margin-top:56px;">
<?php include(__DIR__ . "/../../includes/sidebar.php"); ?>



    <div class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid employeeTableContainer">

            <h1 class="mb-4 fw-bold">Employee Dashboard</h1>

            <!-- Employee Personal Information -->
            <div class="mb-3 d-flex align-items-center">
                <div class="dropdown me-2 w-100">
                    <button class="dash-dropdown-btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Employee Information
                    </button>
                    <ul class="dash-dropdown-menu dropdown-menu">
                        <?php
                        $epi_items = [
                            "Personal Information",
                            "Education",
                            "Guardian Info",
                            "Supervisor",
                            "Attachments",
                            "Learning and Development",
                            "Communication Skills",
                            "Employment Certification",
                            "Employment Badges"
                        ];
                        foreach ($epi_items as $item) {
                            $id = strtolower(str_replace(' ', '', $item));

                            echo "
                            <li class='d-flex justify-content-between align-items-center px-3'>
                                <form id='educationForm' action='/my_site/sps/bms/bms-beta/modules/backend/employee_data/education_backend.php' method='post'>
                                    <!-- ...fields as before... -->
                                </form>                                <form id='educationForm' action='/my_site/sps/bms/bms-beta/modules/backend/employee_data/education_backend.php' method='post'>
                                    <!-- ...fields as before... -->
                                </form>                                <a class='dash-dropdown-item dropdown-item' href='#'>$item</a>
                                <i class='bi bi-plus-circle text-primary' role='button' data-bs-toggle='modal' data-bs-target='#{$id}Modal'></i>
                            </li>
                            ";
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <!-- Roles Modal -->
            <div class="mb-3">
                <a class="dash-btn" href="#" data-bs-toggle="modal" data-bs-target="#addroleModal">
                    Roles
                </a>
            </div>

            <div class="modal fade" id="addroleModal" tabindex="-1" aria-labelledby="addroleLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="addroleLabel">Add New Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <form id="roleform" action="/my_site/sps/bms/bms-beta/modules/backend/employee_data/tbl_emp_roles.php" method="POST">
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label class="form-label">Role Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="emp_role_name" placeholder="Enter role name">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="emp_role_status">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Qualification</label>
                                        <textarea class="form-control" name="qualification" rows="2"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Knowledge</label>
                                        <textarea class="form-control" name="knowledge" rows="2"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Skills</label>
                                        <textarea class="form-control" name="skills" rows="2"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Responsibilities</label>
                                        <textarea class="form-control" name="responsibilities" rows="2"></textarea>
                                    </div>

                                </div>
                            </form>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="roleform" class="btn btn-primary" id="savebutton">Save</button>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Employee History -->
            <div class="mb-3">
                <a class="dash-btn" href="#" data-bs-toggle="modal" data-bs-target="#jobRoleModal">
                    Employee History
                </a>
            </div>

            <div class="modal fade" id="jobRoleModal" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Employee History</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <form id="historyform" action="../backend/employee_data/employment_history.php" method="post" enctype="multipart/form-data">

                                <div class="row g-2"><!-- row 1 -->
                                    <div class="col-md-4">
                                        <label class="form-label">Employee ID</label>
                                        <input type="number" name="emp_id" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">ED ID</label>
                                        <input type="number" name="ed_id" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Department ID</label>
                                        <input type="number" name="department_id" class="form-control">
                                    </div>
                                </div>

                                <div class="row g-2 mt-2"><!-- row 2 -->
                                    <div class="col-md-4">
                                        <label class="form-label">Group ID</label>
                                        <input type="number" name="group_id" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Practice ID</label>
                                        <input type="number" name="practice_id" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Role ID</label>
                                        <input type="text" name="role_id" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row g-2 mt-2"><!-- row 3 -->
                                    <div class="col-md-6">
                                        <label class="form-label">Hire Date</label>
                                        <input type="date" name="hire_date" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Termination Date</label>
                                        <input type="date" name="termination_date" class="form-control">
                                    </div>
                                </div>

                                <div class="mt-2"><!-- job title -->
                                    <label class="form-label">Job Title</label>
                                    <input type="text" name="job_title" class="form-control" required>
                                </div>

                                <div class="row g-2 mt-2"><!-- row 4 -->
                                    <div class="col-md-6">
                                        <label class="form-label">Functional Role</label>
                                        <input type="text" name="functional_role" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Corporate Role</label>
                                        <input type="text" name="corporate_role" class="form-control">
                                    </div>
                                </div>

                                <div class="row g-2 mt-2"><!-- row 5 -->
                                    <div class="col-md-6">
                                        <label class="form-label">Created By</label>
                                        <input type="text" name="created_by" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Updated By</label>
                                        <input type="text" name="updated_by" class="form-control">
                                    </div>
                                </div>

                                <div class="mt-2"><!-- attachment -->
                                    <label class="form-label">Letter Attachment</label>
                                    <input type="file" name="letter_attachment" class="form-control">
                                </div>

<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="leadershipForm" class="btn btn-primary">Save</button>
      </div>
                            </form>
                            <div id="response" class="mt-2"></div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Personal Leadership -->
            <div class="mb-3">
                <a class="dash-btn" href="#" data-bs-toggle="modal" data-bs-target="#leadershipModal">
                    Personal Leadership
                </a>
            </div>

            <div class="modal fade" id="leadershipModal" tabindex="-1" aria-labelledby="leadershipLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="leadershipLabel">Personal Leadership</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <form id="leadershipForm" action="#" method="POST">
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label class="form-label">Leadership Incentives <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="leadership_incentives" placeholder="Enter incentives">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">% Multiplier <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="multiplier" placeholder="Enter % multiplier">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Practice Multiplier <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="practice_multiplier" placeholder="Enter practice multiplier">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">KPI Target <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="kpi_target" placeholder="Enter KPI target">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">KPI Actual <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="kpi_actual" placeholder="Enter KPI actual">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Bonus Target <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="bonus_target" placeholder="Enter bonus target">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Bonus Actual <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="bonus_actual" placeholder="Enter bonus actual">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Plan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="plan" placeholder="Enter plan">
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="leadershipForm" class="btn btn-primary">Save</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Department Attributes -->
            <div class="mb-3 d-flex align-items-center">
                <div class="dropdown me-2 w-100">
                    <button class="dash-dropdown-btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Department Attributes
                    </button>
                    <ul class="dash-dropdown-menu dropdown-menu">
                        <?php
                        $da_items = ["Products", "Customer", "Projects"];
                        foreach ($da_items as $item) {
                            $id = strtolower(str_replace(' ', '', $item));
                            echo "
                            <li class='d-flex justify-content-between align-items-center px-3'>
                                <a class='dash-dropdown-item dropdown-item' href='#'>$item</a>
                                <i class='bi bi-plus-circle text-primary' role='button' data-bs-toggle='modal' data-bs-target='#{$id}Modal'></i>
                            </li>
                            ";
                        }
                        ?>
                    </ul>
                </div>
            </div>



            <!-- Corporate Leadership -->
            <div class="mb-3 d-flex align-items-center">
                <div class="dropdown me-2 w-100">
                    <button class="dash-dropdown-btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Corporate Leadership
                    </button>
                    <ul class="dash-dropdown-menu dropdown-menu">
                        <?php
                        $cl_items = ["Vendors", "Products", "Services", "Practices", "Partners", "Customers"];
                        foreach ($cl_items as $item) {
                            $id = strtolower(str_replace(' ', '', $item));
                            echo "
                            <li class='d-flex justify-content-between align-items-center px-3'>
                                <a class='dash-dropdown-item dropdown-item' href='#'>$item</a>
                                <i class='bi bi-plus-circle text-primary' role='button' data-bs-toggle='modal' data-bs-target='#{$id}Modal'></i>
                            </li>
                            ";
                        }
                        ?>
                    </ul>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div><!-- /.flex-grow-1 -->
</div><!-- /.d-flex -->

<!-- Modals -->
<?php
$all_items = array_merge($epi_items, $da_items, $cl_items);

foreach ($all_items as $item) {
    $id = strtolower(str_replace(' ', '', $item));
    //Education
    if ($id === "education") {
        echo "
<div class='modal fade' id='{$id}Modal' tabindex='-1'>
    <div class='modal-dialog modal-lg'>
        <div class='modal-content'> 
            <div class='modal-header'>
                <h5 class='modal-title'>Add Education</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class='modal-body'>
                <form id='educationform' action='/my_site/sps/bms/bms-beta/modules/backend/employee_data/education_backend.php' method='post'>
                    <div class='row mb-3 from-fields' >
                        <div class='col-md-6'>
                            <label class='form-label'>University</label>
                            <input type='text' name='university' class='form-control' required />
                        </div>
                        <div class='col-md-6'>
                            <label class='form-label'>Field of Study</label>
                            <input type='text' name='field_of_study' class='form-control' required />
                        </div>
                    </div>
                    <div class='row mb-3'>
                        <div class='col-md-4'>
                            <label class='form-label'>Passing Year</label>
                            <input type='number' name='passing_year' class='form-control' required />
                        </div>
                        <div class='col-md-4'>
                            <label class='form-label'>Course</label>
                            <input type='text' name='course' class='form-control' required />
                        </div>
                        <div class='col-md-4'>
                            <label class='form-label'>Grade/GPA</label>
                            <input type='text' name='grade' class='form-control' required />
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' id='savebutton' class='btn btn-primary'>Save</button>
                    </div>
                </form>
               
<div id='response'></div>
            </div>
        </div>
    </div>
</div>
    ";
    }
    //Supervisor

    elseif ($item === "Supervisor") {
        echo "
    <div class='modal fade' id='{$id}Modal' tabindex='-1'>
        <div class='modal-dialog modal-lg modal-dialog-scrollable'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Add Supervisor</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form id='supervisorform' action='/my_site/sps/bms/bms-beta/modules/backend/employee_data/timelive_emp.php' method='POST'>
                        <div class='row g-3'>

                            <div class='col-md-6'>
                                <label class='form-label'>Employee ID <span class='text-danger'> *</span></label>
                                <input type='number' name='emp_id' class='form-control' required>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Name *</label>
                                <input type='text' name='emp_name' class='form-control' required>
                            </div>

                            <div class='col-md-6'>
                                <label class='form-label'>Email *</label>
                                <input type='email' name='emp_email' class='form-control' required>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Mobile</label>
                                <input type='text' name='emp_mobile' class='form-control'>
                            </div>

                            <div class='col-md-6'>
                                <label class='form-label'>Address 1</label>
                                <textarea name='emp_address_1' class='form-control' rows='2'></textarea>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Address 2</label>
                                <textarea name='emp_address_2' class='form-control' rows='2'></textarea>
                            </div>

                            <div class='col-md-6'>
                                <label class='form-label'>City</label>
                                <input type='text' name='emp_city' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Country</label>
                                <input type='text' name='emp_country' class='form-control'>
                            </div>

                            <div class='col-md-6'>
                                <label class='form-label'>Hire Date</label>
                                <input type='date' name='emp_hire_date' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Personal Email</label>
                                <input type='email' name='personal_email' class='form-control'>
                            </div>

                            <div class='col-md-6'>
                                <label class='form-label'>Gender</label>
                                <select name='emp_gender' class='form-select'>
                                    <option value='0'>Male</option>
                                    <option value='1'>Female</option>
                                </select>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Company</label>
                                <input type='text' name='company' value='422' class='form-control'>
                            </div>

                            <div class='col-md-6'>
                                <div class='form-check'>
                                    <input class='form-check-input' type='checkbox' name='sps_corporate' value='1' id='spsCorporate'>
                                    <label class='form-check-label' for='spsCorporate'>SPS Corporate</label>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-check'>
                                    <input class='form-check-input' type='checkbox' name='staff' value='1' id='staffCheck'>
                                    <label class='form-check-label' for='staffCheck'>Staff</label>
                                </div>
                            </div>

                        </div>

                        <div class='mt-3 text-end'>
                            <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' id='savebutton' class='btn btn-primary'>Save</button>
                    </div>
                        </div>
                    </form>
                    <div id='response'></div>
                </div>
            </div>
        </div>
    </div>
    ";
    }

    // Guardian Info Modal
    elseif ($item === "Guardian Info") {
        echo "
    <div class='modal fade' id='{$id}Modal' tabindex='-1' id='employeeTableContainer'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Add Guardian Information</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form>
                        <div class='row mb-3'>
                            <div class='col-md-6'>
                                <label class='form-label'>Employee CNIC</label>
                                <input type='text' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Parent/Guardian Name</label>
                                <input type='text' class='form-control'>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <div class='col-md-6'>
                                <label class='form-label'>Parent/Guardian Contact</label>
                                <input type='text' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Parent/Guardian Address</label>
                                <textarea class='form-control' rows='1'></textarea>
                            </div>
                        </div>
                       <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' id='savebutton' class='btn btn-primary'>Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ";
    }
    //Attachments
    elseif ($item === "Attachments") {
        echo "
    <div class='modal fade' id='{$id}Modal' tabindex='-1'>
        <div class='modal-dialog modal-md'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Add Attachments</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form id='docsform' action='../backend/employee_data/timelive_emp_docs.phps' method='post' enctype='multipart/form-data'>
                        <div class='mb-3'>
                            <label class='form-label'>Employee ID</label>
                            <input type='number' name='emp_id' class='form-control' required>
                        </div>
                        <div class='mb-3'>
                            <label class='form-label'>Document Title</label>
                            <input type='text' name='doc_title' class='form-control' required>
                        </div>
                        <div class='mb-3'>
                            <label class='form-label'>Upload Document</label>
                            <input type='file' name='doc_attachment' class='form-control'>
                        </div>
                        <div class='mb-3'>
                            <label class='form-label'>Added By (Date)</label>
                            <input type='date' name='added_by' class='form-control'>
                        </div>
                       <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' id='savebutton' class='btn btn-primary'>Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ";
    }

    //Communication Skills Modal
    elseif ($item === "Communication Skills") {
        echo "
    <div class='modal fade' id='{$id}Modal' tabindex='-1'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Add Communication Skills</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form id='learningform' action='../backend/employee_data/timelive_emp_communication_skills.php' method='POST'>
                       
                        
                        <div class='row mb-3'>
                            <div class='col-md-6'>
                                <label class='form-label'>Employee ID</label>
                                <input type='number' name='emp_id' class='form-control' required>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Education ID</label>
                                <input type='number' name='ed_id' class='form-control'>
                            </div>
                        </div>
                        
                        <div class='row mb-3'>
                            <div class='col-md-6'>
                                <label class='form-label'>User ID</label>
                                <input type='number' name='user_id' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Added On</label>
                                <input type='date' name='added_on' class='form-control' required>
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <div class='col-md-4'>
                                <label class='form-label'>Writing</label>
                                <input type='text' name='count_writing' class='form-control'>
                            </div>
                            <div class='col-md-4'>
                                <label class='form-label'>Listening</label>
                                <input type='text' name='count_listening' class='form-control'>
                            </div>
                            <div class='col-md-4'>
                                <label class='form-label'>Speaking</label>
                                <input type='text' name='count_speaking' class='form-control'>
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <div class='col-12'>
                                <label class='form-label'>Comments</label>
                                <textarea name='comments' class='form-control' rows='3'></textarea>
                            </div>
                        </div>
<div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' id='savebutton' class='btn btn-primary'>Save</button>
                    </div>
                    </form>
                    <div id='response'></div>
                </div>
            </div>
        </div>
    </div>
    ";
    }


    // Learning & Development Modal
    elseif ($item === "Learning and Development") {
        echo "
    <div class='modal fade' id='{$id}Modal' tabindex='-1'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Add Learning and Development</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form id='learningform' action='../backend/employee_data/timelive_emp_communication_skills.php' method='POST'>
                       
                        
                        <div class='row mb-3'>
                            <div class='col-md-6'>
                                <label class='form-label'>Employee ID</label>
                                <input type='number' name='emp_id' class='form-control' required>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Education ID</label>
                                <input type='number' name='ed_id' class='form-control'>
                            </div>
                        </div>
                        
                        <div class='row mb-3'>
                            <div class='col-md-6'>
                                <label class='form-label'>User ID</label>
                                <input type='number' name='user_id' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Added On</label>
                                <input type='date' name='added_on' class='form-control' required>
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <div class='col-md-4'>
                                <label class='form-label'>Writing</label>
                                <input type='text' name='count_writing' class='form-control'>
                            </div>
                            <div class='col-md-4'>
                                <label class='form-label'>Listening</label>
                                <input type='text' name='count_listening' class='form-control'>
                            </div>
                            <div class='col-md-4'>
                                <label class='form-label'>Speaking</label>
                                <input type='text' name='count_speaking' class='form-control'>
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <div class='col-12'>
                                <label class='form-label'>Comments</label>
                                <textarea name='comments' class='form-control' rows='3'></textarea>
                            </div>
                        </div>

                        

                        <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' id='savebutton' class='btn btn-primary'>Save</button>
                    </div>
                    </form>
                    <div id='response'></div>
                </div>
            </div>
        </div>
    </div>
    ";
    }

    // employee certification
    elseif ($item === "Employment Certification") {
        echo "
    <div class='modal fade' id='{$id}Modal' tabindex='-1'>
        <div class='modal-dialog modal-lg modal-dialog-scrollable'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Employee Certifications</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form id='certForm' action='../backend/employee_data/timelive_emp_certs.php' method='POST' enctype='multipart/form-data'>
                        <div class='row mb-3'>
                            <div class='col-md-4'>
                                <label class='form-label'>Category ID</label>
                                <input type='number' name='cat_id' class='form-control' required>
                            </div>
                            <div class='col-md-4'>
                                 <label class='form-label'>Subcategory ID</label>
                                <input type='number' name='subcat_id' class='form-control'>
                            </div>
                            <div class='col-md-4'>
                                <label class='form-label'>Title ID</label>
                                <input type='number' name='certtitle_id' class='form-control'>
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <div class='col-md-4'>
                                <label class='form-label'>Code</label>
                                <input type='text' name='cert_code' class='form-control' required>
                            </div>
                            <div class='col-md-4'>
                                <label class='form-label'>URL</label>
                                <input type='url' name='cert_url' class='form-control'>
                            </div>
                            <div class='col-md-4'>
                                <label class='form-label'>Status</label>
                                <select name='cert_status' class='form-select' required>
                                    <option value='' disabled selected>Select Status</option>
                                    <option value='Active'>Active</option>
                                    <option value='Expired'>Expired</option>
                                    <option value='In Progress'>In Progress</option>
                                </select>
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <div class='col-md-6'>
                                <label class='form-label'>Exam Date</label>
                                <input type='date' name='cert_exam_date' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Expiry Date</label>
                                <input type='date' name='cert_expiry_date' class='form-control'>
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <div class='col-md-6'>
                                <label class='form-label'>Score</label>
                                <input type='text' name='cert_score' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Attachment</label>
                                <input type='file' name='cert_attachment' class='form-control' accept='.pdf,.jpg,.png,.docx'>
                                <div class='mt-2'>
                                    <small class='text-muted'>Allowed: PDF, JPG, PNG, DOCX</small><br>
                                    <img id='filePreview' src='' alt='Preview' style='max-width:100px; display:none;' />
                                </div>
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <div class='col-md-6'>
                                <label class='form-label'>Employee ID</label>
                                <input type='number' name='emp_id' class='form-control' required>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Created On</label>
                                <input type='date' name='created_on' class='form-control' required>
                            </div>
                        </div>

                       <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' id='savebutton' class='btn btn-primary'>Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ";
    }


    // Employment Badges
    elseif ($item === "Employment Badges") {
        echo "
    <div class='modal fade' id='{$id}Modal' tabindex='-1'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Employee Badges</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form id='badgeForm' action='../backend/employee_data/timelive_emp_badges.php' method='POST' enctype='multipart/form-data'>
                        <div class='row mb-3'>
                            <div class='col-md-6'>
                                <label class='form-label'>Badge Title</label>
                                <input type='text' name='badge_title' class='form-control' required>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Badge URL</label>
                                <input type='url' name='badge_url' class='form-control'>
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <div class='col-md-6'>
                                <label class='form-label'>Completed On</label>
                                <input type='date' name='completed_on' class='form-control'>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Expiry Date</label>
                                <input type='date' name='expiry_date' class='form-control'>
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <div class='col-md-6'>
                                <label class='form-label'>Employee ID</label>
                                <input type='number' name='emp_id' class='form-control' required>
                            </div>
                            <div class='col-md-6'>
                                <label class='form-label'>Created On</label>
                                <input type='date' name='created_on' class='form-control' required>
                            </div>
                        </div>

                        <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' id='savebutton' class='btn btn-primary'>Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ";
    }

    //personal information
    elseif ($item === "Personal Information") {
        echo "
    <div class='modal fade' id='{$id}Modal' tabindex='-1'>
        <div class='modal-dialog modal-lg modal-dialog-scrollable'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Add Personal Information</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form id='personalform' class='row g-3' action='../backend/employee_data/jobs_apply.php' method='post' enctype='multipart/form-data'>
                        
                        <!-- Basic Info -->
                        <div class='col-md-3'>
                            <label class='form-label'>Employee ID</label>
                            <input type='number' name='emp_id' class='form-control' required>
                        </div>
                        <div class='col-md-3'>
                            <label class='form-label'>HR ID</label>
                            <input type='number' name='hrid' class='form-control' required>
                        </div>
                        <div class='col-md-3'>
                            <label class='form-label'>Job ID</label>
                            <input type='number' name='job_id' class='form-control' required>
                        </div>
                        <div class='col-md-3'>
                            <label class='form-label'>Email</label>
                            <input type='email' name='email' class='form-control'>
                        </div>

                        <!-- Cover Letter -->
                        <div class='col-6'>
                            <label class='form-label'>Cover Letter</label>
                            <input type='file' name='cover_letter' class='form-control'>
                        </div>

                        <!-- Resume / Docs -->
                        <div class='col-md-6'>
                            <label class='form-label'>Upload Resume</label>
                            <input type='file' name='resume_file' class='form-control'>
                        </div>
                        <div class='col-md-6'>
                            <label class='form-label'>Upload Certification File</label>
                            <input type='file' name='certification_file' class='form-control'>
                        </div>

                        <!-- Education -->
                        <div class='col-md-6'>
                            <label class='form-label'>Highest Education</label>
                            <input type='text' name='highest_education' class='form-control'>
                        </div>
                        <div class='col-md-6'>
                            <label class='form-label'>Years of Experience</label>
                            <input type='text' name='experience_years' class='form-control'>
                        </div>
                        <div class='col-md-6'>
                            <label class='form-label'>Certification URL</label>
                            <input type='url' name='certification_url' class='form-control'>
                        </div>

                        <!-- Salary / Notice -->
                        <div class='col-md-6'>
                            <label class='form-label'>Current Salary</label>
                            <input type='text' name='current_salary' class='form-control'>
                        </div>
                        <div class='col-md-6'>
                            <label class='form-label'>Expected Salary</label>
                            <input type='text' name='expected_salary' class='form-control'>
                        </div>
                        <div class='col-md-6'>
                            <label class='form-label'>Notice Period</label>
                            <input type='text' name='notice_period' class='form-control'>
                        </div>
                        <div class='col-md-6'>
                            <label class='form-label'>Salary Offered</label>
                            <input type='number' name='salary' class='form-control'>
                        </div>

                        <!-- Links -->
                        <div class='col-md-6'>
                            <label class='form-label'>LinkedIn</label>
                            <input type='url' name='linkedIn' class='form-control'>
                        </div>
                        <div class='col-md-6'>
                            <label class='form-label'>GitHub</label>
                            <input type='url' name='github' class='form-control'>
                        </div>

                        <!-- Additional Info -->
                        <div class='col-md-6'>
                            <label class='form-label'>Commute Location</label>
                            <input type='text' name='commute_loc' class='form-control'>
                        </div>
                        <div class='col-md-6'>
                            <label class='form-label'>Location (Islamabad)</label>
                            <input type='text' name='location_islamabad' class='form-control'>
                        </div>
                        <div class='col-6'>
                            <label class='form-label'>Portfolio</label>
                            <textarea name='portfolio' class='form-control' rows='2'></textarea>
                        </div>
                        <div class='col-6'>
                            <label class='form-label'>Company Interest</label>
                            <textarea name='company_interest' class='form-control' rows='2'></textarea>
                        </div>
                        <div class='col-6'>
                            <label class='form-label'>Tool Proficiency</label>
                            <textarea name='tool_proficiency' class='form-control' rows='2'></textarea>
                        </div>
                        <div class='col-6'>
                            <label class='form-label'>Why are you the best fit?</label>
                            <textarea name='best_fit' class='form-control' rows='2'></textarea>
                        </div>
                        <div class='col-12'>
                            <label class='form-label'>Team Management Experience</label>
                            <textarea name='manage_team' class='form-control' rows='2'></textarea>
                        </div>

                        <!-- Submit -->
                     <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' id='savebutton' class='btn btn-primary'>Save</button>
                    </div>
                        <div id='response' class='mt-2'></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ";
    }

    // Default simple modal
    else {
        echo "
        <div class='modal fade' id='{$id}Modal' tabindex='-1' id='employeeTableContainer'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Add {$item}</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                    </div>
                    <div class='modal-body'>
                        <form>
                            <div class='mb-3'>
                                <label class='form-label'>Enter {$item} Details</label>
                                <input type='text' class='form-control' placeholder='{$item}'>
                            </div>
                            <div class='mb-3'>
                                <label class='form-label'>Select {$id} </label>
                                <input type='text' class='form-control' placeholder='{$item}'>
                            </div>
                            <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' id='savebutton' class='btn btn-primary'>Save</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
}
?>