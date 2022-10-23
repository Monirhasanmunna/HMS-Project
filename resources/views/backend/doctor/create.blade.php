@extends('layouts.backend.main')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .dropify-wrapper .dropify-message p{
        font-size: initial;
    }
</style>
@endpush

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row pt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-primary ">
                            @if(!isset($doctor))
                            <i class="fa-solid fa-circle-plus"></i>
                            @else
                            <i class="fa-solid fa-spinner"></i>
                            @endif

                            <span class="pl-1">
                            @if(!isset($doctor))
                            Doctor Add
                            @else
                            Doctor Update
                            @endif
                            </span></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{isset($doctor)? Route('app.doctor.update',[$doctor->id]): Route('app.doctor.store')}}" method="POST">
                                @if(isset($doctor))
                                    @method('PUT')
                                @endif

                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" value="{{ $doctor->name ?? old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" value="{{ $doctor->email ?? old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="degrees">Degrees</label>
                                    <input type="text" name="degrees" class="form-control  @error('degrees') is-invalid @enderror" id="degrees" placeholder="Enter Degrees" value="{{ $doctor->degrees ?? old('degrees') }}">
                                    @error('degrees')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="specialist">Specialist</label>
                                    <input type="text" name="specialist" class="form-control  @error('specialist') is-invalid @enderror" id="specialist" placeholder="Enter Email" value="{{ $doctor->specialist ?? old('specialist') }}">
                                    @error('specialist')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="coc">Consultant Of College</label>
                                    <input type="text" name="consultant_of_college" class="form-control  @error('consultant_of_college') is-invalid @enderror" id="coc" placeholder="Enter College Name" value="{{ $doctor->consultant_of_college ?? old('consultant_of_college') }}">
                                    @error('consultant_of_college')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="number" name="mobile" class="form-control  @error('mobile') is-invalid @enderror" id="mobile" placeholder="Enter Phone Number" value="{{ $doctor->mobile ?? old('mobile') }}">
                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file"   name="image" class="dropify">
                                    @isset($user)
                                        <h5 class="m-2">Old Image</h5>
                                        <img width="200" class="img-thumbnail" src="{{isset($user->image)? asset($user->image):'default.png'}}" alt="User Image">
                                    @endisset
                                    @error('image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div> --}}
                                @if(!isset($doctor))
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i><span class="pl-1">Submit</span></button>
                                @else
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-spinner"></i><span class="pl-1">Update</span></button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        //Dropify Image Upload
        $('.dropify').dropify();
    });
</script>
@endpush
