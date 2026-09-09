
<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in | Spider-Man Product Desk</title>

    <style>
        :root {
            --red: #e10600;
            --dark-red: #8b0000;
            --black: #080808;
            --panel: #111111;
            --line: #333333;
            --white: #ffffff;
            --muted: #a7a7a7;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--white);
            background:
                radial-gradient(circle at center, rgba(225, 6, 0, .25), transparent 40%),
                linear-gradient(135deg, #050505, #190000, #050505);
            overflow: hidden;
            position: relative;
        }

        /* Spider web effect */
        body::before {
            content: "";
            position: absolute;
            inset: -50%;
            background:
                repeating-radial-gradient(
                    circle at center,
                    transparent 0,
                    transparent 55px,
                    rgba(255,255,255,.07) 56px,
                    transparent 58px
                ),
                repeating-conic-gradient(
                    from 0deg,
                    transparent 0deg,
                    transparent 14deg,
                    rgba(255,255,255,.06) 15deg,
                    transparent 16deg
                );
            transform: rotate(12deg);
            pointer-events: none;
        }

        /* Red glow */
        body::after {
            content: "";
            position: absolute;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: rgba(225, 0, 0, .15);
            filter: blur(100px);
            pointer-events: none;
        }

        main {
            position: relative;
            z-index: 2;
            width: min(100%, 420px);
            padding: 38px;
            background: rgba(12, 12, 12, .96);
            border: 2px solid var(--red);
            border-radius: 16px;
            box-shadow:
                0 0 25px rgba(225, 0, 0, .35),
                0 20px 60px rgba(0,0,0,.8);
        }

        /* Spider icon */
        .spider {
            width: 72px;
            height: 72px;
            margin: 0 auto 18px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: linear-gradient(145deg, #e10600, #8b0000);
            border: 3px solid #fff;
            font-size: 38px;
            box-shadow:
                0 0 18px rgba(225,0,0,.7),
                inset 0 0 15px rgba(0,0,0,.5);
        }

        h1 {
            margin: 0 0 8px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 2rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 3px 3px 0 #8b0000;
        }

        p {
            text-align: center;
            color: var(--muted);
            margin: 0 0 28px;
            font-size: .95rem;
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-size: .85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--line);
            border-radius: 7px;
            background: #181818;
            color: var(--white);
            font-size: 15px;
            transition: .25s;
        }

        input:focus {
            outline: none;
            border-color: var(--red);
            box-shadow: 0 0 10px rgba(225,0,0,.35);
            background: #202020;
        }

        input::placeholder {
            color: #666;
        }

        button {
            width: 100%;
            margin-top: 24px;
            padding: 13px 16px;
            border: 0;
            border-radius: 7px;
            background: linear-gradient(135deg, #e10600, #9b0000);
            color: #fff;
            cursor: pointer;
            font-weight: 800;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: .25s;
            box-shadow: 0 5px 15px rgba(225,0,0,.3);
        }

        button:hover {
            background: linear-gradient(135deg, #ff1a14, #c00000);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(225,0,0,.5);
        }

        button:active {
            transform: translateY(0);
        }

        .error {
            margin-bottom: 18px;
            padding: 11px 13px;
            border-left: 4px solid #ff2222;
            border-radius: 5px;
            background: rgba(239,68,68,.12);
            color: #ffaaaa;
            font-size: .9rem;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
            font-size: .8rem;
        }

        .footer span {
            color: var(--red);
        }

        @media (max-width: 480px) {
            main {
                padding: 30px 24px;
            }

            h1 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>

<body>

<main>

    <div class="spider">🕷️</div>

    <h1>Product Desk</h1>

    <p>
        Sign in to manage the product inventory.
    </p>

    <?php if (!empty($error)): ?>
        <div class="error" role="alert">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('login'); ?>">

        <label for="username">Username</label>

        <input
            id="username"
            name="username"
            type="text"
            placeholder="Enter username"
            required
            autocomplete="username"
        >

        <label for="password">Password</label>

        <input
            id="password"
            name="password"
            type="password"
            placeholder="Enter password"
            required
            autocomplete="current-password"
        >

        <button type="submit">
            🕸 Sign In
        </button>

    </form>

    <div class="footer">
        With great power comes great responsibility.
        <span>🕷</span>
    </div>

</main>

</body>
</html>
