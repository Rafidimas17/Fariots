<?php
    require("setup.php");
                            
    $datas = mysqli_query($connect, "SELECT * FROM tb_sett ORDER BY sett_id ");
    $data = mysqli_fetch_array($datas);
    
    if(isset($_POST['suhu']) && count($data)==0 ){
        $suhu = $_POST['suhu'];
        $humd = $_POST['humd'];
        $co2 = $_POST['co2'];
        $amonia = $_POST['amonia'];
        $suhuM = $_POST['suhuM'];
        $humdM = $_POST['humdM'];
        mysqli_query($connect, "INSERT INTO tb_sett(sett_suhu, sett_humd, sett_co2, sett_amonia,sett_suhuM, sett_humdM) VALUES ('$suhu','$humd','$co2','$amonia','$suhuM','$humdM')");
        $result = mysqli_affected_rows($connect);
        if ($result>0){
            echo "<script>
            alert('Data Berhasil ditambah');
            </script>";
            header('Location:desktop6.php');
        }
        else{
            echo "<script>
            alert('Data Gagal ditambah');
            </script>";
        }
    }
    if(isset($_POST['suhu']) && count($data)>0){
        $id = $data['sett_id'];
        
        $suhu = $_POST['suhu'];
        $humd = $_POST['humd'];
        $co2 = $_POST['co2'];
        $amonia = $_POST['amonia'];
        $suhuM = $_POST['suhuM'];
        $humdM = $_POST['humdM'];
        mysqli_query($connect, "UPDATE tb_sett SET sett_suhu = '$suhu', sett_humd = '$humd', sett_co2 = '$co2', sett_amonia = '$amonia',sett_suhuM = '$suhuM', sett_humdM = '$humdM' WHERE sett_id='$id'");
        $result = mysqli_affected_rows($connect);
        if ($result>0){
            echo "<script>
            alert('Data Berhasil dirubah');
            </script>";
            header('Location:desktop6.php');
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/stylesheet/me.css">
</head>

<body>
    <!-- <style>
        body {
          background-image: url('./assets/images/background.svg');
          background-repeat: no-repeat;
          background-attachment: fixed;  
          background-size: 300px;
        }
        </style> -->

    <a href="desktop2.html" type="submit" class="mt-4 ms-4 btn btn-primary btn-lg">Back</a>

    <div class="container">
        <div class="col-lg-12 mb-5">
            <h1 class="header-primary text-center mt-4 mb-3">
                Pengaturan Optimal
            </h1>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 col-12">
                <img src="./assets/icon/Ayam.svg" class="align-items-center" alt="" width="90%">
            </div>
            <div class="col-lg-6 col-12">
                <div class="row basic-form mt-4">
                    <div class="default-card">
                        <h1 class="primary-title text-center mb-4">Settings</h1>
                        <div class="form-group">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-1 align-self-center d-flex align-items-center">
                                            <img src="./assets/icon/ic_temp.svg" alt="" class="icon" width="35" height="35">
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="number" step="0.01" name="suhu" id="" class="form-control" value="<?= $data['sett_suhu'] ?>">
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="number" step="0.01" name="suhuM" id="" class="form-control" value="<?= $data['sett_suhuM'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-1 align-self-center d-flex align-items-center">
                                            <img src="./assets/icon/ic_wind.svg" alt="" class="icon" width="35" height="35">
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="number" step="0.01" name="humd" id="" class="form-control" value="<?= $data['sett_humd'] ?>">
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="number" step="0.01" name="humdM" id="" class="form-control" value="<?= $data['sett_humdM'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-1 align-self-center d-flex align-items-center">
                                            <img src="./assets/icon/ic_co2.svg" alt="" class="icon" width="35" height="35">
                                        </div>
                                        <div class="col-lg-10">
                                            <input type="number" step="0.01" name="co2" id="" class="form-control" value="<?= $data['sett_co2'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-1 align-self-center d-flex align-items-center">
                                            <img src="./assets/icon/ic_nh3.svg" alt="" class="icon" width="35" height="35">
                                        </div>
                                        <div class="col-lg-10">
                                            <input type="number" step="0.01" name="amonia" id="" class="form-control" value="<?= $data['sett_amonia'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="mt-4 btn btn-primary btn-lg">Selesai</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>

</html>