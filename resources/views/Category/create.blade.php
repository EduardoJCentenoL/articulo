<x-app-layout>

@section('content')

    <div class="">
        <form action="{{route('categories.store')}}" method="POST">
            <h1>Crear Categoría</h1>
            @csrf
            <div class="">
                <label for="name">Nombre de la Categoría</label>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                <div class=""> {{ $message }} </div>
                @enderror
            </div>

            <div class="">
                <label for="description">Descipción de Categoría</label>
                <textarea name="description"> {{ old('desciption') }} </textarea>
            </div>

            <button>Guardar</button>
        </form>
    </div>

    @endsection

</x-app-layout>
