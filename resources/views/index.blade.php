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


<div>

</div>
</body>
</html>
