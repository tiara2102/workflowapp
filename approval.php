
<div class="content-wrapper">
    <ul class="nav nav-tabs">
  <li><a href="<?php echo site_url('approve_prf_f') ?>"><h5 style=" color: grey; font-family:Arial;">APPROVE PRF FARMASI</h5></a></li>
  <li><a href="<?php echo site_url('approve_prf_s') ?>"><h5 style=" color: grey; font-family:Arial;">APPROVE PRF SARPRAS</h5></a></li>
</ul>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">APPROVE DATA PENGAJUAN</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('approve_prf/index'); ?>" class="form-inline" method="get">
                </form>
            </div>
            </div>
            <?=$this->session->flashdata('message')?>
          <table class="table table-striped table-bordered" cellspacing="0" id="mytable">
              <thead>
        <th>No</th>
        <th>Username</th>
        <th>Departemen</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>attachment</th>
            </tr>
            </thead><?php
            $approve_prf_data = $this->db->query("SELECT tb_prf.deskripsi_ditolak,tb_prf.tgl_bayar, kode_no_prf,tb_prf.nomor_prf,tb_prf.nama_distributor,tb_prf.total_biaya,tb_prf.status_prf,tb_prf.prf_status, tb_perusahaan.nama_perusahaan  
            FROM tb_prf 00000000
            INNER JOIN tb_perusahaan ON tb_perusahaan.id_perusahaan=tb_prf.nama_distributor
            WHERE prf_status='Farmasi' ORDER BY nomor_prf DESC");
            foreach ($approve_prf_data->result()  as $approve_prf)
            {
                $statusprf = "<span style='font-size:10;' class='label label-success'>Telah Disetujui</span>";
                    if($approve_prf->status_prf=='belum disetujui')$statusprf = "
                <a href='approve_prf_f/disetujui/$approve_prf->nomor_prf' class='btn btn-success btn-sm' data-popup='tooltip' data-placement='top' title='Disetujui'><i class='fa fa-check' aria-hidden='true'></i></a>
                
                 <a href='approve_prf_f/ditolak/$approve_prf->nomor_prf' class='btn btn-danger btn-sm data-popup='tooltip' data-placement='top' title='Ditolak Data'><i class='fa fa-times' aria-hidden='true'></i></i></a>";
                    else if($approve_prf->status_prf=='ditolak')$statusprf = "<span style='font-size:10;' class='label label-danger'>Ditolak</span>";

                ?>

                <tr>
            <td width="10px"><?php echo ++$start ?></td>
            <td><?php echo $approve_prf->kode_no_prf ?></td>
            <td><?php echo $approve_prf->nama_perusahaan ?></td>
            <td><?php echo 'Rp. '.number_format($approve_prf->total_biaya) ?></td>
            <td><?php echo $statusprf ?></td>       
        </tr>
               <?php
           }
               ?>
        </table>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#mytable').DataTable();
                    });
</script>

<?php $no=0; foreach ($approve_prf_data->result()  as $approve_prf): $no++; ?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ditolak-data<?php echo $approve_prf->nomor_prf?>" class="modal fade">
    <div class="modal-dialog">
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Ditolak</h3>
            </div>
          <form class="form-horizontal" action="<?php echo site_url('approve_prf_f/update_action'); ?>" method="post" enctype="multipart/form-data" role="form">
<table class='table table-bordered'>        

        <input type="hidden" id="nomor_prf" name="nomor_prf" value="<?php echo $approve_prf->nomor_prf; ?>"/>

        <tr><td width='200'>Deskripsi</td><td> <textarea class="form-control" name="deskripsi_ditolak" id="deskripsi_ditolak" placeholder="Masukan Deskripsi"><?php echo $approve_prf->deskripsi_ditolak; ?></textarea></td></tr>
        <tr><td></td><td> 
                <button type="submit" class="btn btn-success btn-sm">Simpan</button> 
                    <button type="reset" class="btn btn-danger btn-sm" value="Reset"> Reset </button>
                    <button type="button" data-dismiss="modal" class="btn btn-default btn-sm"> Kembali</button>
    </table></form>        </div>
</div>
</div>
<?php endforeach; ?>
////////////////////////////////////////////////////////////////////////

controller :
public function disetujui($id)
    {
        $sql="UPDATE tb_prf SET status_prf='disetujui' WHERE nomor_prf=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect(site_url('approve_prf_f'));
    }

    public function ditolak($id)
    {
        $sql="UPDATE tb_prf SET status_prf='ditolak' WHERE nomor_prf=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">  Data Telah Ditolak<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect(site_url('approve_prf_f'));
    }
    /////////////////////////////////////////////