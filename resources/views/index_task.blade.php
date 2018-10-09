<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    <a href="{{action('TaskController@create')}}" class="btn btn-primary">Create Task</a>
    <a href="{{action('PassportController@index')}}" class="btn btn-primary">List Passports</a>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Descrição</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($tasks as $task)
      <tr>
        <td>{{$task['id']}}</td>
        <td>{{$task['name']}}</td>
        <td>{{$task['descricao']}}</td>
                 
        <td><a href="{{action('TaskController@edit', $task['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('TaskController@destroy', $task['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>