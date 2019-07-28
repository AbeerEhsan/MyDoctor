@extends('layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
            <br><br><br><br><br><br>
            <table class="table table-striped">
            <thead>
            <tr>
            <th scope="col">Answers</th>
            <th scope="col">Doctors</th>
            <th scope="col">Operations</th>
            </tr>
           </thead>
           <tbody>
           <tr>
          <th scope="row">You should drink too much water</th>
          <td> Dr.Mohammed</td>
          <td> 
          <form class="form-inline">
           <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></button>
           <button type="submit" class="btn btn-danger mb-2 ml-2"><i class="far fa-trash-alt"></i></button>
           </form>
          </td>
          </tr>
          <tr>
          <th scope="row">Sleep 7 Hours</th>
          <td> Dr.Mohammed</td>
          <td>
           <form class="form-inline">
           <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></button>
           <button type="submit" class="btn btn-danger mb-2 ml-2"><i class="far fa-trash-alt"></i></button>

           </form>
          </td>
         </tr>
         <tr>
         <th scope="row">Eat too much fruits</th>
                   <td> Dr.Mohammed</td>

         <td>
           <form class="form-inline">
           <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></button>
           <button type="submit" class="btn btn-danger mb-2 ml-2"><i class="far fa-trash-alt"></i></button>

           </form>
         </td>
    
         </tr>
        </tbody>
</table>
        </div>
    </div>
</div>            
@endsection