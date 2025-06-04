<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #343a40;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <h1>Student Results</h1>
    <table>
        <thead>
            <tr>
                <th>Program</th>
                <th>Course</th>
                <th>Batch</th>
                <th>Module</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->program->name }}</td>
                    <td>{{ $result->course->name }}</td>
                    <td>{{ $result->batch->name }}</td>
                    <td>{{ $result->module_name }}</td>
                    <td>{{ $result->result }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>