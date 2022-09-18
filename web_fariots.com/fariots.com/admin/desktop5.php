<?php
    require("setup.php"); // memanggil file koneksi.php untuk koneksi ke database
   
    if(isset($_POST['hari'])){
        $datas = mysqli_query($connect, "SELECT * FROM tbl_temp WHERE `time` > NOW()-INTERVAL 1 DAY ORDER BY `time` ");
    }
    else if (isset($_POST["minggu"])) {
        $datas = mysqli_query($connect, "SELECT * FROM tbl_temp WHERE `time` > NOW()-INTERVAL 1 WEEK ORDER BY `time` ");
    }elseif (isset($_POST["bulan"])) {
        $datas = mysqli_query($connect, "SELECT * FROM tbl_temp WHERE `time` > NOW()-INTERVAL 1 MONTH ORDER BY `time` ");
    }elseif (isset($_POST["tahun"])) {
        $datas = mysqli_query($connect, "SELECT * FROM tbl_temp WHERE `time` > NOW()-INTERVAL 1 YEAR ORDER BY `time` ");
    }else{
        $datas = mysqli_query($connect, "SELECT * FROM tbl_temp ORDER BY `time` ");
    }                   
    $datas_last = mysqli_query($connect, "SELECT * FROM tbl_temp ORDER BY `time` DESC LIMIT 1");
    $data_last = mysqli_fetch_array($datas_last);
    
    $datas_set = mysqli_query($connect, "SELECT * FROM tb_sett ORDER BY sett_id DESC LIMIT 1");
    $data_set = mysqli_fetch_array($datas_set);
?>
<!DOCTYPE html>
<html lang="en">
<?php
   $url=$_SERVER['REQUEST_URI'];
   header("Refresh: 5; URL=$url");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/stylesheet/me.css">
</head>

<body>
    <a href="loc.php" type="submit" class="mt-4 ms-4 btn btn-primary btn-lg">Back</a>
    
    <h2 class="col-lg-12 col-11 text-center">
        Sensor 3
    </h2>

    <div class="container">
        <div class="row mt-4">

            <!-- Start of Sensor Card -->
            <div class="col-lg-3 mb-3">
                <div class="default-card
                <?php 
                    if(
                        $data_last['temp_value3']>=$data_set['sett_suhu']-$data_set['sett_suhuM']&&
                        $data_last['temp_value3']<=$data_set['sett_suhu']+$data_set['sett_suhuM']
                    ){
                        echo "bg-green";
                    }elseif (
                        $data_last['temp_value3']>=$data_set['sett_suhu']-($data_set['sett_suhuM']*2)&&  
                        $data_last['temp_value3']<=$data_set['sett_suhu']+($data_set['sett_suhuM']*2)
                    ) {
                        echo "bg-orange";
                    }else{
                        echo "bg-red";
                    }
                ?>
                ">
                    <div class="mt-2 footer d-flex justify-content-between align-items-center">
                        <div class="info">
                            <h4 class="primary-title">Suhu</h4>
                        </div>
                        <a href="">
                            <img src="./assets/icon/ic_right_arrow.svg" class="float-right" alt="">
                        </a>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_temp.svg" alt="" class="icon mb-2" width="45" height="45">
                        </div>
                        <div class="col-lg-3 col-2 ps-3 
                            
                        ">
                            <h2>
                                <?= $data_last['temp_value3']?>°C
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-3">
                <div class="default-card
                <?php 
                    if(
                        $data_last['temp_humd3']>=$data_set['sett_humd']-$data_set['sett_humdM']&&
                        $data_last['temp_humd3']<=$data_set['sett_humd']+$data_set['sett_humdM']
                    ){
                        echo "bg-green";
                    }elseif (
                        $data_last['temp_humd3']>=$data_set['sett_humd']-($data_set['sett_humdM']*2)&&  
                        $data_last['temp_humd3']<=$data_set['sett_humd']+($data_set['sett_humdM']*2)
                    ) {
                        echo "bg-orange";
                    }else{
                        echo "bg-red";
                    }
                ?>
                ">
                    <div class="mt-2 footer d-flex justify-content-between align-items-center">
                        <div class="info">
                            <h4 class="primary-title">Kelembaban</h4>
                        </div>
                        <a href="">
                            <img src="./assets/icon/ic_right_arrow.svg" class="float-right" alt="">
                        </a>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_wind.svg" alt="" class="icon mb-2" width="45" height="45">
                        </div>
                        <div class="col-lg-3 col-2 ps-3">
                            <h2>
                            
                            <?= $data_last['temp_humd3']?>%
                    
                            </h2>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 mb-3">
                <div class="default-card
                <?php 
                    if(
                        $data_last['temp_co2sensor3']<=$data_set['sett_co2']&&
                        $data_last['temp_co2sensor3']>=0
                    ){
                        echo "bg-green";
                    }else{
                        echo "bg-red";
                    }
                ?>
                ">
                    <div class="mt-2 footer d-flex justify-content-between align-items-center">
                        <div class="info">
                            <h4 class="primary-title">Gas CO<sub>2</sub></h4>
                        </div>
                        <a href="">
                            <img src="./assets/icon/ic_right_arrow.svg" class="float-right" alt="">
                        </a>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_co2.svg" alt="" class="icon mb-2" width="45" height="45">
                        </div>
                        <div class="col-lg-3 col-2 ps-3">
                            <h2>
                            <?= $data_last['temp_co2sensor3']?> PPM
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-3">
                <div class="default-card
                <?php 
                    if(
                        $data_last['temp_amonia3']<=$data_set['sett_amonia']
                    ){
                        echo "bg-green";
                    }else{
                        echo "bg-red";
                    }
                ?>
                ">
                    <div class="mt-2 footer d-flex justify-content-between align-items-center">
                        <div class="info">
                            <h4 class="primary-title">Gas Amonia</h4>
                        </div>
                        <a href="">
                            <img src="./assets/icon/ic_right_arrow.svg" class="float-right" alt="">
                        </a>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_nh3.svg" alt="" class="icon mb-2" width="45" height="45">
                        </div>
                        <div class="col-lg-3 col-2 ps-3">
                            <h2>
                            <?= $data_last['temp_amonia3']?> PPM
                            
                            </h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End of Sensor Card -->

        <div class="row mt-4">
            <div class="col-lg-12 mb-4 align-items-end">
                <div class="default-card">
                    <div class="mt-2 footer d-flex justify-content-between align-items-center">
                        <h1 class="primary-title">History</h1>
                        <div class="col-lg-9">
                            <form action="" method="post">
                                <button type="submit" name="hari" class="ms-4 btn btn-primary btn-lg">24 Jam</button>
                                <button type="submit" name="minggu" class="ms-4 btn btn-primary btn-lg">1 Minggu</button>
                                <button type="submit" name="bulan" class="ms-4 btn btn-primary btn-lg">1 Bulan</button>
                                <button type="submit" name="tahun" class="ms-4 btn btn-primary btn-lg">1 Tahun</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start of Graph Card -->
            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="default-card">
                        <div class="mt-2 footer d-flex justify-content-between align-items-center">
                            <div class="info">
                                <h4 class="primary-title">Suhu dan Kelembaban Udara</h4>
                            </div>
                            <a href="">
                                <img src="./assets/icon/ic_right_arrow.svg" class="float-right" alt="">
                            </a>
                        </div>
                        <div class="row text-center mt-4">
                            <div id="reportsChart1"></div>

                            <?php $dataco2 = mysqli_fetch_array($datas);?>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#reportsChart1"), {
                                        series: [
                                            
                                            {
                                            name: "Suhu",
                                            
                                            data: [
                                                <?php foreach ($datas as $data): ?>
                                                <?= json_encode($data['temp_value3']); ?>,
                                                <?php endforeach; ?>
                                            ],
                                            
                                            },
                                            {
                                            name: "Kelembaban",
                                            
                                            data: [
                                                <?php foreach ($datas as $data): ?>
                                                <?= json_encode($data['temp_humd3']); ?>,
                                                <?php endforeach; ?>
                                            ],
                                            
                                            },
                                            
                                        
                                        ],
                                        chart: {
                                            height: 350,
                                            type: 'area',
                                            toolbar: {
                                                show: false
                                            },
                                        },
                                        markers: {
                                            size: 2
                                        },
                                        colors: ['#4154f1', '#2eca6a'],
                                        fill: {
                                            type: "gradient",
                                            gradient: {
                                                shadeIntensity: 1,
                                                opacityFrom: 0.3,
                                                opacityTo: 0.4,
                                                stops: [0, 90, 100]
                                            }
                                        },
                                        dataLabels: {
                                            enabled: true
                                        },
                                        stroke: {
                                            curve: 'smooth',
                                            width: 2
                                        },
                                        xaxis: {
                                            type: 'datetime',
                                            categories: [
                                                <?php foreach ($datas as $data): ?>
                                                    <?= json_encode(date("d/M/y H:i", strtotime($data['time']))); ?>,
                                                <?php endforeach; ?>
                                            ]
                                        },
                                        tooltip: {
                                            x: {
                                                format: 'dd/MM/yy HH:mm'
                                            },
                                        }
                                    }).render();
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="default-card">
                        <div class="mt-2 footer d-flex justify-content-between align-items-center">
                            <div class="info">
                                <h4 class="primary-title">Gas CO<sub>2</sub></h4>
                            </div>
                            <a href="">
                                <img src="./assets/icon/ic_right_arrow.svg" class="float-right" alt="">
                            </a>
                        </div>
                        <div class="row text-center mt-4">
                            <div id="reportsChart2"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#reportsChart2"), {
                                        series: [{
                                            name: 'Gas CO2',
                                            
                                            data: [
                                                <?php foreach ($datas as $data): ?>
                                                <?= json_encode($data['temp_co2sensor3']); ?>,
                                                <?php endforeach; ?>
                                            ],
                                            
                                        }],
                                        chart: {
                                            height: 350,
                                            type: 'area',
                                            toolbar: {
                                                show: false
                                            },
                                        },
                                        markers: {
                                            size: 4
                                        },
                                        colors: ['#4154f1'],
                                        fill: {
                                            type: "gradient",
                                            gradient: {
                                                shadeIntensity: 1,
                                                opacityFrom: 0.3,
                                                opacityTo: 0.4,
                                                stops: [0, 90, 100]
                                            }
                                        },
                                        dataLabels: {
                                            enabled: true
                                        },
                                        stroke: {
                                            curve: 'smooth',
                                            width: 2
                                        },
                                        xaxis: {
                                            type: 'datetime',
                                            categories: [
                                                <?php foreach ($datas as $data): ?>
                                                    <?= json_encode(date("d/M/y H:i", strtotime($data['time']))); ?>,
                                                <?php endforeach; ?>
                                            ]
                                        },
                                        tooltip: {
                                            x: {
                                                format: 'dd/MM/yy HH:mm'
                                            },
                                        }
                                    }).render();
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="default-card">
                        <div class="mt-2 footer d-flex justify-content-between align-items-center">
                            <div class="info">
                                <h4 class="primary-title">Gas Amonia</h4>
                            </div>

                            <a href="">
                                <img src="./assets/icon/ic_right_arrow.svg" class="float-right" alt="">
                            </a>
                        </div>
                        <div class="row text-center mt-4">
                            <div id="reportsChart3"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#reportsChart3"), {
                                        series: [{
                                            name: 'Gas Amonia',
                                            
                                            data: [
                                                <?php foreach ($datas as $data): ?>
                                                <?= json_encode($data['temp_amonia3']); ?>,
                                                <?php endforeach;?>
                                            ],
                                            
                                        }],
                                        chart: {
                                            height: 350,
                                            type: 'area',
                                            toolbar: {
                                                show: false
                                            },
                                        },
                                        markers: {
                                            size: 4
                                        },
                                        colors: ['#4154f1'],
                                        fill: {
                                            type: "gradient",
                                            gradient: {
                                                shadeIntensity: 1,
                                                opacityFrom: 0.3,
                                                opacityTo: 0.4,
                                                stops: [0, 90, 100]
                                            }
                                        },
                                        dataLabels: {
                                            enabled: true
                                        },
                                        stroke: {
                                            curve: 'smooth',
                                            width: 2
                                        },
                                        xaxis: {
                                            type: 'datetime',
                                            categories: [
                                                <?php foreach ($datas as $data): ?>
                                                    <?= json_encode(date("d/M/y H:i", strtotime($data['time']))); ?>,
                                                <?php endforeach; ?>
                                            ]
                                        },
                                        tooltip: {
                                            x: {
                                                format: 'dd/MM/yy HH:mm'
                                            },
                                        }
                                    }).render();
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Graph Card -->

            <!-- Start of Condition Card -->
            <div class="row pricing report" id="reviews">
                <div class="col-md-12 col-lg-4 col-12">
                    <div class="item-value d-flex flex-column">
                        <img src="./assets/icon/ic_chicken.svg" class="mb-4 photo">
                        <h2 class="name text-red">
                            Kondisi sangat buruk
                        </h2>
                        <p class="role">
                            Kondisi ini telah mencapai batas optimal. Hal ini akan berdampak pada kesehatan ayam.
                        </p>
                        <p class="mt-3 case">
                            Yang harus dilakukan
                        </p>
                        <div class="rating mt-auto">
                            <p class="review">
                                Amonia : bersihkan kandang Suhu dan kelembaban : nyalakan blower atau heater CO2 : matikan heater
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-4 col-12">
                    <div class="item-value d-flex flex-column">
                        <img src="./assets/icon/ic_chicken.svg" class="mb-4 photo">
                        <h2 class="name text-orange">
                            Kondisi buruk
                        </h2>
                        <p class="role">
                            Kondisi ini hampir mencapai batas optimal. Hal ini dapat berdampak pada kesehatan ayam.
                        </p>
                        <p class="mt-3 case">
                            Yang dapat dilakukan
                        </p>
                        <div class="rating mt-auto">
                            <p class="review">
                                Amonia : bersihkan kandang Suhu dan kelembaban : nyalakan blower atau heater CO2 : matikan heater
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-4 col-12">
                    <div class="item-value d-flex flex-column">
                        <img src="./assets/icon/ic_chicken.svg" class="mb-4 photo">
                        <h2 class="name text-green">
                            Kondisi sehat
                        </h2>
                        <p class="role">
                            Kondisi ini belum mendekati batas optimal. Dengan tingkat suhu, kelembaban udara, gas amonia, dan gas karbondioksida yang sangat baik.
                        </p>
                        <p class="mt-3 case">
                            Yang dapat dilakukan
                        </p>
                        <div class="rating mt-auto">
                            <p class="review">
                                Memberi pakan ternak dan minum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Condition Card -->

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        
</body>

</html>