<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME - ABCMall</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/attention/admin/css/common.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script><!-- summernote 기능 쓰려면 필요 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script></head>
</head>
<body>
<div class="background d-flex">
  <nav class="aside tt_03">
    <div class="logo">
        <img src="/attention/admin/img/coderabbit_logo.svg" alt="">
    </div>
    <ul>
      <li><a href="/attention/admin/dashboard/index.php"><i class="bi bi-grid-1x2-fill"></i> 대시보드</a></li>
      <li><a href=""><i class="bi bi-bar-chart"></i> 매출 관리</a></li>
      <li><a href="/attention/admin/class/class_list.php"><i class="bi bi-mortarboard-fill"></i> 강좌 관리</a></li>
      <li><a href="/attention/admin/coupon/coupon_list.php"><i class="bi bi-credit-card-2-front"></i> 쿠폰 관리</a></li>
      <li><a href=""><i class="bi bi-person-fill"></i> 회원 관리</a></li>
      <li><a href="/attention/admin/notice/notice.php"><i class="bi bi-layout-text-sidebar-reverse"></i> 게시판 관리</a></li>
    </ul>
  </nav>
  <div class="main">
    <div class="profile text-end">
      <i class="bi bi-bell icon_gray"></i>
      <i class="bi bi-emoji-sunglasses icon_gray"></i>
      <span class="tt_03">admin</span>
    </div>
