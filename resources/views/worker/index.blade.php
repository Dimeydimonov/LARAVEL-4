@extends('layout.main')

@section('content')
<div>
<div>
<hr>
</div>
    <div>
        <a href="{{ route('worker.create') }}">Добавить</a>
    </div>
    <hr>
<div>
    <form action="{{ route('worker.index') }}">
        <input style="margin-top: 15px;" type="text" name="name" placeholder="name"
               value="{{request()->get('name')}}"> <br>
        <input style="margin-top: 15px;" type="text" name="surname" placeholder="surname"
               value="{{request()->get('surname')}}"><br>
        <input style="margin-top: 15px;" type="text" name="email" placeholder="email"
               value="{{request()->get('email')}}">        <br>
        <input style="margin-top: 15px;" type="number" name="from" placeholder="from"
               value="{{request()->get('from')}}">        <br>
        <input style="margin-top: 15px;" type="number" name="to" placeholder="to"
               value="{{request()->get('to')}}">        <br>
        <input style="margin-top: 15px;" type="text" name="description" placeholder="description"
               value="{{request()->get('description')}}"> <br>
        <input style="margin-top: 15px;" id="isMarried"  type="checkbox" name="is_married"
                {{request()->get('is_married')== 'on' ? 'checked' : "" }}   >        <br>
        <label style="margin-top: 15px;" for="isMarried">is married</label>
        <br>
        <input style="margin-top: 15px;" type="submit" value="Применить">

        <a style="margin-top: 15px;" href="{{ route('worker.index') }}"  >Сбросить</a>
    </form>
</div>
    <hr>
    @foreach($workers as $worker)
<div>
        <div>Name:{{ $worker -> name}}</div>
        <div>Surname:{{ $worker -> surname}}</div>
        <div>Email:{{ $worker -> email}}</div>
        <div>Age:{{ $worker -> age}}</div>
        <div>Description:{{ $worker -> description}}</div>
        <div>Is_married:{{ $worker -> is_married}}</div>
    <div>
        <a href="{{route('worker.show', $worker->id)}}"> Посмотреть</a>
        <div>
        <a href="{{route('worker.edit', $worker->id)}}"> Редактировать </a>
        </div>
        <div>

            <form action="{{ route('worker.delete', $worker->id) }}" method="Post">
                @csrf
                @method('Delete')
                <input type="submit" value="Удалить">
            </form>

        </div>
    </div>
</div>
    <hr>
    @endforeach
    <div class="my_nav">

{{$workers-> withQueryString()->links()}}

    </div>
</div>


@endsection