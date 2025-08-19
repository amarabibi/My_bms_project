<?php include(__DIR__ . "/../../includes/header.php");?>

<?php include(__DIR__ . "/../../includes/navbar.php");?>

<div class="d-flex" style="margin-top:56px;">
<?php include(__DIR__ . "/../../includes/sidebar.php"); ?>

    <div class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="fw-bold text-dark">
                    <i class="bi bi-people-fill text-primary"></i> Human Resource Management
                </h4>
           <a href="/my_site/sps/bms/bms-beta/modules/hr/employee_dashboard.php" 
   class="badge bg-primary fs-6 p-2 shadow-sm text-decoration-none">
  <i class="bi bi-plus-circle text-white me-1"></i> Add New
</a>




            </div>

            <!-- Filters Card -->
            <div class="card shadow-sm border-0 sticky-top" style="top: 70px; z-index: 10;">
                <div class="card-body">
                    <!-- First Row: Show All + Add New + Search -->
                    <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
                        <a href="#" class="text-primary fw-semibold d-flex align-items-center">
                            <i class="bi bi-funnel-fill me-1"></i> Show All / Active Only
                        </a>
                        <div class="input-group input-group-sm" style="max-width: 250px;">
                            <input type="text" class="form-control" placeholder="Search employees...">
                            <button class="btn btn-outline-primary"><i class="bi bi-search"></i></button>
                        </div>
                    </div>

                    <!-- Second Row: Filters -->
                    <div class="row g-2 align-items-center">
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Select Department</option>
                                <option>IT</option>
                                <option>OT</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Select Group</option>
                                <option>BMS</option>
                                <option>CSM</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Select Practice</option>
                                <option>Taining</option>
                                <option>Completed</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Gender</option>
                                <option>Male</option>
                                <option>female</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Select Location</option>
                                <option>US</option>
                                <option>PK</option>
                                <option>ME</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Select Type of HR</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Select Work Status</option>
                                <option>Full time</option>
                                <option>Part time</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary btn-sm">
                                <i class="bi bi-eye"></i> Show
                            </button>
                        </div>

                        <!-- Right side compact controls -->
                       <div class="col-auto ms-auto d-flex align-items-center gap-2">
    <select class="form-select form-select-sm" style="height:32px; padding:0 8px 2px 4px; font-size:0.85rem;">
        <option>2025</option>
         <option>2024</option>
          <option>2023</option>
    </select>
    <select class="form-select form-select-sm" style="height:32px; padding:0 20px 8px 9px; font-size:0.85rem;">
        <option>Annual</option>
         <option>Monthly</option>
    </select>
    <button class="btn btn-info text-white p-1 px-2" style="height:32px; line-height:1; white-space: nowrap; font-size:0.85rem;">
        <i class="bi bi-send-fill"></i> Send Planning Form
    </button>
</div>


                    </div>
                </div>
            </div>
         <br>
    <!-- Table Area -->
        <div class="table-area">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-file-earmark-text"></i> Export CSV
                    </button>
                    <button class="btn btn-outline-success btn-sm">
                        <i class="bi bi-file-earmark-excel"></i> Export Excel
                    </button>
                </div>
            </div>

           <div class="table-responsive shadow-sm rounded mt-3" style="table-layout: fixed; width: 100%;">
    <table class="table table-bordered table-hover align-middle mb-0 table-sm compact-table" >  
        <thead class="table-light">
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Type</th>
                <th>Job Status</th>
                <th>Manager</th>
                <th>Company</th>
                <th>Team</th>
                <th>Group</th>
                <th>Practice</th>
                <th>Location</th>
                <th>Mobile no</th>
                <th>Email</th>
                <th>BMS Access</th>
                <th>Staff</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Row 1 -->
            <tr>
                <td><input type="checkbox"></td>
                <td class="text-primary">John denn</td>
                <td>FT</td>
                <td><span class="badge bg-success">Full-time</span></td>
                <td>Mary</td>
                <td>TechCo</td>
                <td>Dev</td>
                <td>G1</td>
                <td>Agile</td>
                <td>NY</td>
                <td>12345678901</td>
                <td>john@gmail.com</td>
                <td><span class="badge bg-danger">No</span></td>
                <td><input type="checkbox"></td>
                <td><span class="badge bg-success">Active</span></td>
<td>
   
    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#actionModal1">
       <a href="#"><i class="fa fa-bars"></i></a> 
    </button>
</td>
            </tr>

            <!-- Row 2 -->
            <tr>
                <td><input type="checkbox"></td>
                <td class="text-primary">Amy virk</td>
                <td>PT</td>
                <td><span class="badge bg-success">Full-time</span></td>
                <td>Tom</td>
                <td>BizInc</td>
                <td>HR</td>
                <td>G2</td>
                <td>Scrum</td>
                <td>LA</td>
                <td>12345678901</td>
                <td>amy@gmail.com</td>
                <td><span class="badge bg-success">Yes</span></td>
                <td><input type="checkbox"></td>
                <td><span class="badge bg-success">Active</span></td>
                <td>
   
    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#actionModal1">
       <a href="#"> <i class="fa fa-bars "></i></a>
    </button>
</td>
            </tr>
        </tbody>
    </table>
</div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal " id="actionModal1" tabindex="-1" aria-labelledby="actionModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="actionModalLabel1">Choose Action</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <a href="edit.php?id=1" class="btn btn-primary me-2">Edit</a>
        <a href="delete.php?id=1" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>


