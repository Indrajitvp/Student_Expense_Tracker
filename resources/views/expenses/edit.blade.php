<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Expense</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 2em;
            background-color: #121212; /* Darker background */
            color: #f5f5f5; /* Light text */
        }

        /* Container and Header */
        .container {
            max-width: 600px;
            margin: 2em auto;
            padding: 2em;
            background-color: #1e1e1e; /* Lighter dark panel color */
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2em;
            padding-bottom: 1em;
            border-bottom: 2px solid #333;
        }
        .header h1 {
            color: #f5f5f5;
        }

        /* Form Styles */
        .edit-form {
            display: flex;
            flex-direction: column;
            gap: 1em;
        }
        .edit-form label {
            font-weight: bold;
            color: #b0b0b0;
        }
        .edit-form input {
            padding: 0.8em;
            border: 1px solid #333;
            border-radius: 6px;
            background-color: #2a2a2a;
            color: #f5f5f5;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .edit-form input::placeholder {
            color: #666;
        }
        .edit-form input:focus {
            outline: none;
            border-color: #27d86f; /* Accent color for focus */
            box-shadow: 0 0 8px rgba(39, 216, 111, 0.5);
        }

        /* Button Styles */
        .update-button {
            padding: 0.8em 1.8em;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: #1e1e1e;
            font-weight: bold;
            text-decoration: none;
            background-color: #27d86f; /* Green accent for update */
            transition: background-color 0.3s ease;
        }
        .update-button:hover {
            background-color: #43e18a;
        }
        .back-button {
            display: inline-block;
            margin-bottom: 1em;
            padding: 0.5em 1em;
            background-color: #4a4a4a;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #606060;
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
        }
    </style>
</head>
<body>
<div class="container">
    <a href="{{ route('expenses.index') }}" class="back-button">← Back to Expenses</a>
    <h1>Edit Expense</h1>
    <form action="{{ route('expenses.update', $expense) }}" method="POST" class="edit-form">
        @csrf
        @method('PUT')

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="{{ $expense->description }}" required>

        <label for="amount">Amount (₹):</label>
        <input type="number" step="0.01" id="amount" name="amount" value="{{ $expense->amount }}" required>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="{{ $expense->category }}" required>

        <button type="submit" class="update-button">Update Expense</button>
    </form>
</div>
</body>
</html>
