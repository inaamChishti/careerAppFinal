

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
                        <p><strong>Join the Care Staff Services today</strong></p>
                        <p>Care Staff Services Ltd is one of the leading care companies in the UK, with more than 60 rated “Good” by the Care Quality Commission ('CQC').</p>
                        <p>We are looking for Carers who share our values and are passionate about delivering high-quality care. By joining Care Staff Services Ltd you can get access to the following benefits:</p>
                        <ul>
                            <li><strong>More jobs & more opportunities</strong>: apply online for the jobs that match you.</li>
                            <li><strong>Award-winning training</strong>: Get free access to our training platform and earn certificates for you to keep to develop your career as a Carer.</li>
                            <li><strong>Be rewarded</strong>: in addition to industry-leading rates of pay Home Instead’s employee assistance programme gives you access to a discount portal with money off your favourite high-street stores and a free and confidential advice service with trained counsellors, should you ever need it.</li>
                            <li><strong>Be supported</strong>: with local offices around the country there is a team close by to support both you and your client when you need it. 95% of CAREGivers say they are proud to work for Home Instead.</li>
                        </ul>
                        <p>These roles are subject to an enhanced Criminal Record Check and registration on the relevant update service. In addition, we will collect complete work history, four satisfactory references and require completion of specific training.</p>
                        <p>To start your journey please complete this enquiry form.</p>
                        <p>By providing your email address, you are agreeing to our <a href="#" target="_blank">Privacy Policy</a>.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <form method="POST" action="{{url('custom-auth-step-1')}}" onsubmit="return validateForm()">
        @csrf
        <section class="offset-md-2" style="margin-bottom: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <input autocomplete="email" id="email" name="email"  type="text" class="form-control" placeholder="Your Email">
                        <div id="emailError" style="color: red;"></div>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary" name="nextStep">Next Step</button>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <script>
        function validateForm() {
            var emailInput = document.getElementById('email').value;
            var emailError = document.getElementById('emailError');

            // Regular expression for basic email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (emailInput.trim() === '') {
                emailError.textContent = 'Please enter your email.';
                return false; // Prevent form submission
            } else if (!emailRegex.test(emailInput)) {
                emailError.textContent = 'Please enter a valid email address.';
                return false; // Prevent form submission
            } else {
                emailError.textContent = ''; // Clear the error message
            }

            return true; // Allow form submission
        }
    </script>

    <!-- Add some space from the bottom of the screen -->
    <div style="height: 50px;"></div>

</body>

</html>
