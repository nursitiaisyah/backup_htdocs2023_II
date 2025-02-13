<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title"><?php echo $judul ?></h5>
                <div class="card-tools">
                    <a href="<?php echo base_url('user') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <form method="post">
                            <div class="form-group">
                                <label for="">Id user</label>
                                <input type="number" name="id_user" id="id_user" class="form-control" placeholder="ID user" required="" value="<?php echo id('tb_user', 'id_user') ?>" readonly>
                                <div class="form-group">
                                    <label for="">ID Outlet</label>
                                    <select name="id_outlet" id="id_outlet" class="form-control" required="">
                                        <option value="">Pilih Outlet</option>
                                        <?php foreach ($outlet as $row) : ?>
                                            <option value="<?php echo $row['id_outlet'] ?>"><?php echo $row['nama'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required="">
                            </div>


                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="Text" name="username" id="username" class="form-control" placeholder="Username" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <select name="role" id="role" class="form-control" required="">
                                    <option value="">Pilih Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="owner">Owner</option>
                                </select>
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