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
                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h3 class="card-title text-primary ">
                                @if(!isset($prescription))
                                <i class="fa-solid fa-circle-plus"></i>
                                @else
                                <i class="fa-solid fa-spinner"></i>
                                @endif

                                <span class="pl-1">
                                    @if(!isset($prescription))
                                    Prescription Add
                                    @else
                                    Prescription Update
                                    @endif
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>Doctor</label>
                                    <select  id="doctor" class=" form-control @error('doctor_id') is-invalid @enderror">
                                        <option></option>
                                        @foreach ($doctors as $doctor)
                                        <option value="{{$doctor->id}}" {{($prescription->doctor_id ?? old('doctor_id') == $doctor->id) ? 'selected': ''}} >{{$doctor->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Patient</label>
                                    <select  id="patient" class="js-example-placeholder-single js-states form-control @error('patient_id') is-invalid @enderror" style="width: 100%">
                                        <option></option>
                                        @foreach ($patients as $patient)
                                        <option value="{{$patient->id}}" {{($prescription->patient_id ?? old('patient_id') == $patient->id) ? 'selected': ''}}>{{$patient->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('patient_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" readonly>
                                    
                                </div>

                                <div class="form-group col-3">
                                    <label for="age">Age</label>
                                    <input type="number" class="form-control form-control-sm @error('age') is-invalid @enderror" id="age" placeholder="Enter Age" readonly>
                                    
                                </div>

                                <div class="form-group col-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" id="address" placeholder="Enter Address" readonly>
                                    
                                </div>

                                <div class="form-group col-3">
                                    <label for="mobile">Mobile</label>
                                    <input type="number" class="form-control form-control-sm @error('mobile') is-invalid @enderror" id="mobile" placeholder="Enter Mobile" readonly>
                                    
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

                                                        <select class="form-control" name="mem_type" >
                                                            <option selected="false" disabled="">Select One</option>
                                                            <option value="OPD" {{(($prescription->mem_type ?? old('mem_type')) == 'OPD') ? 'selected': ''}}>OPD</option>
                                                            <option value="HCU" {{(($prescription->mem_type ?? old('mem_type')) == 'HCU') ? 'selected': ''}}>HCU</option>
                                                            <option value="ANC" {{(($prescription->mem_type ?? old('mem_type')) == 'ANC') ? 'selected': ''}}>ANC</option>
                                                            <option value="CVD" {{(($prescription->mem_type ?? old('mem_type')) == 'CVD') ? 'selected': ''}}>CVD</option>
                                                            <option value="RHD" {{(($prescription->mem_type ?? old('mem_type')) == 'RHD') ? 'selected': ''}}>RHD</option>
                                                            <option value="SUR" {{(($prescription->mem_type ?? old('mem_type')) == 'SUR') ? 'selected': ''}}>SUR</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Edu. Year</td>
                                                    <td> <input type="text" name="education" class="form-control"  value="{{ $prescription->education ?? old('education') }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>SBP (mm of Hg)</td>
                                                    <td> <input type="text" name="sbp" class="form-control"  value="{{ $prescription->sbp ?? old('sbp') }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td>DBP (mm of Hg)</td>
                                                    <td> <input type="text" name="dbp" class="form-control"  value="{{ $prescription->dbp ?? old('dbp') }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td>O<sub>2</sub> Satu. (%)</td>
                                                    <td> <input type="text" name="oxygen" class="form-control"  value="{{ $prescription->oxygen ?? old('oxygen') }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Pulse (/min)</td>
                                                    <td> <input type="text" name="pulse" class="form-control"  value="{{ $prescription->pulse ?? old('pulse') }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Temp. (°F)</td>
                                                    <td> <input type="text" name="temp" class="form-control"  value="{{ $prescription->temp ?? old('temp') }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Edema</td>
                                                    <td>
                                                        <input type="radio" name="edima" value="Y" {{(($prescription->edima ?? old('edima')) == 'Y') ? 'checked': ''}}> Y
                                                        <input type="radio" name="edima" value="N" {{(($prescription->edima ?? old('edima')) == 'N') ? 'checked': ''}}> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Anemia</td>
                                                    <td>
                                                        <input type="radio" name="anemia" value="Y"  {{(($prescription->anemia ?? old('anemia')) == 'Y') ? 'checked': ''}}> Y
                                                        <input type="radio" name="anemia" value="N"  {{(($prescription->anemia ?? old('anemia')) == 'N') ? 'checked': ''}}> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jaundice </td>
                                                    <td>
                                                        <input type="radio" name="jaundice" value="Y" {{(($prescription->jaundice ?? old('jaundice')) == 'Y') ? 'checked': ''}}> Yes
                                                        <input type="radio" name="jaundice" value="N" {{(($prescription->jaundice ?? old('jaundice')) == 'N') ? 'checked': ''}}> No
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Weight (Kg)</td>
                                                    <td> <input type="text" name="weight" id="weight" class="form-control"  value="{{ $prescription->weight ?? old('weight') }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Height (cm)</td>
                                                    <td> <input type="text" name="height" id="height" class="form-control"  value="{{ $prescription->height ?? old('height') }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td>BMI </td>
                                                    <td>
                                                        <span id="bmi"></span>
                                                        <input type="text" name="bmi" class="form-control"  value="{{ $prescription->bmi ?? old('bmi') }}">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bl. Gr. </td>
                                                    <td>
                                                        <input type="text" name="blgr" class="form-control"  value="{{ $prescription->blgr ?? old('blgr') }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Heart </td>
                                                    <td> <input type="text" name="heart" class="form-control "  value="{{ $prescription->heart ?? old('heart') }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Lungs </td>
                                                    <td> <input type="text" name="lungs" class="form-control "  value="{{ $prescription->lungs ?? old('lungs') }}"></td>
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
                                                        <input type="radio" name="diabeties" value="Y" {{(($prescription->diabeties ?? old('diabeties')) == 'Y') ? 'checked': ''}}> Y
                                                        <input type="radio" name="diabeties" value="N" {{(($prescription->diabeties ?? old('diabeties')) == 'N') ? 'checked': ''}}> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> HTN </td>
                                                    <td>
                                                        <input type="radio" name="hp" value="Y" {{(($prescription->hp ?? old('hp')) == 'Y') ? 'checked': ''}}> Y
                                                        <input type="radio" name="hp" value="N" {{(($prescription->hp ?? old('hp')) == 'N') ? 'checked': ''}}> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>IHD</td>
                                                    <td>
                                                        <input type="radio" name="ihd" value="Y" {{(($prescription->ihd ?? old('ihd')) == 'Y') ? 'checked': ''}}> Y
                                                        <input type="radio" name="ihd" value="N" {{(($prescription->ihd ?? old('ihd')) == 'N') ? 'checked': ''}}> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Stroke</td>
                                                    <td>
                                                        <input type="radio" name="strk" value="Y" {{(($prescription->strk ?? old('strk')) == 'Y') ? 'checked': ''}}> Y
                                                        <input type="radio" name="strk" value="N" {{(($prescription->strk ?? old('strk')) == 'N') ? 'checked': ''}}> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>COPD</td>
                                                    <td>
                                                        <input type="radio" name="copd" value="Y" {{(($prescription->copd ?? old('copd')) == 'Y') ? 'checked': ''}}> Y
                                                        <input type="radio" name="copd" value="N" {{(($prescription->copd ?? old('copd')) == 'N') ? 'checked': ''}}> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cancer </td>
                                                    <td>
                                                        <input type="radio" name="cancer" value="Y" {{(($prescription->cancer ?? old('cancer')) == 'Y') ? 'checked': ''}}> Y
                                                        <input type="radio" name="cancer" value="N" {{(($prescription->cancer ?? old('cancer')) == 'N') ? 'checked': ''}}> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CKD </td>
                                                    <td>
                                                        <input type="radio" name="ckd" value="Y" {{(($prescription->ckd ?? old('ckd')) == 'Y') ? 'checked': ''}}> Y
                                                        <input type="radio" name="ckd" value="N" {{(($prescription->ckd ?? old('ckd')) == 'N') ? 'checked': ''}}> N
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
                                                        <input type="radio" name="salt" value="Y" {{(($prescription->salt ?? old('salt')) == 'Y') ? 'checked': ''}}> Y
                                                        <input type="radio" name="salt" value="N"{{(($prescription->salt ?? old('salt')) == 'N') ? 'checked': ''}}> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> SLT </td>
                                                    <td>
                                                        <input type="radio" name="smoke" value="Y"{{(($prescription->smoke ?? old('smoke')) == 'Y') ? 'checked': ''}}> Y
                                                        <input type="radio" name="smoke" value="N"{{(($prescription->smoke ?? old('smoke')) == 'N') ? 'checked': ''}}> No
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Smoking </td>
                                                    <td>
                                                        <input type="radio" name="smoking" value="Y"{{(($prescription->smoking ?? old('smoking')) == 'Y') ? 'checked': ''}}> Y
                                                        <input type="radio" name="smoking" value="N"{{(($prescription->smoking ?? old('smoking')) == 'N') ? 'checked': ''}}> N
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-12">
                                                <b for="">Chief Complaints:</b>
                                                <hr>
                                                <textarea class="form-control col-md-12 col-sm-12  @error('cc') is-invalid @enderror" name="cc" placeholder="Chief Complaints">{{ $prescription->cc ?? old('cc') }}</textarea>
                                                @error('cc')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
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
                                                <textarea class="form-control col-md-12 col-sm-12" name="diagnosis" id="pri_others" placeholder="Primary Diagnosis">{{ $prescription->diagnosis ?? old('diagnosis') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-12">
                                                <textarea class="form-control col-md-12 col-sm-12" name="sec_diagnosis" id="sec_others" placeholder="Secondary Diagnosis">{{ $prescription->sec_diagnosis ?? old('sec_diagnosis') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-12">
                                                <textarea class="form-control col-md-12 col-sm-12" name="sec_dx2" id="sec_dx2" placeholder="Secondary Diagnosis 2">{{ $prescription->sec_dx2 ?? old('sec_dx2') }}</textarea>
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
                                                <select name="medicine" id="medicine_id" class="js-example-placeholder-single js-states form-control @error('medicine_id') is-invalid @enderror" style="width: 100%">
                                                    <option></option>
                                                    @foreach ($medicines as $medicine)
                                                    <option value="{{$medicine->id}}" >{{$medicine->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('medicine_id')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <input hidden type="number[]" id="medicines_id" multiple="multiple" name="medicine_id" value="{{$prescription->name ?? old('name') }}"/>
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
                                                <option selected="false"  disabled="">Select</option>
                                                <option value="0"  {{(($prescription->next_meet ?? old('next_meet')) =='0') ? 'selected':'' }}>0</option>
                                                <option value="1"  {{(($prescription->next_meet ?? old('next_meet')) =='1') ? 'selected':'' }}>১</option>
                                                <option value="2"  {{(($prescription->next_meet ?? old('next_meet')) =='2') ? 'selected':'' }}>২</option>
                                                <option value="3"  {{(($prescription->next_meet ?? old('next_meet')) =='3') ? 'selected':'' }}>৩</option>
                                                <option value="4"  {{(($prescription->next_meet ?? old('next_meet')) =='4') ? 'selected':'' }}>৪</option>
                                                <option value="5"  {{(($prescription->next_meet ?? old('next_meet')) =='5') ? 'selected':'' }}>৫</option>
                                                <option value="6"  {{(($prescription->next_meet ?? old('next_meet')) =='6') ? 'selected':'' }}>৬</option>
                                                <option value="7"  {{(($prescription->next_meet ?? old('next_meet')) =='7') ? 'selected':'' }}>৭</option>
                                                <option value="8"  {{(($prescription->next_meet ?? old('next_meet')) =='8') ? 'selected':'' }}>৮</option>
                                                <option value="9"  {{(($prescription->next_meet ?? old('next_meet')) =='9') ? 'selected':'' }}>৯</option>
                                                <option value="10"  {{(($prescription->next_meet ?? old('next_meet')) =='10') ? 'selected':'' }}>১০</option>
                                                <option value="11"  {{(($prescription->next_meet ?? old('next_meet')) =='11') ? 'selected':'' }}>১১</option>
                                                <option value="12"  {{(($prescription->next_meet ?? old('next_meet')) =='12') ? 'selected':'' }}>১২</option>
                                                <option value="13"  {{(($prescription->next_meet ?? old('next_meet')) =='13') ? 'selected':'' }}>১৩</option>
                                                <option value="14"  {{(($prescription->next_meet ?? old('next_meet')) =='14') ? 'selected':'' }}>১৪</option>
                                                <option value="15"  {{(($prescription->next_meet ?? old('next_meet')) =='15') ? 'selected':'' }}>১৫</option>
                                                <option value="16"  {{(($prescription->next_meet ?? old('next_meet')) =='16') ? 'selected':'' }}>১৬</option>
                                                <option value="17"  {{(($prescription->next_meet ?? old('next_meet')) =='17') ? 'selected':'' }}>১৭</option>
                                                <option value="18"  {{(($prescription->next_meet ?? old('next_meet')) =='18') ? 'selected':'' }}>১৮</option>
                                                <option value="19"  {{(($prescription->next_meet ?? old('next_meet')) =='19') ? 'selected':'' }}>১৯</option>
                                                <option value="20"  {{(($prescription->next_meet ?? old('next_meet')) =='20') ? 'selected':'' }}>২০</option>
                                                <option value="21"  {{(($prescription->next_meet ?? old('next_meet')) =='21') ? 'selected':'' }}>২১</option>
                                            </select>
                                            <input type="radio" id="day" name="meet_day" value="day"  {{(($prescription->meet_day ?? old('meet_day')) =='day') ? 'checked':'' }}> <label for="day">দিন</label>
                                            <input type="radio" id="week" name="meet_day" value="week"  {{($prescription->meet_day ?? old('meet_day') =='week') ? 'checked':'' }}> <label for="week">সপ্তাহ</label>
                                            <input type="radio" id="month" name="meet_day" value="month" {{($prescription->meet_day ?? old('meet_day') =='month') ? 'checked':'' }}> <label for="month">মাস</label>
                                            পর আসবেন। পরবর্তী ভিজিটের সময় অবশ্যই ব্যবস্থাপত্র সাথে আনবেন। ধন্যবাদ।
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="doctor_id" id="doctor_id" value="{{ $prescription->doctor_id ?? old('doctor_id') }}">
                                <input type="hidden" name="patient_id" id="patient_id" value="{{ $prescription->patient_id ?? old('patient_id') }}">
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