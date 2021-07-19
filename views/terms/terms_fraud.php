<?php
// https://api.thecheat.co.kr/terms_service.php
// https://thecheat.co.kr/thecheat/terms_service.php

header("pragma: no-cache");

//$css_pass = "/pass/";
$css_pass = "./bootstrap/";

$width = $_GET['w'];
$width = preg_replace("/[^0-9]/","",$width); // 숫자만 남긴다.

if($width>0){
	$class_string = "";
}else{
	$class_string = "showcase";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>더치트 :: 피해사례 등록 약관 </title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $css_pass;?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="<?php echo $css_pass;?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo $css_pass;?>vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic,Nanum+Gothic" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?php echo $css_pass;?>css/landing-page.css?<?php echo $test_time;?>" rel="stylesheet">
</head>

<body>
<!-- Image Showcases -->
<section class="<?php echo $class_string;?>">
    <div class="container-fluid p-0" style="background:#fff;">
        <div class="row no-gutters">
            <div class="col-lg-12 order-lg-1 my-auto showcase-text pb-4">
                <div>
                    <span style="font-size:28px;font-weight:bold;line-height: 160%;color:#333333;">더치트 피해사례 등록 약관</span>
                </div>
                <div class="text-right small" style="border-bottom:1px solid #ccc;">
					시행일자 : 2006.01.04.
                </div>
            </div>
        </div>		
		<!------------------------------------------------------------------------------------------------------------->
		<!------------------------------------------------------------------------------------------------------------->
		<!------------------------------------------------------------------------------------------------------------->
		<!-- 장 -->
        <div class="row no-gutters">
            <div class="col-lg-12 order-lg-1 my-auto showcase-text pt-0 pb-2">
             
            </div>
        </div>
		<!--// 장 -->
		
		<!-- 조 -->
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-12 order-lg-1 my-auto showcase-text pb-2" style="padding-top:0px;">
                    <div class="text-xl-left bd-highlight text-break text-lowercase text-wrap font-weight-light pl-3 pb-3">
                        <div class="text-left font-weight-bold pb-0 pt-0">
                            · 피해사례 등록 약관
                        </div>
                    </div>
                    <div class="text-xl-left bd-highlight text-break text-lowercase text-wrap font-weight-light pl-3 pb-3">
                        <div class="text-left">
                            1. 본인이 등록한 피해사례 정보는 추가 피해를 방지하기 위한 목적으로 개인, 기업, 수사기관 등 제3자에게 제공됨을 동의합니다. 
                        </div>
                        <div class="text-left">
                            2. 본인이 등록한 피해사례 정보는 경찰서에 직접 방문하여 신고 접수할 예정이거나 신고 접수가 완료된 사례임을 확인합니다. 
                        </div>
                        <div class="text-left">
                            3. 허위사실 유포, 명예훼손 등 법적분쟁 발생 시 모든 책임은 피해사례 등록자에게 있으며, 피해사례의 사실확인을 위해 검증과정에 참여할 것임을 확인합니다. 
                        </div>
                        <div class="text-left">
                            4. 용의자에게 피해사례 등록 사실이 통지되며, 소통을 위한 연락처 정보의 제공에 동의합니다. 
                        </div>
                        <div class="text-left">
                            5. 피해해결 및 원금회복을 위해 용의자의 삭제요청 및 관련 정보 수신(SMS, 이메일 등)에 동의합니다. 
                        </div>
                        <div class="text-left">
                            6. 수사진행 상황 및 검거소식, 고맙습니다! 캠페인 등의 정보 수신(SMS, 이메일 등)에 동의합니다. 
                        </div>
                        <div class="text-left">
                            7. 피해사례 등록자와 용의자의 식별정보 및 개인정보(이름, 전화번호, 계좌번호, 아이디 등)를 피해회복과 추가 피해예방을 위해 더치트가 취급 및 처리함에 동의합니다. 
                        </div>
                    </div>

                    <div class="text-xl-left bd-highlight text-break text-lowercase text-wrap font-weight-light pl-3 pb-3">
						<div class="text-left font-weight-bold pb-0 pt-3">
                           · 약관을 위배하는 경우, 다음과 같은 처벌을 받을 수 있습니다. 
                        </div>
                        <div class="text-left">
							<br>1. 사람을 비방할 목적으로 정보통신망을 통하여 공연히 사실을 적시하여 타인의 명예를 훼손하는 경우 3년 이하의 징역이나 금고 또는 2천만원 이하의 벌금에 처하고 
							사람을 비방할 목적으로 정보통신망을 통하여 공연히 허위의 사실을 적시하여 타인의 명예를 훼손하는 경우에는 7년 이하의 징역, 10년 이하의 자격정지 또는 5천만원 이하의 벌금에 처할 수 있습니다. 
							<br>2. 개인적인 앙심 또는 괘씸함 등 사기범죄 외의 사유로 등록하시는 경우, 명예훼손에 해당될 수 있으며 이는 민·형사상의 불이익을 받을 수 있습니다. 
							<br>3. 제품에 대한 상태불만, 반품거부, 택배비 착불등의 사례 등록은 영업방해 및 명예훼손에 해당될 수 있습니다.
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--// 조 -->
		
		<!------------------------------------------------------------------------------------------------------------->
		<!------------------------------------------------------------------------------------------------------------->
		<!------------------------------------------------------------------------------------------------------------->
		<!-- 끝 -->
        <div class="row no-gutters">
            <div class="col-lg-12 order-lg-1 my-auto showcase-text pt-5 pb-5">
               
            </div>
        </div>
		<!--// 끝 -->

    </div>
</section>

<!-- Bootstrap core JavaScript -->

</body>

</html>
