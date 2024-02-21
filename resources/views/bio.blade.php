<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,600,700i|Source+Sans+Pro:400,500,600,700" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
    @include('header', ['pageTitle' => 3])
    <form action="{{ url('custom-auth-step-3') }}" method="GET" id="personalInfoForm">
        @csrf
        <main>
            <section>
                <div class="container text-center cont2">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="tab border border-success p-4 rounded">
                                <label class="form-label" style="font-size: 20px; font-weight: bold; color: #22dba8;">Section 1 – Personal Information</label>

                                <div style="margin-bottom: 20px;" class="mb-3">
                                    <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;" for="title">Title</label>
                                    <input style="border-color: #22dba8;" type="text" class="form-control" id="title" name="title">
                                </div>

                                <div style="margin-bottom: 20px;" class="mb-3">
                                    <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;" for="firstName">First Name</label>
                                    <input style="border-color: #22dba8;" type="text" class="form-control" id="firstName" name="firstName">
                                </div>

                                <div style="margin-bottom: 20px;" class="mb-3">
                                    <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;" for="lastName">Last Name</label>
                                    <input style="border-color: #22dba8;" type="text" class="form-control" id="lastName" name="lastName">
                                </div>

                                <div style="margin-bottom: 20px;" class="mb-3">
                                    <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;" for="preferredName">Preferred Name</label>
                                    <input style="border-color: #22dba8;" type="text" class="form-control" id="preferredName" name="preferredName">
                                </div>

                                <div style="margin-bottom: 20px;" class="mb-3">
                                    <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;" for="postcode">Postcode</label>
                                    <input style="border-color: #22dba8;" type="text" class="form-control" id="postcode" name="postcode">
                                </div>

                                <div style="margin-bottom: 20px;" class="mb-3">
                                    <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;" for="address1">Address 1</label>
                                    <input style="border-color: #22dba8;" type="text" class="form-control" id="address1" name="address1">
                                </div>

                                <div style="margin-bottom: 20px;" class="mb-3">
                                    <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;" for="address2">Address 2</label>
                                    <input style="border-color: #22dba8;" type="text" class="form-control" id="address2" name="address2">
                                </div>

                                <div style="margin-bottom: 20px;" class="mb-3">
                                    <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;" for="town">Town</label>
                                    <input style="border-color: #22dba8;" type="text" class="form-control" id="town" name="town">
                                </div>

                                <div style="margin-bottom: 20px;" class="mb-3">
                                    <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;" for="phone">Phone</label>
                                    <input style="border-color: #22dba8;" type="text" class="form-control" id="phone" name="phone">
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('custom-auth-step-2') }}" class="btn btn-success">Go Back</a>
                                    </div>
                                    <div class="col offset-md-4">
                                        <button type="submit" class="btn btn-primary" id="nextStepButton">Proceed to Next Step</button>
                                    </div>
                                </div>
                            </div>
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
          // Function to check if all fields are filled
          function checkFields() {
            var allFilled = true;

            // Loop through each input field
            $('#personalInfoForm input').each(function () {
              if ($(this).val() === '') {
                allFilled = false;
                return false; // Exit the loop if an empty field is found
              }
            });

            // Enable or disable the button based on the result
            $('#nextStepButton').prop('disabled', !allFilled);
          }

          // Add event listeners to the input fields
          $('#personalInfoForm input').on('input', function () {
            checkFields();
          });

          // Call the function initially to set the initial state of the button
          checkFields();
        });
      </script>

</body>



</html>
