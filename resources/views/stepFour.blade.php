<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,600,700i|Source+Sans+Pro:400,500,600,700"
        rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        /* Your existing styles */

        @media screen and (max-width: 767px) {
            form#multistepsform {
                width: 90%;
            }

            #progressbar li {
                font-size: 12px;

                &:before {
                    width: 20px;
                    line-height: 20px;
                    font-size: 12px;
                }

                &:after {
                    height: 1px;
                    top: 10px;
                }
            }

            form#multistepsform section {
                margin-bottom: 30px;
            }

            section.offset-md-2 {
                margin-left: 10px;
                /* Add margin to move the form to the right by 10px */
            }
        }

        html {
            height: 100%;
            background: #fff;
        }

        body {
            font-family: 'Montserrat', 'Arial', 'Verdana';
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            counter-reset: step;
            display: flex;
            justify-content: space-between;
            align-items: center;

            li {
                list-style-type: none;
                color: #679b9b;
                text-transform: uppercase;
                font-size: 14px;
                flex-grow: 1;

                &:before {
                    content: counter(step);
                    counter-increment: step;
                    width: 30px;
                    line-height: 30px;
                    display: block;
                    font-size: 16px;
                    color: #fff;
                    background: #679b9b;
                    border-radius: 50%;
                    margin: 0 auto 5px auto;
                }

                &:first-child:before {
                    margin-left: 0;
                }

                &:after {
                    content: "";
                    width: 100%;
                    height: 2px;
                    background: #679b9b;
                    position: absolute;
                    left: -33.33%;
                    /* Adjusted from -50% to -33.33% */
                    top: 15px;
                    z-index: -1;
                }
            }

            li.active {
                color: #ff9a76;

                &:before,
                &:after {
                    background: #ff9a76;
                    color: white;
                }

                // Add a left margin to the first li with active class
                &:first-child {
                    margin-left: 10px;
                }
            }
        }

        main {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container.cont2 {
            height: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .row.row2 {
            margin: 20px auto;

            p {
                margin-bottom: 15px;
            }

            ul {
                padding-left: 20px;
            }

            a {
                color: #007bff;
            }
        }

        form#multistepsform section {
            margin-top: 20px;
        }

        @media screen and (max-width: 767px) {
            #multistepsform {
                width: 100%;
            }

            #progressbar li {
                font-size: 12px;

                &:before {
                    width: 20px;
                    line-height: 20px;
                    font-size: 12px;
                }

                &:after {
                    height: 1px;
                    top: 10px;
                }
            }
        }

        html {
            height: 100%;
            background: #white;
        }

        body {
            font-family: montserrat, arial, verdana;
        }

        #multistepsform {
            width: 70%;
            margin: 50px auto;
            text-align: center;
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            counter-reset: step;

            li {
                list-style-type: none;
                color: #679b9b;
                text-transform: uppercase;
                font-size: 12px;
                width: 33.33%;
                float: left;
                position: relative;

                &:before {
                    content: counter(step);
                    counter-increment: step;
                    width: 30px;
                    line-height: 30px;
                    display: block;
                    font-size: 16px;
                    color: #fff;
                    background: #679b9b;
                    border-radius: 50%;
                    margin: 0 auto 5px auto;
                }

                &:after {
                    content: "";
                    width: 100%;
                    height: 2px;
                    background: #679b9b;
                    position: absolute;
                    left: -33.33%;
                    /* Adjusted from -50% to -33.33% */
                    top: 15px;
                    z-index: -1;
                }

                &:first-child:after {
                    content: none;
                }
            }

            li.active {
                color: #ff9a76;

                &:before,
                &:after {
                    background: #ff9a76;
                    color: white;
                }

                // Add a left margin to the first li with active class
                &:first-child {
                    margin-left: 10px;
                }
            }
        }

        form#multistepsform section {
            margin-bottom: 30px;
        }

        h1 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that get an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #04AA6D;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }


        .option-wrapper .option {
            display: flex;
            align-items: center;
            padding: 5px;
            /* Reduced padding */
            border-radius: 5px;
            cursor: pointer;
            border: 2px solid lightgrey;
            transition: all 0.3s ease;
        }

        .option-wrapper .option .dot {
            height: 15px;
            /* Reduced height */
            width: 15px;
            /* Reduced width */
            background: #d9d9d9;
            border-radius: 50%;
            margin-right: 5px;
            /* Reduced margin */
        }

        .option-wrapper .option span {
            font-size: 14px;
            /* Reduced font size */
            color: #808080;
        }

        .option-wrapper input[type="radio"]:checked+.option {
            border-color: #22dba8;
            background: #22dba8;
        }

        .option-wrapper input[type="radio"]:checked+.option .dot {
            background: #fff;
        }

        .option-wrapper input[type="radio"]:checked+.option span {
            color: #fff;
        }

        /* Adjusted width for radio buttons */
        .option-wrapper input[type="radio"] {
            display: none;
        }

        .option-wrapper input[type="radio"]+label {
            width: 25%;
            /* Adjust the width as needed */
            padding: 5px;
            /* Reduced padding */
            margin-bottom: 10px;
            /* Reduced margin */
            border: 1px solid #22dba8;
            border-radius: 4px;
            resize: vertical;
            box-sizing: border-box;
            /* Ensure padding and border are included in the width */
        }


              /* Your existing styles go here */

                    /* Media query for mobile devices */
                    @media (max-width: 767px) {
                        .option-wrapper {
                            width: 50%; /* Make the options take up the full width */
                            flex-wrap: wrap; /* Allow items to wrap to the next line */
                        }

                        /* Adjust the width of each option to show only two in a row */
                        .option-wrapper > div {
                            width: 50%; /* Two options in a row with a small gap */
                            margin-right: 2%; /* Adjust the gap between options */
                        }
                        .option-wrapper span {
            font-size: 12px;
        }
                    }
    </style>


</head>

<body>

    @include('header', ['pageTitle' => 5])

    <form action="{{ url('custom-auth-step-5') }}" method="POST">
        @csrf
        <main>
            <input type="hidden" name="formData" value="{{ json_encode($formData) }}">
            <section>
                <div class="container text-center">

                    <label class="form-label" style="font-size: 20px; font-weight: bold; color: #22dba8;">
                        How many years of experience do you have in the care/social sector?</label>
                    <div class="mb-4" style="">

                        <!-- Question 1 -->
                        <div class="option-wrapper mx-auto"
                            style="display: flex; padding-bottom: 0px; margin-bottom: 0px;width: 52%;">
                            <!-- None -->
                            <div style="flex: 1;">
                                <input type="radio" class="form-check-input" id="none_experience"
                                    name="How_many_years_of_experience_do_you_have_in_the_care_social_sector" value="None">
                                <label
                                    style=" width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                                    class="form-check-label option option-26" for="none_experience">
                                    <div class="circle"></div>
                                    <span>None</span>
                                </label>
                            </div>

                            <!-- 0-6 Months -->
                            <div style="flex: 1;">
                                <input type="radio" class="form-check-input" id="months_0_6_experience"
                                    name="How_many_years_of_experience_do_you_have_in_the_care_social_sector" value="0-6 Months">
                                <label
                                    style=" width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                                    class="form-check-label option option-27" for="months_0_6_experience">
                                    <div class="circle"></div>
                                    <span>0-6 Months</span>
                                </label>
                            </div>

                            <!-- 6-12 Months (Corrected) -->
                            <div style="flex: 1;">
                                <input type="radio" class="form-check-input" id="year_0_6_experience"
                                    name="How_many_years_of_experience_do_you_have_in_the_care_social_sector" value="6-12 Months">
                                <label
                                    style=" width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                                    class="form-check-label option option-28" for="year_0_6_experience">
                                    <div class="circle"></div>
                                    <span>6-12 Months</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 2: Years of Experience -->
                        <div class="option-wrapper mx-auto"
                            style="display: flex; border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;width: 52%;">
                            <!-- 1-3 years -->
                            <div style="flex: 1;">
                                <input type="radio" class="form-check-input" id="years_1_3_experience"
                                    name="How_many_years_of_experience_do_you_have_in_the_care_social_sector" value="1-3 years">
                                <label
                                    style=" width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                                    class="form-check-label option option-28" for="years_1_3_experience">
                                    <div class="circle"></div>
                                    <span>1-3 years</span>
                                </label>
                            </div>

                            <!-- 3-5 years -->
                            <div style="flex: 1;">
                                <input type="radio" class="form-check-input" id="years_3_5_experience"
                                    name="How_many_years_of_experience_do_you_have_in_the_care_social_sector" value="3-5 years">
                                <label
                                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                                    class="form-check-label option option-29" for="years_3_5_experience">
                                    <div class="circle"></div>
                                    <span>3-5 years</span>
                                </label>
                            </div>

                            <!-- 5-10 years -->
                            <div style="flex: 1;">
                                <input type="radio" class="form-check-input" id="years_5_10_experience"
                                    name="How_many_years_of_experience_do_you_have_in_the_care_social_sector" value="5-10 years">
                                <label
                                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                                    class="form-check-label option option-30" for="years_5_10_experience">
                                    <div class="circle"></div>
                                    <span>5-10 years</span>
                                </label>
                            </div>

                            <!-- Over 10 years -->
                            <div style="flex: 1;">
                                <input type="radio" class="form-check-input" id="years_over_10_experience"
                                    name="How_many_years_of_experience_do_you_have_in_the_care_social_sector" value="Over 10 years">
                                <label
                                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                                    class="form-check-label option option-31" for="years_over_10_experience">
                                    <div class="circle"></div>
                                    <span>Over 10 years</span>
                                </label>
                            </div>

                        </div>



                    </div>
                </div>


                <div class="container text-center">

                    <label class="form-label" style="font-size: 20px; font-weight: bold; color: #22dba8;">
                        What type of care work are you looking for? (you can select multiple options)</label>
                    <div class="mb-4" style="">

                        <!-- Question 1 -->
                        <div class="option-wrapper mx-auto"
                            style="display: flex; padding-bottom: 0px; margin-bottom: 0px;width: 52%;">
                            <!-- None -->
                            <div style="display: flex; align-items: center; flex: 1;">
                                <label
                                    style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                    <input type="checkbox" class="form-check-input" id="night_shift"
                                        name="What_type_of_care_work_are_you_looking_for[]" value="night_shift">
                                    <div class="circle" style="margin-right: 5px;"></div>
                                    <span class="mt-2" style="color: #22dba8">Night Shift</span>
                                </label>
                            </div>

                            <!-- Day Shift -->
                            <div style="display: flex; align-items: center; flex: 1;">
                                <label
                                    style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                    <input type="checkbox" class="form-check-input" id="day_shift"
                                        name="What_type_of_care_work_are_you_looking_for[]" value="day_shift">
                                    <div class="circle" style="margin-right: 5px;"></div>
                                    <span class="mt-2" style="color: #22dba8">Day Shift</span>
                                </label>
                            </div>

                            <!-- Live-in Care (Any Time) -->
                            <div style="display: flex; align-items: center; flex: 1;">
                                <label
                                    style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                    <input type="checkbox" class="form-check-input" id="live_in_any_time"
                                        name="What_type_of_care_work_are_you_looking_for[]" value="live_in_any_time">
                                    <div class="circle" style="margin-right: 5px;"></div>
                                    <span class="mt-2" style="color: #22dba8;font-size:14px;">Live-in Care (Any Time)</span>
                                </label>
                            </div>
                        </div>
                        <div class="option-wrapper mx-auto"
                        style="display: flex; padding-bottom: 0px; margin-bottom: 0px;width: 52%;">
                        <!-- None -->
                        <div style="display: flex; align-items: center; flex: 1;">
                            <label
                                style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                <input type="checkbox" class="form-check-input" id="live_in_weekend_only"
                                    name="What_type_of_care_work_are_you_looking_for[]" value="Live-in Care (Weekends only)">
                                <div class="circle" style="margin-right: 5px;"></div>
                                <span class="mt-2" style="color: #22dba8;font-size:13px;">Live-in Care (Weekends)</span>
                            </label>
                        </div>

                        <!-- Day Shift -->
                        <div style="display: flex; align-items: center; flex: 1;">
                            <label
                                style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                <input type="checkbox" class="form-check-input" id="live_in_occasional_only"
                                    name="What_type_of_care_work_are_you_looking_for[]" value="Live-in Care (Occasional only)">
                                <div class="circle" style="margin-right: 5px;"></div>
                                <span class="mt-2" style="color: #22dba8;font-size:13px;">Live-in Care (Occasional)</span>
                            </label>
                        </div>

                        <!-- Live-in Care (Any Time) -->
                        <div style="display: flex; align-items: center; flex: 1;">
                            <label
                                style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                <input type="checkbox" class="form-check-input" id="None"
                                    name="What_type_of_care_work_are_you_looking_for[]" value="None">
                                <div class="circle" style="margin-right: 5px;"></div>
                                <span class="mt-2" style="color: #22dba8;font-size:14px;">None</span>
                            </label>
                        </div>
                    </div>


                        </div>




                    </div>
                </div>


                <div class="container text-center">

                    <label class="form-label" style="font-size: 20px; font-weight: bold; color: #22dba8;">
                        What type of care jobs have you done? (you can select multiple options)</label>
                    <div class="mb-4" style="">

                        <!-- Question 1 -->
                        <div class="option-wrapper mx-auto"
                            style="display: flex; padding-bottom: 0px; margin-bottom: 0px;width: 52%;">
                            <!-- None -->
                            <div style="display: flex; align-items: center; flex: 1;">
                                <label
                                    style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                    <input type="checkbox" class="form-check-input" id="Residential_Care_Home"
                                        name="What_type_of_care_jobs_have_you_done[]" value="Residential Care Home">
                                    <div class="circle" style="margin-right: 5px;"></div>
                                    <span class="mt-2" style="color: #22dba8;font-size:13px;">Residential Care Home</span>
                                </label>
                            </div>

                            <!-- Day Shift -->
                            <div style="display: flex; align-items: center; flex: 1;">
                                <label
                                    style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                    <input type="checkbox" class="form-check-input" id="nursing_home"
                                        name="What_type_of_care_jobs_have_you_done[]" value="Nursing Home">
                                    <div class="circle" style="margin-right: 5px;"></div>
                                    <span class="mt-2" style="color: #22dba8">Nursing Home</span>
                                </label>
                            </div>

                            <!-- Live-in Care (Any Time) -->
                            <div style="display: flex; align-items: center; flex: 1;">
                                <label
                                    style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                    <input type="checkbox" class="form-check-input" id="Home_care_agency"
                                        name="What_type_of_care_jobs_have_you_done[]" value="Home care agency">
                                    <div class="circle" style="margin-right: 5px;"></div>
                                    <span class="mt-2" style="color: #22dba8;font-size:14px;">Home care agency</span>
                                </label>
                            </div>
                        </div>
                        <div class="option-wrapper mx-auto"
                        style="display: flex; padding-bottom: 0px; margin-bottom: 0px;width: 52%;">
                        <!-- None -->
                        <div style="display: flex; align-items: center; flex: 1;">
                            <label
                                style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                <input type="checkbox" class="form-check-input" id="private_carer"
                                    name="What_type_of_care_jobs_have_you_done[]" value="private carer">
                                <div class="circle" style="margin-right: 5px;"></div>
                                <span class="mt-2" style="color: #22dba8;font-size:13px;">Private Carer</span>
                            </label>
                        </div>

                        <!-- Day Shift -->
                        <div style="display: flex; align-items: center; flex: 1;">
                            <label
                                style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                <input type="checkbox" class="form-check-input" id="live_inCare_job"
                                    name="What_type_of_care_jobs_have_you_done[]" value="Live-in Care job">
                                <div class="circle" style="margin-right: 5px;"></div>
                                <span class="mt-2" style="color: #22dba8;font-size:13px;">Live-in Care</span>
                            </label>
                        </div>

                        <!-- Live-in Care (Any Time) -->
                        <div style="display: flex; align-items: center; flex: 1;">
                            <label
                                style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                <input type="checkbox" class="form-check-input" id="unpaid_carer"
                                    name="What_type_of_care_jobs_have_you_done[]" value="unpaid carer">
                                <div class="circle" style="margin-right: 5px;"></div>
                                <span class="mt-2" style="color: #22dba8;font-size:14px;">Unpaid carer</span>
                            </label>
                        </div>
                    </div>

                     <div class="option-wrapper mx-auto"
                        style="display: flex; padding-bottom: 0px; margin-bottom: 0px;width: 52%;">
                        <!-- None -->
                        <div style="display: flex; align-items: center; flex: 1;">
                            <label
                                style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                <input type="checkbox" class="form-check-input" id="hospital_support"
                                    name="What_type_of_care_jobs_have_you_done[]" value="Hospital support worker">
                                <div class="circle" style="margin-right: 5px;"></div>
                                <span class="mt-2" style="color: #22dba8;font-size:13px;">Hospital support worker</span>
                            </label>
                        </div>

                        <!-- Day Shift -->
                        <div style="display: flex; align-items: center; flex: 1;">
                            <label
                                style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                <input type="checkbox" class="form-check-input" id="Assistant_Living"
                                    name="What_type_of_care_jobs_have_you_done[]" value="Assistant Living">
                                <div class="circle" style="margin-right: 5px;"></div>
                                <span class="mt-2" style="color: #22dba8;font-size:13px;">Assistant Living</span>
                            </label>
                        </div>

                        <!-- Live-in Care (Any Time) -->
                        <div style="display: flex; align-items: center; flex: 1;">
                            <label
                                style="display: flex; align-items: center; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 40px; width: 200px;">
                                <input type="checkbox" class="form-check-input" id="Other"
                                    name="What_type_of_care_jobs_have_you_done[]" value="Other">
                                <div class="circle" style="margin-right: 5px;"></div>
                                <span class="mt-2" style="color: #22dba8;font-size:14px;">Other</span>
                            </label>
                        </div>
                    </div>


                        </div>




                    </div>
                </div>

                <div class="container" style="text-align: center;">
                    <label class="form-label" style="font-size: 20px; font-weight: bold; color: #22dba8;">
                        Do you hold a full, current driving licence?
                    </label>
                    <div class="mb-4" style="display: flex; justify-content: center;">
                        <!-- Yes -->
                        <div style="margin-bottom: 15px; width: 200px;">
                            <label style="display: flex; flex-direction: column; align-items: center; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 80px; cursor: pointer;">
                                <input type="radio" class="form-check-input" id="yes_license" name="driving_license" value="Yes">
                                <div class="circle" style="margin-right: 5px; width: 20px; height: 20px; border-radius: 50%; background-color: #22dba8;"></div>
                                <span class="mt-2" style="color: #22dba8">Yes</span>
                            </label>
                        </div>

                        <!-- No -->
                        <div style="margin-bottom: 15px; width: 200px;">
                            <label style="display: flex; flex-direction: column; align-items: center; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 80px; cursor: pointer;">
                                <input type="radio" class="form-check-input" id="no_license" name="driving_license" value="No">
                                <div class="circle" style="margin-right: 5px; width: 20px; height: 20px; border-radius: 50%; background-color: #22dba8;"></div>
                                <span class="mt-2" style="color: #22dba8">No</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="container" style="text-align: center;">
                    <label class="form-label" style="font-size: 20px; font-weight: bold; color: #22dba8;">
                        Do you have access to a car or alternative reliable transport?
                    </label>
                    <div class="mb-4" style="display: flex; justify-content: center;">
                        <!-- Yes -->
                        <div style="margin-bottom: 15px; width: 200px;">
                            <label style="display: flex; flex-direction: column; align-items: center; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 80px; cursor: pointer;">
                                <input type="radio" class="form-check-input" id="yes_transport" name="transport" value="Yes">
                                <div class="circle" style="margin-right: 5px; width: 20px; height: 20px; border-radius: 50%; background-color: #22dba8;"></div>
                                <span class="mt-2" style="color: #22dba8">Yes</span>
                            </label>
                        </div>

                        <!-- No -->
                        <div style="margin-bottom: 15px; width: 200px;">
                            <label style="display: flex; flex-direction: column; align-items: center; border: 1px solid #22dba8; border-radius: 4px; resize: vertical; padding: 10px; height: 80px; cursor: pointer;">
                                <input type="radio" class="form-check-input" id="no_transport" name="transport" value="No">
                                <div class="circle" style="margin-right: 5px; width: 20px; height: 20px; border-radius: 50%; background-color: #22dba8;"></div>
                                <span class="mt-2" style="color: #22dba8">No</span>
                            </label>
                        </div>
                    </div>
                </div>




                <div class="container" style="max-width: 600px; margin: 20px auto; font-family: 'Arial', sans-serif;">
                    <br>
                    <br>
                    <div class="row justify-content-between">
                        <!-- Go Back button -->
                        {{-- <div class="col col-md-5">
                            <a href="{{ url('step-three') }}" class="btn btn-success">Go Back</a>
                        </div> --}}
                        <div class="col col-md-5">
                            <a href="#" class="btn btn-success" onclick="goBack()">Go Back</a>
                        </div>

                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>

                        <!-- Proceed to Next Step button -->
                        <div class="col col-md-5">
                            <button type="submit" style="width: 100%;" class="btn btn-primary">Proceed to Next
                                Step</button>
                        </div>
                    </div>

                </div>



            </section>
        </main>
    </form>

    <!-- Add some space from the bottom of the screen -->
    <div style="height: 50px;"></div>
    <script>
        $(document).ready(function () {
            // Function to check if at least one radio button and one checkbox are checked
            function checkInputs() {
                var radioChecked = $('input[type=radio]:checked').length > 0;
                var checkboxChecked = $('input[type=checkbox]:checked').length > 0;

                // Enable or disable the button based on the result
                $('button.btn-primary').prop('disabled', !(radioChecked && checkboxChecked));
            }

            // Add event listeners to the radio buttons and checkboxes
            $('input[type=radio], input[type=checkbox]').on('change', function () {
                checkInputs();
            });

            // Call the function initially to set the initial state of the button
            checkInputs();
        });
    </script>



</body>

</html>

