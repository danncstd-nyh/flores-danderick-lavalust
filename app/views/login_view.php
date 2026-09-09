
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Spider-Man Product Manager</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            color: #fff;
            background:
                radial-gradient(circle at center, rgba(220, 0, 0, 0.25), transparent 45%),
                linear-gradient(135deg, #050505 0%, #130000 50%, #050505 100%);
            overflow: hidden;
            position: relative;
        }

        /* Spider Web Background */
        body::before {
            content: "";
            position: absolute;
            inset: -50%;
            background-image:
                repeating-radial-gradient(
                    circle at center,
                    transparent 0,
                    transparent 55px,
                    rgba(255,255,255,0.08) 56px,
                    transparent 58px
                ),
                repeating-conic-gradient(
                    from 0deg,
                    transparent 0deg,
                    transparent 14deg,
                    rgba(255,255,255,0.06) 15deg,
                    transparent 16deg
                );
            opacity: .7;
            transform: rotate(15deg);
            pointer-events: none;
        }

        /* Red glow */
        body::after {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(210, 0, 0, 0.18);
            filter: blur(100px);
            border-radius: 50%;
            pointer-events: none;
        }

        .card {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 400px;
            padding: 2.5rem 2.2rem;
            background: rgba(10, 10, 10, 0.94);
            border: 2px solid #d90000;
            border-radius: 18px;
            box-shadow:
                0 0 20px rgba(220, 0, 0, .45),
                0 15px 50px rgba(0,0,0,.8);
        }

        /* Spider logo */
        .spider-logo {
            width: 70px;
            height: 70px;
            margin: 0 auto 1.2rem;
            border-radius: 50%;
            background: #c90000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            box-shadow:
                0 0 15px rgba(255,0,0,.7),
                inset 0 0 15px rgba(0,0,0,.5);
            border: 3px solid #fff;
        }

        h1 {
            text-align: center;
            font-size: 1.8rem;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #fff;
            text-shadow: 2px 2px 0 #d00000;
            margin-bottom: .4rem;
        }

        p.subtitle {
            text-align: center;
            color: #aaa;
            font-size: .88rem;
            margin-bottom: 1.8rem;
        }

        label {
            display: block;
            font-size: .85rem;
            font-weight: 700;
            color: #ddd;
            margin-bottom: .4rem;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        input {
            width: 100%;
            padding: .75rem .9rem;
            margin-bottom: 1.1rem;
            border: 1px solid #444;
            border-radius: 8px;
            background: #171717;
            color: #fff;
            font-size: .95rem;
            transition: .25s;
        }

        input::placeholder {
            color: #777;
        }

        input:focus {
            outline: none;
            border-color: #e00000;
            box-shadow: 0 0 10px rgba(220,0,0,.35);
            background: #1d1d1d;
        }

        button {
            width: 100%;
            padding: .8rem;
            background: linear-gradient(135deg, #e00000, #9b0000);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: .95rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 5px 15px rgba(200,0,0,.3);
        }

        button:hover {
            background: linear-gradient(135deg, #ff1717, #c00000);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(220,0,0,.5);
        }

        button:active {
            transform: translateY(0);
        }

        .msg {
            padding: .75rem .9rem;
            border-radius: 8px;
            font-size: .85rem;
            margin-bottom: 1rem;
            border-left: 4px solid;
        }

        .msg.error {
            background: rgba(150,0,0,.2);
            color: #ff7777;
            border-color: #e00000;
        }

        .msg.info {
            background: rgba(30,60,100,.25);
            color: #7db7ff;
            border-color: #287cff;
        }

        .msg.success {
            background: rgba(0,120,50,.2);
            color: #72e6a0;
            border-color: #00b957;
        }

        .footer-link {
            text-align: center;
            margin-top: 1.4rem;
            font-size: .85rem;
            color: #888;
        }

        .footer-link a {
            color: #ff2424;
            text-decoration: none;
            font-weight: 700;
            transition: .2s;
        }

        .footer-link a:hover {
            color: #fff;
            text-shadow: 0 0 8px red;
        }

        .web-line {
            position: absolute;
            width: 150px;
            height: 2px;
            background: rgba(255,255,255,.12);
        }

        .web-line.left {
            left: 0;
            top: 25%;
            transform: rotate(25deg);
        }

        .web-line.right {
            right: 0;
            bottom: 25%;
            transform: rotate(25deg);
        }

        @media (max-width: 480px) {
            .card {
                padding: 2rem 1.5rem;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

<div class="web-line left"></div>
<div class="web-line right"></div>

<div class="card">

    <div class="spider-logo">🕷️</div>

    <h1>Welcome Back</h1>

    <p class="subtitle">
        Your friendly neighborhood product manager.
    </p>

    <?php if (!empty($denied)): ?>
        <div class="msg info">
            Please log in to continue.
        </div>
    <?php endif; ?>

    <?php if (!empty($registered)): ?>
        <div class="msg success">
            Account created. You can now log in.
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="msg error">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('login'); ?>">

        <label for="username">Username</label>

        <input
            type="text"
            id="username"
            name="username"
            placeholder="Enter your username"
            autocomplete="username"
            required
            autofocus
        >

        <label for="password">Password</label>

        <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            autocomplete="current-password"
            required
        >

        <button type="submit">
            🕷 Log In
        </button>

    </form>

    <div class="footer-link">
        Don't have an account?
        <a href="<?= base_url('register'); ?>">Register</a>
    </div>

</div>

</body>
</html>

