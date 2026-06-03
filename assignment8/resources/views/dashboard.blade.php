<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>

    @vite(['resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-slate-900 min-h-screen">

<div class="flex">

    <!-- Sidebar -->

    <div class="w-64 bg-black text-white min-h-screen p-6">

        <h1 class="text-2xl font-bold mb-10">
            Student Analytics
        </h1>

        <ul class="space-y-4">
            <li>Dashboard</li>
            <li>Reports</li>
            <li>Subjects</li>
            <li>Settings</li>
        </ul>

    </div>

    <!-- Main -->

    <div class="flex-1 p-10">

        <h2 class="text-4xl text-white font-bold mb-8">
            Performance Overview
        </h2>

        <div class="grid grid-cols-3 gap-6 mb-8">

            <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-6 rounded-xl text-white">
                <h3>Total Subjects</h3>
                <p class="text-3xl font-bold">5</p>
            </div>

            <div class="bg-gradient-to-r from-blue-500 to-cyan-500 p-6 rounded-xl text-white">
                <h3>Average Grade</h3>
                <p class="text-3xl font-bold">92</p>
            </div>

            <div class="bg-gradient-to-r from-green-500 to-emerald-500 p-6 rounded-xl text-white">
                <h3>Status</h3>
                <p class="text-3xl font-bold">Passed</p>
            </div>

        </div>

        <div class="bg-white rounded-xl p-6 shadow-lg h-[400px]">
    <canvas id="scoreChart"></canvas>
</div>

    </div>

</div>

<script>

const labels = @json($labels);
const data = @json($data);

const ctx = document.getElementById('scoreChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Student Scores',
            data: data,
            backgroundColor: [
                '#8B5CF6',
                '#06B6D4',
                '#10B981',
                '#F59E0B',
                '#EF4444'
            ],
            borderRadius: 10,
            barThickness: 50
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: {
                    font: {
                        size: 14
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 100
            }
        }
    }
});

</script>
</body>
</html>