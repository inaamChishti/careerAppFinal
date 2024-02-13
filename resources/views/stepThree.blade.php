<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Application - Care Staff Services LTD</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,600,700i|Source+Sans+Pro:400,500,600,700" rel="stylesheet">

        <style>
            body {
                font-family: 'Montserrat', 'Arial', 'Verdana';
                margin: 0;
                padding: 0;
                background: #fff;
            }

            header {
                background-color: #f8f9fa;
                padding: 20px;
                text-align: center;
            }

            header h1 {
                margin: 0;
            }

            main {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }







            form[method="POST"] {
                display: flex;
                justify-content: space-between;
            }

            .offset-md-2 {
                display: flex;
                align-items: center;
            }

            .container.text-center {
                max-width: 600px;
            }

            .form-check {
                width: 131%;
                text-align: left;
                transition: transform 0.3s ease-in-out;
                box-shadow: 0 11px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                padding: 20px;
                background-color: #fff;
                margin-bottom: 20px;
            }

            .form-check:hover {
                transform: scale(1.05);
            }

            select.form-select,
            input.form-control {
                width: 100%;
                margin-bottom: 15px;
                padding: 15px;
                border: 1px solid #ccc;
                border-radius: 8px;
                transition: border-color 0.3s ease-in-out;
            }

            .floating-label {
                position: relative;
            }

            .floating-label label {
                position: absolute;
                top: 50%;
                left: 15px;
                padding: 0 5px;
                background-color: #fff;
                transform: translateY(-50%);
                opacity: 0.5;
                transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            }

            .floating-label input:focus,
            .floating-label input:not(:placeholder-shown) {
                border-color: #6c757d;
            }

            .floating-label input:focus + label,
            .floating-label input:not(:placeholder-shown) + label {
                transform: translateY(-100%) translateX(-50%);
                opacity: 1;
                background-color: #fff;
                z-index: 1;
            }

            /* Adjust width of questions and decrease length */
            .form-check label {
                width: 100%;
                max-width: 400px; /* Adjust the max-width according to your preference */
                display: inline-block;
                word-wrap: break-word;
            }

            .form-check select,
            .form-check input {
                width: 100%;
                max-width: 400px; /* Adjust the max-width according to your preference */
            }

            .form-check {
            width: 100%; /* Adjust the width to 100% */
            text-align: left;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 11px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
            margin-bottom: 20px;
        }

        /* Adjust the width of buttons and align them with questions */
        .col {
            width: 100%;
            text-align: left;
        }

        .btn {
            width: 100%;
            max-width: 400px; /* Adjust the max-width according to your preference */
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
}

#progressbar li {
    list-style-type: none;
    color: #679b9b;
    text-transform: uppercase;
    font-size: 12px;
    width: 33.33%;
    float: left;
    position: relative;
}

#progressbar li:before {
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

#progressbar li:after {
    content: "";
    width: 100%;
    height: 2px;
    background: #679b9b;
    position: absolute;
    left: -33.33%;
    top: 15px;
    z-index: -1;
}

#progressbar li:first-child:after {
    content: none;
}

#progressbar li.active {
    color: #ff9a76;
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #ff9a76;
    color: white;
}

#progressbar li.active:first-child {
    margin-left: 10px;
}

@media screen and (max-width: 767px) {
    #multistepsform {
        width: 100%;
    }

    #progressbar li {
        font-size: 12px;
    }

    #progressbar li:before {
        width: 20px;
        line-height: 20px;
        font-size: 12px;
    }

    #progressbar li:after {
        height: 1px;
        top: 10px;
    }

    #multistepsform section {
        margin-bottom: 30px;
    }

    section.offset-md-2 {
        margin-left: 10px;
    }
}

form#multistepsform section {
    margin-top: 20px;
}

        </style>
    </head>

<body>

    @include('header')
    <main>
        <form action="{{ url('custom-auth-step-4') }}" method="GET">
            @csrf
            <section>
                <div class="container text-center">

                    <h2 class="mb-4">Additional Questions</h2>

                    <div class="row align-items-center">
                        <div class="col">
                            <label for="visaStatus">1. What is your visa status?</label>
                        </div>

                        <div class="col">
                            <select class="form-select" id="visaStatus" name="visaStatus" required>
                                <option value="" disabled selected>Select your visa status</option>
                                <option value="student">Student</option>
                                <option value="skilledWorker">Skilled Worker</option>
                                <option value="psw">PSW (Post-Study Work)</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col">
                            <label for="What_do_you_know_about_Care_Staff_Services">2. What do you know about Care Staff Services?</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="What_do_you_know_about_Care_Staff_Services" name="What_do_you_know_about_Care_Staff_Services" required>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col">
                            <label for="Why_would_you_like_to_be_a_carer">3. Why would you like to be a carer?</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="Why_would_you_like_to_be_a_carer" name="Why_would_you_like_to_be_a_carer" required>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col">
                            <label for="What_is_your_understanding_of_personal_caring">4. What is your understanding of personal caring?</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="What_is_your_understanding_of_personal_caring" name="What_is_your_understanding_of_personal_caring" required>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col">
                            <label for="What_do_you_understand_about_safeguarding">5. What do you understand about safeguarding?</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="What_do_you_understand_about_safeguarding" name="What_do_you_understand_about_safeguarding" required>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col">
                            <label for="Why_do_you_want_to_be_a_care_worker">6. Why do you want to be a care worker?</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="Why_do_you_want_to_be_a_care_worker" name="Why_do_you_want_to_be_a_care_worker" required>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col">
                            <label for="How_did_you_hear_about_us">7. How did you hear about us?</label>
                        </div>
                        <div class="col">
                            <select class="form-select" id="How_did_you_hear_about_us" name="How_did_you_hear_about_us" required>
                                <option value="" disabled selected>Select an option</option>
                                <option value="searchEngine">Search Engine</option>
                                <option value="socialMedia">Social Media</option>
                                <option value="jobBoard">Job Board</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col">
                        <a href="{{ url('second-Step') }}" class="btn btn-success">Go Back</a>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary" id="proceedButton">Proceed to Next Step</button>
                    </div>
                </div>

            </section>
        </form>
    </main>

    <!-- Add some space from the bottom of the screen -->
    <div style="height: 50px;"></div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Add click event to the Proceed button
        $('#proceedButton').click(function () {
            // Submit the form
            $('#additionalQuestionsForm').submit();
        });
    });
</script>
</html>
