<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title"><?php echo $judul ?></h5>
                <div class="card-tools">
                    <a href="<?php echo base_url('member') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <form method="post">
                            <div class="form-group">
                                <label for="">Id member</label>
                                <input type="text" name="id_member" id="id_member" class="form-control" placeholder="ID member" required="" value="<?php echo id('tb_member', 'id_member') ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Nama member</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama member" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="Text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required="">
                                    <option value="">Pilih Jenis</option>
                                    <option value="l">Laki-laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Telepon</label>
                                <input type="text" name="tlp" id="tlp" class="form-control" placeholder="Telepon" required="">

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>