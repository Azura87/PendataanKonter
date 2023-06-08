$(function () {

    $('.tombolTambahData').on('click', function () {
        $('#formModalLabel').html('Tambah Data Barang');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#nomor').val('');
        $('#merk').val('');
        $('#jumlah').val('');
        $('#harga').val('');
        $('#id').val('');
    });


    $('.tampilModalUbah').on('click', function () {

        $('#formModalLabel').html('Ubah Data Barang');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/mvc/public/home/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mvc/public/home/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#nopart').val(data.nomor);
                $('#tipe').val(data.merk);
                $('#jumlah').val(data.jumlah);
                $('#harga').val(data.harga);
                $('#id').val(data.id);
            }
        });

    });

});

