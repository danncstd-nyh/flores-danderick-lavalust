<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spider-Man | Student Profile</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #b30000, #001f5c);
            min-height: 100vh;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
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
            width: 500px;
            background: rgba(0, 0, 0, 0.88);
            padding: 30px;
            border-radius: 20px;
            border: 4px solid #e60000;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.7);
            position: relative;
            z-index: 1;
        }

        .spider {
            text-align: center;
            font-size: 55px;
        }

        h1 {
            text-align: center;
            color: #e60000;
            font-size: 32px;
            text-transform: uppercase;
            text-shadow: 2px 2px 0 white;
            margin-top: 5px;
        }

        .nav {
            text-align: center;
            margin-bottom: 25px;
        }

        .nav a {
            display: inline-block;
            text-decoration: none;
            color: white;
            background: #e60000;
            padding: 10px 18px;
            margin: 5px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .nav a:hover {
            background: #0047ab;
            transform: scale(1.05);
        }

        .info {
            background: #f5f5f5;
            color: #111;
            padding: 20px;
            border-radius: 12px;
            border-left: 8px solid #e60000;
        }

        .info p {
            margin: 8px 0;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .label {
            font-weight: bold;
            color: #0047ab;
        }

        .hobbies {
            margin-top: 10px;
            padding: 10px;
        }

        .hobbies span {
            display: inline-block;
            background: #e60000;
            color: white;
            padding: 7px 12px;
            margin: 4px;
            border-radius: 20px;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #e60000;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="spider">🕷️</div>

        <h1>Student Profile</h1>

        <div class="nav">
            <a href="<?=site_url('student');?>">Home</a>
            <a href="<?=site_url('student/profile');?>">Profile</a>
        </div>

        <div class="info">

            <p>
                <span class="label">Student ID:</span>
                <?php echo $student_id; ?>
            </p>

            <p>
                <span class="label">Name:</span>
                <?php echo $name; ?>
            </p>

            <p>
                <span class="label">Course:</span>
                <?php echo $course; ?>
            </p>

            <p>
                <span class="label">Year:</span>
                <?php echo $year; ?>
            </p>

            <p>
                <span class="label">Section:</span>
                <?php echo $section; ?>
            </p>

            <p>
                <span class="label">Email:</span>
                <?php echo $email; ?>
            </p>

            <p>
                <span class="label">Phone:</span>
                <?php echo $number; ?>
            </p>

            <p>
                <span class="label">Address:</span>
                <?php echo $address; ?>
            </p>

            <div class="hobbies">
                <span class="label">Hobbies:</span>

                <?php foreach ($hobbies as $hobby): ?>
                    <span><?php echo $hobby; ?></span>
                <?php endforeach; ?>
            </div>

        </div>

        <div class="footer">
            🕸️ With great power comes great responsibility 🕸️
        </div>

    </div>

</body>
</html>