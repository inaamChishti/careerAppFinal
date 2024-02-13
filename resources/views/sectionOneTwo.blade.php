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
</head>

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
            color: #fff;
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
        overflow: hidden;
    }

    form {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        transition: transform 0.5s;
    }

    section {
        opacity: 0;
        transform: translateX(100%);
        transition: opacity 0.5s, transform 0.5s;
        width: 100%;
    }

    section.active {
        opacity: 1;
        transform: translateX(0%);
    }

    h2 {
        font-family: 'Merriweather', serif;
        color: #333;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        color: #333;
        display: block;
        margin-bottom: 5px;
        text-align: left;
    }

    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #22dba8;
        border-radius: 4px;
        resize: vertical;
    }

    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    }

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        width: 70%;
        min-width: 300px;
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

    /* Mark input boxes that gets an error on validation: */
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

    .option-wrapper {
        margin-bottom: 10px;
    }

    .option-wrapper input[type="radio"] {
        display: none;
    }

    .option-wrapper .option {
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        border: 2px solid lightgrey;
        transition: all 0.3s ease;
    }

    .option-wrapper .option .dot {
        height: 20px;
        width: 20px;
        background: #d9d9d9;
        border-radius: 50%;
        margin-right: 10px;
    }

    .option-wrapper .option span {
        font-size: 16px;
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

    /* Your existing styles here */

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
</style>

<body>
    @include('header')

    <form id="regForm" action="/action_page.php">
        <h1>Sections:</h1>
        <!-- One "tab" for each step in the form: -->

        {{-- tab 1 --}}
        <div class="tab">
            <label class="form-label" style="font-size: 20px; font-weight: bold; color: #22dba8;">Section 1 – Performance Question</label>

            <div style="margin-bottom: 20px;" class="mb-3">
                <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;" for="teamwork">1.
                    What is your understanding of teamwork?</label>
                <textarea
                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                    class="form-control" id="teamwork" name="teamwork" rows="3"></textarea>
            </div>

            <div style="margin-bottom: 20px;" class="mb-3">
                <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;" for="personalCare">2.
                    What is your understanding and experience of personal care?</label>
                <textarea
                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                    class="form-control" id="personalCare" name="personalCare" rows="3"></textarea>
            </div>

            <div style="margin-bottom: 20px;" class="mb-3">
                <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;" for="serviceNeeds">3.
                    What do you do to find out your service user's needs and preferences?</label>
                <textarea
                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                    class="form-control" id="serviceNeeds" name="serviceNeeds" rows="3"></textarea>
            </div>


            <div style="margin-bottom: 20px;" class="mb-3">
                <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;"
                    for="serviceNeeds">4.How would you. Maintain a good relationship. Woth those you will be providing
                    care to?</label>
                <textarea
                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                    class="form-control" id="serviceNeeds" name="serviceNeeds" rows="3"></textarea>
            </div>

            <div style="margin-bottom: 20px;" class="mb-3">
                <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;"
                    for="serviceNeeds">5.What action would you take if you were unable to handle your. Allocation
                    workload?</label>
                <textarea
                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                    class="form-control" id="serviceNeeds" name="serviceNeeds" rows="3"></textarea>
            </div>

            <div style="margin-bottom: 20px;" class="mb-3">
                <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;"
                    for="serviceNeeds">6.What would you do on arrival to a service user and found them unwell?</label>
                <textarea
                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                    class="form-control" id="serviceNeeds" name="serviceNeeds" rows="3"></textarea>
            </div>

            <div style="margin-bottom: 20px;" class="mb-3">
                <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;"
                    for="serviceNeeds">7.What is your understand of safeguarding?</label>
                <textarea
                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                    class="form-control" id="serviceNeeds" name="serviceNeeds" rows="3"></textarea>
            </div>

            <div style="margin-bottom: 20px;" class="mb-3">
                <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;"
                    for="serviceNeeds">8.What would you do if you reaised concerns to your line manager about the
                    welfare of a service user and they did nothing?</label>
                <textarea
                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                    class="form-control" id="serviceNeeds" name="serviceNeeds" rows="3"></textarea>
            </div>
            <div style="margin-bottom: 20px;" class="mb-3">
                <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;"
                    for="serviceNeeds">9.When is it appropriate to disclose information that has been given to you in
                    confidence by your service user?</label>
                <textarea
                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                    class="form-control" id="serviceNeeds" name="serviceNeeds" rows="3"></textarea>
            </div>

            <div style="margin-bottom: 20px;" class="mb-3">
                <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;"
                    for="serviceNeeds">10.Please provide 3 exxamples of actions that would breach professional
                    boundaries between you and your service user</label>
                <textarea
                    style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"
                    class="form-control" id="serviceNeeds" name="serviceNeeds" rows="3"></textarea>
            </div>
        </div>



        {{-- tab1 close --}}




        {{-- tab2 start --}}
        <div class="tab">
            <label class="form-label" style="font-size: 20px; font-weight: bold; color: #22dba8;">Section 2 – Multiple Choice Questions</label>

            <div class="mb-4">
                <label for="question1" class="form-label">Question 1: If there was no reply from the Service User’s
                    home when you arrived, What would be the first thing you would do?</label>

                <div class="option-wrapper" >
                    <input type="radio"  class="form-check-input" id="move_on" name="question1" value="move_on">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-1" for="move_on">
                        <div class="dot"></div>
                        <span>Move straight on to your next Service User</span>
                    </label>
                </div>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="knock_neighbor" name="question1"
                        value="knock_neighbor">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-2" for="knock_neighbor">
                        <div class="dot"></div>
                        <span>Knock on the neighbour’s door for any information</span>
                    </label>
                </div>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="call_police" name="question1"
                        value="call_police">
                    <label   style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-3" for="call_police">
                        <div class="dot"></div>
                        <span>Call the police</span>
                    </label>
                </div>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="call_office" name="question1"
                        value="call_office">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-4" for="call_office">
                        <div class="dot"></div>
                        <span>Call the office</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="question2" class="form-label">Question 2: If a service user says that everything is done
                    five minutes after you arrived ask you to leave what would you do?</label>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="leave_immediately" name="question2"
                        value="leave_immediately">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-5" for="leave_immediately">
                        <div class="dot"></div>
                        <span>Leave immediately and call the office</span>
                    </label>
                </div>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="suggest_tasks" name="question2"
                        value="suggest_tasks">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-6" for="suggest_tasks">
                        <div class="dot"></div>
                        <span>Suggest some other tasks you might do but leave if they insist and then call the
                            office</span>
                    </label>
                </div>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="insist_staying" name="question2"
                        value="insist_staying">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-7" for="insist_staying">
                        <div class="dot"></div>
                        <span>Insist on staying your full length of time whatever the Service User says</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="question3" class="form-label">Question 3: What would you take if a Service User falls
                    whilst you are supporting with their care and support?</label>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="get_them_up" name="question3"
                        value="get_them_up">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-8" for="get_them_up">
                        <div class="dot"></div>
                        <span>Try and get them up as soon as possible</span>
                    </label>
                </div>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="call_ambulance" name="question3"
                        value="call_ambulance">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-9" for="call_ambulance">
                        <div class="dot"></div>
                        <span>Call an ambulance</span>
                    </label>
                </div>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="call_office_incident" name="question3"
                        value="call_office_incident">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-10" for="call_office_incident">
                        <div class="dot"></div>
                        <span>Call the office and inform them of the incident</span>
                    </label>
                </div>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="make_comfortable" name="question3"
                        value="make_comfortable">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-11" for="make_comfortable">
                        <div class="dot"></div>
                        <span>Make the service user as comfortable as possible on the floor without moving them</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="question4" class="form-label">Question 4: A service user complains that another care
                    worker is heavy-handed / rough with them. What would you do?</label>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="inform_office" name="question4"
                        value="inform_office">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-12" for="inform_office">
                        <div class="dot"></div>
                        <span>Inform the office of what the Service User said</span>
                    </label>
                </div>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="check_later" name="question4"
                        value="check_later">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-13" for="check_later">
                        <div class="dot"></div>
                        <span>Come back to the Service User’s house later to check on the other care worker</span>
                    </label>
                </div>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="leave_note" name="question4"
                        value="leave_note">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-14" for="leave_note">
                        <div class="dot"></div>
                        <span>Leave a note telling the care worker to improve care and support provided</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="question5" class="form-label">Question 5: If a Service User confides in you that a
                    precious item or a sum of money has gone missing. What would you do?</label>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="reassure_service_user" name="question5"
                        value="reassure_service_user">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-15" for="reassure_service_user">
                        <div class="dot"></div>
                        <span>Reassure the service user during your visit; do nothing further</span>
                    </label>
                </div>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="contact_police" name="question5"
                        value="contact_police">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-16" for="contact_police">
                        <div class="dot"></div>
                        <span>Contact the police</span>
                    </label>
                </div>

                <div class="option-wrapper">
                    <input type="radio" class="form-check-input" id="contact_office_report" name="question5"
                        value="contact_office_report">
                    <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-17" for="contact_office_report">
                        <div class="dot"></div>
                        <span>Contact the office to report the incident</span>
                    </label>
                </div>

                <!-- Question 6 -->
                <div class="mb-4">
                    <label for="question6" class="form-label">Question 6: A service user tells you that they usually
                        take two sleeping tablets but there is only one tablet in the dispenser and nothing written
                        down. What do you do?</label>

                    <div class="option-wrapper">
                        <input type="radio" class="form-check-input" id="give_two_pills" name="question6"
                            value="give_two_pills">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-18" for="give_two_pills">
                            <div class="dot"></div>
                            <span>Give the two pills</span>
                        </label>
                    </div>

                    <div class="option-wrapper">
                        <input type="radio" class="form-check-input" id="phone_ambulance" name="question6"
                            value="phone_ambulance">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;"  class="form-check-label option option-20" for="phone_ambulance">
                            <div class="dot"></div>
                            <span>Phone an ambulance</span>
                        </label>
                    </div>

                    <div class="option-wrapper">
                        <input type="radio" class="form-check-input" id="give_one_pill_notify_office"
                            name="question6" value="give_one_pill_notify_office">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-21" for="give_one_pill_notify_office">
                            <div class="dot"></div>
                            <span>Give one pill and notify the office</span>
                        </label>
                    </div>

                    <div class="option-wrapper">
                        <input type="radio" class="form-check-input" id="contact_office_for_advice"
                            name="question6" value="contact_office_for_advice">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-22" for="contact_office_for_advice">
                            <div class="dot"></div>
                            <span>Contact the office for advice</span>
                        </label>
                    </div>
                </div>

                <!-- Question 7 -->
                <div class="mb-4">
                    <label for="question7" class="form-label">Question 7: You notice that your Service User’s lunch
                        medication had not been administered. What do you do?</label>

                    <div class="option-wrapper">
                        <input type="radio" class="form-check-input" id="remove_medication_throw_toilet"
                            name="question7" value="remove_medication_throw_toilet">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-23" for="remove_medication_throw_toilet">
                            <div class="dot"></div>
                            <span>Remove the medication and throw it down the toilet</span>
                        </label>
                    </div>

                    <div class="option-wrapper">
                        <input type="radio" class="form-check-input" id="administer_lunch_medication"
                            name="question7" value="administer_lunch_medication">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-24" for="administer_lunch_medication">
                            <div class="dot"></div>
                            <span>Administer the lunch medication</span>
                        </label>
                    </div>

                    <div class="option-wrapper">
                        <input type="radio" class="form-check-input" id="report_to_office_log_findings"
                            name="question7" value="report_to_office_log_findings">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-25" for="report_to_office_log_findings">
                            <div class="dot"></div>
                            <span>Report this immediately to the office and log your findings in the daily logs</span>
                        </label>
                    </div>
                </div>

            </div>
        </div>



        {{-- tab2 end --}}

        {{-- tab3 start --}}
        <div class="tab">
            <label class="form-label" style="font-size: 20px; font-weight: bold; color: #22dba8;">Section 3: Circle the correct spellings of each word</label>
            <div class="mb-4">

                <!-- Question 1 -->
                <div class="option-wrapper"
                    style="display: flex; border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="infection_correct" name="infection"
                            value="infection_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-26" for="infection_correct">
                            <div class="circle"></div>
                            <span>Infection</span>
                        </label>
                    </div>

                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="inffectin_correct" name="infection"
                            value="inffectin_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-27" for="inffectin_correct">
                            <div class="circle"></div>
                            <span>Inffectin</span>
                        </label>
                    </div>

                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="innfection_correct" name="infection"
                            value="innfection_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-28" for="innfection_correct">
                            <div class="circle"></div>
                            <span>Innfection</span>
                        </label>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="option-wrapper"
                    style="display: flex; border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="medical_correct" name="medical"
                            value="medical_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-29" for="medical_correct">
                            <div class="circle"></div>
                            <span>Medical</span>
                        </label>
                    </div>

                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="medecal_correct" name="medical"
                            value="medecal_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-30" for="medecal_correct">
                            <div class="circle"></div>
                            <span>Medecal</span>
                        </label>
                    </div>

                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="medicall_correct" name="medical"
                            value="medicall_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-31" for="medicall_correct">
                            <div class="circle"></div>
                            <span>Medicall</span>
                        </label>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="option-wrapper"
                    style="display: flex; border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="hygiene_correct" name="hygiene"
                            value="hygiene_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-32" for="hygiene_correct">
                            <div class="circle"></div>
                            <span>Hygiene</span>
                        </label>
                    </div>

                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="hygeine_correct" name="hygiene"
                            value="hygeine_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-33" for="hygeine_correct">
                            <div class="circle"></div>
                            <span>Hygeine</span>
                        </label>
                    </div>

                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="higene_correct" name="hygiene"
                            value="higene_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-34" for="higene_correct">
                            <div class="circle"></div>
                            <span>Higene</span>
                        </label>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="option-wrapper"
                    style="display: flex; border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="disabilities_correct" name="disabilities"
                            value="disabilities_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-35" for="disabilities_correct">
                            <div class="circle"></div>
                            <span>Disabilities</span>
                        </label>
                    </div>

                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="disabilites_correct" name="disabilities"
                            value="disabilites_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-36" for="disabilites_correct">
                            <div class="circle"></div>
                            <span>Disabilites</span>
                        </label>
                    </div>

                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="disabilitis_correct" name="disabilities"
                            value="disabilitis_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-37" for="disabilitis_correct">
                            <div class="circle"></div>
                            <span>Disabilitis</span>
                        </label>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="option-wrapper"
                    style="display: flex; border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <div style="flex: 1;">
                        <input  type="radio" class="form-check-input" id="confidentiality_correct"
                            name="confidentiality" value="confidentiality_correct">
                        <label  style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-38" for="confidentiality_correct">
                            <div class="circle"></div>
                            <span>Confidentiality</span>
                        </label>
                    </div>

                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="confedentiality_correct"
                            name="confidentiality" value="confedentiality_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-39" for="confedentiality_correct">
                            <div class="circle"></div>
                            <span>Confedentiality</span>
                        </label>
                    </div>

                    <div style="flex: 1;">
                        <input type="radio" class="form-check-input" id="confidentiallity_correct"
                            name="confidentiality" value="confidentiallity_correct">
                        <label style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" class="form-check-label option option-40" for="confidentiallity_correct">
                            <div class="circle"></div>
                            <span>Confidentiallity</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        {{-- tab3 end --}}


        {{-- tab4 start --}}
        <div class="tab">
            <label class="form-label" style="font-size: 20px; font-weight: bold; color: #22dba8;">Section 4 - Numeracy</label>
            <div class="mb-4">


                <!-- Question 1 -->
                <div class="numeracy-question" style="border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <label for="question1">When you start work the mileage display on your car shows 70443 miles. When you finish work it shows 70479 miles. How far have you travelled?</label>
                    <textarea style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" id="question1" class="form-control"></textarea>
                </div>

                <!-- Question 2 -->
                <div class="numeracy-question" style="border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <label for="question2">Mr. Phillips gives you a £20 note to buy some shopping. You spend £7.32. How much change should he have?</label>
                    <textarea style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" id="question2" class="form-control"></textarea>
                </div>

                <!-- Question 3 -->
                <div class="numeracy-question" style="border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <label for="question3">Mrs. Smith gives you money to go to the shop to buy a bottle of milk and load of bread. She gives you a £1 coin, a 50p, two 20p coins and 10p coin. The shopping comes to £1.86. How much change do you give Mrs. Smith?</label>
                    <textarea style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" id="question3" class="form-control"></textarea>
                </div>

                <!-- Question 4 -->
                <div class="numeracy-question" style="border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <label for="question4">On your rota it states that you are to visit Mrs. Austin at 09.55. The visit lasts 45 minutes. What time does Mrs. Austin’s visit finish?</label>
                    <textarea style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" id="question4" class="form-control"></textarea>
                </div>

                <!-- Question 5 -->
                <div class="numeracy-question" style="border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <label for="question5">It takes 12 minutes to walk to Mr. Cope’s house to visit him for his care visit. His visit starts at 12.05. What time should you begin your journey to Mr. Cope’s house?</label>
                    <textarea style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" id="question5" class="form-control"></textarea>
                </div>

                <!-- Question 6 -->
                <div class="numeracy-question" style="border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <label for="question6">If Beryl requires 5 tablets a day, how many should she receive in 10 days?</label>
                    <textarea style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" id="question6" class="form-control"></textarea>
                </div>

                <!-- Question 7 -->
                <div class="numeracy-question" style="border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <label for="question7">Write this number in figures – one hundred and twenty-seven thousand</label>
                    <textarea style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" id="question7" class="form-control"></textarea>
                </div>

                <!-- Question 8 -->
                <div class="numeracy-question" style="border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <label for="question8">If the time is 3pm in 12-hour clock, what would it be in 24-hour clock?</label>
                    <textarea style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" id="question8" class="form-control"></textarea>
                </div>

                <!-- Question 9 -->
                <div class="numeracy-question" style="border-bottom: 1px solid #22dba8; padding-bottom: 10px; margin-bottom: 10px;">
                    <label for="question9">If a medication record sheet states that there are 7 tablets to be taken in the morning, 2 tablets at lunchtime, and 3 tablets in the evening, how many tablets should there be in the AM section of a dossett box?</label>
                    <textarea style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #22dba8; border-radius: 4px; resize: vertical;" id="question9" class="form-control"></textarea>
                </div>
            </div>
        </div>
        {{-- tab4 end --}}

        {{-- tab5 start --}}
        <div class="tab">
            <div class="mb-4">
                <label class="form-label" style="font-size: 20px; font-weight: bold; color: #22dba8;">Section 5 – Literacy, Daily Log Completion</label>

                <!-- Description -->
                <p style="font-size: 16px; margin-bottom: 15px;">After each visit detailed daily record logs are completed. With the information listed below, please record how you would detail this information in the daily record log section below.</p>
                <ul style="font-size: 16px; margin-bottom: 15px;">
                    <li>You are visiting Mrs Smith</li>
                    <li>How did you gain entry i.e., was there a key safe, did Mrs Smith let you in</li>
                    <li>Your arrival time was 07:32, and you stayed for 29 minutes</li>
                    <li>Mrs Smith has upper body strength</li>
                    <li>Washing / Showering</li>
                    <li>Dressing</li>
                    <li>Meal and fluid preparation</li>
                    <li>Empty commode</li>
                    <li>Tidy – bedroom, bathroom, and kitchen</li>
                </ul>

                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Comments</th>
                            <th>Print and Sign Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample static rows (you can replace this with dynamic content based on your backend) -->
                        @for($i = 1; $i <= 9; $i++)
                            <tr>
                                <td><input type="date" class="form-control" name="date{{$i}}" style="border: 1px solid #22dba8;"></td>
                                <td><input type="text" class="form-control" name="timeIn{{$i}}" style="border: 1px solid #22dba8;"></td>
                                <td><input type="text" class="form-control" name="timeOut{{$i}}" style="border: 1px solid #22dba8;"></td>
                                <td><input type="text" class="form-control" name="comments{{$i}}" style="border: 1px solid #22dba8;"></td>
                                <td><input type="text" class="form-control" name="printSignName{{$i}}" style="border: 1px solid #22dba8;"></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        {{-- tab5 end --}}


        {{-- tab5 start --}}
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        {{-- tab5 end --}}
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>

</body>

</html>
