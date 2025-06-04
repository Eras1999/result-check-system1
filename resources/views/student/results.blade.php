<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Results</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Your Results</h1>

        <div class="form-container bg-white shadow-sm rounded p-4">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
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
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('student.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('student.results.download', ['student_id' => $results->first()->student_id]) }}" class="btn btn-success">Download PDF</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>