@extends('layouts.backend.main')

@push('css')
 {{-- <!-- Select2 -->
 <link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
 <link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"> --}}
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
 <style>
    .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px;
    padding-top: 2px;
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
                            @if(!isset($patient))
                            <i class="fa-solid fa-circle-plus"></i>
                            @else
                            <i class="fa-solid fa-spinner"></i>
                            @endif

                            <span class="pl-1">
                            @if(!isset($patient))
                            Patinet Add
                            @else
                            Patinet Update
                            @endif
                            </span></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{isset($patient)? Route('app.patient.update',[$patient->id]): Route('app.patient.store')}}" method="POST">
                                @if(isset($patient))
                                    @method('PUT')
                                @endif
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-4">
                                        <label>Doctor</label>
                                        <select name="doctor" class="js-example-placeholder-single js-states form-control @error('doctor') is-invalid @enderror" style="width: 100%">
                                            <option></option>
                                            @foreach ($doctors as $doctor)
                                               <option value="{{$doctor->id}}"
                                                @if(isset($assistant))
                                                {{($assistant->doctor_id == $doctor->id)?'selected':''}}
                                                @endif
                                                >{{$doctor->name}}</option> 
                                            @endforeach
                                        </select>
                                        @error('doctor')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" value="{{ $assistant->name ?? old('name') }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="age">Age</label>
                                        <input type="number" name="age" class="form-control form-control-sm @error('age') is-invalid @enderror" id="age" placeholder="Enter Age" value="{{ $assistant->name ?? old('name') }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-4">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control form-control-sm @error('address') is-invalid @enderror" id="address" placeholder="Enter Address" value="{{ $assistant->address ?? old('address') }}">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="mobile">Mobile</label>
                                        <input type="number" name="mobile" class="form-control form-control-sm @error('mobile') is-invalid @enderror" id="mobile" placeholder="Enter Mobile" value="{{ $assistant->mobile ?? old('mobile') }}">
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="weight">Weight</label>
                                        <input type="number" name="weight" class="form-control form-control-sm @error('weight') is-invalid @enderror" id="weight" placeholder="Enter Weight" value="{{ $assistant->weight ?? old('weight') }}">
                                        @error('weight')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-4">
                                        <label for="temp">Temprature</label>
                                        <input type="number" name="temprature" class="form-control form-control-sm @error('temprature') is-invalid @enderror" id="temp" placeholder="Enter temprature" value="{{ $assistant->temprature ?? old('temprature') }}">
                                        @error('temprature')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="bp">Blood Pressure</label>
                                        <input type="text" name="blood_pressure" class="form-control form-control-sm @error('blood_pressure') is-invalid @enderror" id="temp" placeholder="Enter blood_pressure" value="{{ $assistant->blood_pressure ?? old('blood_pressure') }}">
                                        @error('blood_pressure')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="pulse">Pulse</label>
                                        <input type="number" name="pulse" class="form-control form-control-sm @error('pulse') is-invalid @enderror" id="temp" placeholder="Enter pulse" value="{{ $assistant->pulse ?? old('pulse') }}">
                                        @error('pulse')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group clearfix col-4 pt-2">
                                        <label for="pulse" class="pr-3">Sex:</label>
                                        <div class="icheck-primary d-inline">
                                          <input type="checkbox" id="checkboxPrimary1">
                                          <label for="checkboxPrimary1">
                                            Male
                                          </label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                          <input type="checkbox" id="checkboxPrimary2">
                                          <label for="checkboxPrimary2">
                                            Female
                                          </label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                          <input type="checkbox" id="checkboxPrimary3">
                                          <label for="checkboxPrimary3">
                                            Others
                                          </label>
                                        </div>
                                      </div>

                                      <div class="form-group clearfix col-4 pt-2">
                                        <label for="pulse" class="pr-3">Maritial Status:</label>
                                        <div class="icheck-primary d-inline">
                                          <input type="checkbox" id="maride">
                                          <label for="maride">
                                            Maride
                                          </label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                          <input type="checkbox" id="single">
                                          <label for="single">
                                            Single
                                          </label>
                                        </div>
                                      </div>

                                      <div class="form-group clearfix col-4 pt-2">
                                        <label for="pulse" class="pr-3">Maritial Status:</label>
                                        <div class="icheck-primary d-inline">
                                          <input type="checkbox" id="maride">
                                          <label for="maride">
                                            Maride
                                          </label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                          <input type="checkbox" id="single">
                                          <label for="single">
                                            Single
                                          </label>
                                        </div>
                                      </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-4">
                                        <label for="ocupation">Ocupation</label>
                                        <input type="text" name="ocupation" class="form-control form-control-sm @error('ocupation') is-invalid @enderror" id="temp" placeholder="Enter Ocupation" value="{{ $assistant->ocupation ?? old('ocupation') }}">
                                        @error('ocupation')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="religion">Religion</label>
                                        <input type="text" name="ocupation" class="form-control form-control-sm @error('ocupation') is-invalid @enderror" id="temp" placeholder="Enter Ocupation" value="{{ $assistant->ocupation ?? old('ocupation') }}">
                                        @error('ocupation')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                
                    
                                @if(!isset($assistant))
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
{{-- <!-- Select2 -->
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(".js-example-placeholder-single").select2({
      placeholder: "--Select One--",
      allowClear: true
  });
</script>
@endpush
