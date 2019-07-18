<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=vistafarm";
$pdo= new PDO($dsn,'root','');
session_start();
if(empty($_SESSION['counter'])){
	global $pdo;
	$counter=$pdo->query("select * from visitor")->fetchAll();
	// print_r($counter);
	$counter[0]['counter']++;
	$_SESSION['counter']=$counter[0]['counter'];
	$pdo->exec("update `visitor` set counter= '".$counter[0]['counter']."' where id= '".$counter[0]['id']."'");
}

if(empty($_SESSION['vista'])){
    header("location:./index.php");
}
?>
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


    <title>擁抱田園風光-農村旅遊資訊</title>

    <style>
        body {
            margin: 0;
            padding:0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", "微軟正黑體";
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(./img/AllListPhoto.jpg);
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
            color: white;
        }
        .modal-photo{
            width:460px;
            height:265px;
        }
        #content{
            min-height:calc(100vh - 68px - 64px - 10px - 54px);
        }

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
                    <a class="nav-link text-warning" href="#">農村旅遊資訊<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="statistics.php" style="color:yellow;">統計資料</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- 公開資料索取區 -->
    <?php

$vista=$_SESSION['vista'];

?>

<!-- end of 公開資料索取區 -->

    <!-- 載入中 -->
    <div class="container-fluid" id="loading" style="margin-top:200px;">
        <div class="row h-100">
            <div class="col-12 text-center align-self-center">
                <img src="./icon/loading.svg" alt=""  width="300px" height="300px" >
                <p class="text-white">載入中........</p>
            </div>
        </div>
    </div>
            <!-- 內容 -->



<!-- content -->
    <div class="container" style="margin-top:74px; margin-bottom:74px;" id="content">
        <div class="col-12">
            <h2 class="text-center bounceInRight wow">農村旅遊資訊</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <table id="countryside" class="table table-hover table-primary my-2 table-rwd">
                    <thead class="table-rwd table-hide" style="color:#fff; background-color:#28A745; border-color:#454d55;">    
                        <tr class="table-rwd table-hide">
                            <th class="spot text-center" style="width:170px;">景點名稱</th>
                            <!-- <th class="spot text-center" style="width:200px;">景點名稱</th> -->
                            <th class="city" style="width:70px;">縣市</th>
                            <!-- <th class="city">所在城市</th> -->
                            <th class="town info" style="width:70px;">鄉鎮</th>
                            <!-- <th class="town info">鄉鎮</th> -->
                            <th class="tel info" style="display:none;">電話</th>

                            <th class="intro info" style="display:none;">介紹</th>
                            <th class="intro info" style="width:450px;">介紹</th>
                            <th class="hour info" style="display:none;">營業時間</th>

                            <th class="addr info" style="width:180px;">地址</th>

                            <th class="traffic info" style="display:none;">交通</th>

                            <th class="photo info" style="display:none;">照片</th>

                            <th class="geogrid info" style="display:none;">地圖</th>

                            <th class="detail">更多</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                            foreach($vista as $k => $v){
                                // print_r ($v['City']);
                                // "基隆市"="klcity";
                                // "臺北市"="tpcity";
                                // "新北市"="ntcity";
                                // "桃園市"="tycounty";
                                // "新竹縣"="hccounty";
                                // "苗栗縣"="mlcounty";
                                // "臺中市"="tccity";
                                // "彰化縣"="chcounty";
                                // "南投縣"="ntcounty";
                                // "雲林縣"="ylcounty";
                                // "嘉義縣"="cycounty";
                                // "臺南市"="tncity";
                                // "高雄市"="khcity";
                                // "屏東縣"="ptcounty";
                                // "宜蘭縣"="ilcounty";
                                // "花蓮縣"="hlcounty";
                                // "臺東縣"="tdcounty";
                                // "澎湖縣"="phcounty";
                                // "金門縣"="kmcounty";
                                // "連江縣"="lccounty";
?>
                        <tr>
                            <td id="name<?=$k;?>" class="name name<?=$k;?> place<?=$k;?>" style="width:170px;"><?=$v['Name'];?></td>

                            <td id="city<?=$k;?>" class="city city<?=$k;?> place<?=$k;?>" style="width:70px;"><?=$v['City'];?></td>

                            <td id="town<?=$k;?>" class="town town<?=$k;?> place<?=$k;?> info" style="width:70px;"><?=$v['Town'];?></td>

                            <td id="tel<?=$k;?>" class="tel tel<?=$k;?> place<?=$k;?> info" style="display:none;"><?=$v['Tel'];?></td>

                            <td id="intro<?=$k;?>" class="intro intro<?=$k;?> place<?=$k;?> info" style="display:none;"><?=$v['Introduction'];?></td>
                            <td id="intro<?=$k;?>" class="intro intro<?=$k;?> place<?=$k;?> info" style="width:450px;"><?=mb_substr($v['Introduction'],0,50,'utf8');?>....</td>

                            <td id="hour<?=$k;?>" class="hour hour<?=$k;?> place<?=$k;?> info" style="display:none;"><?=$v['OpenHours'];?></td>

                            <td id="addr<?=$k;?>" class="addr addr<?=$k;?> place<?=$k;?> info" style="width:180px;"><?=$v['Address'];?></td>

                            <td id="traffic<?=$k;?>" class="traffic traffic<?=$k;?> place<?=$k;?> info"  style="display:none;"><?=$v['TrafficGuidelines'];?></td>
                            
                            <td id="photo<?=$k;?>" class="photo photo<?=$k;?> place<?=$k;?> info" style="display:none;"><?=$v['Photo'];?></td>

                            <td id="geogrid<?=$k;?>" class="geogrid geogrid<?=$k;?> place<?=$k;?> info" style="display:none;"><?=$v['Coordinate'];?></td>

                            <td id="detail<?=$k;?>" class="deatil detail<?=$k;?> place<?=$k;?> info">
                            <button id="btn<?=$k;?>" class="btn btn-primary more-detail"  data-toggle= "modal" data-target="#detailmodal"><i class="fas fa-clipboard-list" title="詳細資料"></i></button>
                            </td>
                        </tr>
                        <?php
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- modal area -->

    <!-- <div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"> -->
    <div class="modal" id="detailmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-name" style="color:blue;"></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="color:blue;">

            <p><span style="color:red;">縣市:</span><span class="modal-city"></span></p>
            <p><span style="color:red;">鄉鎮:</span><span class="modal-town"></span></p>
            <p><span style="color:red;">電話:</span><span class="modal-tel"></span></p>
            <p><span style="color:red;">介紹:</span><span class="modal-intro"></span></p>
            <p><span style="color:red;">營業時間:</span><span class="modal-hour"></span></p>
            <p><span style="color:red;">地址:</span><span class="modal-addr"></span></p>
            <p><span style="color:red;">交通:</span><span class="modal-traffic"></span></p>
            <p><span style="color:red;">照片:</span><img scr="" class="modal-photo"></p>



            <!-- <p><span style="color:red;">地理座標:</span><a span class="modal-coordinate"></a></p> -->
            <p><span style="color:red;">地圖:</span><a href="" target="blank" class="modal-coordinate"></a></p>
            <!-- https://www.google.com/maps?q= -->

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
        </div>
        </div>
    </div>
    </div>
<!-- end of modal -->
	<!-- footer -->
	<div class="container-fluid bg-success fixed-bottom" id="footer" style="display:none;">
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
                        <a class="nav-link" href="#"><i class="fab fa-tripadvisor"></i></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-linkedin"></i></i></a>
                    </li>
                </ul>
                &copy;<script>let d = new Date; document.write(d.getFullYear());</script>泰山網頁設計_蘭嵐&nbsp;&nbsp;&nbsp;訪客人數：<?=$_SESSION['counter'];?>
            </div>
        </div>
    </div>
	<!-- end of footer -->







    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/wow.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/sweetalert2.all.min.js"></script>
    <script>
        // 表格語言換中文,"更多"欄位不要搜尋及排序
        $(document).ready(function () {
            $('#countryside').DataTable({
                "language": {
                    "url": "./js/datatables-chinese-traditional.json"
                },
                "columnDefs":[
                {
                    "targets":11,
                    "orderable":false,
                    "searchable":false
                }
                ]   
            });
        });


        // js for loading
        $(document).on("readystatechange",function(){
            $("#loading").fadeOut(500, 0, function(){
                $("#content,#footer").fadeIn(500);
                new WOW().init()
            });
        })




        // // modal點擊呼叫資料
        $(".more-detail").on("click", function(){

            let name=$(this).parents("tr").find("td").eq(0).text();
            console.log(name);
            $("#detailmodal .modal-name").text(name);

            let city=$(this).parents("tr").find("td").eq(1).text();
            console.log(city);
            $("#detailmodal .modal-city").text(city);

            let town=$(this).parents("tr").find("td").eq(2).text();
            console.log(town);
            $("#detailmodal .modal-town").text(town);

            let tel=$(this).parents("tr").find("td").eq(3).text();
            console.log(tel);
            $("#detailmodal .modal-tel").text(tel);

            let intro=$(this).parents("tr").find("td").eq(4).text();
            $("#detailmodal .modal-intro").text(intro);

            let hour=$(this).parents("tr").find("td").eq(6).text();
            console.log("不用檢查,這欄幾乎都沒有");
            $("#detailmodal .modal-hour").text(hour);

            let addr=$(this).parents("tr").find("td").eq(7).text();
            $("#detailmodal .modal-addr").text(addr);

            let traffic=$(this).parents("tr").find("td").eq(8).text();
            console.log("不用檢查,這欄幾乎都沒有");
            $("#detailmodal .modal-traffic").text(traffic);

            let photo=$(this).parents("tr").find("td").eq(9).text();
            $("#detailmodal .modal-photo").attr("src",photo);
            // let photo=$(this).parents("tr").find("td").eq(8).text();
            // $("#detailmodal .modal-photo").text(photo);

            let coordinate=$(this).parents("tr").find("td").eq(10).text();
            // console.log(coordinate);
            $("#detailmodal .modal-coordinate").text(coordinate);
            let maplink="http://www.google.com/maps?q="+coordinate;
            // console.log(maplink);
            $("#detailmodal .modal-coordinate").attr("href",maplink);

        })

        


    </script>


</body>

</html>