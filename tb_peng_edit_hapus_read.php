<div class="content-wrapper">

    <section class="content">
        <div class="col-md-6" style="margin-left: 250px">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">READ DATA PENGAJUAN</h3>
            </div>

            <table class='table table-bordered'>
	    <tr><td>Pengajuan</td><td><?php echo $pengajuan; ?></td></tr>
        <tr><td>OLEH</td><td><?php echo $yang_mengajukan; ?></td></tr>
	    <tr><td>Kepada</td><td><?php echo $kepada; ?></td></tr>
	    <tr><td>Balasan Pengajuan</td><td><?php echo $balasan_pengajuan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('peng_edit_hapus') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
</div></div></section></div>