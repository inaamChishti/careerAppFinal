@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="">
        @csrf

        <!-- Personal Details -->
        <h2 style="text-align: center;" class="mt-2">Personal Details</h2>
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name" class="form-control" required>
        </div>

        <!-- Address -->
        <div class="row">
            <div class="col-md-6">
                <label for="address1">Address 1</label>
                <input type="text" name="address1" id="address1" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="address2">Address 2</label>
                <input type="text" name="address2" id="address2" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="post_code">Post Code</label>
                <input type="text" name="post_code" id="post_code" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control">
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
                <input type="tel" name="mobile" id="mobile" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" required>
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
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
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
</script>

<script>
    document.getElementById('previousEmployment').addEventListener('change', function () {
        var employmentDetails = document.getElementById('previousEmploymentDetails');
        employmentDetails.style.display = this.value === 'yes' ? 'block' : 'none';
    });


</script>
<script>
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
    document.addEventListener('change', function(event) {
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
    document.addEventListener('change', function(event) {
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
        var timeDiff = startDateCareQualificationObj.getTime() - lastEndDateSecondaryObj.getTime();
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
    document.addEventListener('change', function(event) {
        // Check if the changed element is a care qualification start date input
        if (event.target && event.target.name === 'care_qualification_start_date[]') {
            console.log("Care Qualification start date changed");
            checkDateGapthree();
        }
    });

    // Additional logic for counting days on change of the 'from' date
    document.getElementById('from').addEventListener('change', function() {
        // Get the 'from' date value
        var fromDate = new Date(this.value);

        // Get the last end date from the Graduation & Masters table
        var endDateSecondaryInputs = document.querySelectorAll('input[name="graduation_college_end_date[]"]');
        var lastEndDateSecondary = endDateSecondaryInputs[endDateSecondaryInputs.length - 1].value;

        // Convert the last end date to a JavaScript Date object
        var lastEndDateSecondaryObj = new Date(lastEndDateSecondary);

        // Calculate the difference in days
        var timeDiff = fromDate.getTime() - lastEndDateSecondaryObj.getTime();
        var daysDiff = timeDiff / (1000 * 60 * 60 * 24);

        // Check if the gap is 30 days or more
        if (daysDiff >= 30) {
            // Display the reason textarea
            document.getElementById('reasonTextareathree').style.display = 'block';
        } else {
            // Hide the reason textarea if no gap
            document.getElementById('reasonTextareathree').style.display = 'none';
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
            // Hide the reason textarea if no gap
            alert("There is a gap of more than 30 days between the last end date of the Graduation & Masters and the current Relevant Care Qualifications start date.");
            // Display the reason textarea
            document.getElementById('reasonTextareatwo').style.display = 'block';
        } else {
            // Show the alert
            document.getElementById('reasonTextareatwo').style.display = 'none';
        }
    }

    // Event delegation for dynamically added rows
    document.addEventListener('change', function(event) {
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
