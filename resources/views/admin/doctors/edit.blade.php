@extends('admin._dashboard_layout')
@section('title', 'Edit User Details')
@section('css')
@endsection()

@section('content')

<div class='container'>

    <div class="col-md-8 col-lg-6 ">

        <form  method="post" enctype="multipart/form-data" action="/admin/doctors/{{$doctor->id}}">
            @csrf
            @method('put')

            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">User Name</label>
                <div class="col-sm-6">
                    <input value="{{old('name')? old('name') : $user->name}}" type="text" class="form-control   " id="username" name="name"  >
                </div>
            </div>

            <div class="form-group row">
                <label for="mobile_no" class="col-sm-4 col-form-label   ">Mobile Number</label>
                <div class="col-sm-6">
                    <input value="{{old('mobile_no')? old('mobile_no') : $doctor->mobile_no}}" type="text" class="form-control" id="mobile_no" name="mobile_no"  >
                </div>
            </div>

            <div class="form-group row">
                <label for="specialties_id" class="col-sm-4 col-form-label">Specialty</label>
                <div class="col-sm-6">
                    <select autofocus id="specialties_id" class="form-control" name="specialties_id" >
                        <option value='0'>Select Specialty</option>
                        @foreach($specialties as $specialty)
                        <option {{$doctor->specialties_id==$specialty->id?"selected":""}} value='{{$specialty->id}}'>{{$specialty->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label  ">Email</label>
                <div class="col-sm-6">
                    <input  value="{{old('email')? old('email') :  $user->email}}" type="text" class="form-control   " id="email" name="email"  >
                </div>
            </div>


            <div class="form-group row">
                <label for="cv" class="col-sm-4 col-form-label">CV</label>
                <div class="col-sm-4">
                    <input value="{{old('cv')? old('cv') : $doctor->cv}}" type="text" class="form-control" id="cv" name="cv" >
                </div>
            </div>

            @if($doctor->photo)
            <div class="form-group row">
                <label for="notes" class="col-sm-4 col-form-label">Photo</label>
                <div class="col-sm-5">
                    <img class="img-fluid img-rounded img-thumbnail" src='/storage/images/{{$doctor->photo}}' />
                </div>
            </div>
            @endif


            <div class="form-group row">
                <label for="flePhoto" class="col-sm-4 col-form-label">Photo</label>
                <div class="col-sm-4">
                    <input type="file" name="flePhoto" id="flePhoto">
                </div>
            </div>

            <div class="form-group row">

                <div class="col-sm-8 offset-sm-4 mt-3">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="hidden" name="active" value="0">
                        <input type="checkbox" class="custom-control-input" id="acceptCheck" name="active"  value="1" {{ $user->active == 1? 'checked' :''}} >
                        <label class="custom-control-label" for="acceptCheck">Active</label>
                    </div>

                </div>
            </div>



            <div class="form-group row">
                <div class="col-sm-9 offset-sm-4 mt-3">
                    <button type="submit" name="register" class="btn btn-primary">Update</button>
                    <a href="/admin/doctors" class="btn btn-secondary">Cancel</a>
                </div>
            </div>

        </form>
    </div>

</div>

@endsection()


@section('js')

@endsection()
