$(function(){
    $('#btnTambah').on('click', function(){
        $('#judulModal').html('Tambah Data Mahasiswa')
        $('.modal-footer button[type=submit]').html('Simpan Data')
        $('.modal-footer button[type=submit]').removeClass('btn-warning')
        $('.modal-footer button[type=submit]').addClass('btn-primary')
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/mahasiswa/tambah')

        $('#nama').val('')
        $('#nim').val('')
        $('#email').val('')
    })

    $('.tampilModalUbah').on('click', function(){
        $('#judulModal').html('Ubah Data Mahasiswa')
        $('.modal-footer button[type=submit]').html('Simpan perubahan')
        $('.modal-footer button[type=submit]').removeClass('btn-primary')
        $('.modal-footer button[type=submit]').addClass('btn-warning')

        $('.modal-body form').attr('action', 'http://localhost/phpmvc/mahasiswa/ubah')

        const id = $(this).data('id')
        
        $.ajax({
            url: 'http://localhost/phpmvc/mahasiswa/getubah',
            data: { id : id },
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id').val(data.id)
                $('#nama').val(data.nama)
                $('#nim').val(data.nim)
                $('#email').val(data.email)
                $('#jurusan').val(data.jurusan)
            }
        })
    })
})