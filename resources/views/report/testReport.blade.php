<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $test->location_of_pump ? $test->location_of_pump : '' }}{{ $test->test_id ? $test->test_id : '' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .page-margin{
            padding: 20px 15px;
        }
        p, li {
            font-size: 14px;
        }
        @media print {
            button {
                display: none;
            }

            .page-margin {
                padding: 0;
            }

            head, title, meta {
                display: none !important;
            }

            @page {
                size: auto; /* auto is the initial value */
                margin: 0mm; /* this affects the margin in the printer settings */
            }

            body {
                margin: 10mm; /* this affects the margin on the content before sending to the printer */
            }
        }
    </style>
</head>
{{--<body style="height: 2480px; width: 3508px; overflow: scroll">--}}
<body>
    <div class="page-margin">
        <div style="text-align: center;">
            <button onclick="window.print()" style="margin-bottom: 8px; padding: 5px 10px; font-size: 16px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;" onmouseover="this.style.backgroundColor='#45a049'" onmouseout="this.style.backgroundColor='#4CAF50'">Print this page</button>
        </div>
        <div class="row" style="border: 1px solid #000000; margin: 0 1px;">
            <div class="col-1 d-flex align-items-center justify-content-center" style="border-right: 1px solid #000000">
                <img class="img-fluid" style="max-width: 100%; height: auto; border-radius: 8px; padding: 20px;" src="{{ asset('storage/uploads/dwasa.png') }}" alt="img">
            </div>
            <div class="col-11 text-center">
                <h5>Dhaka Water Supply Network Improvement(DWSNIP)</h5>
                <h6>Dhaka Water Supply and Sewerage Authority(DWASA</h6>
                <p>WASA Bhaban, 98 Kazi Nazrul Islam Avenue, Dhaka - 1215. www.dwas.org.bd</p>
            </div>
        </div>
        <div>
            <h6 class="fw-bold text-center">Monitoring Format-Performance Evaluation of Chlorination System</h6>
        </div>
        <div style="border: 1px solid #000000;">
            <div>
                <div style="margin: 5px;">
                    <h6 class="mb-0">Part-B: Contractor</h6>
                    <h6 class="mb-0">Test to be done by contractor: (Test frequency = Monthly basis)</h6>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Week: {{ $test->test_date ? \Carbon\Carbon::parse($test->test_date)->weekOfMonth : '' }}</p>
                        <p class="mb-0">Time (Same as calorimeter time): {{ $test->test_time ? DateTime::createFromFormat('H:i:s', $test->test_time)->format('h:i A') : '' }}</p>
                        <p class="mb-0">Date: {{ $test->test_date ? \Carbon\Carbon::parse($test->test_date)->day : '' }}</p>
                        <p class="mb-0">Month: {{ $test->test_date ? \Carbon\Carbon::parse($test->test_date)->format('F') : '' }}</p>
                        <p class="mb-0">Year: {{ $test->test_date ? \Carbon\Carbon::parse($test->test_date)->format('Y') : '' }}</p>
                    </div>
                </div>
                <div class="row" style="margin: 5px; background-color: lightgray;">
                    <div class="col-6 p-0" style="border: 1px solid #000000;">
                        <div style="border-bottom: 1px solid #000000; padding: 6px;">
                            <p class="mb-0"><span class="fw-bold">Sample location:</span> one sample from the PTW immediate downstream of the chlorination point</p>
                        </div>
                        <div style="border-bottom: 1px solid #000000; padding: 6px;">
                            <p class="mb-0">Free residual chlorination(mg/l) = {{ $test->free_residual_chlorine ? $test->free_residual_chlorine : '' }}</p>
                        </div>
                        <div style="border-bottom: 1px solid #000000; padding: 6px;">
                            <p class="mb-0">Total residual chlorination(mg/l) = {{ $test->total_residual_chlorine ? $test->total_residual_chlorine : '' }}</p>
                        </div>
                        <div style="padding: 4px;">
                            <p class="mb-0">Combined residual chlorination(mg/l) = {{ $test->combined_residual_chlorine ? $test->combined_residual_chlorine : '' }}</p>
                        </div>
                    </div>
                    <div class="col-3" style="border: 1px solid #000000;">
                        <p class="mb-2">Water production/minute = {{ $test->water_production ? $test->water_production : '' }}</p>
                        <p class="mb-2">Pump running condition = {{ $test->pump_running_condition ? $test->pump_running_condition : '' }}</p>
                        <p class="mb-2">Name = {{ $test->test_name ? $test->test_name : '' }}</p>
                        <p class="mb-2">Signature = </p>
                        <p class="mb-2">Phone = {{ $test->phone ? $test->phone : '' }}</p>
                    </div>
                    <div class="col-3" style="border: 1px solid #000000; border-left: 0">
                        <span class="fw-bold">Comments:</span>
                    </div>
                </div>
            </div>
            <div style="margin: 5px; margin-top: 12px;">
                <div class="d-flex">
                    <p class="mb-0 text-nowrap fw-bold me-1">SOC/PMU/DWASA Lab/DWASA Zone: </p>
                    <div class="d-flex justify-content-between w-100">
                        <p class="mb-0">Week: </p>
                        <p class="mb-0">Time: </p>
                        <p class="mb-0">Date: </p>
                        <p class="mb-0">Month: </p>
                        <p class="mb-0">Year: </p>
                    </div>
                </div>
                <h6>QC of monitoring program (Test frequency = Monthly basis) (20% sample should be checked from each zone by SAE/AE of PMU/DWASA Zone) / 10% by Lab.</h6>
                <div style="border:1px solid #000000;">
                    <div class="row">
                        <div class="col-5 p-0" style=" border-right:1px solid #000000;">
                            <div style="margin-left: 12px;">
                                <p class="fw-bold mb-0" style="border-bottom:1px solid #000000; padding:5px;">1. Information of PWT (For daily Information)</p>
                                <ol type="a">
                                    <li>Source Identification: {{ $test->source_identification ? $test->source_identification : '' }}</li>
                                    <li>Location of pump house: {{ $test->location_of_pump ? $test->location_of_pump : '' }}</li>
                                    <li>DMA: {{ $test->dma ? $test->dma : '' }}</li>
                                    <li>Zone: {{ $test->zone ? $test->zone : '' }}</li>
                                    <li>Year of installation(PWT): {{ $test->year_of_installation ? $test->year_of_installation : '' }}</li>
                                    <li>Depth(ft): {{ $test->depth ? $test->depth : '' }}</li>
                                    <li>Water Production/minute: {{ $test->water_production ? $test->water_production : '' }}</li>
                                    <li>
                                        Pump running condition:
                                        <span>
                                            {!! $test->pump_running_condition === 'Running' ? '<i class="fa-regular fa-square-check"></i>' : '<i class="fa-regular fa-square"></i>' !!} Yes
                                            {!! $test->pump_running_condition !== 'Running' ? '<i class="fa-regular fa-square-check"></i>' : '<i class="fa-regular fa-square"></i>' !!} No
                                        </span>
                                    </li>
                                </ol>
                            </div>

                        </div>
                        <div class="col-7 p-0 ">
                            <div style="margin-right: 12px">
                                <p class="fw-bold mb-0" style="border-bottom:1px solid #000000; padding:5px;">1. Information of PWT (For daily Information)</p>
                                <ol type="a" class="mb-0">
                                    <li>
                                        Chlorination unit running condition: {{ $test->test_running_status }}
                                        <span>
                                            {!! $test->test_running_status === 'Running' ? '<i class="fa-regular fa-square-check"></i>' : '<i class="fa-regular fa-square"></i>' !!} Yes
                                            {!! $test->test_running_status !== 'Running' ? '<i class="fa-regular fa-square-check"></i>' : '<i class="fa-regular fa-square"></i>' !!} No
                                        </span>
                                    </li>
                                    <li>
                                        If chlorination unit is not running, why:
                                        <span>
                                            <i class="fa-regular fa-square"></i> No gas
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-square"></i> Permanent damage
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-square"></i> Pump break down
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-square"></i> Out of Order- need small maintenance or replacement of small parts.
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-square"></i> Others
                                        </span>
                                    </li>
                                    <li>
                                        If chlorination unit not running, informed to whom:
                                        <span>
                                            <i class="fa-regular fa-square"></i> Contractor
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-square"></i> PMU
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-square"></i> DWASA (EE of respective zone)
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-square"></i> Nobody
                                        </span>
                                    </li>

                                    <li>
                                        Have remedial action taken:
                                        <span>
                                            <i class="fa-regular fa-square"></i> Yes
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-square"></i> No
                                        </span>
                                    </li>

                                    <li>
                                        <div>
                                            Test: (One sample from the PTW immediate downstream of the chlorination point)
                                        </div>
{{--                                        <div class="w-100 d-flex justify-content-between">--}}
{{--                                            <p>Free RCL(mg/l) = </p>--}}
{{--                                            <p>Total RCI(mg/l) = </p>--}}
{{--                                            <p>Combined RCI(mg/l) = </p>--}}
{{--                                        </div>--}}
                                        <div class="row">
                                            <div class="col-4">Free RCL(mg/l) = {{ $test->free_residual_chlorine ? $test->free_residual_chlorine : '' }}</div>
                                            <div class="col-4">Total RCI(mg/l) = {{ $test->total_residual_chlorine ? $test->total_residual_chlorine : '' }}</div>
                                            <div class="col-4">Combined RCI(mg/l) = {{ $test->combined_residual_chlorine ? $test->combined_residual_chlorine : '' }}</div>
                                        </div>
                                    </li>
                                </ol>
                                <div class="row my-2" style="padding:5px;">
                                    <div class="col-7 fw-bold">Name: </div>
                                    <div class="col-5 fw-bold">Signature: </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
