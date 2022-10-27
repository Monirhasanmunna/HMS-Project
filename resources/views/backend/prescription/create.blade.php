@extends('layouts.backend.main')

@push('css')
{{-- <!-- Select2 -->
 <link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>Doctor</label>
                                    <select  id="doctor" class=" form-control @error('doctor') is-invalid @enderror">
                                        <option></option>
                                        @foreach ($doctors as $doctor)
                                        <option value="{{$doctor->id}}" >{{$doctor->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('doctor')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Patient</label>
                                    <select  id="patient" class="js-example-placeholder-single js-states form-control @error('doctor') is-invalid @enderror" style="width: 100%">
                                        <option></option>
                                        @foreach ($patients as $patient)
                                        <option value="{{$patient->id}}" @if(isset($prescription)) {{($prescription->patient_id == $patient->id)?'selected':''}} @endif>{{$patient->name}}</option>
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

                            <div class="form-row d-hide">

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
                                    <input type="number" class="form-control form-control-sm @error('pulse') is-invalid @enderror" id="pulse" placeholder="Enter pulse" readonly>
                                    @error('pulse')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row  d-hide">
                                <div class="form-group col-3">
                                    <label for="ocupation">Sex</label>
                                    <input type="text" class="form-control form-control-sm @error('ocupation') is-invalid @enderror" id="sex" readonly>
                                    @error('ocupation')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="form-group col-3">
                                    <label for="ocupation">Maritial Status</label>
                                    <input type="text" class="form-control form-control-sm @error('ocupation') is-invalid @enderror" id="maritial_status" readonly>
                                    @error('ocupation')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="form-group col-3">
                                    <label for="ocupation">Blood Group</label>
                                    <input type="text" class="form-control form-control-sm @error('ocupation') is-invalid @enderror" id="blood_group" readonly>
                                    @error('ocupation')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label for="ocupation">Ocupation</label>
                                    <input type="text" class="form-control form-control-sm @error('ocupation') is-invalid @enderror" id="ocupation" placeholder="Enter Ocupation" readonly>
                                    @error('ocupation')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row d-hide">
                                <div class="form-group col-3">
                                    <label for="religion">Religion</label>
                                    <input type="text" class="form-control form-control-sm @error('religion') is-invalid @enderror" id="religion" placeholder="Enter religion" readonly>
                                    @error('religion')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>


                            <form action="{{isset($prescription)? Route('app.prescription.update',[$prescription->id]): Route('app.prescription.store')}}" method="POST">
                                @if(isset($prescription))
                                @method('PUT')
                                @endif
                                @csrf

                                <hr>
                                <div class="row">
                                    <div class=" col-md-4">

                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td width="40%">Pt. Type</td>
                                                    <td>

                                                        <select class="form-control" name="mem_type" required="">
                                                            <option selected="false" disabled="">Select One</option>
                                                            <option value="OPD">OPD</option>
                                                            <option value="HCU">HCU</option>
                                                            <option value="ANC">ANC</option>
                                                            <option value="CVD">CVD</option>
                                                            <option value="RHD">RHD</option>
                                                            <option value="SUR">SUR</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Edu. Year</td>
                                                    <td> <input type="text" name="education" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                    <td>SBP (mm of Hg)</td>
                                                    <td> <input type="text" name="sbp" class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td>DBP (mm of Hg)</td>
                                                    <td> <input type="text" name="dbp" class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td>O<sub>2</sub> Satu. (%)</td>
                                                    <td> <input type="text" name="oxygen" class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Pulse (/min)</td>
                                                    <td> <input type="text" name="pulse" class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Temp. (°F)</td>
                                                    <td> <input type="text" name="temp" class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Edema</td>
                                                    <td>
                                                        <input type="radio" name="edima" value="Y"> Y
                                                        <input type="radio" name="edima" value="N"> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Anemia</td>
                                                    <td>
                                                        <input type="radio" name="anemia" value="Y"> Y
                                                        <input type="radio" name="anemia" value="N"> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jaundice </td>
                                                    <td>
                                                        <input type="radio" name="jaundice" value="Y"> Yes
                                                        <input type="radio" name="jaundice" value="N"> No
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Weight (Kg)</td>
                                                    <td> <input type="text" name="weight" id="weight" class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Height (cm)</td>
                                                    <td> <input type="text" name="height" id="height" class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td>BMI </td>
                                                    <td>
                                                        <span id="bmi"></span>
                                                        <input type="text" name="bmi" class="form-control">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bl. Gr. </td>
                                                    <td>
                                                        <input type="text" name="blgr" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Heart </td>
                                                    <td> <input type="text" name="heart" class="form-control "></td>
                                                </tr>
                                                <tr>
                                                    <td>Lungs </td>
                                                    <td> <input type="text" name="lungs" class="form-control "></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <b>Disease History:</b>
                                        <hr>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td width="40%">Diabetes </td>
                                                    <td>
                                                        <input type="radio" name="diabeties" value="Y"> Y
                                                        <input type="radio" name="diabeties" value="N"> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> HTN </td>
                                                    <td>
                                                        <input type="radio" name="hp" value="Y"> Y
                                                        <input type="radio" name="hp" value="N"> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>IHD</td>
                                                    <td>
                                                        <input type="radio" name="ihd" value="Y"> Y
                                                        <input type="radio" name="ihd" value="N"> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Stroke</td>
                                                    <td>
                                                        <input type="radio" name="strk" value="Y"> Y
                                                        <input type="radio" name="strk" value="N"> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>COPD</td>
                                                    <td>
                                                        <input type="radio" name="copd" value="Y"> Y
                                                        <input type="radio" name="copd" value="N"> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cancer </td>
                                                    <td>
                                                        <input type="radio" name="cancer" value="Y"> Y
                                                        <input type="radio" name="cancer" value="N"> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CKD </td>
                                                    <td>
                                                        <input type="radio" name="ckd" value="Y"> Y
                                                        <input type="radio" name="ckd" value="N"> N
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <b>Behavioural History:</b>
                                        <hr>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Salt </td>
                                                    <td>
                                                        <input type="radio" name="salt" value="Y"> Y
                                                        <input type="radio" name="salt" value="N"> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> SLT </td>
                                                    <td>
                                                        <input type="radio" name="smoke" value="Y"> Y
                                                        <input type="radio" name="smoke" value="N"> No
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Smoking </td>
                                                    <td>
                                                        <input type="radio" name="smoking" value="Y"> Y
                                                        <input type="radio" name="smoking" value="N"> N
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-12">
                                                <b for="">Chief Complaints:</b>
                                                <hr>
                                                <textarea class="form-control col-md-12 col-sm-12" name="cc" placeholder="Chief Complaints"></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-12">
                                                <label for="" class="font-weight-bold">Inv. Finding(s):</label>
                                                <hr>


                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-12">
                                                <textarea class="form-control col-md-12 col-sm-12" name="diagnosis" id="pri_others" placeholder="Primary Diagnosis"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-12">
                                                <textarea class="form-control col-md-12 col-sm-12" name="sec_diagnosis" id="sec_others" placeholder="Secondary Diagnosis"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-12">
                                                <textarea class="form-control col-md-12 col-sm-12" name="sec_dx2" id="sec_dx2" placeholder="Secondary Diagnosis 2"></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-md-8">



                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label>Medicine</label>
                                                <select name="medicine" id="medicine_id" class="js-example-placeholder-single js-states form-control @error('doctor') is-invalid @enderror" style="width: 100%">
                                                    <option></option>
                                                    @foreach ($medicines as $medicine)
                                                    <option value="{{$medicine->id}}" @if(isset($prescription)) {{($prescription->patient_id == $patient->id)?'selected':''}} @endif>{{$medicine->name}}</option>
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
                                                    <th scope="col">Duration</th>
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




                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h6 class="font-weight-bold">উপদেশঃ</h6>
                                                <hr>

                                                <div style="overflow-y: scroll;	max-height: 300px;">
                                                    @foreach($advice as $key => $ad)
                                                    <input id="{{$key}}" type="checkbox" name="advice[]" value="{{$ad->id}}">
                                                    <label for="{{$key}}">{{$ad->name}}</label><br>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-12 col-md-12" data-select2-id="86">
                                        <b for="">Follow-up Investigation(s):</b>
                                        <hr>
                                        <select id="testFollowup" class="form-control  form-control-sm " name="suggest_test[]" multiple="" style="width: 100%;" data-select2-id="5" tabindex="-1" aria-hidden="true">

                                            @foreach($medicalTest as $test)
                                            <option value="{{$test->id}}">{{$test->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="row text-center" style="border-top:1px solid #2b6749; padding:5px; text-align: center !important;">
                                        <div class="col-sm-12 col-print text-center">
                                            <select name="next_meet">
                                                <option selected="false" disabled="">Select</option>
                                                <option value="0">0</option>
                                                <option value="1">১</option>
                                                <option value="2">২</option>
                                                <option value="3">৩</option>
                                                <option value="4">৪</option>
                                                <option value="5">৫</option>
                                                <option value="6">৬</option>
                                                <option value="7">৭</option>
                                                <option value="8">৮</option>
                                                <option value="9">৯</option>
                                                <option value="10">১০</option>
                                                <option value="11">১১</option>
                                                <option value="12">১২</option>
                                                <option value="13">১৩</option>
                                                <option value="14">১৪</option>
                                                <option value="15">১৫</option>
                                                <option value="16">১৬</option>
                                                <option value="17">১৭</option>
                                                <option value="18">১৮</option>
                                                <option value="19">১৯</option>
                                                <option value="20">২০</option>
                                                <option value="21">২১</option>
                                            </select>
                                            <input type="radio" id="day" name="meet_day" value="day"> <label for="day">দিন</label>
                                            <input type="radio" id="week" name="meet_day" value="wek"> <label for="week">সপ্তাহ</label>
                                            <input type="radio" id="month" name="meet_day" value="mon" checked=""> <label for="month">মাস</label>
                                            পর আসবেন। পরবর্তী ভিজিটের সময় অবশ্যই ব্যবস্থাপত্র সাথে আনবেন। ধন্যবাদ।
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="doctor_id" id="doctor_id">
                                <input type="hidden" name="patient_id" id="patient_id">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(".js-example-placeholder-single").select2({
        placeholder: "--Select One--",
        allowClear: true
    });
</script>

<script>

$("#doctor").on('change', function() {
        var doctor_id = $(this).val();
        $("#doctor_id").val(doctor_id);
});

    $("#patient").on('change', function() {
        var patient_id = $(this).val();
        $("#patient_id").val(patient_id);

        $.ajax({
            url: '/app/prescription/patient/info/' + patient_id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
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
    $("#medicine_id").on('change', function() {
        var id = $(this).val();

        medicine_id.push(id);
        $("#medicines_id").val(medicine_id);
        console.log(medicine_id);

        $.ajax({
            url: '/app/prescription/medicine/info/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {

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
                        <select name="eatDuration[]" class="form-control " >
			                          <option selected="false" disabled="">Select</option>
			                            <option value="0">0</option>
			                            <option value="1">১</option>
			                            <option value="2">২</option>
			                            <option value="3">৩</option>
			                            <option value="4">৪</option>
			                            <option value="5">৫</option>
			                            <option value="6">৬</option>
			                            <option value="7" selected="">৭</option>
			                            <option value="8">৮</option>
			                            <option value="9">৯</option>
			                            <option value="10">১০</option>
			                            <option value="11">১১</option>
			                            <option value="12">১২</option>
			                            <option value="13">১৩</option>
			                            <option value="14">১৪</option>
			                            <option value="15">১৫</option>
			                            <option value="16">১৬</option>
			                            <option value="17">১৭</option>
			                            <option value="18">১৮</option>
			                            <option value="19">১৯</option>
			                            <option value="20">২০</option>
			                            <option value="21">২১</option>
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
    $(document).on('click', '.delete-tr', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });
</script>

<script>
    //   $("#testFollowup").select2({
    //       placeholder: "--Select One--",
    //       allowClear: true
    //   });
</script>
@endpush