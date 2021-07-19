<?php

//use TheCheat\Utils\ServerUtil;
//
//require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
?>
<div class="top_navi_btn">
    <img src="img/top_navi_btn.png" alt="맨위로가기">
</div>
<div class="footer">
    <div class="footer_wrap">
        <div class="bottom_logo_box">
            <a href="index.php"><img src="img/bottom_logo.png" alt="더치트 for developers" /></a>
        </div><!--bottom_logo_box-->
        <div class="bottom_nav_box">
            <ul>
              <?php

              use app\Utils\ServerUtil;

              if(strlen($login_array['api_no'])>0){
              ?>
              <li>
                  <a href="products.php">API 소개</a>
                  <ul>
                      <li><a href="products.php">API 종류</a></li>
                  </ul>
              </li>
              <!--로그인한 회원만 노출?-->

              <li>
                  <a href="statistics.php">API 관리</a>
                  <ul>
                      <li><a href="statistics.php">사용 통계</a></li>
                  </ul>
              </li>
              <li>
                  <a href="support.php" >문의</a>
                  <ul>
                      <li><a href="support.php">공지사항</a></li>
                  </ul>
              </li>
              <?php
              }else{
              ?>
              <li>
                  <a href="products.php">API 소개</a>
                  <ul>
                      <li><a href="products.php">API 종류</a></li>
                      <li><a href="products_charge.php">비용 안내</a></li>
                  </ul>
              </li>
              <!--로그인한 회원만 노출?-->
              <li>
                  <a href="documents.php" >연동규격</a>
                  <ul>
                      <li><a href="documents.php">가이드</a></li>
                  </ul>
              </li>
              <li>
                  <a href="myapp_setting.php">API 관리</a>
                  <ul>
                      <li><a href="application_regist.php">애플리케이션 등록</a></li>
                      <li><a href="myapp_setting.php">애플리케이션 설정</a></li>
                      <li><a href="statistics.php">사용 통계</a></li>
                      <li><a href="contract_application.php">사용계약 신청</a></li>
                  </ul>
              </li>
              <li>
                  <a href="support.php" >문의</a>
                  <ul>
                      <li><a href="support.php">공지사항</a></li>
                      <li><a href="support_inquire.php">문의하기</a></li>
                  </ul>
              </li>
              <?php
              }
              ?>

            </ul>
        </div><!--bottom_nav_box-->
        <script src="js/public.js?<?php echo time()?>"></script>
        <script src="js/sms_auth.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
        <div class="footer_bottom_menu">
            <ul>
                <li><a href="/terms_service" target="_blank">이용약관</a></li>
                <li><a href="/terms_privacy" target="_blank" class="footer_bold">개인정보처리방침</a></li>
                <li class="br_none"><a href="support_inquire.php">문의하기</a></li>
            </ul>
            <p class="copyright">Copyrights ⓒ THECHEAT All Rights Reserved.</p>
        </div>
    </div><!--footer_wrap-->
</div><!--footer-->


