<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
{{--<body style="height: 2480px; width: 3508px; overflow: scroll">--}}
<body>
    <div class="mx-5 my-5">
        <div class="row" style="border: 1px solid #000000; margin: 0 1px;">
            <div class="col-1" style="border-right: 1px solid #000000">
                <img style="width: 120px; height: 120px; border-radius: 8px; padding: 20px 30px 20px 10px;" src="{{ asset('storage/uploads/dwasa.png') }}" alt="img">
            </div>
            <div class="col-11 text-center">
                <h3>Dhaka Water Supply Network Improvement(DWSNIP)</h3>
                <h4>Dhaka Water Supply and Sewerage Authority(DWASA</h4>
                <p>WASA Bhaban, 98 Kazi Nazrul Islam Avenue, Dhaka - 1215. www.dwas.org.bd</p>
            </div>
        </div>
        <div>
            <h5 class="fw-bold text-center">Monitoring Format-Performance Evaluation of Chlorination System</h5>
        </div>
        <div style="border: 1px solid #000000;">
            <div>
                <div style="margin: 5px;">
                    <h6 class="mb-0">Part-B: Contractor</h6>
                    <h6 class="mb-0">Test to be done by contractor: (Test frequency = Monthly basis)</h6>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Week: 3rd</p>
                        <p class="mb-0">Time (Same as calorimeter time): 14:00</p>
                        <p class="mb-0">Date: 14</p>
                        <p class="mb-0">Month: January</p>
                        <p class="mb-0">Year: 2022</p>
                    </div>
                </div>
                <div class="row" style="margin: 5px; background-color: lightgray;">
                    <div class="col-4 p-0" style="border: 1px solid #000000;">
                        <div style="border-bottom: 1px solid #000000; padding: 10px;">
                            <p class="mb-0"><span class="fw-bold">Sample location:</span> one sample from the PTW immediate downstream of the chlorination point</p>
                        </div>
                        <div style="border-bottom: 1px solid #000000; padding: 10px;">
                            <p class="mb-0">Free residual chlorination(mg/l) = 1.92</p>
                        </div>
                        <div style="border-bottom: 1px solid #000000; padding: 10px;">
                            <p class="mb-0">Total residual chlorination(mg/l) = 1.92</p>
                        </div>
                        <div style="padding: 8px;">
                            <p class="mb-0">Combined residual chlorination(mg/l) = 1.92</p>
                        </div>
                    </div>
                    <div class="col-1" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;"></div>
                    <div class="col-4" style="border: 1px solid #000000;">
                        <p>Water production/minute = </p>
                        <p>Pump running condition = <span>Yes</span>/<del>No</del></p>
                        <p>Name = </p>
                        <p>Signature = </p>
                        <p>Phone = </p>
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
                        <p class="mb-0">Week: 3rd</p>
                        <p class="mb-0">Time: 14:00</p>
                        <p class="mb-0">Date: 14</p>
                        <p class="mb-0">Month: January</p>
                        <p class="mb-0">Year: 2022</p>
                    </div>
                </div>
                <h6>QC of monitoring program (Test frequency = Monthly basis) (20% sample should be checked from each zone by SAE/AE of PMU/DWASA Zone) / 10% by Lab.</h6>
                <div style="border:1px solid #000000;">
                    <div class="row">
                        <div class="col-5 p-0" style=" border-right:1px solid #000000;">
                            <div style="margin-left: 12px;">
                                <p class="fw-bold mb-0" style="border-bottom:1px solid #000000; padding:5px;">1. Information of PWT (For daily Information)</p>
                                <ol type="a">
                                    <li>Source Identification: </li>
                                    <li>Location of pump house: </li>
                                    <li>DMA: </li>
                                    <li>Zone: </li>
                                    <li>Year of installation(PWT): </li>
                                    <li>Depth(ft): </li>
                                    <li>Water Production/minute: </li>
                                    <li>
                                        Pump running condition:
                                        <span>
                                            <input type="checkbox" checked disabled>Yes
                                        </span>
                                        <span>
                                            <input type="checkbox" disabled>No
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
                                        Chlorination unit running condition:
                                        <span>
                                            <input type="checkbox" checked disabled>Yes
                                        </span>
                                        <span>
                                            <input type="checkbox" disabled>No
                                        </span>
                                    </li>
                                    <li>
                                        If chlorination unit is not running, why:
                                        <span>
                                            <input type="checkbox" checked disabled>No gas
                                        </span>
                                        <span>
                                            <input type="checkbox" disabled>Permanent damage
                                        </span>
                                        <span>
                                            <input type="checkbox" disabled>Pump break down
                                        </span>
                                        <span>
                                            <input type="checkbox" disabled>Out of Order- need small maintenance or replacement of small parts.
                                        </span>
                                        <span>
                                            <input type="checkbox" disabled>Others
                                        </span>
                                    </li>
                                    <li>
                                        If chlorination unit not running, informed to whom:
                                        <span>
                                            <input type="checkbox" checked disabled>Contractor
                                        </span>
                                        <span>
                                            <input type="checkbox" disabled>PMU
                                        </span>
                                        <span>
                                            <input type="checkbox" disabled>DWASA (EE of respective zone)
                                        </span>
                                        <span>
                                            <input type="checkbox" disabled>Nobody
                                        </span>
                                    </li>

                                    <li>
                                        Have remedial action taken:
                                        <span>
                                            <input type="checkbox" checked disabled>Yes
                                        </span>
                                        <span>
                                            <input type="checkbox" disabled>No
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
                                            <div class="col-4">Free RCL(mg/l) = </div>
                                            <div class="col-4">Total RCI(mg/l) = </div>
                                            <div class="col-4">Combined RCI(mg/l) = </div>
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
