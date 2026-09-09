
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$is_edit = ($mode === 'edit');
$form_action = $is_edit ? base_url('products/edit/' . $product['id']) : base_url('products/create');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $is_edit ? 'Edit Product' : 'Add Product'; ?> | Spider-Man Product Manager</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --red: #e10600;
            --dark-red: #8b0000;
            --black: #070707;
            --panel: #111111;
            --input: #1a1a1a;
            --line: #383838;
            --white: #ffffff;
            --muted: #a5a5a5;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at center, rgba(225, 0, 0, .2), transparent 42%),
                linear-gradient(135deg, #030303, #180000, #030303);
            color: var(--white);
            min-height: 100vh;
            padding: 2.5rem 1.5rem;
            display: flex;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }

        /* Spider web background */
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

        .card {
            position: relative;
            z-index: 2;
            background: rgba(12, 12, 12, .97);
            width: 100%;
            max-width: 520px;
            padding: 2.2rem;
            border-radius: 16px;
            border: 2px solid var(--red);
            box-shadow:
                0 0 25px rgba(225,0,0,.35),
                0 20px 60px rgba(0,0,0,.8);
            height: fit-content;
        }

        .topline {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.8rem;
            gap: 1rem;
        }

        .title-area {
            display: flex;
            align-items: center;
            gap: .8rem;
        }

        .spider-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            background: linear-gradient(145deg, #e10600, #8b0000);
            border: 2px solid white;
            border-radius: 50%;
            font-size: 22px;
            box-shadow: 0 0 12px rgba(225,0,0,.6);
            flex-shrink: 0;
        }

        h1 {
            font-size: 1.45rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 2px 2px 0 var(--dark-red);
        }

        a.back {
            font-size: .85rem;
            color: #ff3b36;
            text-decoration: none;
            font-weight: 700;
            white-space: nowrap;
            transition: .2s;
        }

        a.back:hover {
            color: white;
            text-shadow: 0 0 8px red;
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

        input,
        textarea {
            width: 100%;
            padding: .72rem .85rem;
            border: 1px solid var(--line);
            border-radius: 7px;
            background: var(--input);
            color: var(--white);
            font-size: .95rem;
            margin-bottom: 1.1rem;
            font-family: inherit;
            transition: .25s;
        }

        input::placeholder,
        textarea::placeholder {
            color: #666;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: var(--red);
            box-shadow: 0 0 10px rgba(225,0,0,.3);
            background: #202020;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        button {
            padding: .75rem 1.5rem;
            background: linear-gradient(135deg, #e10600, #980000);
            color: #fff;
            border: none;
            border-radius: 7px;
            font-size: .95rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .8px;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 5px 15px rgba(225,0,0,.3);
        }

        button:hover {
            background: linear-gradient(135deg, #ff2018, #c00000);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(225,0,0,.5);
        }

        button:active {
            transform: translateY(0);
        }

        .msg {
            padding: .75rem .9rem;
            border-radius: 7px;
            font-size: .85rem;
            margin-bottom: 1rem;
        }

        .msg.error {
            background: rgba(239,68,68,.12);
            color: #ffaaaa;
            border-left: 4px solid #ef4444;
        }

        .msg.success {
            background: rgba(0,180,80,.12);
            color: #7ff0a8;
            border-left: 4px solid #00b957;
        }

        @media (max-width: 600px) {
            .card {
                padding: 1.6rem;
            }

            .topline {
                align-items: flex-start;
            }

            .row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .spider-icon {
                width: 38px;
                height: 38px;
                font-size: 19px;
            }

            h1 {
                font-size: 1.2rem;
            }

            a.back {
                font-size: .75rem;
            }
        }
    </style>
</head>

<body>

<div class="card">

    <div class="topline">

        <div class="title-area">
            <div class="spider-icon">🕷️</div>

            <h1>
                <?= $is_edit ? 'Edit Product' : 'Add Product'; ?>
            </h1>
        </div>

        <a class="back" href="<?= base_url('products'); ?>">
            &larr; Back to list
        </a>

    </div>

    <?php if (!empty($error)): ?>
        <div class="msg error">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="msg success">
            <?= htmlspecialchars($success); ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= $form_action; ?>">

        <label for="product_name">
            Product Name
        </label>

        <input
            type="text"
            id="product_name"
            name="product_name"
            maxlength="100"
            required
            value="<?= htmlspecialchars($product['product_name'] ?? ''); ?>"
            autofocus
        >

        <label for="description">
            Description
        </label>

        <textarea
            id="description"
            name="description"
            placeholder="Enter product description..."
        ><?= htmlspecialchars($product['description'] ?? ''); ?></textarea>

        <div class="row">

            <div>
                <label for="price">
                    Price
                </label>

                <input
                    type="number"
                    id="price"
                    name="price"
                    step="0.01"
                    min="0"
                    required
                    value="<?= htmlspecialchars($product['price'] ?? ''); ?>"
                >
            </div>

            <div>
                <label for="quantity">
                    Quantity
                </label>

                <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    step="1"
                    min="0"
                    required
                    value="<?= htmlspecialchars($product['quantity'] ?? ''); ?>"
                >
            </div>

        </div>

        <button type="submit">
            🕸 <?= $is_edit ? 'Save Changes' : 'Add Product'; ?>
        </button>

    </form>

</div>

</body>
</html>
