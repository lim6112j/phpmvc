<?php
$move_uri = $_SERVER['REQUEST_URI'];
$menu_table = array();

if(strlen($login_array['api_no'])>0){
  $menu_table = [
    0 =>[
        'name'=>'API 안내',
        'href'=>'products.php',
        'sub_menu'=>[
          0=>[
            'name'=>'API 소개',
            'href'=>'products.php',
            'class'=>'menu_intro',
          ],
        ],
    ],
    1 =>[
        'name'=>'API 관리',
        'href'=>'statistics.php',
        'sub_menu'=>[
          0=>[
            'name'=>'사용 통계',
            'href'=>'statistics.php',
            'class'=>'menu_statistics',
          ],
        ],
    ],
    2 =>[
        'name'=>'문의',
        'href'=>'support.php',
        'sub_menu'=>[
          0=>[
            'name'=>'공지사항',
            'href'=>'support.php',
            'class'=>'menu_notice',
          ],
        ],
    ],
  ];
}else{
  $menu_table = [
    0 =>[
        'name'=>'API 안내',
        'href'=>'products.php',
        'sub_menu'=>[
          0=>[
            'name'=>'API 소개',
            'href'=>'products.php',
            'class'=>'menu_intro',
          ],
        ],
    ],
    1 =>[
        'name'=>'연동규격',
        'href'=>'documents.php',
        // 'href'=>'javascript:void(0);',
        'class'=>'not_use',
        'sub_menu'=>[
          0=>[
            'name'=>'가이드',
            'href'=>'documents.php',
            'class'=>'menu_guide',
          ],
        ],
    ],
    2 =>[
        'name'=>'API 관리',
        'href'=>'myapp_setting.php',
        'sub_menu'=>[
          0=>[
            'name'=>'애플리케이션 등록',
            'href'=>'application_regist.php',
            'class'=>'menu_registration',
          ],
          1=>[
            'name'=>'애플리케이션 설정',
            'href'=>'myapp_setting.php',
            'class'=>'menu_myapp',

          ],
          2=>[
            'name'=>'사용 통계',
            'href'=>'statistics.php',
            'class'=>'menu_statistics',
          ],
          3=>[
            'name'=>'사용계약 신청',
            'href'=>'contract_application.php',
            'class'=>'menu_partnership',
          ],
        ],
    ],
    3 =>[
        'name'=>'문의',
        'href'=>'support.php',
        'sub_menu'=>[
          0=>[
            'name'=>'공지사항',
            'href'=>'support.php',
            'class'=>'menu_notice',
          ],
          1=>[
            'name'=>'문의하기',
            'href'=>'support_inquire.php',
            // 'href'=>'javascript:void(0);',
            'class'=>'menu_inquiry',
          ],
        ],
    ],
  ];
}

// print_r($menu_table);
$rerquest_file =basename($_SERVER['REQUEST_URI']);
if(mb_strpos(strtolower($rerquest_file),strtolower("inquire")) !== false){
  $rerquest_file= "support_inquire.php";
}

if(mb_strpos(strtolower($rerquest_file),strtolower("support_write.php")) !== false){
  $rerquest_file= "support.php";
}
if(mb_strpos(strtolower($rerquest_file),strtolower("view.php")) !== false){
  $rerquest_file= "support.php";
}


$selct_menu = "";
foreach ($menu_table as $key => $value) {
  if(mb_strpos(strtolower($rerquest_file),strtolower($value['href'])) !== false){

    $menu_table[$key]['class'] = $menu_table[$key]['class']." "."menu_focus_01";
    $selct_menu = $key;
  }
  if(!empty($value['sub_menu'])){
    foreach ($menu_table[$key]['sub_menu'] as $key2 => $value2) {
      if(mb_strpos(strtolower($rerquest_file),strtolower($value2['href'])) !== false){
        $selct_menu = $key;
        $menu_table[$key]['sub_menu'][$key2]['class'] = $menu_table[$key]['sub_menu'][$key2]['class']." "."menu_focus_02";
        $menu_table[$key]['class'] = $menu_table[$key]['class']." "."menu_focus_01";
      }
    }
  }
}

?>

<div class="sub_menu_box">
    <div class="sub_menu">
        <ul>

            <li>
                <a class="<?php echo $menu_table[$selct_menu]['class']?>" href="<?php echo $menu_table[$selct_menu]['href']?>"><?php echo $menu_table[$selct_menu]['name']?></a>
                <?php
                if(!empty($menu_table[$selct_menu]['sub_menu'])){
                ?>
                <ul class="<?php echo $menu_table[$selct_menu]['class']?>">
                <?php
                  foreach ($menu_table[$selct_menu]['sub_menu'] as $key2 => $value2) {
                ?>
                    <li ><a class="<?php echo $value2['class']?>" href="<?php echo $value2['href']?>" ><?php echo $value2['name']?></a></li>
                <?php
                  }
                ?>
                  </ul>
                <?php
                }
                ?>
            </li>


        </ul>
    </div>
</div>
