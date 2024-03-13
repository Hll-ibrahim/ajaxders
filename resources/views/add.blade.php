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

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('createPost')}}" method="post">
    @csrf
    <input type="text" name="marka" class="form-control">
    <input type="text" name="renk" class="form-control">
    <input type="text" name="fiyat" class="form-control">
    <input type="text" name="litre" class="form-control">
    <button type="submit">Ekle</button>
</form>
<div class="card-footer">
    <a href="{{route('index')}}">
        <button class="btn btn-primary">Ana sayfa</button>
    </a>
</div>
</body>
</html>
