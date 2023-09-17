<?php include('include/header.php'); ?>

<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/bootstrap.min.css">

<body class="bg-light">

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="text-center mt-2">
               
                 
                </div>
                <h1 class="text-center">Add Crops</h1>
                <hr>
                <form id="register_form">
                   
                    
                    <div class="mb-3">
                        <label for="cropcategory">Crop Category *</label>
                        <input type="text" class="form-control" id="cropcategory" name="cropcategory" maxlength="50"
                        placeholder="Enter Crop Category">
                     </div>
                    <div class="mb-3">2
                        <label for="cropname">Crop Name *</label>
                        <input type="text" class="form-control" id="cropname" name="cropname" maxlength="50" 
                        placeholder="Enter Crop name">
                    </div>
                    <div class="mb-3">
                        <label for="mobile">Mobile no. *</label>
                         <input type="tel" class="form-control" id="mobile" name="mobile" maxlength="20"
                          placeholder="Enter mobile number">
                       <div id="mobile_error_message" class="text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label>Gender *</label>
                        <select name="gender" id="gender" class="custom-select">
                            <option value="" hidden>Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        <div id="gender_error_message" class="text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" maxlength="50"
                            placeholder="Enter password">
                        <div id="password_error_message" class="text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password">Confirm Password *</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            maxlength="50" placeholder="Enter confirm password">
                        <div id="confirm_password_error_message" class="text-danger"></div>
                    </div>
                    <hr class="mb-4">
                    <input type="hidden" name="action" id="action" value="register_user">
                    <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
                </div>
                    <div class="mt-2  text-center">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

