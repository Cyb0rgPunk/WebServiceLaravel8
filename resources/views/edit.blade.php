@extends('layouts.plantilla')
@section('title', 'Web service')

@section('content')
<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">UserId</th>
        <th scope="col">Title</th>
        <th scope="col">Completed</th>
        <th scope="col">Actualizar</th>        
      </tr>
    </thead>
    <tbody>
        @if ($datosJson != 200)
        <form action="{{route('update', $datosJson['id'])}}" method='POST'>
            @csrf
            @method('put')
            
            <tr>
                <td><input type="number" name="userId" value='{{$datosJson['userId']}}'></td>
                <td><input type="text" name="title" value='{{$datosJson['title']}}'></td>                
                @if($datosJson['completed'] == 1)
                    <td>
                        <label> TRUE <input type='radio' name="completed" value='1' checked></label>
                        <label> FALSE <input type='radio' name="completed" value='0'></label>
                    </td>                    
                @else
                    <td>
                        <label> TRUE <input type='radio' name="completed" value='1'></label>
                        <label> FALSE <input type='radio' name="completed" value='0' checked></label>
                    </td>                    
                @endif              
                <td><button class="btn" type="submit">Actualizar</button></td>                
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
        @endif           
    </tbody>
  </table>
@endsection()