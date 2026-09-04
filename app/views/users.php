
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spider-Man | User List</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            background:
                linear-gradient(rgba(0, 0, 0, 0.15) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 0, 0, 0.15) 1px, transparent 1px),
                #0b1d3a;
            background-size: 35px 35px;
            color: white;
            padding: 40px 20px;
        }

        /* Main container */
        .container {
            max-width: 1100px;
            margin: auto;
            background: #101010;
            border: 5px solid #d71920;
            border-radius: 15px;
            padding: 30px;
            box-shadow:
                0 0 0 5px #0b1d3a,
                0 15px 35px rgba(0, 0, 0, 0.7);
            position: relative;
            overflow: hidden;
        }

        /* Web decoration */
        .container::before {
            content: "✦";
            position: absolute;
            top: -25px;
            right: 25px;
            font-size: 140px;
            color: rgba(255, 255, 255, 0.05);
        }

        .container::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            top: -90px;
            left: -90px;
            border: 3px solid rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            box-shadow:
                0 0 0 25px transparent,
                0 0 0 28px rgba(255, 255, 255, 0.06),
                0 0 0 55px transparent,
                0 0 0 58px rgba(255, 255, 255, 0.05);
        }

        /* Title */
        h2 {
            text-align: center;
            font-size: 42px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #ffffff;
            margin-bottom: 10px;
            text-shadow:
                4px 4px 0 #d71920,
                7px 7px 0 #000;
            position: relative;
            z-index: 2;
        }

        h2::before {
            content: "🕷";
            margin-right: 12px;
        }

        .subtitle {
            text-align: center;
            color: #4fa3ff;
            font-weight: bold;
            margin-bottom: 30px;
            letter-spacing: 2px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            position: relative;
            z-index: 2;
            overflow: hidden;
            border: 3px solid #d71920;
        }

        thead {
            background: #d71920;
        }

        th {
            padding: 16px 12px;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
            border-right: 2px solid #9d1116;
        }

        th:last-child {
            border-right: none;
        }

        tbody tr {
            background: #171717;
            transition: 0.2s ease;
        }

        tbody tr:nth-child(even) {
            background: #0e284d;
        }

        tbody tr:hover {
            background: #d71920;
            transform: scale(1.01);
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #333;
            border-right: 1px solid #333;
            color: #f5f5f5;
        }

        td:first-child {
            color: #4fa3ff;
            font-weight: bold;
        }

        /* Empty state */
        .empty {
            text-align: center;
            padding: 30px;
            color: #ff4d4d;
            font-weight: bold;
            font-size: 18px;
        }

        /* Responsive */
        @media (max-width: 700px) {
            .container {
                padding: 15px;
            }

            h2 {
                font-size: 28px;
            }

            table {
                font-size: 12px;
            }

            th,
            td {
                padding: 10px 6px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Registered Users</h2>
    <p class="subtitle">WITH GREAT POWER COMES GREAT RESPONSIBILITY</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($users)): ?>

                <?php foreach ($users as $user): ?>

                    <tr>
                        <td><?= html_escape($user['id'] ?? ''); ?></td>
                        <td><?= html_escape($user['firstname'] ?? ''); ?></td>
                        <td><?= html_escape($user['lastname'] ?? ''); ?></td>
                        <td><?= html_escape($user['email'] ?? ''); ?></td>
                        <td><?= html_escape($user['username'] ?? ''); ?></td>
                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="5" class="empty">
                        🕸 No users found in the database. 🕸
                    </td>
                </tr>

            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>

