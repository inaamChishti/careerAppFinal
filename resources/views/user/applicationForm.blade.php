
@extends('layouts.user')

@section('content')
<style>
    body {
        background-color: #f4f4f4;
        font-family: 'Arial', sans-serif;
    }

    .container {
        margin-top: 50px;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2, h3 {
        color: #333;
    }

    label {
        font-weight: bold;
        color: #555;
    }

    select, input[type="text"], input[type="tel"], input[type="email"], input[type="date"], textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        color: #555;
    }

    select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: url('path/to/arrow-icon.png') no-repeat right center;
        background-size: 20px;
    }

    .row {
        margin: 0 -15px;
    }

    .col-md-6 {
        width: 50%;
        padding: 0 15px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-secondary {
        background-color: #6c757d;
    }

    .btn-danger {
        background-color: #dc3545;
    }

    table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    textarea {
        resize: vertical;
    }

    /* Additional styles for responsive design */
    @media (max-width: 768px) {
        .col-md-6 {
            width: 100%;
        }
    }
</style>

<div class="container">
    <div class="row justify-content-center " style="width:90%;margin-left: 30px;">
        <form method="POST" action="">



            @csrf

            <!-- Personal Details -->
            <h2 style="text-align: center;" class="mt-2">Personal Details</h2>

            <div class="form-group">
                <label for="position">Select Position</label>
                <select name="position" id="position" class="form-control" required>
                    <!-- Add static options -->
                    <option value="1">Software Engineer - UK</option>
                     <option value="2">Project Manager - UK</option>
                </select>
            </div>
            <div class="form-group">

                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $userdetails->firstName }} {{ $userdetails->lastName }}" required>

            </div>

            <!-- Address -->
            <div class="row" >
                <div class="col-md-6">
                    <label for="address1">Address 1</label>
                    <input type="text" name="address1" value="{{ $userdetails->address1 }}" id="address1" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="address2">Address 2</label>
                    <input type="text" value="{{ $userdetails->address2 }}" name="address2" id="address2" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="post_code">Post Code</label>
                    <input type="text" value="{{ $userdetails->postcode }}" name="post_code" id="post_code" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="city">City</label>
                    <input type="text" name="city" value="{{ $userdetails->town }}" id="city" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control">
                        <option value="country1">Country 1</option>
                        <option value="country2">Country 2</option>
                    </select>
                </div>
            </div>

            <!-- Telephone and Email -->
            <div class="row">
                <div class="col-md-6">
                    <label for="home_telephone">Telephone Home</label>
                    <input type="tel" name="home_telephone" id="home_telephone" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="mobile">Mobile</label>
                    <input type="tel" name="mobile" value="{{ $userdetails->phone }}" id="mobile" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" id="email" class="form-control" required>
                </div>
            </div>

            <!-- National Insurance and Driving Details -->
            <div class="row">
                <div class="col-md-6">
                    <label for="national_insurance">National Insurance No.</label>
                    <input type="text" name="national_insurance" id="national_insurance" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="own_car">Do you own a car?</label>
                    <select name="own_car" id="own_car" class="form-control">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="current_license">Have a current licence?</label>
                    <select name="current_license" id="current_license" class="form-control">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="driving_convictions">Do you have any current driving convictions?</label>
                    <select name="driving_convictions" id="driving_convictions" class="form-control">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>

            <!-- Secondary and Higher Secondary Education -->
            <h3 style="text-align: center;" class="mt-5">College/ University</h3>
            <table class="table" data-type="secondary">
                <thead>
                    <tr>
                        <th>College/ University Name & Address</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Result</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="secondary_college[]" class="form-control" placeholder="College" /></td>
                        <td><input type="date" name="secondary_start_date[]" class="form-control" placeholder="Start Date" /></td>
                        <td><input type="date" name="secondary_end_date[]" class="form-control" placeholder="End Date" /></td>
                        <td><input type="text" name="secondary_result[]" class="form-control" placeholder="Result" /></td>
                        <td><button type="button" class="btn btn-danger" style="display: none;" onclick="removeRow(this)">Remove</button></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-secondary" onclick="addRow('secondary')">Add Row</button>


            <!-- Graduation & Masters -->
            <div>
                {{-- <label></label> --}}
                <h3 style="text-align: center;" class="mt-5">Graduation & Masters</h3>
                <table class="table" data-type="graduation">
                    <thead>
                        <tr>
                            <th>College/ University Name & Address</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Result</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="graduation_college[]" class="form-control" placeholder="College" /></td>
                            <td><input type="date" name="graduation_college_start_date[]" class="form-control" placeholder="Start Date" /></td>
                            <td><input type="date" name="graduation_college_end_date[]" class="form-control" placeholder="End Date" /></td>
                            <td><input type="text" name="graduation_result[]" class="form-control" placeholder="Result" /></td>
                            <td><button type="button" class="btn btn-danger" style="display: none;" onclick="removeRow(this)">Remove</button></td>
                        </tr>
                    </tbody>
                </table>
                <textarea id="reasonTextarea" name="firstreasonTextarea" style="display: none;" class="form-control mt-3" placeholder="Enter reason for the gap betwwen College/ University and  Graduation & Masters "></textarea>

                <button type="button" class="btn btn-secondary" onclick="addRow('graduation')">Add Row</button>

            </div>


            <!-- Relevant Care Qualifications -->
            <div>
                {{-- <label></label> --}}
                <h3 style="text-align: center;" class="mt-5">Relevant Care Qualifications</h3>
                <table class="table" data-type="care_qualification">
                    <thead>
                        <tr>
                            <th>Relevant care qualification</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Result</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="care_qualification[]" class="form-control" placeholder="Qualification" /></td>
                            <td><input type="date" name="care_qualification_start_date[]" class="form-control" placeholder="Start Date" /></td>
                            <td><input type="date" name="care_qualification_end_date[]" class="form-control" placeholder="End Date" /></td>
                            <td><input type="text" name="care_result[]" class="form-control" placeholder="Result" /></td>
                            <td><button type="button" class="btn btn-danger" style="display: none;" onclick="removeRow(this)">Remove</button></td>
                        </tr>
                    </tbody>
                </table>
                <textarea id="reasonTextareatwo" name="reasonTextareatwo" style="display: none;" class="form-control mt-3" placeholder="Enter reason for the gap betwwen Graduation & Masters and  Relevant Care Qualifications "></textarea>

                <button type="button" class="btn btn-secondary" onclick="addRow('care_qualification')">Add Row</button>
            </div>

            <!-- Previous employment -->
            <div>
                <label for="previous_employment">Previous employment</label>
                <select name="previous_employment" id="previousEmployment" class="form-control">
                    <option selected disabled>choose option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>

                <!-- Display this section only if 'Yes' is selected -->
                <div id="previousEmploymentDetails" style="display: none;">
                    <div class="form-group">
                        <label for="employer">Present/Last Employer</label>
                        <input type="text" id="employer" name="employer" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="job_title">Job Title</label>
                            <input type="text" id="job_title" name="job_title" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="responsibilities">Duties/Responsibilities</label>
                            <textarea id="responsibilities" name="responsibilities" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="jobtype">Job Period</label>
                            <input type="text" name="jobtype" id="jobtype" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="from">From</label>
                            <input type="date" name="from" id="from" class="form-control" required>
                            <label for="to">To</label>
                            <input type="date" name="to" id="to" class="form-control" required>
                        </div>
                    </div>
                    <textarea id="reasonTextareathree" name="reasonTextareathree" style="display: none;" class="form-control mt-3" placeholder="Enter reason for the gap betwwen Relevant Care Qualifications and  Present/Last Employer "></textarea>


                    <div class="form-group">
                        <label for="reasonofleaving">Reason of Leaving</label>
                        <textarea id="reasonofleaving" name="reasonofleaving" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="contactEmployerConsent">Do you consent us to contact this employer for your work reference?</label>
                        <input type="checkbox" id="contactEmployerConsent" name="contactEmployerConsent" class="form-check-input">

                    </div>

                    <div>
                        <h3 style="text-align: center;" class="mt-5">Permission to work in the UK</h3>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="restrictions">Are there any restrictions to your residence in the UK that might affect your right to take up employment in the UK?</label>
                                    <select name="restrictions" id="restrictions" class="form-control">
                                        <option selected disabled>Choose option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="permissionRequired">If you are successful in your application, would you require permission to work in the UK?</label>
                                    <select name="permissionRequired" id="permissionRequired" class="form-control">
                                        <option selected disabled>Choose option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <h3 style="text-align: center;" class="mt-5">Next of Kin - Emergency Contact</h3>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emergencyContactName">Emergency Contact Name</label>
                                    <input type="text" id="emergencyContactName" name="emergencyContactName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="relationship">Relationship to you</label>
                                    <input type="text" id="relationship" name="relationship" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emergencyAddress">Address</label>
                                    <input type="text" id="emergencyAddress" name="emergencyAddress" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="emergencyContactNumber">Contact number</label>
                                    <input type="tel" id="emergencyContactNumber" name="emergencyContactNumber" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <p>Reference should be the same as employment</p>
                    </div>

                </div>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


</div>
<script>
    function addRow(tableType) {
        var table = document.querySelector(`table[data-type="${tableType}"]`);

        if (!table) {
            console.error(`Table with data-type="${tableType}" not found.`);
            return;
        }

        var tbody = table.querySelector('tbody');

        if (!tbody) {
            console.error(`Table with data-type="${tableType}" has no tbody.`);
            return;
        }

        // Clone the last row in the table
        var clone = tbody.lastElementChild.cloneNode(true);

        // Clear the input values
        clone.querySelectorAll('input').forEach(input => input.value = '');

        // Hide the "Remove" button in the cloned row
        var removeButton = clone.querySelector('button');
        if (removeButton) {
            removeButton.style.display = 'block';
        }

        // Append the cloned row to the table
        tbody.appendChild(clone);
    }

    function removeRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    document.getElementById('previousEmployment').addEventListener('change', function () {
        var employmentDetails = document.getElementById('previousEmploymentDetails');
        employmentDetails.style.display = this.value === 'yes' ? 'block' : 'none';
    });

    function checkDateGap() {
        // Get the last end date from the College/University table
        var endDateSecondaryInputs = document.querySelectorAll('input[name="secondary_end_date[]"]');
        var lastEndDateSecondary = endDateSecondaryInputs[endDateSecondaryInputs.length - 1].value;

        // Get the start date from the Graduation & Masters table
        var startDateGraduationInputs = document.querySelectorAll('input[name="graduation_college_start_date[]"]');
        var startDateGraduation = startDateGraduationInputs[startDateGraduationInputs.length - 1].value;

        // Convert the dates to JavaScript Date objects
        var lastEndDateSecondaryObj = new Date(lastEndDateSecondary);
        var startDateGraduationObj = new Date(startDateGraduation);

        // Calculate the difference in days
        var timeDiff = startDateGraduationObj - lastEndDateSecondaryObj;
        var daysDiff = timeDiff / (1000 * 60 * 60 * 24);

        // Check if the gap is 30 days or more
        if (daysDiff >= 30) {
            // Hide the reason textarea if no gap
            alert("There is a gap of more than 30 days between the last end date of the College/ University and the current Graduation & Masters start date.");
            // Display the reason textarea
            document.getElementById('reasonTextarea').style.display = 'block';
        } else {
            // Show the alert
            document.getElementById('reasonTextarea').style.display = 'none';
        }
    }

    console.log("Script loaded"); // Check if the script is loaded

    // Event delegation for dynamically added rows
    document.addEventListener('change', function (event) {
        // Check if the changed element is a graduation start date input
        if (event.target && event.target.name === 'graduation_college_start_date[]') {
            console.log("Graduation start date changed");
            checkDateGap();
        }
    });
</script>

<script>
    function checkDateGaptwo() {
        // Get the last end date from the Graduation & Masters table
        var endDateSecondaryInputs = document.querySelectorAll('input[name="graduation_college_end_date[]"]');
        var lastEndDateSecondary = endDateSecondaryInputs[endDateSecondaryInputs.length - 1].value;

        // Get the start date from the Relevant Care Qualifications table
        var startDateCareQualification = document.querySelector('input[name="care_qualification_start_date[]"]').value;

        // Convert the dates to JavaScript Date objects
        var lastEndDateSecondaryObj = new Date(lastEndDateSecondary);
        var startDateCareQualificationObj = new Date(startDateCareQualification);

        // Calculate the difference in days
        var timeDiff = startDateCareQualificationObj - lastEndDateSecondaryObj;
        var daysDiff = timeDiff / (1000 * 60 * 60 * 24);

        // Check if the gap is 30 days or more
        if (daysDiff >= 30) {
            // Hide the reason textarea if no gap
            alert("There is a gap of more than 30 days between the last end date of the Graduation & Masters and the current Relevant Care Qualifications start date.");
            // Display the reason textarea
            document.getElementById('reasonTextareatwo').style.display = 'block';
        } else {
            // Show the alert
            document.getElementById('reasonTextareatwo').style.display = 'none';
        }
    }

    console.log("Script loaded"); // Check if the script is loaded

    // Event delegation for dynamically added rows
    document.addEventListener('change', function (event) {
        // Check if the changed element is a care qualification start date input
        if (event.target && event.target.name === 'care_qualification_start_date[]') {
            console.log("Care Qualification start date changed");
            checkDateGaptwo();
        }
    });
</script>

<script>
    function checkDateGapthree() {
        // Get the last end date from the Graduation & Masters table
        var endDateSecondaryInputs = document.querySelectorAll('input[name="graduation_college_end_date[]"]');
        var lastEndDateSecondary = endDateSecondaryInputs[endDateSecondaryInputs.length - 1].value;

        // Get the start date from the Relevant Care Qualifications table
        var startDateCareQualification = document.querySelector('input[name="care_qualification_start_date[]"]').value;

        // Convert the dates to JavaScript Date objects
        var lastEndDateSecondaryObj = new Date(lastEndDateSecondary);
        var startDateCareQualificationObj = new Date(startDateCareQualification);

        // Calculate the difference in days
        var timeDiff = startDateCareQualificationObj - lastEndDateSecondaryObj;
        var daysDiff = timeDiff / (1000 * 60 * 60 * 24);

        // Check if the gap is 30 days or more
        if (daysDiff >= 30) {
            // Display the reason textarea
            document.getElementById('reasonTextareathree').style.display = 'block';
        } else {
            // Hide the reason textarea if no gap
            document.getElementById('reasonTextareathree').style.display = 'none';
        }
    }

    // Event delegation for dynamically added rows
    document.addEventListener('change', function (event) {
        // Check if the changed element is a care qualification start date input
        if (event.target && event.target.name === 'care_qualification_start_date[]') {
            console.log("Care Qualification start date changed");
            checkDateGapthree();
        }
    });

    // Additional logic for counting days on change of the 'from' date
    document.getElementById('from').addEventListener('change', function() {
        // Get the 'from' date value
        var fromDate = this.value;

        // Use your logic to count days or perform any required actions
        // For example:
        var currentDate = new Date();
        var fromDateTime = new Date(fromDate);

        var timeDiff = fromDateTime - currentDate;  // Corrected this line
        var daysDiff = timeDiff / (1000 * 60 * 60 * 24);

        console.log('Days difference:', daysDiff);
        if (daysDiff >= 30) {
                // Hide the reason textarea if no gap
                alert("There is a gap of more than 30 days between the last end date of the Graduation & Masters and the current Relevant Care Qualifications start date.");
                // Display the reason textarea
                document.getElementById('reasonTextareathree').style.display = 'block';
            } else {
                // Show the alert
                document.getElementById('reasonTextareathree').style.display = 'none';
            }
    });
</script>


@endsection
