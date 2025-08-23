<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intelligent Expense Tracker</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 2em;
            background-color: #121212; /* Darker background inspired by the theme */
            color: #f5f5f5; /* Light text for readability on dark background */
        }

        /* Container and Header */
        .container {
            max-width: 900px;
            margin: 2em auto;
            padding: 2em;
            background-color: #1e1e1e; /* Lighter dark panel color */
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); /* Deeper shadow for dark mode */
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2em;
            padding-bottom: 1em;
            border-bottom: 2px solid #333; /* Subtle divider */
        }
        .header h1 {
            color: #f5f5f5;
        }
        .total-amount-box {
            background-color: #27d86f;
            color: #1e1e1e;
            padding: 1.5em;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 2em;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .total-amount-box h2 {
            margin: 0;
            font-size: 1.2em;
        }
        .total-amount-box p {
            font-size: 2.5em;
            font-weight: bold;
            margin: 0.2em 0;
        }

        /* Table Styles */
        .table-wrapper {
            overflow-x: auto; /* Enables horizontal scroll on small screens */
            border-radius: 8px;
        }
        .expense-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5em;
            min-width: 600px; /* Ensures the table doesn't get too narrow on mobile */
        }
        .expense-table th, .expense-table td {
            padding: 1em;
            text-align: left;
            border-bottom: 1px solid #333;
        }
        .expense-table thead th {
            background-color: #242424;
            color: white;
            font-weight: 600;
        }
        .expense-table tbody tr:nth-child(even) {
            background-color: #1c1c1c;
        }
        .expense-table tbody tr:hover {
            background-color: #2a2a2a;
            cursor: pointer;
        }

        /* Button and Icon Styles */
        .action-icons {
            display: flex;
            gap: 0.8em;
        }
        .action-icon {
            width: 24px;
            height: 24px;
            cursor: pointer;
            transition: transform 0.2s ease, fill 0.2s ease;
        }
        .action-icon:hover {
            transform: scale(1.1);
        }

        .add-button {
            padding: 0.8em 1.8em;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: #1e1e1e;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            background: linear-gradient(45deg, #27d86f, #43e18a); /* Subtle gradient for depth */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .add-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(39, 216, 111, 0.4);
        }

        /* Icon Colors */
        .edit-icon {
            fill: #4a90e2; /* A nice blue for edit */
        }
        .delete-icon {
            fill: #e74c3c; /* A nice red for delete */
        }
        .action-form {
            display: inline;
        }
        .action-form button {
            background: none;
            border: none;
            padding: 0;
            margin: 0;
            cursor: pointer;
            display: flex;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 1em;
            }
            .container {
                margin: 1em auto;
                padding: 1.5em;
            }
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            .header h1 {
                margin-bottom: 0.5em;
            }
            .add-button {
                width: 100%;
                box-sizing: border-box;
                margin-top: 1em;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>My Expenses 💰</h1>
        <a href="{{ route('expenses.create') }}" class="add-button">Add New Expense</a>
    </div>

    @if(session('success'))
        <div style="background-color: #1e3e2c; color: #27d86f; border: 1px solid #4a7d4e; padding: 10px; margin-bottom: 15px; border-radius: 8px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="total-amount-box">
        <h2>Total Expenses</h2>
        <p>₹{{ number_format($totalAmount, 2) }}</p>
    </div>

    <div class="table-wrapper">
        <table class="expense-table">
            <thead>
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Category</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td>{{ $expense->description }}</td>
                    <td>₹{{ number_format($expense->amount, 2) }}</td>
                    <td>{{ $expense->category }}</td>
                    <td>{{ $expense->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="action-icons">
                            <a href="{{ route('expenses.edit', $expense) }}">
                                <svg class="action-icon edit-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                </svg>
                            </a>
                            <form action="{{ route('expenses.destroy', $expense) }}" method="POST" class="action-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this expense?')">
                                    <svg class="action-icon delete-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zm2.46-7.85l1.69-1.69.85.85L9.31 12l1.69 1.69-.85.85-1.69-1.69zM15.54 11.15l-1.69 1.69.85.85 1.69-1.69-.85-.85zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
