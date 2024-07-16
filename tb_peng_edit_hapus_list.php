<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA PENGAJUAN</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
                <?php
             $sess1 = $_SESSION['email'];
             $q1 = $this->db->query("SELECT jabatan FROM user WHERE email='$sess1'")->result();
             foreach ($q1 as $yang_login1) { 
                $akses_tombol = "";

                     if($yang_login1->jabatan=='Bendahara')$akses_tombol = "<a href='peng_edit_hapus/create' class='btn btn-danger btn-sm' data-popup='tooltip' data-placement='top' title='Tambah Data'>Tambah Data </a>";
                ?>
             <?php echo $akses_tombol ?>
            
         <?php } ?>
             
         </div>
            </div>
            <div class='col-md-3'>
           
            </div>
            </div>
        
   
       
        <table class="table table-bordered" style="margin-bottom: 10px" id="tabel_pengajuan">
            <thead>
            <tr>
                <th>No</th>
		<th>Yang Pengajukan</th>
		<th>Kepada</th>
        <th>Pengajuan</th>
		<th>Balasan Pengajuan</th>
		<th>Action</th>
            </tr>
            </thead>
            <?php
            $peng_edit_hapus_data = $this->db->query("SELECT LENGTH(balasan_pengajuan) AS data_peng, full_name, id_p_edit_hapus, pengajuan, kepada, balasan_pengajuan, yang_mengajukan FROM tb_peng_edit_hapus INNER JOIN tbl_user ON tbl_user.id_users=tb_peng_edit_hapus.yang_mengajukan")->result();
            foreach ($peng_edit_hapus_data as $peng_edit_hapus)
            {


             $sess = $_SESSION['email'];
             $q = $this->db->query("SELECT jabatan FROM tbl_user WHERE email='$sess'")->result();
             foreach ($q as $yang_login) {
                $akses_action = "<a data-toggle='modal' data-target='#modal-balas$peng_edit_hapus->id_p_edit_hapus' class='btn btn-primary btn-sm' data-popup='tooltip' data-placement='top' title='Berikan Balasan'><i class='fa fa-eye'></i></a>";

                     if($yang_login1->jabatan=='Bendahara' && $peng_edit_hapus->data_peng=='0')$akses_action = "
                    <a href='peng_edit_hapus/read/$peng_edit_hapus->id_p_edit_hapus' class='btn btn-primary btn-sm' data-popup='tooltip' data-placement='top' title='Ubah Data'><i class='fa fa-eye'></i></a>
                     <a href='peng_edit_hapus/update/$peng_edit_hapus->id_p_edit_hapus' class='btn btn-warning btn-sm' data-popup='tooltip' data-placement='top' title='Ubah Data'><i class='fa fa-pencil-square-o'></i></a>
                     <a href='peng_edit_hapus/delete/$peng_edit_hapus->id_p_edit_hapus' class='btn btn-danger btn-sm' onclick='return confirm('Apakah Anda Ingin Menghapus Data ?');' data-popup='tooltip' data-placement='top' title='Hapus Data'><i class='fa fa-trash'></i></a";

                ?>
                <tr>
            <td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $peng_edit_hapus->full_name ?></td>
            <?php
                $nama_akun = $this->db->query("SELECT * FROM tbl_user WHERE id_users='$peng_edit_hapus->kepada'");
            foreach ($nama_akun->result() as $nama_akun1)
            {
                ?><td><?php echo $nama_akun1->full_name ?></td>
                <?php } ?>
			
            <td><?php echo $peng_edit_hapus->pengajuan ?></td>
			<td><?php echo $peng_edit_hapus->balasan_pengajuan ?></td>
			<td style="text-align:center" width="200px">
				<?php echo $akses_action ?>
			</td>
		</tr>
                <?php
        }
        }
            ?>
        </table>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>

<?php $no=0; foreach($peng_edit_hapus_data as $peng_edit_hapus): $no++; ?>
<?php $no=0; foreach($nama_akun->result() as $nama_akun1): $no++; ?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-balas<?php echo $peng_edit_hapus->id_p_edit_hapus?>" class="modal fade">
    <div class="modal-dialog">
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">BERIKAN BALASAN</h3>
            </div>
           <form action="<?php echo site_url('peng_edit_hapus/berikan_balasan') ?>" method="post">
<table class='table table-bordered'>        

        <input type="hidden" id="id_p_edit_hapus" name="id_p_edit_hapus" value="<?php echo $peng_edit_hapus->id_p_edit_hapus; ?>" />
        
        <tr><td width='200'>OLEH</td>
            <td><?php echo $peng_edit_hapus->full_name; ?></td></tr>
         <tr><td width='200'>KEPADA</td>
            <td><?php echo $nama_akun1->full_name; ?></td></tr>

        <tr><td width='200'>PENGAJUAN</td>
            <td><?php echo $peng_edit_hapus->pengajuan; ?></td></tr>
            <?php
             if ($peng_edit_hapus->data_peng!=='0') { ?>
                <tr><td width='200'>BALASAN PENGAJUAN</td>
            <td><?php echo $peng_edit_hapus->balasan_pengajuan; ?></td></tr>
            <tr><td></td><td><button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Kembali</button></td>
        
     <?php } elseif ($peng_edit_hapus->data_peng=='0') { ?>
         
 <tr><td width='200'>BALASAN PENGAJUAN</td><td> <textarea class="form-control" rows="3" name="balasan_pengajuan" id="balasan_pengajuan" placeholder="Berikan balasan"></textarea></td></tr>
        
        <tr><td></td><td> 
                <button type="submit" class="btn btn-success btn-sm">SIMPAN</button> 
                    <button type="reset" class="btn btn-danger btn-sm" value="Reset">Reset</button>
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Kembali</button></td>
                            <?php 
    }?>
        
    </table></form>        </div>
</div>
</div>
<?php endforeach; ?>
<?php endforeach; ?>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabel_pengajuan').DataTable();
    });
</script>