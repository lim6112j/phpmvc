<div class="nav_bg_box"></div>
<div class="top_box">
    <div class="top_wrap">
        <div class="logo_box">
            <a href="/"><img src="img/top_logo.png" alt="더치트 for developers" /></a>
        </div><!--logo_box-->
        <?php
        if(strlen($login_array['member_uid'])>0){
        ?>
        <div class="member_name_01">
            <img src="img/user_img.png" alt="사용자">
            <ul>
                <li><p><?php echo $login_array['company_name']?></p><span>님</span></li>
                <li><a href="my_info.php" class="mypage_btn">기업정보수정</a></li>
                <li><a href="#" class="logout_btn">로그아웃</a></li>
            </ul>
        </div>
        <?php
      }else if(strlen($login_array['api_no'])>0){

      ?>
      <div class="member_name_01">
          <img src="img/user_img.png" alt="사용자">
          <ul>
              <li><p><?php echo $login_array['name']?></p><span>님</span></li>
              <li><a href="#" class="logout_btn">로그아웃</a></li>
          </ul>
      </div>
      <?php
      }else{
      ?>
        <div class="top_login_btn">
            <a href="login">로그인</a>
        </div>
      <?php
      }
      ?>

      <div class="top_nav">
        <ul>
      <?php
      if(strlen($login_array['api_no'])>0){
      ?>
      <li>
          <a href="products">API 안내</a>
          <ul>
              <li><a href="products">API 종류</a></li>
          </ul>
      </li>
      <li>
          <a href="statistics">API 관리</a>
          <ul>
              <li><a href="statistics">사용 통계</a></li>
          </ul>
      </li>
      <li>
          <a href="support">문의</a>
          <ul>
              <li><a href="support">공지사항</a></li>
          </ul>
      </li>
      <?php
      }else{
      ?>
      <li>
          <a href="products">API 안내</a>
          <ul>
              <li><a href="products">API 종류</a></li>
          </ul>
      </li>
      <!--로그인한 회원만 노출?-->
      <li>
          <a href="documents" class="not_use">연동규격</a>
          <ul>
              <li><a href="documents">가이드</a></li>
              <!-- <li><a href="javascript:void(0);" class="not_use">가이드</a></li> -->
          </ul>
      </li>
      <li>
          <a href="myapp_setting">API 관리</a>
          <ul>
              <li><a href="application_regist.php">애플리케이션 등록</a></li>
              <li><a href="myapp_setting">애플리케이션 설정</a></li>
              <li><a href="statistics.php">사용 통계</a></li>
              <li><a href="contract_application.php">사용계약 신청</a></li>
          </ul>
      </li>
      <li>
          <a href="support">문의</a>
          <ul>
            <!-- <li><a href="javascript:void(0);" class="not_use">공지사항</a></li>
            <li><a href="javascript:void(0);" class="not_use">문의하기</a></li> -->
              <li><a href="support">공지사항</a></li>
              <li><a href="support_inquire">문의하기</a></li>
          </ul>
      </li>
      <?php
      }
      ?>

            </ul>
        </div><!--top_nav-->
    </div><!--top_wrap-->
</div><!--top_box-->
