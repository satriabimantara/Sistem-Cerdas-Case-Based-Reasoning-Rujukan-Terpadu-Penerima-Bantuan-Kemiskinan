$(document).ready(function () {
    $("#inputJumlahDataLatih").on('change keyup',function(){
        const persentase_data_latih = $(this).val();
        $('#inputJumlahDataUji').val('');
        if (persentase_data_latih>=70 && persentase_data_latih<= 100) {
            // ubah value pada data uji
            $('#inputJumlahDataUji').val(100-persentase_data_latih);
        }
    });
    
    $(".btn-tambahData").on('click',function(){
        $('#formData').attr('action', 'http://localhost/cbr_tingkatkemiskinan/public/data/tambah_data');
        $('#modalDataBaruLabel').html("Tambah Data Baru");
        $('#btnSubmitData').html("Tambah");
        $('.form-control').val('');
    });

    $('.btn-ubahData').on('click',function(){
        $('#formData').attr('action', 'http://localhost/cbr_tingkatkemiskinan/public/data/edit_kasusbaru');
        $('#modalDataBaruLabel').html("Edit Data");
        $('#btnSubmitData').html("Edit");

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/cbr_tingkatkemiskinan/public/data/getKasusBaru',
            data: {
                id : id,
                id_column_asli:'id_data',
                id_column_transform:'id_data',
                table_asli:'data_asli',
                table_transform:'data_transform',
                type:'input-',
            },
            method: 'post',
            dataType: 'json',
            success: function(data){
                const columns = data['columns'];
                $('#id_data').val(data['id_data']);
                for (let index = 0; index < columns.length; index++) {
                    const element = columns[index];
                    var res = element.split('-');
                    $('#'+element).val(data[res[1]]);
                }
            }
        });
    });

    $('.btn-reviseKasusBaru').on('click',function(){
        $('#formData').attr('action', 'http://localhost/cbr_tingkatkemiskinan/public/data/edit_kasusrevisi');
        $('#modalDataBaruLabel').html("Revisi Kasus");
        $('#btnSubmitData').html("Edit");

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/cbr_tingkatkemiskinan/public/data/getKasusBaru',
            data: {
                id : id,
                id_column_asli:'id_kasusbaru_original',
                id_column_transform:'id_kasusbaru_transform',
                table_asli:'kasusbaru_original',
                table_transform:'kasusbaru_transform',
                type:'input-',
            },
            method: 'post',
            dataType: 'json',
            success: function(data){
                const columns = data['columns'];
                $('#id_data').val(data['id_data']);
                for (let index = 0; index < columns.length; index++) {
                    const element = columns[index];
                    var res = element.split('-');
                    $('#'+element).val(data[res[1]]);
                }
            }
        });
    });

    $('.btn-lihatDetailKasusBaru').on('click',function(){
        $('#modalDetailKasusBaruLabel').html("Informasi Detail Kasus Baru");
        
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/cbr_tingkatkemiskinan/public/data/getKasusBaru',
            data: {
                id : id,
                id_column_asli:'id_data',
                id_column_transform:'id_data',
                table_asli:'data_asli',
                table_transform:'data_transform',
                type:'read-',
            },
            method: 'post',
            dataType: 'json',
            success: function(data){
                const columns = data['columns'];
                for (let index = 0; index < columns.length; index++) {
                    const element = columns[index];
                    var res = element.split('-');
                    $('#'+element).val(data[res[1]]);
                }
            }
        });
    });
});