<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Lavista Rota Schedule</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .rota-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
        }
        
        .week-navigation {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        
        .rota-table {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        .rota-table th {
            background-color: #495057;
            color: white;
            font-weight: 600;
            text-align: center;
            padding: 1rem;
            border: none;
            white-space: nowrap;
        }
        
        .rota-table td {
            padding: 0.75rem;
            text-align: center;
            vertical-align: middle;
            border-color: #e9ecef;
            white-space: nowrap;
        }
        
        .employee-name {
            background-color: #6c757d;
            color: white;
            font-weight: 600;
            text-align: left !important;
            padding-left: 1rem !important;
            position: sticky;
            left: 0;
            z-index: 1;
        }
        
        .shift-morning {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .shift-afternoon {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        
        .shift-evening {
            background-color: #d4edda;
            color: #155724;
        }
        
        .shift-night {
            background-color: #e2e3e5;
            color: #383d41;
        }
        
        .shift-off {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .shift-badge {
            display: inline-block;
            padding: 0.25em 0.6em;
            font-size: 0.75em;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.375rem;
        }
        
        .stats-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .stats-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        /* Enhanced Mobile Responsiveness */
        @media (max-width: 768px) {
            .rota-header {
                padding: 1rem 0;
            }

            .rota-header h1 {
                font-size: 1.5rem;
            }

            .rota-header .btn {
                padding: 0.375rem 0.75rem;
                font-size: 0.875rem;
            }

            .week-navigation {
                padding: 0.75rem;
            }

            .week-navigation .btn {
                padding: 0.375rem 0.75rem;
                font-size: 0.875rem;
                width: 100%;
                margin-bottom: 0.5rem;
            }

            .week-navigation h4 {
                font-size: 1rem;
                margin: 0.5rem 0;
            }

            .stats-card {
                padding: 1rem;
            }

            .stats-card h5 {
                font-size: 0.875rem;
            }

            .stats-card h3 {
                font-size: 1.25rem;
            }

            .stats-icon {
                font-size: 1.5rem;
            }

            .rota-table {
                font-size: 0.8rem;
            }

            .rota-table td, .rota-table th {
                padding: 0.5rem 0.25rem;
            }

            .shift-badge {
                font-size: 0.7em;
                padding: 0.2em 0.4em;
            }

            .card-header h5 {
                font-size: 1rem;
            }

            .card-body {
                padding: 1rem;
            }

            .card-body li {
                font-size: 0.875rem;
            }

            /* Make the date selector form more mobile friendly */
            form {
                margin-bottom: 1rem;
            }

            form label {
                display: block;
                margin-bottom: 0.5rem;
            }

            form input[type="date"] {
                width: 100%;
                margin-bottom: 0.5rem;
            }

            form button {
                width: 100%;
            }
        }

        /* Additional breakpoint for very small devices */
        @media (max-width: 480px) {
            .rota-header .col-md-6 {
                text-align: center;
                margin-bottom: 1rem;
            }

            .rota-header .text-md-end {
                text-align: center !important;
            }

            .stats-card {
                margin-bottom: 0.5rem;
            }

            .rota-table {
                font-size: 0.7rem;
            }

            .shift-badge {
                font-size: 0.65em;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="rota-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1><a style="color: white" href="{{ route('landing') }}">Weekly Rota</a></h1>
                    <p class="mb-0 opacity-75">Staff Schedule Management</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <button class="btn btn-light me-2"><i class="fas fa-print me-2"></i>Print</button>
                    <button class="btn btn-outline-light"><i class="fas fa-download me-2"></i>Export</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Week Navigation -->
        <div class="week-navigation">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <button class="btn btn-outline-primary"><i class="fas fa-chevron-left me-2"></i>Previous Week</button>
                </div>
                <div class="col-md-4 text-center">
                    <h4 class="mb-0">Week of January 15 - 21, 2024</h4>
                </div>
                <div class="col-md-4 text-end">
                    <button class="btn btn-outline-primary">Next Week<i class="fas fa-chevron-right ms-2"></i></button>
                </div>
            </div>
        </div>
        <form method="GET" action="{{ route('landing') }}">
            <label for="start_date">Select Week Start:</label>
            <input type="date" name="start_date" value="{{ $start->toDateString() }}">
            <button type="submit">View</button>
        </form>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card text-center">
                    <i class="fas fa-users stats-icon text-primary"></i>
                    <h5>Total Staff</h5>
                    <h3 class="text-primary">8</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card text-center">
                    <i class="fas fa-clock stats-icon text-success"></i>
                    <h5>Total Hours</h5>
                    <h3 class="text-success">320</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card text-center">
                    <i class="fas fa-calendar-check stats-icon text-warning"></i>
                    <h5>Shifts Covered</h5>
                    <h3 class="text-warning">54/56</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card text-center">
                    <i class="fas fa-exclamation-triangle stats-icon text-danger"></i>
                    <h5>Gaps</h5>
                    <h3 class="text-danger">2</h3>
                </div>
            </div>
        </div>

        <!-- Rota Table -->
        <div class="rota-table">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th style="width: 200px;">Employee</th>
                        {{-- <th>Monday<br><small>15/01</small></th>
                        <th>Tuesday<br><small>16/01</small></th>
                        <th>Wednesday<br><small>17/01</small></th>
                        <th>Thursday<br><small>18/01</small></th>
                        <th>Friday<br><small>19/01</small></th>
                        <th>Saturday<br><small>20/01</small></th>
                        <th>Sunday<br><small>21/01</small></th> --}}
                        @foreach(range(0, 6) as $i)
                        @php
                            $day = $start->copy()->addDays($i);
                        @endphp
                        <th>{{ $day->format('l') }}<br><small>{{ $day->format('d/m') }}</small></th>
                        @endforeach

                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $employeeId => $days)
                    <tr>
                        <td class="employee-name">{{ $days[0]->employee_name }} <br><small>Total Hours: {{ $weeklyHours[$employeeId] ?? 0 }}</small></td>
                        
                        @foreach(range(0, 6) as $i)
                            @php
                                // $date = \Carbon\Carbon::now()->startOfWeek()->addDays($i)->toDateString();
                                $baseDate = \Carbon\Carbon::createFromDate(2025, 06, 10); // manually set Monday
                                $date = $start->copy()->addDays($i)->toDateString();
                                $day = $days->firstWhere('work_date', $date);
                            @endphp
                            <td class="{{ $day->css_class ?? 'shift-off' }}">
                                @if($day)
                                    <span class="shift-badge {{ $day->css_class }}">{{ $day->shift_name }}</span><br>
                                    <small>{{ $day->start_time }} - {{ $day->end_time }}</small>
                                @else
                                    <span class="shift-badge bg-danger">Off</span>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                       @endforeach

                   
                </tbody>
            </table>
        </div>

        <!-- Legend -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Shift Legend</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <span class="shift-badge bg-warning me-2">Morning</span> 9:00 - 17:00
                            </div>
                            <div class="col-md-3 mb-2">
                                <span class="shift-badge bg-info me-2">Afternoon</span> 13:00 - 21:00
                            </div>
                            <div class="col-md-3 mb-2">
                                <span class="shift-badge bg-success me-2">Evening</span> 17:00 - 01:00
                            </div>
                            <div class="col-md-3 mb-2">
                                <span class="shift-badge bg-secondary me-2">Night</span> 21:00 - 09:00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notes Section -->
        <div class="row mt-4 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-sticky-note me-2"></i>Notes & Announcements</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="fas fa-exclamation-circle text-warning me-2"></i>Thursday evening shift needs coverage</li>
                            <li class="mb-2"><i class="fas fa-info-circle text-info me-2"></i>Staff meeting scheduled for Friday at 10:00 AM</li>
                            <li class="mb-0"><i class="fas fa-calendar-check text-success me-2"></i>Holiday requests for next month due by end of week</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>