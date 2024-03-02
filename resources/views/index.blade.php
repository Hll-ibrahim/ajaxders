<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" >

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product</h3>
            </div>
            <div class="card-body">
                <form id="product-form">
                    <input id="title" type="text" name="title" class="form-control">
                    <input id="content" type="text" name="content" class="form-control">
                    <a class="btn btn-success" id="product-form-post">Post</a>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Products</h2>
            </div>
            <div class="card-body">
                <table id="products-table" class="table table-responsive table-striped" style="width: 100% !important;">
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>İçerik</th>
                            <th>Puan</th>
                            <th>Rol</th>
                            <th>Deneme</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    console.log($('.card'));

    $('#product-form-post').click(function (){
        var formData = new FormData(document.getElementById('product-form'));
        console.log(formData);

        var title = $('#title').val();
        var content = $('#content').val();

        $.ajax({
            headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
            type: 'post',
            /*data: {
                'title': title,
                'content': content,
            },*/
            processData: false,
            contentType: false,
            data: formData,
            url: '{!!route('post')!!}',
            success: function(data){
                dataTable.ajax.reload();
                swal.fire('Başarılı',data.message,'success');
            },
            error: function(data){
                var errors = '';
                for (datas in data.responseJSON.errors) {
                    errors += data.responseJSON.errors[datas] + '\n';
                }
                console.log(data,errors);
                swal.fire('Başarısız',errors,'error');

            },
        });
    });

    var dataTable = null;

    dataTable = $('#products-table').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Turkish.json'
        },
        processing: true,
        serverSide: true,
        scrollX: true,
        scrollY: true,
        ajax: '{!! route('fetch') !!}',
        columns: [
            //{data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'title'},
            {data: 'content'},
            {data: 'score'},
            {data: 'rol'},
            {data: 'ahmet'},
        ]
    });
</script>
</html>
