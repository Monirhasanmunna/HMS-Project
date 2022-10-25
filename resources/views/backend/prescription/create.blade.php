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
                            @if(!isset($prescription))
                            <i class="fa-solid fa-circle-plus"></i>
                            @else
                            <i class="fa-solid fa-spinner"></i>
                            @endif

                            <span class="pl-1">
                            @if(!isset($prescription))
                            Patinet Add
                            @else
                            Patinet Update
                            @endif
                            </span></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{isset($prescription)? Route('app.prescription.update',[$prescription->id]): Route('app.prescription.store')}}" method="POST">
                                @if(isset($prescription))
                                    @method('PUT')
                                @endif
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label>Patient</label>
                                        <select name="patient_id" id="patient" class="js-example-placeholder-single js-states form-control @error('doctor') is-invalid @enderror" style="width: 100%">
                                            <option></option>
                                            @foreach ($patients as $patient)
                                               <option value="{{$patient->id}}"
                                                @if(isset($prescription))
                                                {{($prescription->patient_id == $patient->id)?'selected':''}}
                                                @endif
                                                >{{$patient->name}}</option> 
                                            @endforeach
                                        </select>
                                        @error('doctor')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    
                                    <div class="form-group col-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" readonly>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control form-control-sm @error('age') is-invalid @enderror" id="age" placeholder="Enter Age" readonly>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" id="address" placeholder="Enter Address" readonly>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="mobile">Mobile</label>
                                        <input type="number" class="form-control form-control-sm @error('mobile') is-invalid @enderror" id="mobile" placeholder="Enter Mobile" readonly>
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                   
                                    <div class="form-group col-3">
                                        <label for="weight">Weight</label>
                                        <input type="number" class="form-control form-control-sm @error('weight') is-invalid @enderror" id="weight" placeholder="Enter Weight" readonly>
                                        @error('weight')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="temp">Temprature</label>
                                        <input type="number" class="form-control form-control-sm @error('temprature') is-invalid @enderror" id="temp" placeholder="Enter temprature" readonly>
                                        @error('temprature')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="bp">Blood Pressure</label>
                                        <input type="text" class="form-control form-control-sm @error('blood_pressure') is-invalid @enderror" id="bp" placeholder="Enter blood_pressure" readonly>
                                        @error('blood_pressure')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="pulse">Pulse</label>
                                        <input type="number"  class="form-control form-control-sm @error('pulse') is-invalid @enderror" id="pulse" placeholder="Enter pulse" readonly>
                                        @error('pulse')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                      <div class="form-group col-3">
                                        <label for="ocupation">Sex</label>
                                        <input type="text"  class="form-control form-control-sm @error('ocupation') is-invalid @enderror" id="sex" readonly>
                                        @error('ocupation')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-3">
                                        <label for="ocupation">Maritial Status</label>
                                        <input type="text"  class="form-control form-control-sm @error('ocupation') is-invalid @enderror" id="maritial_status" readonly> 
                                        @error('ocupation')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                      <div class="form-group col-3">
                                        <label for="ocupation">Blood Group</label>
                                        <input type="text"  class="form-control form-control-sm @error('ocupation') is-invalid @enderror" id="blood_group" readonly >
                                        @error('ocupation')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="ocupation">Ocupation</label>
                                        <input type="text"  class="form-control form-control-sm @error('ocupation') is-invalid @enderror" id="ocupation" placeholder="Enter Ocupation" readonly>
                                        @error('ocupation')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-3">
                                        <label for="religion">Religion</label>
                                        <input type="text"  class="form-control form-control-sm @error('religion') is-invalid @enderror" id="religion" placeholder="Enter religion" readonly>
                                        @error('religion')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                

                                <hr>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label>Medicine</label>
                                        <select name="medicine" id="medicine_id" class="js-example-placeholder-single js-states form-control @error('doctor') is-invalid @enderror" style="width: 100%">
                                            <option></option>
                                            @foreach ($medicines as $medicine)
                                               <option value="{{$medicine->id}}"
                                                @if(isset($prescription))
                                                {{($prescription->patient_id == $patient->id)?'selected':''}}
                                                @endif
                                                >{{$medicine->name}}</option> 
                                            @endforeach
                                        </select>
                                        @error('doctor')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <input hidden type="number[]" id="medicines_id" multiple="multiple" name="medicine_id"></input>
                                <hr>

                                <table class="table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Mg</th>
                                        <th scope="col">Frequency</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Qty Type</th>
                                        <th scope="col">Eating Time</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody id="t_body">
                                      {{-- <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                      </tr> --}}
                                    </tbody>
                                  </table>

                                  @if(!isset($prescription))
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

<script>
    $("#patient").on('change',function(){
       var patient_id = $(this).val();

       $.ajax({
        url     : '/app/prescription/patient/info/'+patient_id,
        type    : 'GET',
        dataType: 'json',
        success : function(response){
            console.log(response);
            $("#name").val(response.name);
            $("#age").val(response.age);
            $("#address").val(response.address);
            $("#mobile").val(response.mobile);
            $("#weight").val(response.weight);
            $("#temp").val(response.temprature);
            $("#bp").val(response.blood_pressure);
            $("#pulse").val(response.pulse);
            $("#ocupation").val(response.ocupation);
            $("#religion").val(response.religion);
            $("#blood_group").val(response.blood.name);
            $("#sex").val(response.sex);
            $("#maritial_status").val(response.maritial_status);
        }
       });
    });

    var medicine_id = [];
    $("#medicine_id").on('change',function(){
        var id = $(this).val();

        medicine_id.push(id);
        $("#medicines_id").val(medicine_id);
        console.log(medicine_id);

        $.ajax({
            url         : '/app/prescription/medicine/info/'+id,
            type        : 'GET',
            dataType    : 'json',
            success     : function(response){

                // Loop
                var frequencies = '';
                response.frequencies.map((item) => {
                frequencies += `<option value="${item.id}">${item.name}</option>`
                });


                var quantities = '';
                response.quantities.map((item) => {
                quantities += `<option value="${item.id}">${item.name}</option>`
                });


                var qtytypies = '';
                response.qtytypies.map((item) => {
                qtytypies += `<option value="${item.id}">${item.name}</option>`
                });


                var eatingTimes = '';
                response.eatingTimes.map((item) => {
                eatingTimes += `<option value="${item.id}">${item.name}</option>`
                });
                // Loop

                var data = `
                    <tr>
                        <td>${response.medicine.name}</td>
                        <td>${response.medicine.mg}</td>
                      <td>
                        <select class="form-control"  name="frequency[]">
                            ${frequencies}
                        </select>
                      </td>
                       <td>
                        <select class="form-control"  name="qty[]">
                            ${quantities}
                        </select>
                      </td>
                      <td>
                        <select class="form-control"  name="qtyType[]">
                            ${qtytypies}
                        </select>
                      </td>
                      <td>
                        <select class="form-control"  name="eatingType[]">
                            ${eatingTimes}
                        </select>
                      </td>

                      <td>
                        <a href="" class=" btn-danger btn-sm delete-tr"><i class="fa fa-trash"></i></a>
                      </td>

                    </tr>`;

                $("#t_body").append(data);
            }
        });
    });

    //Delete Tr
    $(document).on('click','.delete-tr',function(e){
              e.preventDefault();
              $(this).closest('tr').remove();
        });
</script>
@endpush
