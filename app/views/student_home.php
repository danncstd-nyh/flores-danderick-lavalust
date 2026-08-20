<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spider-Man | Home</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #b30000, #001f5c);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            width: 700px;
            height: 700px;
            border: 3px solid rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            box-shadow:
                0 0 0 70px rgba(255,255,255,0.08),
                0 0 0 140px rgba(255,255,255,0.06),
                0 0 0 210px rgba(255,255,255,0.05),
                0 0 0 280px rgba(255,255,255,0.04);
        }

        .container {
            width: 600px;
            text-align: center;
            background: rgba(0, 0, 0, 0.85);
            padding: 45px;
            border-radius: 20px;
            border: 4px solid #e60000;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.7);
            position: relative;
            z-index: 1;
        }

        .spider {
            font-size: 70px;
            margin-bottom: 10px;
        }

        h1 {
            color: #e60000;
            font-size: 38px;
            text-transform: uppercase;
            text-shadow: 2px 2px 0 white;
            margin-bottom: 15px;
        }

        .welcome {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .nav {
            margin-bottom: 25px;
        }

        .nav a {
            display: inline-block;
            text-decoration: none;
            color: white;
            background: #e60000;
            padding: 12px 25px;
            margin: 5px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .nav a:hover {
            background: #0047ab;
            transform: scale(1.08);
        }

        .quote {
            color: #ddd;
            font-style: italic;
            margin-top: 25px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="spider">🕷️</div>

        <h1>Student Home Page</h1>

        <p class="welcome">
            Welcome to the Student Home Page!
        </p>

        <div class="nav">
            <a href="<?=site_url('student');?>">Home</a>
            <a href="<?=site_url('student/profile');?>">Profile</a>
        </div>

        <p class="quote">
            🕸️ "With great power comes great responsibility." 🕸️
        </p>

    </div>

</body>
</html>