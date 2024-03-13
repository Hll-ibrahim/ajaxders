<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" >
    <title>Document</title>
</head>
<body>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif


<div class="container">

    <div class="card">
        <div class="card-body">
            <table>
                <tr>
                    <th>İsim</th>
                    <th>litre</th>
                    <th>Renk</th>
                    <th>fiyat</th>
                </tr>
                @foreach($bottles as $bottle)
                    <tr>
                        <td>{{$bottle->marka}}</td>
                        <td>{{$bottle->litre}}</td>
                        <td>{{$bottle->renk}}</td>
                        <td>{{$bottle->fiyat}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer">
           <a href="{{route('create')}}">
               <button class="btn btn-primary">Ekle</button>
           </a>
        </div>
    </div>
</div>

<div>

</div>
</body>
</html>
