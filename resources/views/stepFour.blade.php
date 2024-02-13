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

    h3 {
    font-size: 1.4em;
    margin-top: 2.1em;
    margin-bottom: 0.5em;}
label {
    font-size: 1.2em;}
:focus{
    outline: none;

}
input[type="text"]{
    height: 3.15em;
    width: 13em;
    background-position: right center;
    background-size: 1.5em;
    background-repeat: no-repeat;
    border-radius: 0.4em;
    padding: 0 1.5em;
}
input[type="text"]:valid {
    border: 2px solid #42ae4a;
    background-image:url("icons_hw_module_10/valid.png");
    padding-right: .6em;
    background-origin: content-box;

}

input[type="text"]:invalid{
    border: 2px solid #e74c6c;
    background-image:url("icons_hw_module_10/invalid.png");
    padding-right: .6em;
    background-origin: content-box;
}


input[type="checkbox"] {
    appearance: none;
    height: 26px;
    width: 48px;
    border: 2px solid #e44160;
    border-radius: 6px;

}
input[type="checkbox"]::before {
    content: '';
    display: block;
    height: 20px;
    width: 24px;
    margin: 1px 18px;
    background-color: #e44160;
    border-radius: 6px;
}
input[type="checkbox"]:hover {
    border: 2px solid #42ad4a;
}
input[type="checkbox"]:checked {
    padding: 1px 2px;
    border: 2px solid #42ad4a;
    border-radius: 6px;
}
input[type="checkbox"]:checked:hover {

    border: 2px solid #e44160;
    border-radius: 6px;

}
input[type="checkbox"]:checked::before {
    margin: 0;
    background-color: #42ad4a;
}

input[type="radio"] {
    appearance: none;
    height: 2em;
    width: 2em;
    padding: 2px;
    border: 3px solid #42ad4a;
    border-radius: 50%;;

}
input[type="radio"]:checked {
    background-color: #42ad4a;
    background-clip: content-box;
}


button {
    height: 3em;
    width: 7em;
    border: 0;
    border-radius: .5em;
    background-color: #42ad4a;
    color: white;
    font-size: medium;
}
button:hover {
    background-color: #2c7731;
}
button.danger {
    background-color: #e44160
}
button.danger:hover {
    background-color: #97293f
}
button:disabled {
    background-color: #818081;
}
button.circle {
    width: 3em;
    border-radius: 50%;
}



textarea {
    height: 10em;
    width: 40em;
}

                    * {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: sans-serif;
}


.wrapper {
display: inline-flex;
background: #fff;
height: 100px;
width: 400px;
align-items: center;
justify-content: space-evenly;
border-radius: 5px;
padding: 20px 15px;
box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.2);
}

.wrapper .option {
background: #fff;
height: 100%;
width: 100%;
display: flex;
align-items: center;
justify-content: space-evenly;
margin: 0 10px;
border-radius: 5px;
cursor: pointer;
padding: 0 10px;
border: 2px solid lightgrey;
transition: all 0.3s ease;
}

.wrapper .option .dot {
height: 20px;
width: 20px;
background: #d9d9d9;
border-radius: 50%;
position: relative;
}

.wrapper .option .dot::before {
position: absolute;
content: "";
top: 4px;
left: 4px;
width: 12px;
height: 12px;
background: #22dba8;
border-radius: 50%;
opacity: 0;
transform: scale(1.5);
transition: all 0.3s ease;
}

input[type="radio"] {
display: none;
}

#option-1:checked:checked ~ .option-1,
#option-2:checked:checked ~ .option-2 {
border-color: #22dba8;
background: #22dba8;
}

#option-1:checked:checked ~ .option-1 .dot,
#option-2:checked:checked ~ .option-2 .dot {
background: #fff;
}

#option-1:checked:checked ~ .option-1 .dot::before,
#option-2:checked:checked ~ .option-2 .dot::before {
opacity: 1;
transform: scale(1);
}

.wrapper .option span {
font-size: 20px;
color: #808080;
}

#option-1:checked:checked ~ .option-1 span,
#option-2:checked:checked ~ .option-2 span {
color: #fff;
}
</style>

<body>

    @include('header')

    <form action="{{ url('custom-auth-step-5') }}" method="GET">

        @csrf
    <main>
        <input type="hidden" name="formData" value="{{ json_encode($formData) }}">
        <section >
            <div class="container text-center" >
                <div class="container resp" style="max-width: 600px; margin: 20px auto; font-family: 'Arial', sans-serif;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #000000;"
                        for="franchise_country">Which type of Jobs you have done (you can select
                        multiple options)</label>

                    <div class="row grouped"
                        style="display: flex; flex-wrap: wrap; justify-content: flex-start; width: 130%; margin-top: 10px;">


                        <div class="col col-md-5"
                        style="box-sizing: border-box; padding: 10px; margin-right: 10px; margin-left: 0; background-color: #f0f0f04d; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);  overflow: hidden; text-overflow: ellipsis;">
                        <input class="col1" id="franchise_country-0" name="franchise_country" type="checkbox" value="eng" style="margin: 0;">
                        <label for="franchise_country-0" style="cursor: pointer;">Care Worker &nbsp;&nbsp;&nbsp;</label>
                    </div>
                        <div class="col col-md-5"
                        style="box-sizing: border-box; padding: 10px; margin-right: 10px; margin-left: 0; background-color: #f0f0f04d; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);  overflow: hidden; text-overflow: ellipsis;">
                        <input class="col1" id="franchise_country-0" name="franchise_country" type="checkbox" value="eng" style="margin: 0;">
                        <label for="franchise_country-0" style="cursor: pointer;">Marketing &nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    </div>
                    <div class="row grouped"
                        style="display: flex; flex-wrap: wrap; justify-content: flex-start; width: 130%; margin-top: 10px;">

                        <div class="col col-md-5"
                        style="box-sizing: border-box; padding: 10px; margin-right: 10px; margin-left: 0; background-color: #f0f0f04d; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);  overflow: hidden; text-overflow: ellipsis;">
                        <input class="col1" id="franchise_country-0" name="franchise_country" type="checkbox" value="eng" style="margin: 0;">
                        <label for="franchise_country-0" style="cursor: pointer;">Office Assistant &nbsp;&nbsp;&nbsp;</label>
                    </div>

                        <div class="col col-md-5"
    style="box-sizing: border-box; padding: 10px; margin-right: 10px; margin-left: 0; background-color: #f0f0f04d; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);  overflow: hidden; text-overflow: ellipsis;">
    <input class="col1" id="franchise_country-0" name="franchise_country" type="checkbox" value="eng" style="margin: 0;">
    <label for="franchise_country-0" style="cursor: pointer;">Others</label>
</div>

                    </div>
                    <div class="row grouped"
                        style="display: flex; flex-wrap: wrap; justify-content: flex-start; width: 130%; margin-top: 10px; display:none;">">

                        <div class="col col-md-5"
                            style="box-sizing: border-box; padding: 10px; margin-right: 10px; margin-left: 0; background-color: #f0f0f04d; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                            <input class="col1" id="franchise_country-0" name="franchise_country" type="checkbox"
                                value="eng" style="margin: 0; margin-left: -64%;">
                            <label for="franchise_country-0" style="cursor: pointer;">Manager</label>
                        </div>

                        <div class="col col-md-5 "
                            style="box-sizing: border-box; padding: 10px; margin-right: 10px; margin-left: 0; background-color: #f0f0f04d; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                            <input class="coll" id="franchise_country-1" name="franchise_country" type="checkbox"
                                value="nir" style="margin: 0;">
                            <label for="franchise_country-1" style="cursor: pointer; color: #333;">Kashmir</label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container text-center">
                <div class="container resp" style="max-width: 600px; margin: 20px auto; font-family: 'Arial', sans-serif;">

                    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #00000;"
                        for="franchise_country">Which type of work Shiftss you are looking for (you can select
                        multiple options)</label>

                    <div class="row grouped"
                        style="display: flex; flex-wrap: wrap; justify-content: flex-start; width: 130%; margin-top: 10px; display:none;">

                        <div class="col col-md-5"
                            style="box-sizing: border-box; padding: 10px; margin-right: 10px; margin-left: 0; background-color: #f0f0f04d; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                            <input class="col1" id="franchise_country-0" name="franchise_country" type="checkbox"
                                value="eng" style="margin: 0; margin-left: -64%;">
                            <label for="franchise_country-0" style="cursor: pointer;">Day</label>
                        </div>

                        <div class="col col-md-5 "
                            style="box-sizing: border-box; padding: 10px; margin-right: 10px; margin-left: 0; background-color: #f0f0f04d; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                            <input class="coll" id="franchise_country-1" name="franchise_country" type="checkbox"
                                value="nir" style="margin: 0;">
                            <label for="franchise_country-1" style="cursor: pointer; color: #333;">
                                Night</label>
                        </div>
                    </div>
                    <div class="row grouped"
                        style="display: flex; flex-wrap: wrap; justify-content: flex-start; width: 130%; margin-top: 10px;">

                        <div class="col col-md-5"
                            style="box-sizing: border-box; padding: 10px; margin-right: 10px; margin-left: 0; background-color: #f0f0f04d; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                            <input class="col1" id="franchise_country-0" name="franchise_country" type="checkbox"
                                value="eng" style="margin: 0; margin-left: -64%;">
                            <label for="franchise_country-0" style="cursor: pointer;">Morning</label>
                        </div>

                        <div class="col col-md-5 "
                            style="box-sizing: border-box; padding: 10px; margin-right: 10px; margin-left: 0; background-color: #f0f0f04d; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                            <input class="coll" id="franchise_country-1" name="franchise_country" type="checkbox"
                                value="nir" style="margin: 0;">
                            <label for="franchise_country-1" style="cursor: pointer; color: #333;">Afternoon</label>
                        </div>
                    </div>
                    <div class="row grouped"
                        style="display: flex; flex-wrap: wrap; justify-content: flex-start; width: 130%; margin-top: 10px;">

                        <div class="col col-md-5"
                            style="box-sizing: border-box; padding: 10px; margin-right: 10px; margin-left: 0; background-color: #f0f0f04d; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                            <input class="col1" id="franchise_country-0" name="franchise_country" type="checkbox"
                                value="eng" style="margin: 0; margin-left: -64%;">
                            <label for="franchise_country-0" style="cursor: pointer;">Evening</label>
                        </div>

                        <div class="col col-md-5 "
                            style="box-sizing: border-box; padding: 10px; margin-right: 10px; margin-left: 0; background-color: #f0f0f04d; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                            <input class="coll" id="franchise_country-1" name="franchise_country" type="checkbox"
                                value="nir" style="margin: 0;">
                            <label for="franchise_country-1" style="cursor: pointer; color: #333;">Nights</label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container " style="max-width: 600px; margin: 20px auto; font-family: 'Arial', sans-serif;">


                <h3>Do you have a driving license and own a car?</h3>
                <label>Choose:</label>

                <div class="wrapper" style="zoom: 0.5;">
                    <input type="radio" name="select" id="option-1">
                    <input type="radio" name="select" id="option-2">
                    <label for="option-1" class="option option-1">
                    <div class="dot"></div> <span>Yes</span> </label>
                    <label for="option-2" class="option option-2">
                    <div class="dot"></div> <span>No</span> </label>
                    </div>

                    <br>

                    <br>
                    <div class="row justify-content-between">
                        <div class="col  col-md-5">
                            <a href="{{url('step-three')}}" class="btn btn-success">Go Back</a>
                        </div>

                        <div class="col col-md-5">
                            <button type="submit" style="width: 100%;" class="btn btn-primary">Proceed to Next Step</button>
                        </div>
                    </div>
            </div>



        </div>

        <br>

        </section>
    </main>
    </form>

    <!-- Add some space from the bottom of the screen -->
    <div style="height: 50px;"></div>

</body>

</html>
