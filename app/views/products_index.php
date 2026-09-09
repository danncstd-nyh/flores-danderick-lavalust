
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$is_admin = (($_SESSION['role'] ?? null) === 'admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Spider-Man Product Manager</title>

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
            --panel-light: #181818;
            --line: #333333;
            --white: #ffffff;
            --muted: #a5a5a5;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at center, rgba(225, 0, 0, .18), transparent 40%),
                linear-gradient(135deg, #030303, #180000, #030303);
            color: var(--white);
            min-height: 100vh;
            padding: 2.5rem 1.5rem;
            position: relative;
            overflow-x: hidden;
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
                    rgba(255,255,255,.055) 56px,
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

        .wrap {
            position: relative;
            z-index: 2;
            max-width: 1100px;
            margin: 0 auto;
        }

        /* Top Bar */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: .8rem;
        }

        .spider-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            background: linear-gradient(145deg, #e10600, #8b0000);
            border: 2px solid white;
            border-radius: 50%;
            font-size: 25px;
            box-shadow:
                0 0 15px rgba(225,0,0,.6),
                inset 0 0 10px rgba(0,0,0,.5);
        }

        h1 {
            font-size: 1.65rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-shadow: 2px 2px 0 var(--dark-red);
        }

        .actions {
            display: flex;
            gap: .6rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .user-info {
            font-size: .85rem;
            color: var(--muted);
            margin-right: .3rem;
        }

        .username {
            color: white;
            font-weight: 700;
        }

        .role {
            background: #292929;
            color: #bbb;
            padding: .2rem .5rem;
            border-radius: 5px;
            font-size: .72rem;
            margin-left: .4rem;
            border: 1px solid #444;
        }

        .btn {
            display: inline-block;
            padding: .58rem 1rem;
            border-radius: 7px;
            font-size: .85rem;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: .25s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #e10600, #980000);
            color: #fff;
            box-shadow: 0 4px 12px rgba(225,0,0,.25);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #ff1a14, #c00000);
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(225,0,0,.45);
        }

        .btn-muted {
            background: #242424;
            color: #ddd;
            border: 1px solid #3b3b3b;
        }

        .btn-muted:hover {
            background: #333;
            color: #fff;
        }

        .btn-danger {
            background: #b40000;
            color: #fff;
        }

        .btn-danger:hover {
            background: #e10600;
            box-shadow: 0 0 12px rgba(225,0,0,.4);
        }

        .btn-sm {
            padding: .4rem .75rem;
            font-size: .78rem;
        }

        /* Messages */
        .msg {
            padding: .75rem .9rem;
            border-radius: 7px;
            font-size: .85rem;
            margin-bottom: 1.25rem;
        }

        .msg.success {
            background: rgba(0,180,80,.12);
            color: #7ff0a8;
            border-left: 4px solid #00b957;
        }

        .msg.error {
            background: rgba(239,68,68,.12);
            color: #ffaaaa;
            border-left: 4px solid #ef4444;
        }

        /* Table Panel */
        .panel {
            background: rgba(12,12,12,.97);
            border: 1px solid #333;
            border-radius: 14px;
            box-shadow:
                0 0 25px rgba(225,0,0,.12),
                0 20px 50px rgba(0,0,0,.7);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th,
        td {
            padding: .9rem 1rem;
            text-align: left;
            font-size: .88rem;
        }

        th {
            background: linear-gradient(135deg, #d90000, #8b0000);
            color: #fff;
            font-weight: 800;
            text-transform: uppercase;
            font-size: .76rem;
            letter-spacing: .6px;
            border-bottom: 2px solid #ff2222;
        }

        tbody tr {
            background: #111;
            transition: .2s;
        }

        tbody tr:nth-child(even) {
            background: #161616;
        }

        tbody tr:hover {
            background: #241010;
        }

        td {
            color: #ddd;
            border-bottom: 1px solid #292929;
        }

        td:first-child {
            color: #ff3b36;
            font-weight: 700;
        }

        td.desc {
            max-width: 260px;
            color: #999;
        }

        td.numeric {
            text-align: right;
            white-space: nowrap;
        }

        .price {
            color: #fff;
            font-weight: 700;
        }

        .quantity {
            color: #ff5a55;
            font-weight: 700;
        }

        .row-actions {
            display: flex;
            gap: .5rem;
        }

        .empty {
            padding: 3rem 2rem;
            text-align: center;
            color: #777;
            background: #111;
        }

        .empty::before {
            content: "🕷️";
            display: block;
            font-size: 2rem;
            margin-bottom: .7rem;
            opacity: .6;
        }

        form.inline {
            display: inline;
        }

        @media (max-width: 800px) {
            body {
                padding: 1.5rem 1rem;
            }

            .topbar {
                align-items: flex-start;
            }

            .actions {
                width: 100%;
            }

            .user-info {
                width: 100%;
                margin-bottom: .3rem;
            }
        }

        @media (max-width: 500px) {
            h1 {
                font-size: 1.35rem;
            }

            .spider-icon {
                width: 42px;
                height: 42px;
                font-size: 21px;
            }

            .btn {
                padding: .5rem .75rem;
            }
        }
    </style>
</head>

<body>

<div class="wrap">

    <div class="topbar">

        <div class="brand">
            <div class="spider-icon">🕷️</div>
            <h1>Products</h1>
        </div>

        <div class="actions">

            <span class="user-info">
                Signed in as
                <strong class="username">
                    <?= htmlspecialchars($_SESSION['username'] ?? ''); ?>
                </strong>

                <?php if (!$is_admin): ?>
                    <span class="role">VIEW ONLY</span>
                <?php endif; ?>
            </span>

            <?php if ($is_admin): ?>
                <a class="btn btn-primary"
                   href="<?= base_url('products/create'); ?>">
                    + Add Product
                </a>
            <?php endif; ?>

            <a class="btn btn-muted"
               href="<?= base_url('logout'); ?>">
                Logout
            </a>

        </div>
    </div>

    <?php if (!empty($success)): ?>
        <div class="msg success">
            <?= htmlspecialchars($success); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="msg error">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <div class="panel">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created</th>

                    <?php if ($is_admin): ?>
                        <th>Actions</th>
                    <?php endif; ?>

                </tr>
            </thead>

            <tbody>

                <?php if (!empty($products)): ?>

                    <?php foreach ($products as $product): ?>

                        <tr>

                            <td>
                                #<?= htmlspecialchars($product['id']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($product['product_name']); ?>
                            </td>

                            <td class="desc">
                                <?= htmlspecialchars($product['description']); ?>
                            </td>

                            <td class="numeric price">
                                ₱<?= number_format((float) $product['price'], 2); ?>
                            </td>

                            <td class="numeric quantity">
                                <?= htmlspecialchars($product['quantity']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($product['created_at'] ?? ''); ?>
                            </td>

                            <?php if ($is_admin): ?>

                                <td>

                                    <div class="row-actions">

                                        <a class="btn btn-muted btn-sm"
                                           href="<?= base_url('products/edit/' . $product['id']); ?>">
                                            Edit
                                        </a>

                                        <form
                                            class="inline"
                                            method="post"
                                            action="<?= base_url('products/delete/' . $product['id']); ?>"
                                            onsubmit="return confirm('Delete this product?');"
                                        >

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            <?php endif; ?>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td
                            colspan="<?= $is_admin ? 7 : 6; ?>"
                            class="empty"
                        >
                            <?= $is_admin
                                ? 'No products yet. Click "Add Product" to create one.'
                                : 'No products yet.'; ?>
                        </td>
                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
