@extends('layouts.plantilla')
@section('title', 'Web service')

@section('content')
<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">UserId</th>
        <th scope="col">Title</th>
        <th scope="col">Completed</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$datosJson['userId']}}</td>
        <td>{{$datosJson['title']}}</td>
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

        
       
        
        <td>
            <form action="{{route('edit', $datosJson['id'])}}" method="get">
                @csrf              
                
                <button class="btn" type="submit">Ediar</button>

            </form>            
        </td>
        <td>
            <form action="{{route('delete', $datosJson['id'])}}" method="POST">
                @csrf
                @method('delete')
                
                <button class="btn" type="submit">Eliminar</button>

            </form>            
        </td>
      </tr>      
    </tbody>
  </table>
@endsection()