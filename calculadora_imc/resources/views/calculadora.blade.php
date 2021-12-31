<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('calcular')}}" method="POST">
    @csrf
    @method('POST')
    <label for="altura">Altura</label>
    <input type="text" placeholder="Altura" name="altura" value="{{old('altura')}}"/>
    <label for="Peso">Peso</label>
    <input type="text" placeholder="Peso" name="peso" value="{{old('peso')}}"/>
    <label for="sexo">Selecione o Sexo</label>
    <select name="sexo" id="">
        <option value="masculino">masculino</option>
        <option value="feminino">feminino</option>
    </select>
    <button type="submit">Confirmar</button>
</form>

@isset($imc)
    <strong>{{$imc}} {{$resultado}}</strong>
@endisset
</body>
</html>
