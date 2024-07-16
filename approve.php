<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PENGAJUAN</h3>
            </div>
            <form action="<?php echo site_url('peng_edit_hapus/create_action') ?>" method="post">
            
<table class='table table-bordered'>        
         <tr><td width='200'>Yang Pengajukan</td><td>
         <select name="yang_mengajukan" id="yang_mengajukan" style="width: 250px" class="form-control">
                <option value="">--Pilih--</option>
                <?php
                $list = $this->db->query("SELECT * FROM user");
                foreach($list->result() as $t){
                ?>
                  <option value="<?php echo $t->username ?>" <?php if($yang_mengajukan== "$t->username"){ echo 'selected'; } ?>><?php echo $t->full_name ?>/<?php echo $t->jabatan ?></option>
                  <?php 
                  } 
                  ?>
                </select></td>

        <tr><td width='200'>Ditunjukkan Kepada</td><td>
         <select name="kepada" id="kepada" style="width: 250px" class="form-control">
                <option value="">--Pilih--</option>
                <?php
                $list = $this->db->query("SELECT * FROM user");
                foreach($list->result() as $t){
                ?>
                  <option value="<?php echo $t->username ?>" <?php if($kepada== "$t->username"){ echo 'selected'; } ?>><?php echo $t->full_name ?>/<?php echo $t->jabatan ?></option>
                  <?php 
                  } 
                  ?>
                </select></td>
	    
        <tr><td width='200'>Keterangan Pengajuan <?php echo form_error('pengajuan') ?></td><td> <textarea class="form-control" rows="3" name="pengajuan" id="pengajuan" placeholder="Pengajuan"><?php echo $pengajuan; ?></textarea></td></tr>

	    <tr><td></td><td><input type="hidden" name="id_p_edit_hapus" value="<?php echo $id_p_edit_hapus; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> CREATE</button> 
	    <a href="<?php echo site_url('peng_edit_hapus') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script type="text/javascript">
    $(function() {
        //autocomplete
        $(document).ready(function() {
    $('#yang_mengajukan').select2()
        });    
    });

    $(function() {
        //autocomplete
        $(document).ready(function() {
    $('#kepada').select2()
        });    
    });
</script>