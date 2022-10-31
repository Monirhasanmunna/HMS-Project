@extends('layouts.backend.main')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <style>
  .list-group-item.activate {
      background-color: #007bff;
      border-color: #007bff;
  }
</style>
<style>
    .material-symbols-outlined {
      font-variation-settings:
      'FILL' 0,
      'wght' 800,
      'GRAD' 0,
      'opsz' 425
    }

</style>
@endpush

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row pt-3">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">
                            <h3 class="card-title text-primary">
                                @if(isset($user))
                                <i class="fa-solid fa-square-pen"></i>
                                <span class="pl-1">Update User</span>
                                @else
                                <i class="fa-solid fa-circle-plus"></i>
                                <span class="pl-1">Add User</span>
                                @endif
                            </h3>
                            <div class="text-right">
                              <a href="{{Route('app.user.index')}}" id="roleAddBtn" class="btn btn-sm btn-primary pull-right">Back</a>
                            </div>
                          </div>
                          <form action="{{!isset($user) ? route('app.user.store') : route('app.user.update',[$user->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($user))
                                @method('PUT')
                            @endif
                            
                            <div class="row">
                                <div class="col-7">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label style="color: #626262;" for="name"><strong>Name :</strong></label>
                                            <input class="form-control" id="name" name="name" value="{{isset($user) ? $user->name : old('name')}}" type="text"
                                            class="@error('name') is-invalid @enderror">
    
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label style="color: #626262;" for="email"><strong>Email :</strong></label>
                                            <input class="form-control" id="email" name="email" value="{{isset($user) ? $user->email : old('email')}}" type="email"
                                            class="@error('email') is-invalid @enderror">
    
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label style="color: #626262;" for="password"><strong>Password :</strong></label>
                                            <input class="form-control" id="password" name="password" type="password"
                                            class="@error('password') is-invalid @enderror">
    
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label style="color: #626262;" for="confirm-password"><strong>Confirm Password :</strong></label>
                                            <input class="form-control" id="confirm-password" name="password_confirmation" type="password">
                                        </div>
                                    </div>
                                
                                </div>
    
                                <div class="col-5">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label style="color: #626262;" for="select"><strong>Role :</strong></label>
                                            <select class="js-example-basic-single" id="select" name="role"
                                            class="@error('role') is-invalid @enderror" style="width: 100%;">
                                                @foreach ($roles as $role)
                                                  <option value="{{$role->id}}" 
                                                    @if(isset($user))
                                                    {{$role->id == $user->role_id ? 'selected' : ''}}
                                                    @endif
                                                    >{{$role->name}}</option>  
                                                @endforeach
                                              </select>
    
                                            @error('role')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label style="color: #626262;" for="avatar"><strong>Avatar :</strong></label>
                                            <input class="form-control dropify" id="avatar" data-default-file="{{isset($user) ? asset('storage/users/'.$user->avatar) : ''}}" name="avatar" type="file"
                                            class="@error('avatar') is-invalid @enderror">
    
                                            @error('avatar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
    
                                        <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="status" class="custom-control-input" @if(isset($user)) {{$user->status == 1 ? 'checked' : ''}} @endif id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">Status</label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 ml-4 mb-3">
                                        @if (isset($user))
                                            <button type="submit" class="btn btn-primary">Update</button> 
                                        @else
                                           <button type="submit" class="btn btn-primary">Create New</button> 
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(".js-example-placeholder-single").select2({
      placeholder: "--Select One--",
      allowClear: true
  });
</script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
    
@endpush

