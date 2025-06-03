<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Result Upload</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Upload Student Results</h1>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-container bg-white shadow-sm rounded p-4">
            <form action="{{ route('admin.upload.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="program" class="form-label">Program</label>
                    <select name="program" id="program" class="form-select" onchange="this.value === 'new' ? document.getElementById('new_program').style.display = 'block' : document.getElementById('new_program').style.display = 'none'">
                        <option value="">Select Program</option>
                        @foreach ($programs as $program)
                            <option value="{{ $program->name }}">{{ $program->name }}</option>
                        @endforeach
                        <option value="new">Add New Program</option>
                    </select>
                    <input type="text" name="program" id="new_program" class="form-control mt-2" style="display: none;" placeholder="Enter new program name">
                    @error('program')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <select name="course" id="course" class="form-select" onchange="this.value === 'new' ? document.getElementById('new_course').style.display = 'block' : document.getElementById('new_course').style.display = 'none'">
                        <option value="">Select Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->name }}">{{ $course->name }}</option>
                        @endforeach
                        <option value="new">Add New Course</option>
                    </select>
                    <input type="text" name="course" id="new_course" class="form-control mt-2" style="display: none;" placeholder="Enter new course name">
                    @error('course')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="batch" class="form-label">Batch</label>
                    <select name="batch" id="batch" class="form-select" onchange="this.value === 'new' ? document.getElementById('new_batch').style.display = 'block' : document.getElementById('new_batch').style.display = 'none'">
                        <option value="">Select Batch</option>
                        @foreach ($batches as $batch)
                            <option value="{{ $batch->name }}">{{ $batch->name }}</option>
                        @endforeach
                        <option value="new">Add New Batch</option>
                    </select>
                    <input type="text" name="batch" id="new_batch" class="form-control mt-2" style="display: none;" placeholder="Enter new batch name">
                    @error('batch')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="excel_file" class="form-label">Upload Excel File</label>
                    <input type="file" name="excel_file" id="excel_file" class="form-control">
                    @error('excel_file')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Upload Results</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS (for form interactions) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>