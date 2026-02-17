<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Evaluation</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            padding: 20px; 
            background: linear-gradient(120deg, #e0f7fa, #fce4ec); 
        }

        h1 { 
            text-align: center; 
            color: #333; 
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px #aaa;
        }

        form {
            max-width: 400px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        form:hover { transform: translateY(-5px); }

        label { display: block; margin: 10px 0 5px; font-weight: 600; color: #555; }
        input { 
            width: 100%; 
            padding: 10px; 
            border-radius: 8px; 
            border: 1px solid #ccc; 
            outline: none; 
            transition: border 0.3s ease; 
        }
        input:focus { border-color: #4caf50; }

        button { 
            width: 100%; 
            padding: 12px; 
            margin-top: 15px; 
            border: none; 
            border-radius: 10px; 
            background: linear-gradient(45deg, #4caf50, #81c784); 
            color: white; 
            font-weight: bold; 
            cursor: pointer; 
            transition: background 0.3s ease;
        }
        button:hover { background: linear-gradient(45deg, #388e3c, #66bb6a); }

        .result {
            max-width: 500px;
            margin: 30px auto;
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table th, table td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        table th { background: #f4f4f4; font-weight: bold; }

        /* Grade Colors */
        .grade-A { color: green; font-weight: bold; }
        .grade-B { color: #2E8B57; font-weight: bold; }
        .grade-C { color: #FFA500; font-weight: bold; }
        .grade-D { color: #FF4500; font-weight: bold; }
        .grade-F { color: red; font-weight: bold; }

        /* Remarks Colors */
        .passed { color: green; font-weight: bold; }
        .failed { color: red; font-weight: bold; }

        /* Award Styles */
        .award { font-weight: bold; padding: 6px 12px; border-radius: 8px; display: inline-block; margin-top: 5px; }
        .highest { background: gold; color: #000; }
        .high { background: #C0C0C0; color: #000; }
        .honors { background: #CD7F32; color: #fff; }
        .no-award { background: #ccc; color: #000; }
    </style>
</head>
<body>
    <h1>Student Evaluation System</h1>

    <form method="POST" action="/evaluation">
        @csrf
        <label>Student Name:</label>
        <input type="text" name="name" required>

        <label>Prelim Grade:</label>
        <input type="number" name="prelim" min="0" max="100" required>

        <label>Midterm Grade:</label>
        <input type="number" name="midterm" min="0" max="100" required>

        <label>Final Grade:</label>
        <input type="number" name="final" min="0" max="100" required>

        <button type="submit">Submit</button>
    </form>

    @isset($data)
        @php
            $average = ($data['prelim'] + $data['midterm'] + $data['final']) / 3;

            if ($average >= 90) { $grade = 'A'; $gradeClass = 'grade-A'; }
            elseif ($average >= 80) { $grade = 'B'; $gradeClass = 'grade-B'; }
            elseif ($average >= 70) { $grade = 'C'; $gradeClass = 'grade-C'; }
            elseif ($average >= 60) { $grade = 'D'; $gradeClass = 'grade-D'; }
            else { $grade = 'F'; $gradeClass = 'grade-F'; }

            $remarks = $average >= 75 ? 'Passed' : 'Failed';
            $remarksClass = $average >= 75 ? 'passed' : 'failed';

            if ($average >= 98) { $award = 'With Highest Honors'; $awardClass = 'highest'; }
            elseif ($average >= 95) { $award = 'With High Honors'; $awardClass = 'high'; }
            elseif ($average >= 90) { $award = 'With Honors'; $awardClass = 'honors'; }
            else { $award = 'No Award'; $awardClass = 'no-award'; }
        @endphp

        <div class="result">
            <h2>Results for {{ $data['name'] }}</h2>

            <table>
                <tr>
                    <th>Average</th>
                    <td>{{ number_format($average, 2) }}</td>
                </tr>
                <tr>
                    <th>Letter Grade</th>
                    <td><span class="{{ $gradeClass }}">{{ $grade }}</span></td>
                </tr>
                <tr>
                    <th>Remarks</th>
                    <td><span class="{{ $remarksClass }}">{{ $remarks }}</span></td>
                </tr>
                <tr>
                    <th>Award</th>
                    <td><span class="award {{ $awardClass }}">{{ $award }}</span></td>
                </tr>
            </table>
        </div>
    @endisset
</body>
</html>