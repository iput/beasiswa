<main xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <h1 class="thin">Manajemen User System</h1><a class="btn-floating btn-medium waves-effect waves-light red" onclick="reload_table()"><i class="material-icons">autorenew</i></a>
        <!--  Tables Section-->
        <div id="dashboard">
            <div class="section">

                <div class="row">
                    <div class="col s12">
                        <table class="striped" id="tabel">
                            <thead>
                            <tr>
                                <th data-field="id" style="width: 3%;">#</th>
                                <th data-field="jenis_scoring">User Id</th>
                                <th data-field="opsi_scoring">Password</th>
                                <th data-field="opsi_scoring">Level Pengguna</th>
                                <th data-field="opsi_scoring">Status user</th>
                                <th data-field="aksi">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>User Id</th>
                                <th>Password</th>
                                <th>Level Pengguna</th>
                                <th>Status user</th>
                                <th>Aksi</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- container END -->

    <!-- New message Modal Trigger -->
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;"><a
            class="btn-floating btn-large primary-color modal-trigger" onclick="add_person()" href="#modal1"> <i
                class="large mdi-content-add"></i> </a></div>

    <!-- New message Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content no-padding">
            <nav class="">
                <div class="nav-wrapper">
                    <div class="left col s7">
                        <p class="modal-title blue-grey-text text-lighten-4" style="margin:0; padding-left:20px;">Tambah
                            user baru </p>
                    </div>
                    <div class="col s5">
                        <ul class="right">
                            <li><a href="#!"><i class="modal-action modal-close mdi-navigation-close"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="form-pad">
                <form action="#" id="form">
                    <input type="hidden" value="" name="id"/>
                    <div class="input-field">
                        <input name="userId" id="to_email" type="text" class="validate">

                        <label for="to_email" data-error="Harap isi dengan angka" data-success="Benar">User ID</label>

                    </div>
                    <div class="input-field">
                        <input name="password" id="subject" type="text" class="validate">
                        <label for="subject">Password</label>

                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select class="form-control" name="idLevel" id="levelPengguna">
                                <option>Pilih Level Pengguna</option>
                                <option value="1">Staff Kemahasiswaan</option>
                                <option value="2">Kasubag</option>
                                <option value="3">Kasubag Fakultas</option>
                                <option value="4">kabag</option>
                                <option value="5">Mahasiswa</option>
                                <option value="6">Admin</option>

                            </select>
                            <label for="levelPengguna">Level Pengguna</label>
                            <span class="mdi-action-help"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="status" id="levelPengguna2">
                                <option>Pilih status user</option>
                                <option value="open">Aktif</option>
                                <option value="close">Tidak Aktif</option>

                            </select>
                            <label for="levelPengguna2">Status user </label>
                            <span class="mdi-action-help"></span>
                            <p>(Aktif= boleh mengakses sistem/Tidak Aktif = tidak bisa akses sistem)<br><br></p>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="modal-footer"><a href="#!" id="btnSave" class=" modal-action modal-close waves-effect btn-flat left" onclick="save()"><i class="mdi-content-save right"></i>Simpan</a>
            <a href="#!" class=" modal-action modal-close waves-effect btn-flat right"><i class="mdi-close right"></i>Batalkan</a></div>

    </div>
    <div id="modal2" class="modal">
        <div class="modal-content no-padding">
            <nav class="">
                <div class="nav-wrapper">
                    <div class="left col s7">
                        <p class="modal-title blue-grey-text text-lighten-4" style="margin:0; padding-left:20px;">Tambah
                            user baru </p>
                    </div>
                    <div class="col s5">
                        <ul class="right">
                            <li><a href="#!"><i class="modal-action modal-close mdi-navigation-close"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="form-pad">
                <form action="#" id="form">
                    <input type="hidden" value="" name="id"/>
                    <div class="input-field">
                        <input name="userId" id="to_email" type="text" class="validate">

                        <label for="to_email" data-error="Harap isi dengan angka" data-success="Benar">User ID</label>

                    </div>
                    <div class="input-field">
                        <input name="password" id="subject" type="text" class="validate">
                        <label for="subject">Password</label>

                    </div>
                    <div class="row">

                        <div class="input-field col s12">
                            <select class="form-control" name="idLevel" id="levelPengguna">
                                <option>Pilih Level Pengguna</option>
                                <option value="1">Staff Kemahasiswaan</option>
                                <option value="2">Kasubag</option>
                                <option value="3">Kasubag Fakultas</option>
                                <option value="4">kabag</option>
                                <option value="5">Mahasiswa</option>
                                <option value="6">Admin</option>

                            </select>
                            <label for="levelPengguna">Level Pengguna</label>
                            <span class="mdi-action-help"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="status" id="levelPengguna2">
                                <option>Pilih status user</option>
                                <option value="open">Aktif</option>
                                <option value="close">Tidak Aktif</option>

                            </select>
                            <label for="levelPengguna2">Status user </label>
                            <span class="mdi-action-help"></span>
                            <p>(Aktif= boleh mengakses sistem/Tidak Aktif = tidak bisa akses sistem)<br><br></p>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="modal-footer"><a href="#!" id="btnSave" class=" modal-action modal-close waves-effect btn-flat left" onclick="save()"><i class="mdi-content-save right"></i>Simpan</a>
            <a href="#!" class=" modal-action modal-close waves-effect btn-flat right"><i class="mdi-close right"></i>Batalkan</a></div>

    </div>
</main>
<script type="text/javascript">
    var save_method;
    var arr = 0;
    var dataTable;

    document.addEventListener("DOMContentLoaded", function (event) {
        datatable();
    });
    function datatable() {
        dataTable = $('#tabel').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?php echo base_url('C_admin/datatable'); ?>",
                type: "POST"
            },
            "columnDefs": [
                {
                    "targets": [2, -1],
                    "orderable": false,
                },
            ],
            "dom": '<"row" <"col s6 m6 l3 left"l><"col s6 m6 l3 right"f>><"bersih tengah" rt><"bottom"ip>',

        });

    }
    function reload_table() {
        dataTable.ajax.reload(null, false);
    }
    function add_person() {
        arr = 0;
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals


        // show bootstrap modal
        $('.modal-title').text('Tambah user baru'); // Set Title to Bootstrap modal title
    }
    function edit(id)
    {

        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('input[name=password]').attr('disabled',true);


        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('C_admin/ajax_edit/')?>/" + id,
            data : {id : id},
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                var appenddata1 = data.idLevel;
                //alert(data1.d);l

                $('[name="id"]').val(data.id);
                $('[name="userId"]').val(data.userId);
                $('[name="password"]').val(data.password);
                $('option[name="masbro"]').val(data.idLevel);


                $('[name="status"]').val(data.status);

                $('#modal2').openModal(); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
    function remove(id,nama) {
        swal({
                title: '"'+nama+'"',
                text: "Apakah anda yakin ingin menghapus user ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#F44336',
                confirmButtonText: 'Hapus',
                cancelButtonText: "Batal",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm){
                    $.ajax({
                        url : "<?php echo site_url('C_admin/ajax_delete')?>/"+id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data)
                        {
                            reload_table();
                            swal("Terhapus :(", "User yang anda pilih telah berhasil dihapus!", "success");
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            swal("Erorr!", "Terjadi masalah saat penghapusan data!", "error");
                        }
                    });
                } else {
                    swal("Dibatalkan :)", "Penghapusan user sistem dibatalkan!", "error");
                }
            });
    }
    function save() {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('C_admin/ajax_add')?>";
        } else {
            url = "<?php echo site_url('C_admin/ajax_update')?>";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                $('#form').closeModal();
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error adding/update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable
            }
        });
    }
</script>
