<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            background-color: #65658F;
            background-image: url('https://carestaffservices.com/wp-content/uploads/2023/07/New-Logo.png');
            background-repeat: no-repeat;
            background-size: 110%;
            background-position: 71% 68%;
            color: whitesmoke;
            margin: 0;
            font-family: sans-serif;
        }

        .container {
            display: block;
            margin: 10% auto;
            width: 30%;
            max-width: 80vh;
            height: 50%;
            max-height: 50%;
            border: solid 2px #120A19;
            background-color: rgba(178, 129, 223, 0.7);
            box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
            border-radius: 10px;
            padding: 20px; /* Add padding for better spacing */
        }

        h1 {
            font-size: 10vh;
            margin: 0 auto 4%;
            display: flex;
            justify-content: center;
        }

        hr {
            width: 60%;
            border: 1px solid #120A19;
        }

        label {
            display: block;
            margin: auto;
            padding: 2vh;
        }
        input[type="name"],
        input[type="email"],
        input[type="password"] {
            display: block;
            margin: 2% auto;
            width: 85%;
            height: 4vh;
            max-height: 30px;
            border-radius: 5px;
            border: solid 2px #120A19;
            background-color: #DBD6DF;
        }

        button[type="submit"] {
            display: block;
            margin: 4% auto;
            width: 30%;
            height: 4vh;
            background-color: #120A19;
            color: whitesmoke;
            border-radius: 10px;
            cursor: pointer;
        }

        button:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="container" style="zoon:0.8;">
        <h1>Register</h1>
        <hr>
        <form method="POST" action="{{ url('register-user') }}">
            @csrf
            <label for="name">
                <input type="name" name="name" id="name" placeholder="name" required />
            </label>
            <label for="email">
                <input type="email" name="email" id="email" placeholder="Email" required />
            </label>
            <label for="password">
                <input type="password" name="password" id="password" placeholder="Password" required />
            </label>
            <label for="confirm_password">
                <input type="password" name="password_confirmation" id="confirm_password" placeholder="Confirm Password" required />
            </label>
            <label for="submit">
                <button type="submit" id="submit">Register</button>
            </label>
        </form>
    </div>
</body>


</html>
