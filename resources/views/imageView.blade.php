<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="containter">
      <x-alert title="THIS"/>
        <div><h1>Image Crud in laravel</h1></div>
        <button class="btn-danger"><a href="{{route('index')}}">Add Image</a></button>
        <div class="jumbotron">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($employees as $item)
                   <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td><img style="width: 100px; height: 100px;" src="/uploads/employees/{{$item->image}}" alt=""></td>
                    <td><button class=" btn btn-success"><a href="{{route('image.edit', ['id' => $item->id])}}">Edit</a></button></td>
                    <td>  <form method="post" action="{{route('image.delete', ['employee' => $item])}}">
                      @csrf
                      @method('delete')
                      <input type="submit" value="delete">
                  </form></td>
                  </tr>

                    @endforeach
                 
                 
                </tbody>
              </table>
        </div>
    </div>
</body>
</html>