@extends('layout')

@section('cabecalho')
@endsection


@section('conteudo')  
  
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="nome" class="">Nome</label>
            <input type="text" class="form-control" name="nome" for="nome">
        </div>

        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
</div>

</body>
</html>
@endsection