@extends('layouts.app')
@section('title', 'TodoList')

@section('content')
    {{ $edit = false }}
    <div class="container bg-secondary text-white p-5 mb-5">
        <h1 class="text-center text-white py-3">TodoList</h1>
        <form action="{{ route('todo.add') }}" method="post" id="formTodo">
            @csrf
            <div class="row py-3">
                <div class="col-9 p-0">
                    <input type="text" class="form-control" name="title" placeholder="Başlık" id="txtTitle">
                    <span class="text-danger mt-5"></span>
                </div>
                <div class="col-3">
                   
                    <button class="btn btn-success w-100" id="btnAdd">Ekle</button>
                </div>
            </div>
        </form>
        <div class="row">
            <ul class="list-group" id="list">
                @foreach ($posts as $post)
                    <a href="{{ route('todo.update', $post->id) }}" class="text-decoration-none text-black">
                        <li
                            class='list-group-item {{ $post->iscomplated ? 'list-group-item-success text-decoration-line-through' : 'list-group-item-danger' }}'>
                            {{ $post->title }}
                            <a href="{{ route('todo.delete', $post->id) }}"><button
                                    class="btn-close float-end"></button></a>

                            <button onclick="setTextBoxValue('{{ $post->title }}','{{ $post->id }}');"
                                class="btn float-end"><i class="fa-solid fa-pen-to-square"></i></button>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
    <script>
        function setTextBoxValue(Title, Id) {
            $id = Id;
            {{ $edit = true }}
            $('#txtTitle').val(Title);

            $('#btnAdd').removeClass('btn-success');
            $('#btnAdd').addClass('btn-primary');
            $('#btnAdd').text("Güncelle");
            // $('#formTodo').attr('action', '{{ route('todo.edit', $id = 2) }}');
            var url = "{{ route('todo.edit', ['id' => 'id']) }}";
            url = url.replace('id', Id);
            $('#formTodo').attr('action', url);
        }
        const btn = document.getElementById('btnAdd');

        btn.addEventListener('click', function handleClick() {
            btn.value = 'Button clicked';
        });
    </script>
@endsection
