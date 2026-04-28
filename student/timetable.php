<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['student']);

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <h2 class="mb-4">Class Timetable</h2>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="text-primary mb-4">B.Tech Computer Science - Semester 3</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Time</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>09:00 - 10:00</td>
                            <td class="bg-light">Data Structures</td>
                            <td class="bg-light">Discrete Math</td>
                            <td class="bg-light">Data Structures</td>
                            <td class="bg-light">Computer Networks</td>
                            <td class="bg-light">Operating Systems</td>
                        </tr>
                        <tr>
                            <td>10:00 - 11:00</td>
                            <td class="bg-light">Operating Systems</td>
                            <td class="bg-light">Data Structures</td>
                            <td class="bg-light">Discrete Math</td>
                            <td class="bg-light">Operating Systems</td>
                            <td class="bg-light">Computer Networks</td>
                        </tr>
                        <tr>
                            <td>11:00 - 12:00</td>
                            <td colspan="5" class="bg-warning text-dark font-weight-bold">BREAK</td>
                        </tr>
                        <tr>
                            <td>12:00 - 02:00</td>
                            <td class="bg-light">DS Lab</td>
                            <td class="bg-light">-</td>
                            <td class="bg-light">OS Lab</td>
                            <td class="bg-light">-</td>
                            <td class="bg-light">CN Lab</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <button class="btn btn-secondary"><i class="fas fa-print"></i> Print Timetable</button>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
