<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choco Sales Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #009879;
            color: #ffffff;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Choco Sales Data</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sales Person</th>
                    <th>Country</th>
                    <th>Product</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Boxes Shipped</th>
                </tr>
            </thead>
            <tbody>
                @forelse($chocos as $choco)
                <tr>
                    <td>{{ $choco->id ?? $choco['_id'] ?? 'N/A' }}</td>
                    <td>{{ $choco->{'Sales Person'} ?? 'N/A' }}</td>
                    <td>{{ $choco->Country ?? 'N/A' }}</td>
                    <td>{{ $choco->Product ?? 'N/A' }}</td>
                    <td>{{ $choco->Date ?? 'N/A' }}</td>
                    <td>{{ $choco->Amount ?? 'N/A' }}</td>
                    <td>{{ $choco->{'Boxes Shipped'} ?? 'N/A' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center;">No data available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
