
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Spider-Man Product Manager</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --red: #e10600;
            --bright-red: #ff1a14;
            --dark-red: #8b0000;
            --black: #050505;
            --panel: #111111;
            --input: #1a1a1a;
            --line: #383838;
            --white: #ffffff;
            --muted: #a5a5a5;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(
                    circle at center,
                    rgba(225, 0, 0, .22),
                    transparent 42%
                ),
                linear-gradient(
                    135deg,
                    #030303,
                    #180000,
                    #030303
                );
            color: var(--white);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        /* Spider Web Background */
        body::before {
            content: "";
            position: fixed;
            inset: -50%;
            background:
                repeating-radial-gradient(
                    circle at center,
                    transparent 0,
                    transparent 55px,
                    rgba(255,255,255,.06) 56px,
                    transparent 58px
                ),
                repeating-conic-gradient(
                    from 0deg,
                    transparent 0deg,
                    transparent 14deg,
                    rgba(255,255,255,.05) 15deg,
                    transparent 16deg
                );
            transform: rotate(12deg);
            pointer-events: none;
        }

        /* Red Glow */
        body::after {
            content: "";
            position: fixed;
            width: 450px;
            height: 450px;
            background: rgba(225, 0, 0, .16);
            filter: blur(100px);
            border-radius: 50%;
            pointer-events: none;
        }

        .card {
            position: relative;
            z-index: 2;
            background: rgba(12, 12, 12, .97);
            width: 100%;
            max-width: 400px;
            padding: 2.4rem 2rem;
            border-radius: 16px;
            border: 2px solid var(--red);
            box-shadow:
                0 0 25px rgba(225,0,0,.4),
                0 20px 60px rgba(0,0,0,.8);
        }

        /* Spider Icon */
        .spider-logo {
            width: 68px;
            height: 68px;
            margin: 0 auto 1.1rem;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: linear-gradient(
                145deg,
                #e10600,
                #8b0000
            );
            border: 3px solid #fff;
            font-size: 35px;
            box-shadow:
                0 0 18px rgba(225,0,0,.7),
                inset 0 0 15px rgba(0,0,0,.5);
        }

        h1 {
            text-align: center;
            font-size: 1.75rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-shadow: 3px 3px 0 var(--dark-red);
            margin-bottom: .4rem;
        }

        p.subtitle {
            text-align: center;
            color: var(--muted);
            font-size: .88rem;
            margin-bottom: 1.6rem;
        }

        label {
            display: block;
            font-size: .82rem;
            font-weight: 700;
            margin-bottom: .4rem;
            color: #ddd;
            text-transform: uppercase;
            letter-spacing: .6px;
        }

        input {
            width: 100%;
            padding: .72rem .85rem;
            border: 1px solid var(--line);
            border-radius: 7px;
            background: var(--input);
            color: var(--white);
            font-size: .95rem;
            margin-bottom: 1rem;
            transition: .25s;
        }

        input::placeholder {
            color: #666;
        }

        input:focus {
            outline: none;
            border-color: var(--red);
            box-shadow: 0 0 10px rgba(225,0,0,.35);
            background: #202020;
        }

        button {
            width: 100%;
            padding: .78rem;
            margin-top: .2rem;
            background: linear-gradient(
                135deg,
                #e10600,
                #980000
            );
            color: #fff;
            border: none;
            border-radius: 7px;
            font-size: .95rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 5px 15px rgba(225,0,0,.3);
        }

        button:hover {
            background: linear-gradient(
                135deg,
                #ff2018,
                #c00000
            );
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(225,0,0,.5);
        }

        button:active {
            transform: translateY(0);
        }

        .msg.error {
            padding: .7rem .9rem;
            border-radius: 7px;
            font-size: .85rem;
            margin-bottom: 1rem;
            background: rgba(239,68,68,.12);
            color: #ffaaaa;
            border-left: 4px solid #ef4444;
        }

        .footer-link {
            text-align: center;
            margin-top: 1.3rem;
            font-size: .85rem;
            color: #777;
        }

        .footer-link a {
            color: #ff3b36;
            text-decoration: none;
            font-weight: 700;
            transition: .2s;
        }

        .footer-link a:hover {
            color: #fff;
            text-shadow: 0 0 8px red;
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

<div class="card">

    <div class="spider-logo">
        🕷️
    </div>

    <h1>Create an Account</h1>

    <p class="subtitle">
        Join the Product Manager.
    </p>

    <?php if (!empty($error)): ?>
        <div class="msg error">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('register'); ?>">

        <label for="username">
            Username
        </label>

        <input
            type="text"
            id="username"
            name="username"
            placeholder="Enter username"
            autocomplete="username"
            required
            autofocus
        >

        <label for="email">
            Email
        </label>

        <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter email address"
            autocomplete="email"
            required
        >

        <label for="password">
            Password
        </label>

        <input
            type="password"
            id="password"
            name="password"
            placeholder="Minimum 6 characters"
            autocomplete="new-password"
            minlength="6"
            required
        >

        <button type="submit">
            🕸 Register
        </button>

    </form>

    <div class="footer-link">
        Already have an account?
        <a href="<?= base_url('login'); ?>">
            Log in
        </a>
    </div>

</div>

</body>
</html>
