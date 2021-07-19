<?php
//require "./_CommonLogin.php";
//$notice_array = [];
//$query_string = "SELECT top 3 * from rb_bbs_data where notice = '1' and bbsid = 'api_qna' order by uid desc";
//
//
//$result  = db_query($query_string, $DB_CONNECT);
//while ($R = db_fetch_assoc($result)) {
//  array_push($notice_array, $R);
//}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name='viewport'
          content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no' />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>더치트 금융사기방지 API CENTER</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
            integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
</head>

<body>
<div class="wrap">
    <?php require "layout/header.php";?>
    <div class="hero_area" >
        <div class="hero_text_box">
            <p class="h_text_01">집단 지성을 활용한</p>
            <p class="h_text_02">국내 최대 금융사기 방지 서비스</p>
            <p class="h_text_03">더치트 금융사기방지 API 사용하고,</br>사기피해 50% 이상 예방하세요!</p>
        </div>
    </div><!--hero_area-->
    <div class="main_cont_box">
        <div class="main_cont_01">
            <p class="title_01">금융사기방지 API<span>종류</span></p>
            <div class="cont_box_01">
                <p class="title_02">사기이력조회 API <img src="img/main_icon_04.png" alt="사기이력조회 API"></p>
                <p class="main_text_01">
                    더치트에 등록된 금융사기 피해 정보 중 최근 3개월 내 1건 이상 등록된 연락처, 계좌번호를 조회할 수 있습니다.
                    <br><br>
                    <b class="color_ci_02">사용 예)</b><br>회원가입 및 이체/간편송금 시 연락처, 계좌번호에 대한 주의 정보를 확인하여 금융사기 예방
                </p>
            </div><!--cont_box_01-->
            <div class="cont_box_01">
                <p class="title_02">신뢰도 SCORE API<img src="img/main_icon_05.png" alt="신뢰도 SCORE API"></p>
                <p class="main_text_01">
                    더치트의 빅데이터 분석을 통해 산출된 연락처, 계좌번호에 대한 신뢰도 스코어를 확인할 수 있습니다.
                    <br><br>
                    <b class="color_ci_02">사용 예)</b><br>대부업 대출 심사 시 특정 연락처에 대한 신뢰도 확인(기존 개인신용평가 변별력 보완 등)
                </p>
            </div><!--cont_box_01-->
            <div class="cont_box_02">

            </div><!--cont_box_01-->
        </div><!--main_cont_01-->

        <div style="height:150px;">
        </div>
        <?php if(false){?>
            <div class="main_cont_02">
                <p class="title_01">공지사항 <span>NOTICE</span></p>
                <table class="notice_table">
                    <?php
                    if(count($notice_array) >0){
                        foreach ($notice_array as $key => $value) {
                            ?>
                            <tr>
                                <th onclick="location.href='view.php?uid=<?php echo $value['uid']?>'"><p><span>[공지]</span><?php echo $value['subject']?></p></th>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <th><p><span>[공지]</span>표시할 내용이 존재하지 않습니다.</p></th>
                        </tr>
                        <?php
                    }
                    ?>

                    <!-- <tr>
                        <th><p><span>[공지]</span> 더치트 공지입니다. 더치트 공지입니다.  더치트 공지입니다. 더치트 공지입니다.  더치트 공지입니다. 더치트 공지입니다.  더치트 공지입니다. 더치트 공지입니다.</p></th><td>2020.06.29</td>
                    </tr>
                    <tr>
                        <th><p><span>[공지]</span> 더치트 공지입니다. 더치트 공지입니다.  더치트 공지입니다. 더치트 공지입니다.  더치트 공지입니다. 더치트 공지입니다.  더치트 공지입니다. 더치트 공지입니다.</p></th><td>2020.06.29</td>
                    </tr> -->
                </table>
                <div class="more_view_btn"><p onclick="location.href='support.php'">더보기 +</p></div>
                <!-- <div class="more_view_btn"><p  onclick="location.href='support.html'">더보기 +</p></div> -->
            </div><!--main_cont_02-->

        <?php } ?>

    </div><!--main_cont_box-->
    <?php require "layout/footer.php";?>

</div><!--wrap-->

</body>

</html>
