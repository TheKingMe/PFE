<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Arial, sans-serif';
            text-align: center;
            padding: 50px;
            border: 10px solid #000;
        }
        .container {
            border: 5px solid #000;
            padding: 50px;
        }
        h1 {
            font-size: 50px;
        }
        p {
            font-size: 20px;
        }
        .signature {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Certificate of Completion</h1>
        <p>This is to certify that</p>
        <h2>{{ $user->name }}</h2>
        <p>has successfully completed the course</p>
        <h3>{{ $course->name }}</h3>
        <p>on</p>
        <h3>{{ date('F d, Y') }}</h3>
        <div class="signature">
            <p>Instructor</p>
        </div>
    </div>
</body>
</html>
