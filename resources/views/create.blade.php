@extends('layouts.plantilla')
@section('title', 'Web service')

@section('content')
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">UserId</th>
                <th scope="col">Title</th>
                <th scope="col">Completed</th>
                <th scope="col">Crear</th>
            </tr>
        </thead>
        
        <tbody>
            <form action="{{route('save')}}" method='POST'>
                @csrf
                <tr>
                    <td><input type="number" name="userId"></td>
                    <td><input type="text" name="title"></td>
                    <td>
                        <label> TRUE <input type='radio' name="completed" value='1'></label>
                        <label> FALSE <input type='radio' name="completed" value='0'></label>
                    </td>

                    <td><button class="btn" type="submit">Crear</button></td>
                </tr>
                <tr>
                    <td>
                        @error('userId')
                            <small>{{$message}}</small>
                        @enderror
                    </td>
                    <td>
                        @error('title')
                            <small>{{$message}}</small>
                        @enderror
                    </td>
                    <td>
                        @error('completed')
                            <small>{{$message}}</small>
                        @enderror
                    </td>
                </tr>
            </form>
        </tbody>
    </table>
@endsection()
