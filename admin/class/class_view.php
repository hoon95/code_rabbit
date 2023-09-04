<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';

$pid = $_GET['pid'];

$sql = "SELECT * FROM class where pid={$pid}";

$result = $mysqli -> query($sql);
  $rs = $result -> fetch_object();

  $sql2 = "SELECT * FROM class_image_table where pid={$pid}";
  $result2 = $mysqli -> query($sql2);

  while($rs2 = $result2 -> fetch_array()){
    $imgs[] = $rs2;
  }
  
?>
<link rel="stylesheet" href="/attention/admin/css/class_view.css">
<div class="common_pd">
      <p class="tt_01 class_ss_mt class_m_pd text-center">강좌상세보기</p>
      <div class="d-flex">
        <img src="../img/test2.png" alt="" class="class_v_img">
        <ul class="class_view_title d-flex flex-column justify-content-between">
          <li class="text2 class_bold">강좌명<span class="text2"><?php echo $rs->name ?></span></li>
          <li class="text2 class_bold">난이도<span class="text2 class_level_tag orange"><?php if($rs->level==1){echo "초급";} if($rs->level==2){echo "중급";} if($rs->level==3){echo "상급";} ?></span></li>
          <li class="text2 class_bold">공개 여부<span class="text2 class_m_ml"><?php if($rs->status==0){echo "비공개";} if($rs->status==1){echo "공개";}  ?></span></li>
          <li class="text2 class_bold">수강기한<span class="text2"><?php if($rs->sale_end_date==0){echo "무제한";} if($rs->sale_end_date!==0){echo "{$rs->sale_end_date}개월";}  ?></span></li>
        </ul>
      </div>
      <hr>
      <div class="d-flex">
        <ul>
          <li class="text2 class_sm_pd">
            <span class="class_bold class_title">카테고리</span>
            <span class=""></span>
          </li>
          <li class="text2 class_sm_pd">
            <span class="class_bold class_title">강좌영상</span>
            <span class=""><a href="<?php echo $rs->video ?>" class="text2 class_sm_pd address_color"><?php echo $rs->video ?></a></span>
          </li>
          <li class="text2 class_sm_pd d-flex">
          <span class="class_bold">강좌소개</span>
            <span class="class_into"><?php echo $rs->content ?></span>
          </li>
        </ul>
      </div>
      <hr class="class_hr">  
      <div class="d-flex justify-content-end">
        <button class="class_close btn btn-dark sm-ml">닫기</button> 
      </div>    
      <!-- <table class="table">
        <tbody>
          <tr class="d-flex align-items-center">
            <td class="class_img"><img src="../img/test2.png" alt=""></td>
            <td>
              <div class="text2 class_bold class_sm_pd">강좌명</div>
              <div class="text2 class_bold class_sm_pd">난이도</div>
              <div class="text2 class_bold class_sm_pd">공개 여부</div>
              <div class="text2 class_bold">수강기한</div>
            </td>
            <td class="class_m_ml">
              <div class="text2 class_sm_pd">웹디자이너를 위한 피그마 100% 활용 기초</div>
              <div class="text2 class_sm_pd"><span class="class_level_tag orange">초급</span></div>
              <div class="text2 class_sm_pd">공개</div>
              <div class="text2">1개월</div>
            </td>
          </tr>
        </tbody>
      </table>
      <hr class="class_hr">
      <table class="table">
        <tbody>
          <tr>
            <th>
              <div class="text2 class_bold class_sm_pd class_cate class_view_w">카테고리</div>
            </th>
            <td class="class_m_ml">
            <div class="text1 class_sm_pd">Computer > Design > 피그마</div>
            </td>
          </tr>
          <tr>
            <th>
              <div class="text2 class_bold class_sm_pd class_view_w">강좌영상</div>
            </th>
            <td class="class_m_ml">
              <a href="https://www.youtube.com" class="text2 class_sm_pd address_color">https://www.youtube.com</a>
            </td>
          </tr>
          <tr>
            <th>
              <div class="text2 class_bold class_view_w">강좌소개</div>
            </th>
            <td class="class_m_ml">
            
              <div class="text2 class_into">입문자를 위해 준비한[프로그래밍 언어] 강의입니다.
                이미 2만명 이상이 학습하고 만족한 최고의 프로그래밍 입문 강의. 
                인프런이 비전공자 위치에서 직접 기획하고 준비한 프로그래밍 입문 강의로,
                프로그래밍을 전혀 접해보지 못한 사람부터 실제 활용 가능한 프로그래밍 능력까지 갈 수 있도록 
                도와주는 강의입니다.</div>
            </td>
          </tr>
        </tbody>
      </table>
  
      <hr class="class_hr">  <div class="d-flex justify-content-end">
        <button class="btn btn-dark sm-ml">닫기</button> -->
      
    </div>
  <script>
    $('.class_close').click(function(e){
      e.preventDefault();
        history.back();
    });
  </script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>