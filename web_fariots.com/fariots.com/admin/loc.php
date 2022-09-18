<?php
  require("setup.php"); // memanggil file koneksi.php untuk koneksi ke database
  $datas_set = mysqli_query($connect, "SELECT * FROM tb_sett ORDER BY sett_id DESC LIMIT 1");
  $data_set = mysqli_fetch_array($datas_set);
?>
<!DOCTYPE html>
<html lang="en">
<?php
   $url=$_SERVER['REQUEST_URI'];
   header("Refresh: 10; URL=$url");
?>
<head>
    <meta http-equiv="refresh" content="10">
    <meta https-equiv="refresh" content="10">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/stylesheet/me.css">
</head>

<body>

    <a href="desktop2.html" type="submit" class="mt-4 ms-4 btn btn-primary btn-lg">Back</a>
    
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-4 mb-4">
                <div class="default-card <?php
                $datas_last = mysqli_query($connect, "SELECT * FROM tbl_temp ORDER BY `time` DESC LIMIT 1");
                $data_last = mysqli_fetch_array($datas_last);
                    if( //untuk suhu
                        ($data_last['temp_value']>=$data_set['sett_suhu']-$data_set['sett_suhuM']&&
                        $data_last['temp_value']<=$data_set['sett_suhu']+$data_set['sett_suhuM'])
                        //untuk kelembaban
                        &&($data_last['temp_humd']>=$data_set['sett_humd']-$data_set['sett_humdM']&&
                        $data_last['temp_humd']<=$data_set['sett_humd']+$data_set['sett_humdM'])
                        //untuk co2
                        &&($data_last['temp_co2sensor']<=$data_set['sett_co2']&&
                        $data_last['temp_co2sensor']>=0)
                        //untuk amonia
                        &&($data_last['temp_amonia']<=$data_set['sett_amonia'])
                    ){
                        echo "bg-green";
                    }elseif (
                        //untuk suhu
                        ($data_last['temp_value']>=$data_set['sett_suhu']-($data_set['sett_suhuM']*2)&&  
                        $data_last['temp_value']<=$data_set['sett_suhu']+($data_set['sett_suhuM']*2))
                        //untuk kelembaban
                        &&($data_last['temp_humd']>=$data_set['sett_humd']-($data_set['sett_humdM']*2)&&  
                        $data_last['temp_humd']<=$data_set['sett_humd']+($data_set['sett_humdM']*2))
                        //untuk co2
                        &&($data_last['temp_co2sensor']<=$data_set['sett_co2']&&
                        $data_last['temp_co2sensor']>=0)
                        //untuk amonia
                        &&($data_last['temp_amonia']<=$data_set['sett_amonia'])
                    ) {
                        echo "bg-orange";
                    }else{
                        echo "bg-red";
                    }
                ?>
                ">
                    <div class="mt-2 footer d-flex justify-content-between align-items-center">
                        <div class="info">
                            <div class="primary-title">Sensor 1</div>
                        </div>
                        <a href="desktop3.php">
                            <img src="./assets/icon/ic_right_arrow.svg" class="float-right" alt="">
                        </a>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_temp.svg" alt="" class="icon mb-2" width="35" height="35">
                            <p><?= $data_last['temp_value']?>°C</p>
                        </div>
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_wind.svg" alt="" class="icon mb-2" width="35" height="35">
                            <p><?= $data_last['temp_humd']?>%</p>
                        </div>
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_co2.svg" alt="" class="icon mb-2" width="35" height="35">
                            <p><?= $data_last['temp_co2sensor']?> PPM</p>
                        </div>
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_nh3.svg" alt="" class="icon mb-2" width="35" height="35">
                            <p><?= $data_last['temp_amonia']?> PPM</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="default-card
                <?php
                $datas_last2 = mysqli_query($connect, "SELECT * FROM tbl_temp ORDER BY `time` DESC LIMIT 1");
                $data_last2 = mysqli_fetch_array($datas_last2);
                    if( //untuk suhu
                        ($data_last2['temp_value2']>=$data_set['sett_suhu']-$data_set['sett_suhuM']&&
                        $data_last2['temp_value2']<=$data_set['sett_suhu']+$data_set['sett_suhuM'])
                        //untuk kelembaban
                        &&($data_last2['temp_humd2']>=$data_set['sett_humd']-$data_set['sett_humdM']&&
                        $data_last2['temp_humd2']<=$data_set['sett_humd']+$data_set['sett_humdM'])
                        //untuk co2
                        &&($data_last2['temp_co2sensor']<=$data_set['sett_co2']&&
                        $data_last2['temp_co2sensor']>=0)
                        //untuk amonia
                        &&($data_last2['temp_amonia2']<=$data_set['sett_amonia'])
                    ){
                        echo "bg-green";
                    }elseif (
                        //untuk suhu
                        ($data_last2['temp_value2']>=$data_set['sett_suhu']-($data_set['sett_suhuM']*2)&&  
                        $data_last2['temp_value2']<=$data_set['sett_suhu']+($data_set['sett_suhuM']*2))
                        //untuk kelembaban
                        &&($data_last2['temp_humd2']>=$data_set['sett_humd']-($data_set['sett_humdM']*2)&&  
                        $data_last2['temp_humd2']<=$data_set['sett_humd']+($data_set['sett_humdM']*2))
                        //untuk co2
                        &&($data_last2['temp_co2sensor2']<=$data_set['sett_co2']&&
                        $data_last2['temp_co2sensor2']>=0)
                        //untuk amonia
                        &&($data_last2['temp_amonia2']<=$data_set['sett_amonia'])
                    ) {
                        echo "bg-orange";
                    }else{
                        echo "bg-red";
                    }
                ?>
                ">
                    <div class="mt-2 footer d-flex justify-content-between align-items-center">
                        <div class="info">
                            <div class="primary-title">Sensor 2</div>
                        </div>
                        <a href="desktop4.php">
                            <img src="./assets/icon/ic_right_arrow.svg" class="float-right" alt="">
                        </a>
                    </div>
                    <div class="row text-center mt-4">
                    <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_temp.svg" alt="" class="icon mb-2" width="35" height="35">
                            <p><?= $data_last2['temp_value2']?>°C</p>
                        </div>
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_wind.svg" alt="" class="icon mb-2" width="35" height="35">
                            <p><?= $data_last2['temp_humd2']?>%</p>
                        </div>
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_co2.svg" alt="" class="icon mb-2" width="35" height="35">
                            <p><?= $data_last2['temp_co2sensor2']?> PPM</p>
                        </div>
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_nh3.svg" alt="" class="icon mb-2" width="35" height="35">
                            <p><?= $data_last2['temp_amonia2']?> PPM</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="default-card
                <?php
                $datas_last2 = mysqli_query($connect, "SELECT * FROM tbl_temp ORDER BY `time` DESC LIMIT 1");
                $data_last2 = mysqli_fetch_array($datas_last2);
                    if( //untuk suhu
                        ($data_last2['temp_value3']>=$data_set['sett_suhu']-$data_set['sett_suhuM']&&
                        $data_last2['temp_value3']<=$data_set['sett_suhu']+$data_set['sett_suhuM'])
                        //untuk kelembaban
                        &&($data_last2['temp_humd3']>=$data_set['sett_humd']-$data_set['sett_humdM']&&
                        $data_last2['temp_humd3']<=$data_set['sett_humd']+$data_set['sett_humdM'])
                        //untuk co2
                        &&($data_last2['temp_co2sensor3']<=$data_set['sett_co2']&&
                        $data_last2['temp_co2sensor3']>=0)
                        //untuk amonia
                        &&($data_last2['temp_amonia3']<=$data_set['sett_amonia'])
                    ){
                        echo "bg-green";
                    }elseif (
                        //untuk suhu
                        ($data_last2['temp_value3']>=$data_set['sett_suhu']-($data_set['sett_suhuM']*2)&&  
                        $data_last2['temp_value3']<=$data_set['sett_suhu']+($data_set['sett_suhuM']*2))
                        //untuk kelembaban
                        &&($data_last2['temp_humd3']>=$data_set['sett_humd']-($data_set['sett_humdM']*2)&&  
                        $data_last2['temp_humd3']<=$data_set['sett_humd']+($data_set['sett_humdM']*2))
                        //untuk co2
                        &&($data_last2['temp_co2sensor3']<=$data_set['sett_co2']&&
                        $data_last2['temp_co2sensor3']>=0)
                        //untuk amonia
                        &&($data_last2['temp_amonia3']<=$data_set['sett_amonia'])
                    ) {
                        echo "bg-orange";
                    }else{
                        echo "bg-red";
                    }
                ?>
                ">
                    <div class="mt-2 footer d-flex justify-content-between align-items-center">
                        <div class="info">
                            <div class="primary-title">Sensor 3</div>
                        </div>
                        <a href="desktop5.php">
                            <img src="./assets/icon/ic_right_arrow.svg" class="float-right" alt="">
                        </a>
                    </div>
                    <div class="row text-center mt-4">
                    <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_temp.svg" alt="" class="icon mb-2" width="35" height="35">
                            <p><?= $data_last2['temp_value3']?>°C</p>
                        </div>
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_wind.svg" alt="" class="icon mb-2" width="35" height="35">
                            <p><?= $data_last2['temp_humd3']?>%</p>
                        </div>
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_co2.svg" alt="" class="icon mb-2" width="35" height="35">
                            <p><?= $data_last2['temp_co2sensor3']?> PPM</p>
                        </div>
                        <div class="col-lg-3 col-2">
                            <img src="./assets/icon/ic_nh3.svg" alt="" class="icon mb-2" width="35" height="35">
                            <p><?= $data_last2['temp_amonia3']?> PPM</p>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row d-flex justify-content-center mb-5">
            <img src="./assets/images/kandloc2.png" class="align-center" alt="" style="width:80%;height:auto;">
        </div>
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

</body>

</html>