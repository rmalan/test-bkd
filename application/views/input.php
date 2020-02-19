<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" />

        <title>Input | Test BKD</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Test BKD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link active" href="<?php echo base_url('input'); ?>">Input <span class="sr-only">(current)</span></a>                
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <?php if($message = $this->session->flashdata('message')): ?>
            <div class="alert alert-info mt-3" role="alert">
                <?php echo $message; ?>
            </div>
            <?php endif; ?>
            <form class="mt-3 mb-3" method="post" action="<?php echo base_url('input'); ?>">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <select class="form-control" id="nip" name="nip" required>
                        <option value=""> -- Masukkan NIP Pegawai -- </option>
                        <?php foreach ($pegawai as $row): ?>
                            <option value="<?php echo $row->pegawai_id; ?>"><?php echo $row->pegawai_nip; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kegiatan">Jenis Kegiatan</label>
                    <select class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" required>
                        <option value=""> -- Pilih Jenis Kegiatan -- </option>
                        <?php foreach ($kegiatan as $row): ?>
                            <option value="<?php echo $row->jenis_id; ?>"><?php echo $row->jenis_nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_jenis_kegiatan">Sub Jenis Kegiatan</label>
                    <select class="form-control" id="sub_jenis_kegiatan" name="sub_jenis_kegiatan" required>
                        <option value=""> -- Pilih Sub Jenis Kegiatan -- </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nomor_surat">Nomor Surat</label>
                    <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                </div>
                <button name="submit" type="submit" class="btn btn-primary" value=".">Simpan</button>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#nip').select2({
                    theme: "bootstrap"
                });

                $('#nip').on('change', function() {
                    var pegawaiId = $(this).val();
                    $.ajax({
                        type : "POST",
                        url  : "input/getPegawaiNama/" + pegawaiId,
                        dataType : "JSON",        
                        success: function(data){
                            $('#nama').val(data[0].pegawai_nama);
                        }
                    });
                    return false;
                });

                $('#jenis_kegiatan').on('change', function() {
                    var jenisKegiatanId = $(this).val();
                    $.ajax({
                        type : "POST",
                        url  : "input/getSubJenisKegiatan/" + jenisKegiatanId,
                        dataType : "JSON",        
                        success: function(data){
                            var html = '';
                            html += '<option value=""> -- Pilih Sub Jenis Kegiatan -- </option>';
                            for(var i = 0; i < data.length; i++){                        
                                html += '<option value="' + data[i].sub_jenis_id + '">' + data[i].sub_jenis_nama + '</option>';
                            }
                            $('#sub_jenis_kegiatan').html(html);
                        }
                    });
                    return false;
                });
            });
        </script>
    </body>
</html>