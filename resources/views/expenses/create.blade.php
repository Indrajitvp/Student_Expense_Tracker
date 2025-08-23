    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Expense</title>
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
            .add-form {
                display: flex;
                flex-direction: column;
                gap: 1em;
            }
            .add-form label {
                font-weight: bold;
                color: #b0b0b0;
            }
            .add-form input {
                padding: 0.8em;
                border: 1px solid #333;
                border-radius: 6px;
                background-color: #2a2a2a;
                color: #f5f5f5;
            }
            .add-form input:focus {
                outline: none;
                border-color: #27d86f;
            }

            /* Button Styles */
            .add-button {
                padding: 0.8em 1.8em;
                border: none;
                border-radius: 6px;
                cursor: pointer;
                color: #1e1e1e;
                font-weight: bold;
                text-decoration: none;
                background-color: #27d86f;
                transition: background-color 0.3s ease;
            }
            .add-button:hover {
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
    {{--    <a href="{{ route('expenses.index') }}" class="back-button">← Back to Expenses</a>--}}
        <h1>Add New Expense</h1>
        <form action="{{ route('expenses.store') }}" method="POST" class="add-form">
            @csrf
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required>

            <label for="amount">Amount (₹):</label>
            <input type="number" step="0.01" id="amount" name="amount" required>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>

            <button type="submit" class="add-button">Save Expense</button>
        </form>
    </div>
    </body>
    </html>
