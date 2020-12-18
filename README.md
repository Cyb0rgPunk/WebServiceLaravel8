# WebServiceLaravel8
CRUD http client PHP and laravel 8

Se crea un controlador HomeController donde estaran las funciones para el consumo del servicio web, se usa el cliente http Guzzle con el cual podemos usar los diferentes metodos de get, post, put y delete. 

Se crea una plantilla por medio del framework bootstrap para agregar estilos, adicionalemtente tenemos unas vistas que extienden de la plantilla y son usadas para crear, editar, eliminar y mostrar los datos.   

La primera funcion consume los datos del web service por medio de get y los envia a la vista llamada Welcome en una variables datosJson: 
```php
public function __invoke(){

        $datos = Http::get('https://jsonplaceholder.typicode.com/todos/1');
        $datosJson = $datos->json();
        
        return view('welcome', compact('datosJson'));
    }
```

La segunda funcion nos lleva a la vista donde podemos hacer una peticion post para agregar un nuevo registro: 
```php
public function create(){

        return view('create');

    }
```

La tercera funcion usa el metodo post para enviar al web service un nuevo regitro, la respuesta que me da la guardo en un datosJson y la retorno a la vista welcome, adionalente se valida los campos para retornar a las vistas mensaje de error. 
```php
public function save(Request $request){

        $request->validate([
            'userId'=>'required',
            'title'=>'required',
            'completed'=>'required'
        ]);

        $url = 'https://jsonplaceholder.typicode.com/todos'; 

        $response = Http::post($url,
        [
            "userId" => $request->userId,
            "title" => $request->title,
            "completed" => $request->completed
        ]);

        $datosJson = $response->json(); 
        
        return view('welcome', compact('datosJson'));


    }
```

La funcion edit me retorna la vista con los campos llenos con los datos que se van a editar:

```php
public function edit($datosJson){
        
        $url = 'https://jsonplaceholder.typicode.com/todos/'.$datosJson;         
        $datos = Http::get($url);
        $datosJson = $datos->json();
        return view('edit', compact('datosJson'));
        
    }
```

La funcion update envia al web service los datos que se queren actualizar: 

```php
    public function update($datosJson, Request $request){
        
        $request->validate([
            'userId'=>'required',
            'title'=>'required',
            'completed'=>'required'
        ]);
        
        $url = 'https://jsonplaceholder.typicode.com/todos/'.$datosJson; 

        $response = Http::put($url,
        [
            "userId" => $request->userId,
            "title" => $request->title,
            "completed" => $request->completed

        ]);
        
        $datosJson = $response->json(); 
        
        return view('welcome', compact('datosJson'));

    }
```

La funcion delete envia al web service el id que se se desea eliminar, si me reponde un status 200 de que el registro se elimino lo redirijo a un viosta con un mensaje de que el dato se elimino con exito. 

```php
public function delete($datosJson){        
        $url = 'https://jsonplaceholder.typicode.com/todos/'.$datosJson; 
        
        $response = Http::delete($url);
        
        $datosJson = $response->status();
        
        if($datosJson == 200){
            return view('delete');
        }       

    }
```

En el archivo web.php se establecen las rutas con los metodos que se van a usar para los servicios, se la asigana a todos el controller HomeController y que funcion deben usar. 

```php
Route::get('/', HomeController::class)->name('home');

Route::get('/create', [HomeController::class, 'create'])->name('create');

Route::post('/save', [HomeController::class, 'save'])->name('save');

Route::get('/edit/{idEditar}', [HomeController::class, 'edit'])->name('edit');

Route::put('/update/{idEditar}', [HomeController::class, 'update'])->name('update');

Route::delete('/delete/{idEliminar}', [HomeController::class, 'delete'])->name('delete');
```
