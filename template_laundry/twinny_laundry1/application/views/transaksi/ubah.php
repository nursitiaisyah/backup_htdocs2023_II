<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title"><?php echo $judul ?></h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kode Invoice</label>
                                <input type="text" name="kd_invoice" id="kd_invoice" class="form-control" value="<?php echo $transaksi['kd_invoice'] ?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="datetime-local" name="tgl" id="tgl" class="form-control" value="<?php echo date('Y-m-d\TH:i:s', strtotime($transaksi['tgl'])) ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Batas Waktu</label>
                                <input type="datetime-local" name="batas_waktu" id="batas_waktu" class="form-control" value="<?php echo date('Y-m-d\TH:i:s', strtotime($transaksi['batas_waktu'])) ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Bayar</label>
                                <input type="datetime-local" name="tgl_bayar" id="tgl_bayar" class="form-control" value="<?php echo date('Y-m-d\TH:i:s', strtotime($transaksi['tgl_bayar'])) ?>">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Member</label>
                                <select name="member" id="member" class="form-control member">
                                    <?php foreach ($member as $row) : ?>
                                        <option <?php echo $row['id_member'] == $transaksi['id_member'] ? 'selected' : '' ?> value="<?php echo $row['id_member'] ?>"><?php echo $row['nama'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option <?php echo $transaksi['status'] == 'baru' ? 'selected' : '' ?> value="baru">Baru</option>
                                    <option <?php echo $transaksi['status'] == 'proses' ? 'selected' : '' ?> value="proses">Proses</option>
                                    <option <?php echo $transaksi['status'] == 'selesai' ? 'selected' : '' ?> value="selesai">Selesai</option>
                                    <option <?php echo $transaksi['status'] == 'diambil' ? 'selected' : '' ?> value="diambil">Diambil</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Di Bayar</label>
                                <select name="dibayar" id="dibayar" class="form-control">
                                    <option <?php echo $transaksi['dibayar'] == 'dibayar' ? 'selected' : '' ?> value="dibayar">Dibayar</option>
                                    <option <?php echo $transaksi['dibayar'] == 'belum_dibayar' ? 'selected' : '' ?> value="belum_dibayar">Belum DiBayar</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-block btn-primary">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    const base_url = '<?php echo base_url() ?>'
</script>