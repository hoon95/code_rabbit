<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/header.php';
	// include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/admin_check.php';
?>
<link rel="stylesheet" href="/attention/admin/coupon/css/coup_ok.css">
<div class="common_pd">
	<h2 class="h1">쿠폰 등록</h2>
	<form action="coupon_ok.php" class="coup_text" method="post" enctype="multipart/form-data">
		<table>
			<tbody>
				<tr class="space">
					<th><h3 class="tt_03">쿠폰명</h3></th>
					<td><input type="text" id="coupon_name" name="coupon_name" class="form-control" placeholder="이름을 입력해주세요" required></td>
				</tr>
				<tr class="space">
					<th><h3 class="tt_03">첨부파일</h3></th>
					<td class="d-flex align-items-end coup_thumbnail_box">
						<div class="coup_thumbnail" id="file_table_id"  value="" >
						</div>
						<input type="file" class="coup_hidden" name="coupon_image" id="coupon_image" value="" required>
						<button type="button" class="btn btn-secondary coup_img">첨부파일</button>
					</td>
				</tr>
				<tr class="space">
					<th><h3 class="tt_03">할인액</h3></th>
					<td><input type="number" id="coupon_price"  min="10000" max="1000000" step="10000" name="coupon_price" class="form-control" required></td>
				</tr>
				<tr class="space">
					<th><h3 class="tt_03">쿠폰설정</h3></th>
						<td class="coupon_status_box d-flex">
							<div class="coup_type coupon_status">
								<input type="radio" name="status" checked value="활성화" id="price">
								<label for="price" class="status">활성화</label>
							</div>
							<div class="coup_type coupon_status">
								<input type="radio" name="status" value="비활성화" id="ratio">
								<label for="ratio" class="status">비활성화</label>
							</div>
					</td>
				</tr>
				<tr class="space">
					<th><h3 class="tt_03">기한</h3></th>
						<td class="coup_type_box d-flex">
							<div class="d-flex">
								<div class="coup_type coup_date">
									<input type="radio" name="regdate" checked value="무제한" id="infinite_date_box">
									<label for="infinite_date_box" class="infinite_date">무제한</label>
								</div>
								<div class="coup_type coup_date">
									<input type="radio" name="regdate" value="제한" id="day_date_box">
									<label for="day_date_box" class="day_date">제한</label>
								</div>
							</div>
							<div class="coup_type_date_box d-flex align-items-center">
								<input type="number" id="regdate_box" name="regdate"  min="1" max="24" step="1"  class="form-control" required disabled>
								<span>개월</span>
							</div>
						</td>
				</tr>
			</tbody>
		</table>
		<div class="coup_button d-flex justify-content-end">
			<button class="btn btn-primary">등록</button>
			<button class="btn btn-dark">닫기</button>
		</div>
	</form>
</div>
<script>
	$(".coup_img").click(function() {
    $(".coup_hidden").trigger("click");
	})

	$(".infinite_date").on("click", function () {
			$("#regdate_box").prop("disabled", true);
	});

	$(".day_date").on("click", function () {
			$("#regdate_box").prop("disabled", false);
	});

	$('.coup_hidden').change(function(){
		let file = $(this).prop('files');
		attachFile(file);
	});

	function attachFile(file) {
		console.log(file);
		let formData = new FormData(); //페이지 전환없이 이페이지 바로 이미지 등록
		formData.append('savefile', file[0]) //<input type="file" name="savefile" value="파일명">
		console.log(formData);
		$.ajax({
		url: 'coupon_save_image.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		dataType: 'json',
		type: 'POST',
		error: function (error) {
			console.log('error:', error)
		},
		success: function (return_data) {

			console.log(return_data);

			if (return_data.result == 'image') {
			alert('이미지파일만 첨부할 수 있습니다.');
			return;
			} else if (return_data.result == 'size') {
			alert('10메가 이하만 첨부할 수 있습니다.');
			return;
			} else if (return_data.result == 'error') {
			alert('관리자에게 문의하세요');
			return;
			} else {
			//첨부이미지 테이블에 저장하면 할일
			let imgid = $('#file_table_id').val() + return_data.imgid + ',';
			$('#file_table_id').val(imgid);
			let html = `
				<div class="thumb" id="f_${return_data.imgid}" data-imgid="${return_data.imgid}">
					<img src="/attention/pdata/${return_data.savefile}" alt="">
				</div>
			`;
			$('#file_table_id').append(html);
			}
		}

		});
	}

</script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/attention/admin/inc/footer.php';
?>