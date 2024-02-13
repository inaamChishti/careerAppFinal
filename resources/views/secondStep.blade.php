<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,600,700i|Source+Sans+Pro:400,500,600,700" rel="stylesheet">
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
                margin-left: 10px; /* Add margin to move the form to the right by 10px */
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
                left: -33.33%; /* Adjusted from -50% to -33.33% */
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
                left: -33.33%; /* Adjusted from -50% to -33.33% */
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
</style>
<body>
    @include('header')
    <main>
        <section>
            <div class="container cont2">
                <div class="row row2">
                    <div class="col">
                        <p><strong>Terms & Conditions and Privacy Policy</strong></p>
                        <p>Last updated: April 02, 2022</p>
                        <p>This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.</p>
                        <p>We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy.</p>
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" value="" id="checkbox1" onchange="toggleButton()">
                            <label class="form-check-label" for="checkbox1">
                                <p> I agree to the Terms &amp; Conditions &amp; Privacy Policy<p>
                            </label>
                        </div>
                    </div>
                    <br>
                    <form method="GET" id="nextStepForm">
                        <div class="row">
                            <div class="col">
                                <a href="{{url('step')}}" class="btn btn-success">Go Back</a>
                            </div>
                            <div class="col offset-md-4">
                               <button type="button" class="btn btn-primary" id="nextStepButton" disabled onclick="proceedToNextStep()">Proceed to Next Step</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- Add some space from the bottom of the screen -->
    <div style="height: 50px;"></div>
</body>

<script>
    function toggleButton() {
        var checkbox = document.getElementById('checkbox1');
        var nextStepButton = document.getElementById('nextStepButton');

        if (checkbox.checked) {
            nextStepButton.disabled = false;
        } else {
            nextStepButton.disabled = true;
        }
    }

    function proceedToNextStep() {
        var checkbox = document.getElementById('checkbox1');

        if (checkbox.checked) {
            window.location.href = "{{url('custom-auth-step-3')}}";
        } else {
            alert('Please check the Terms & Conditions and Privacy Policy first.');
        }
    }
</script>

</html>
