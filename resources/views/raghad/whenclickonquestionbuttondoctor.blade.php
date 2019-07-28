@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br><br><br><br><br>
            <table class="table table-striped">
            <thead>
            <tr>
            <th scope="col">Questions</th>
            <th scope="col">Add Answers</th>
            </tr>
           </thead>
           <tbody>
           <tr>
          <th scope="row">What should I do?</th>
          <td> 
          <form class="form-inline">
           <div class="form-group mx-sm-3 mb-2">
           <label for="inputPassword2" class="sr-only">Add Answer</label>
           <input type="text" class="form-control" id="inputPassword2" placeholder="Add Answer">
           </div>
           <button type="submit" class="btn btn-primary mb-2">Add Answer</button>
           <button type="submit" class="btn btn-primary mb-2 ml-2">Show Answers</button>

           </form>
          </td>
          </tr>
          <tr>
          <th scope="row">I'm Tired</th>
          <td>
           <form class="form-inline">
           <div class="form-group mx-sm-3 mb-2">
           <label for="inputPassword2" class="sr-only">Add Answer</label>
           <input type="text" class="form-control" id="inputPassword2" placeholder="Add Answer">
           </div>
           <button type="submit" class="btn btn-primary mb-2">Add Answer</button>
           <button type="submit" class="btn btn-primary mb-2 ml-2">Show Answers</button>
       
           </form>
          </td>
         </tr>
         <tr>
         <th scope="row">What should I eat?</th>
         <td>
           <form class="form-inline">
           <div class="form-group mx-sm-3 mb-2">
           <label for="inputPassword2" class="sr-only">Add Answer</label>
           <input type="text" class="form-control" id="inputPassword2" placeholder="Add Answer">
           </div>
           <button type="submit" class="btn btn-primary mb-2">Add Answer</button>
           <button type="submit" class="btn btn-primary mb-2 ml-2">Show Answers</button>

           </form>
         </td>
    
         </tr>
        </tbody>
</table>
        </div>
    </div>
</div>            
@endsection