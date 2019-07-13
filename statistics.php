<!-- 擁抱田園風光-農村旅遊資訊,https://data.gov.tw/dataset/13620 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143261769-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-143261769-1');
    </script>
    <!-- end of google Analytic -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="keywords" content="鄉村,農村,田園,旅遊,風景,景點,自助旅行,台灣風光,公開資訊,鄉村風光,田園風光,">
    <meta name="description" content="擁抱田園風光-農村旅遊資訊">
    <meta name="author" content="泰山網頁設計">

    <meta property="og:title" content="擁抱田園風光">
    <meta property="og:image" content="./icon/traveller.png">
    <meta property="og:description" content="擁抱田園風光-農村旅遊資訊">
    <meta property="og:site_name" content="擁抱田園風光">
    <!-- favicon -->
    <link rel="shortcut icon" href="./icon/favicon128.ico" type="image/x-icon">

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/countryside.css">
    <link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css">

    <link rel="namifest" href="manifest.json">


    <title>擁抱田園風光-景點分布</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", "微軟正黑體";
            /* background-image: linear-gradient(rgba(255, 255, 255, 0.9), rgba(0, 0, 0, 0.5)), url(./img/fpp.jpg); */
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
            color:white;
        }

        .chartarea {
            margin: 70px auto;
            color:white;
        }

        .ROC {
            height: 600px;
            width: 700px;
            margin:30px auto;
        }

        .citysize {
            height: 450px;
            width: 350px;
        }
        /* .row{
            margin:30px auto;
        } */
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top">
        <div class="container">
            <a href="index.php"><img src="./icon/traveller.png" width="45" height="45"></a>擁抱田園風光
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" style="margin:0 10px;">
                        <a class="nav-link" href="index.php" style="color:yellow;">首頁</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="infolist.php" style="color:yellow;">農村旅遊資訊</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="#" style="color:yellow;">統計資料<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- 公開資料索取區 -->
    <?php

$curl=curl_init();
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36");
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, "http://data.coa.gov.tw/Service/OpenData/ODwsv/ODwsvAttractions.aspx");
$results = curl_exec($curl);
curl_close($curl);

$vista=json_decode($results,true);
// print_r($vista);
?>

    <!-- end of 公開資料索取區 -->

    <!-- 載入中 -->
    <!-- <div class="container-fluid" id="loading" style="margin-top:200px;">
        <div class="row h-100">
            <div class="col-12 text-center align-self-center">
                <img src="./icon/loading.svg" alt=""  width="300px" height="300px" >
                <p class="text-white">載入中........</p>
            </div>
        </div>
    </div> -->
    <!-- 內容 -->
    <div class="container chartarea">
    <h3 style="color:blue;">農業休閒相關景點統計</h3>
        <div class="row">
            <div class="ROC col-sm-12">
                <canvas id="ROC" width="700" height="400"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="citysize col-sm-6">
                <canvas id="klcity" width="300" height="230"></canvas>
            </div>
            <div class="citysize col-sm-6">
                <canvas id="tpcity" width="300" height="230"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="citysize col-sm-6">
                <canvas id="ntcity" width="300" height="230"></canvas>
            </div>
            <div class="citysize col-sm-6">
                <canvas id="tycounty" width="300" height="230"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="citysize col-sm-6">
                <canvas id="hccounty" width="300" height="230"></canvas>
            </div>
            <div class="citysize col-sm-6">
                <canvas id="mlcounty" width="300" height="230"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="citysize col-sm-6">
                <canvas id="tccity" width="300" height="230"></canvas>
            </div>
            <div class="citysize col-sm-6">
                <canvas id="chcounty" width="300" height="230"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="citysize col-sm-6">
                <canvas id="ntcounty" width="300" height="230"></canvas>
            </div>
            <div class="citysize col-sm-6">
                <canvas id="ylcounty" width="300" height="230"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="citysize col-sm-6">
                <canvas id="cycounty" width="300" height="230"></canvas>
            </div>
            <div class="citysize col-sm-6">
                <canvas id="tncity" width="300" height="230"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="citysize col-sm-6">
                <canvas id="khcity" width="300" height="230"></canvas>
            </div>
            <div class="citysize col-sm-6">
                <canvas id="ptcounty" width="300" height="230"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="citysize col-sm-6">
                <canvas id="ilcounty" width="300" height="230"></canvas>
            </div>
            <div class="citysize col-sm-6">
                <canvas id="hlcounty" width="300" height="230"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="citysize col-sm-6">
                <canvas id="tdcounty" width="300" height="230"></canvas>
            </div>
            <div class="citysize col-sm-6">
                <canvas id="phcounty" width="300" height="230"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="citysize col-sm-6">
                <canvas id="kmcounty" width="300" height="230"></canvas>
            </div>
            <div class="citysize col-sm-6">
                <canvas id="lccounty" width="300" height="230"></canvas>
            </div>
        </div>
    </div>

    <!-- content -->


    <?php

$ROC=[];
$klcity=[];
$tpcity=[];
$ntcity=[];
$tycounty=[];
$hccounty=[];
$mlcounty=[];
$tccity=[];
$chcounty=[];
$ntcounty=[];
$ylcounty=[];
$cycounty=[];
$tncity=[];
$khcity=[];
$ptcounty=[];
$ilcounty=[];
$hlcounty=[];
$tdcounty=[];
$phcounty=[];
$kmcounty=[];
$lccounty=[];

foreach($vista as $k => $v){

array_push($ROC,$v['City']);

if($v['City']=="基隆市"){
    array_push($klcity,$v['Town']);
}

if($v['City']=="臺北市"){
    array_push($tpcity,$v['Town']);
}

if($v['City']=="新北市"){
    array_push($ntcity,$v['Town']);
}

if($v['City']=="桃園市"){
    array_push($tycounty,$v['Town']);
}

if($v['City']=="新竹縣"){
    array_push($hccounty,$v['Town']);
}

if($v['City']=="苗栗縣"){
    array_push($mlcounty,$v['Town']);
}

if($v['City']=="臺中市"){
    array_push($tccity,$v['Town']);
}

if($v['City']=="彰化縣"){
    array_push($chcounty,$v['Town']);
}

if($v['City']=="南投縣"){
    array_push($ntcounty,$v['Town']);
}

if($v['City']=="雲林縣"){
    array_push($ylcounty,$v['Town']);
}

if($v['City']=="嘉義縣"){
    array_push($cycounty,$v['Town']);
}

if($v['City']=="臺南市"){
    array_push($tncity,$v['Town']);
}

if($v['City']=="高雄市"){
    array_push($khcity,$v['Town']);
}

if($v['City']=="屏東縣"){
    array_push($ptcounty,$v['Town']);
}

if($v['City']=="宜蘭縣"){
    array_push($ilcounty,$v['Town']);
}

if($v['City']=="花蓮縣"){
    array_push($hlcounty,$v['Town']);
}

if($v['City']=="臺東縣"){
    array_push($tdcounty,$v['Town']);
}

if($v['City']=="澎湖縣"){
    array_push($phcounty,$v['Town']);
}

if($v['City']=="金門縣"){
    array_push($kmcounty,$v['Town']);
}

if($v['City']=="連江縣"){
    array_push($lccounty,$v['Town']);
}

}


// ROC
$aROC=array_count_values($ROC);
$cityname=[];
$citynum=[];

foreach($aROC as $R => $r){

    array_push($cityname,$R);

    array_push($citynum,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($cityname);
print_r($citynum);
?>
    </div>
    <?php

// klcity
$aklcity=array_count_values($klcity);
$townname1=[];
$townnum1=[];

foreach($aklcity as $R => $r){

    array_push($townname1,$R);

    array_push($townnum1,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname1);
print_r($townnum1);
?>
    </div>
    <?php

//tpcity
$atpcity=array_count_values($tpcity);
$townname2=[];
$townnum2=[];

foreach($atpcity as $R => $r){

    array_push($townname2,$R);

    array_push($townnum2,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname2);
print_r($townnum2);
?>
    </div>
    <?php

//ntcity
$antcity=array_count_values($ntcity);
$townname3=[];
$townnum3=[];

foreach($antcity as $R => $r){

    array_push($townname3,$R);

    array_push($townnum3,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname3);
print_r($townnum3);
?>
    </div>
    <?php



//tycounty
$atycounty=array_count_values($tycounty);

$townname4=[];
$townnum4=[];

foreach($atycounty as $R => $r){

    array_push($townname4,$R);

    array_push($townnum4,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname4);
print_r($townnum4);
?>
    </div>
    <?php



//hccounty
$ahccounty=array_count_values($hccounty);

$townname5=[];
$townnum5=[];

foreach($ahccounty as $R => $r){

    array_push($townname5,$R);

    array_push($townnum5,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname5);
print_r($townnum5);
?>
    </div>
    <?php


//mlcounty
$amlcounty=array_count_values($mlcounty);

$townname6=[];
$townnum6=[];

foreach($amlcounty as $R => $r){

    array_push($townname6,$R);

    array_push($townnum6,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname6);
print_r($townnum6);
?>
    </div>
    <?php



//tccity
$atccity=array_count_values($tccity);

$townname7=[];
$townnum7=[];

foreach($atccity as $R => $r){

    array_push($townname7,$R);

    array_push($townnum7,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname7);
print_r($townnum7);
?>
    </div>
    <?php


//chcounty
$achcounty=array_count_values($chcounty);

$townname8=[];
$townnum8=[];

foreach($achcounty as $R => $r){

    array_push($townname8,$R);

    array_push($townnum8,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname8);
print_r($townnum8);
?>
    </div>
    <?php



//ntcounty
$antcounty=array_count_values($ntcounty);

$townname9=[];
$townnum9=[];

foreach($antcounty as $R => $r){

    array_push($townname9,$R);

    array_push($townnum9,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname9);
print_r($townnum9);
?>
    </div>
    <?php


//ylcounty
$aylcounty=array_count_values($ylcounty);

$townname10=[];
$townnum10=[];

foreach($aylcounty as $R => $r){

    array_push($townname10,$R);

    array_push($townnum10,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname10);
print_r($townnum10);
?>
    </div>
    <?php


//cycounty
$acycounty=array_count_values($cycounty);

$townname11=[];
$townnum11=[];

foreach($acycounty as $R => $r){

    array_push($townname11,$R);

    array_push($townnum11,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname11);
print_r($townnum11);
?>
    </div>
    <?php


//tncity
$atncity=array_count_values($tncity);

$townname12=[];
$townnum12=[];

foreach($atncity as $R => $r){

    array_push($townname12,$R);

    array_push($townnum12,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname12);
print_r($townnum12);
?>
    </div>
    <?php


//khcity
$akhcity=array_count_values($khcity);

$townname13=[];
$townnum13=[];

foreach($akhcity as $R => $r){

    array_push($townname13,$R);

    array_push($townnum13,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname13);
print_r($townnum13);
?>
    </div>
    <?php


//ptcounty
$aptcounty=array_count_values($ptcounty);

$townname14=[];
$townnum14=[];

foreach($aptcounty as $R => $r){

    array_push($townname14,$R);

    array_push($townnum14,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname14);
print_r($townnum14);
?>
    </div>
    <?php


//ilcounty
$ailcounty=array_count_values($ilcounty);

$townname15=[];
$townnum15=[];

foreach($ailcounty as $R => $r){

    array_push($townname15,$R);

    array_push($townnum15,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname15);
print_r($townnum15);
?>
    </div>
    <?php


//hlcounty
$ahlcounty=array_count_values($hlcounty);

$townname16=[];
$townnum16=[];

foreach($ahlcounty as $R => $r){

    array_push($townname16,$R);

    array_push($townnum16,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname16);
print_r($townnum16);
?>
    </div>
    <?php


//tdcounty
$atdcounty=array_count_values($tdcounty);

$townname17=[];
$townnum17=[];

foreach($atdcounty as $R => $r){

    array_push($townname17,$R);

    array_push($townnum17,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname17);
print_r($townnum17);
?>
    </div>
    <?php


//phcounty
$aphcounty=array_count_values($phcounty);

$townname18=[];
$townnum18=[];

foreach($aphcounty as $R => $r){

    array_push($townname18,$R);

    array_push($townnum18,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname18);
print_r($townnum18);
?>
    </div>
    <?php


//kmcounty
$akmcounty=array_count_values($kmcounty);

$townname19=[];
$townnum19=[];

foreach($akmcounty as $R => $r){

    array_push($townname19,$R);

    array_push($townnum19,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname19);
print_r($townnum19);
?>
    </div>
    <?php


//lccounty
$alccounty=array_count_values($lccounty);

$townname20=[];
$townnum20=[];

foreach($alccounty as $R => $r){

    array_push($townname20,$R);

    array_push($townnum20,$r);
}

?>
    <div style="display:none;">
        <?php
print_r($townname20);
print_r($townnum20);
?>
    </div>



    <!-- footer -->
    <div class="container-fluid bg-success fixed-bottom" id="footer">
        <div class="row justify-content-center">
            <div class="col-12 text-white text-center">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-twitter-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-google-plus-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-tripadvisor"></i></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-linkedin"></i></i></a>
                    </li>
                </ul>
                &copy;<script>
                    let d = new Date;
                    document.write(d.getFullYear());
                </script>泰山網頁設計
            </div>
        </div>
    </div>
    <!-- end of footer -->






    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/Chart.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/wow.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/sweetalert2.all.min.js"></script>
    <script>
        // ROC
        let cityname;
        let citynum;

        cityname =<?=json_encode($cityname);?>;
        citynum =<?=json_encode($citynum);?>;
        Chart.defaults.global.defaultFontColor = 'blue';




        let ctx = $("#ROC");
        let BarChart = new Chart(ctx, {
            type: "horizontalBar",

            data: {
                labels: cityname,
                datasets: [{
                    label: "各縣市數量",
                    data: citynum,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "各縣市農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        },
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })




        // klcity
        let townname1;
        let townnum1;

        townname1 =<?=json_encode($townname1);?>;
        townnum1 =<?=json_encode($townnum1);?>;

        let ctx1 = $("#klcity");
        let BarChart1 = new Chart(ctx1, {
            type: "bar",
            data: {
                labels: townname1,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum1,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "基隆市農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })

        // tpcity
        let townname2;
        let townnum2;

        townname2 =<?=json_encode($townname2);?>;
        townnum2 =<?=json_encode($townnum2);?>;

        let ctx2 = $("#tpcity");
        let BarChart2 = new Chart(ctx2, {
            type: "bar",
            data: {
                labels: townname2,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum2,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "臺北市農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // ntcity
        let townname3;
        let townnum3;

        townname3 =<?=json_encode($townname3);?>;
        townnum3 =<?=json_encode($townnum3);?>;

        let ctx3 = $("#ntcity");
        let BarChart3 = new Chart(ctx3, {
            type: "bar",
            data: {
                labels: townname3,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum3,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "新北市農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // tycounty
        let townname4;
        let townnum4;

        townname4 =<?=json_encode($townname4);?>;
        townnum4 =<?=json_encode($townnum4);?>;

        let ctx4 = $("#tycounty");
        let BarChart4 = new Chart(ctx4, {
            type: "bar",
            data: {
                labels: townname4,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum4,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "桃園市農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // hccounty
        let townname5;
        let townnum5;

        townname5 =<?=json_encode($townname5);?>;
        townnum5 =<?=json_encode($townnum5);?>;

        let ctx5 = $("#hccounty");
        let BarChart5 = new Chart(ctx5, {
            type: "bar",
            data: {
                labels: townname5,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum5,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "新竹縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })



        // mlcounty
        let townname6;
        let townnum6;

        townname6 =<?=json_encode($townname6);?>;
        townnum6 =<?=json_encode($townnum6);?>;

        let ctx6 = $("#mlcounty");
        let BarChart6 = new Chart(ctx6, {
            type: "bar",
            data: {
                labels: townname6,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum6,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "苗栗縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // tccity
        let townname7;
        let townnum7;

        townname7 =<?=json_encode($townname7);?>;
        townnum7 =<?=json_encode($townnum7);?>;

        let ctx7 = $("#tccity");
        let BarChart7 = new Chart(ctx7, {
            type: "bar",
            data: {
                labels: townname7,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum7,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "臺中市農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })

        // chcounty
        let townname8;
        let townnum8;

        townname8 =<?=json_encode($townname8);?>;
        townnum8 =<?=json_encode($townnum8);?>;

        let ctx8 = $("#chcounty");
        let BarChart8 = new Chart(ctx8, {
            type: "bar",
            data: {
                labels: townname8,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum8,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "彰化縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })

        // ntcounty
        let townname9;
        let townnum9;

        townname9 =<?=json_encode($townname9);?>;
        townnum9 =<?=json_encode($townnum9);?>;

        let ctx9 = $("#ntcounty");
        let BarChart9 = new Chart(ctx9, {
            type: "bar",
            data: {
                labels: townname9,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum9,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "南投縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // ylcounty
        let townname10;
        let townnum10;

        townname10 =<?=json_encode($townname10);?>;
        townnum10 =<?=json_encode($townnum10);?>;

        let ctx10 = $("#ylcounty");
        let BarChart10 = new Chart(ctx10, {
            type: "bar",
            data: {
                labels: townname10,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum10,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "雲林縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // cycounty
        let townname11;
        let townnum11;

        townname11 =<?=json_encode($townname11);?>;
        townnum11 =<?=json_encode($townnum11);?>;

        let ctx11 = $("#cycounty");
        let BarChart11 = new Chart(ctx11, {
            type: "bar",
            data: {
                labels: townname11,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum11,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "嘉義縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // tncity
        let townname12;
        let townnum12;

        townname12 =<?=json_encode($townname12);?>;
        townnum12 =<?=json_encode($townnum12);?>;

        let ctx12 = $("#tncity");
        let BarChart12 = new Chart(ctx12, {
            type: "bar",
            data: {
                labels: townname12,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum12,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "台南市農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // khcity
        let townname13;
        let townnum13;

        townname13 =<?=json_encode($townname13);?>;
        townnum13 =<?=json_encode($townnum13);?>;

        let ctx13 = $("#khcity");
        let BarChart13 = new Chart(ctx13, {
            type: "bar",
            data: {
                labels: townname13,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum13,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "高雄市農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // ptcounty
        let townname14;
        let townnum14;

        townname14 =<?=json_encode($townname14);?>;
        townnum14 =<?=json_encode($townnum14);?>;

        let ctx14 = $("#ptcounty");
        let BarChart14 = new Chart(ctx14, {
            type: "bar",
            data: {
                labels: townname14,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum14,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "屏東縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // ilcounty
        let townname15;
        let townnum15;

        townname15 =<?=json_encode($townname15);?>;
        townnum15 =<?=json_encode($townnum15);?>;

        let ctx15 = $("#ilcounty");
        let BarChart15 = new Chart(ctx15, {
            type: "bar",
            data: {
                labels: townname15,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum15,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "宜蘭縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })

        // hlcounty
        let townname16;
        let townnum16;

        townname16 =<?=json_encode($townname16);?>;
        townnum16 =<?=json_encode($townnum16);?>;

        let ctx16 = $("#hlcounty");
        let BarChart16 = new Chart(ctx16, {
            type: "bar",
            data: {
                labels: townname16,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum16,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "花蓮縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // tdcounty
        let townname17;
        let townnum17;

        townname17 =<?=json_encode($townname17);?>;
        townnum17 =<?=json_encode($townnum17);?>;

        let ctx17 = $("#tdcounty");
        let BarChart17 = new Chart(ctx17, {
            type: "bar",
            data: {
                labels: townname17,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum17,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "臺東縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // phcounty
        let townname18;
        let townnum18;

        townname18 =<?=json_encode($townname18);?>;
        townnum18 =<?=json_encode($townnum18);?>;

        let ctx18 = $("#phcounty");
        let BarChart18 = new Chart(ctx18, {
            type: "bar",
            data: {
                labels: townname18,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum18,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "澎湖縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // kmcounty
        let townname19;
        let townnum19;

        townname19 =<?=json_encode($townname19);?>;
        townnum19 =<?=json_encode($townnum19);?>;

        let ctx19 = $("#kmcounty");
        let BarChart19 = new Chart(ctx19, {
            type: "bar",
            data: {
                labels: townname19,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum19,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "金門縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })


        // lccounty
        let townname20;
        let townnum20;

        townname20 =<?=json_encode($townname20);?>;
        townnum20 =<?=json_encode($townnum20);?>;

        let ctx20 = $("#lccounty");
        let BarChart20 = new Chart(ctx20, {
            type: "bar",
            data: {
                labels: townname20,
                datasets: [{
                    label: "各鄉鎮數量",
                    data: townnum20,
                    borderColor: "blue",
                    backgroundColor: "red",
                    fill: true,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
                    text: "連江縣農業休閒相關景點統計",
                    display: true,
                },
                scales: {
                    yAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        barThickness: 15,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })
    </script>


</body>

</html>