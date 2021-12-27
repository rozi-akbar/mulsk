<?php
if ($action == "Update") {
	foreach ($field as $column) {
		$cId           =    $column['banner_id'];
		$desktop_file  =    $column['banner_desktop'];
		$mobile_file   =    $column['banner_mobile'];

		$cIconButton   =   "refresh";
		$cValueButton  =   "Update Data";
	}
	$cAction = "Update/" . $cId . "";
} else {
	$cId           =    "";
	$desktop_file  =    "";
	$mobile_file   =    "";

	$cIconButton   = "save";
	$cValueButton  = "Save Data";
	$cAction       = "Insert";
}
?>
<div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Subheader -->
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container kt-container--fluid">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <?= $file ?>
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="row">
			<div class="col-xl-12">

				<!--begin::Portlet-->
				<div class="kt-portlet">
					<!--begin::Portlet Header-->
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<span class="kt-portlet__head-icon kt-hide">
								<i class="la la-gear"></i>
							</span>
							<h3 class="kt-portlet__head-title">
								Form Home Banner
							</h3>
						</div>
					</div>
					<!--end::Portlet Header-->

					<!--begin::Portlet Body-->
					<form class="kt-form" method="post" enctype="multipart/form-data" action="<?= site_url('Home/Banner/Crud/' . $cAction . '') ?>">
						<div class="kt-portlet__body">
							<div class="form-group form-group-last">
								<div class="alert alert-secondary" role="alert">
									<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
									<div class="alert-text">
										<p style="font-size: 11px; margin: 0;">Image Requirement:
										<ul style="font-size: 11px; padding-inline-start:25px;">
											<li>Desktop: ratio 1920px x 600px</li>
											<li>Mobile: ratio 1020px x 600px</li>
											<li>File Size max. 500 Kb</li>
											<li>JPEG / JPG / PNG</li>
										</ul>
										</p>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>File Desktop</label>
								<div></div>
								<input type="file" name="image_desktop" accept="image/png, image/jpeg" class="form-control" onchange="readURL(this);" id="image_desktop" />
								<img style="width: 100px;" src="<?= base_url() ?>assets/images/image2x.png?rand=<?php echo rand(); ?>" id="img_preview_desktop" alt="your image" />
								<?php
								if ($action == "Update") {
								?>
									<input type="hidden" name="image_desktop_edit" value="<?= $desktop_file ?>" onchange="readURL(this);" />
									<img style="width: 210px;" src="<?= base_url() . 'assets/images/banner/' . $desktop_file ?>?rand=<?php echo rand(); ?>" id="img_preview_desktop" alt="your image" />
								<?php
								}
								?>
							</div>
							<div class="form-group">
								<label>File Mobile/Tablet</label>
								<div></div>
								<input type="file" name="image_mobile" accept="image/png, image/jpeg" class="form-control" onchange="readURL(this);" id="image_mobile" />
								<img style="width: 100px;" src="<?= base_url() ?>assets/images/image2x.png?rand=<?php echo rand(); ?>" id="img_preview_mobile" alt="your image" />
								<?php
								if ($action == "Update") {
								?>
									<input type="hidden" name="image_mobile_edit" value="<?= $mobile_file ?>" />
									<img style="width: 200px; right='0'" src="<?= base_url() . 'assets/images/banner/' . $mobile_file ?>" />
								<?php
								}
								?>
							</div>
							<div class="kt-portlet__foot">
								<div class="kt-form__actions">
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="reset" class="btn btn-secondary">Cancel</button>
								</div>
							</div>
						</div>
					</form>
					<!--end::Portlet Body-->
				</div>

				<!--end::Portlet-->

			</div>

			<div class="col-xl-12">

				<!--begin::Portlet-->
				<div class="kt-portlet">
					<!--begin::Portlet Header-->
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<span class="kt-portlet__head-icon kt-hide">
								<i class="la la-gear"></i>
							</span>
							<h3 class="kt-portlet__head-title">
								Tabel Home Banner
							</h3>
						</div>
					</div>
					<!--end::Portlet Header-->

					<!--begin::Portlet Body-->
					<div class="kt-portlet__body">

						<!--begin: Datatable -->
						<table class="table table-striped table-bordered table-hover table-checkable" id="Datatables">
							<thead>
								<tr>
									<th>No</th>
									<th>Desktop Banner</th>
									<th>Mobile Banner</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 0;
								foreach ($home_banner as $key => $vData) { ?>
									<tr>
										<td><?= ++$no ?></td>
										<td><img src="<?= base_url() ?>/assets/images/banner/<?= $vData['banner_desktop'] ?>" style="width:200px"></td>
										<td><img src="<?= base_url() ?>/assets/images/banner/<?= $vData['banner_mobile'] ?>" style="width:200px"></td>
										<td>
											<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
												<!-- <button type="button" class="btn btn-outline-success btn-icon" data-toggle="modal" data-target="#user_detail" onclick="get_data_user(<?= $vData['id_banner'] ?>)"><i class="fa fa-eye"></i></button> -->
												<a type="button" href="<?= base_url() ?>Home/Banner/index/Update/<?= $vData['banner_id'] ?>" class="btn btn-outline-info btn-icon"><i class="fa fa-pen"></i></a>
												<a type="button" href="<?= base_url() ?>Home/Banner/Crud/Delete/<?= $vData['banner_id'] ?>" class="btn btn-outline-danger btn-icon" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
											</div>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

						<!--end: Datatable -->
					</div>
					<!--end::Portlet Body-->
				</div>

				<!--end::Portlet-->
			</div>
		</div>
    </div>
</div>

<script>
	function get_data_user(id = "") {
		$.ajax({
			url: "<?= base_url(); ?>Administrator/Action/get_data_user/",
			method: "POST",
			data: {
				id: id
			},
			cache: false,
			beforeSend: function() {
				$('#table_user_detail').html('<option>Loading...</option>');
			},
			success: function(msg) {
				$('#table_user_detail').html(msg);
			}
		})
	}

	function readURL(input) {
		const p_image = input;

		if (p_image.files.length > 0) {
			for (const i = 0; i <= p_image.files.length - 1; i++) {

				var filetype = p_image.files[0].type;
				alert(filetype);
				const fsize = p_image.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (filetype === 'image/png' || filetype === 'image/jpeg') {
					if (file >= 500) {
						alert("File too Big, please select a file less than 500 Kb");
						p_image.value = null;
					} else {
						if (input.files && input.files[0]) {
							var reader = new FileReader();

							reader.onload = function(e) {
								if (input.getAttribute('id') === 'image_desktop') {
									$('#img_preview_desktop')
										.attr('src', e.target.result)
										.width(210)
										.height(70);
								} else if (input.getAttribute('id') === 'image_mobile') {
									$('#img_preview_mobile')
										.attr('src', e.target.result)
										.width(200)
										.height(120);
								} else if (input.getAttribute('id') === 'image_desktop_edit') {
									$('#img_preview_desktop')
										.attr('src', e.target.result)
										.width(210)
										.height(70);
								} else if (input.getAttribute('id') === 'image_mobile_edit') {
									$('#img_preview_mobile')
										.attr('src', e.target.result)
										.width(200)
										.height(120);
								}
							};
							reader.readAsDataURL(input.files[0]);
						}
					}
				} else{
					alert("File type must be JPG/JPEG or PNG");
					p_image.value = null;
				}
			}
		}
	}
</script>
