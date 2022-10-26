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
                                    <label>Patient</label>
                                    <select name="patient_id" id="patient" class="js-example-placeholder-single js-states form-control @error('doctor') is-invalid @enderror" style="width: 100%">
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
                                                    <td> <input type="text" name="education"  class="form-control"></td>
                                                </tr>
                                                <tr>
                                                    <td>SBP (mm of Hg)</td>
                                                    <td> <input type="text" name="sbp"  class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td>DBP (mm of Hg)</td>
                                                    <td> <input type="text" name="dbp"  class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td>O<sub>2</sub> Satu. (%)</td>
                                                    <td> <input type="text" name="oxygen"  class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Pulse (/min)</td>
                                                    <td> <input type="text" name="pulse"  class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Temp. (°F)</td>
                                                    <td> <input type="text" name="temp"  class="form-control"> </td>
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
                                                    <td> <input type="text" name="weight"  id="weight" class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Height (cm)</td>
                                                    <td> <input type="text" name="height"  id="height" class="form-control"> </td>
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
                                                    <td >
                                                    <input type="text" name="blgr" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Heart </td>
                                                    <td > <input type="text" name="heart" class="form-control " ></td>
                                                </tr>
                                                <tr>
                                                    <td>Lungs </td>
                                                    <td> <input type="text" name="lungs" class="form-control " ></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <b>Disease History:</b>
                                        <hr>
                                        <table style="margin-bottom: 10px;">
                                            <tbody>
                                                <tr>
                                                    <td>Diabetes </td>
                                                    <td>
                                                        <input type="radio" name="diabeties"  value="Y"> Y 
                                                        <input type="radio" name="diabeties" value="N"> N
                                                    </td>
                                                    <td> HTN </td>
                                                    <td>
                                                        <input type="radio" name="hp" value="Y"> Y 
                                                        <input type="radio" name="hp" value="N"> N
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>IHD</b> </td>
                                                    <td> 
                                                        <input type="radio" name="ihd" value="Y"> Y 
                                                        <input type="radio" name="ihd" value="N"> N 
                                                    </td>
                                                    <td>Stroke</td>
                                                    <td> 
                                                        <input type="radio" name="strk" value="Y"> Y 
                                                        <input type="radio" name="strk" value="N"> N 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>COPD</b> </td>
                                                    <td> <input type="radio" name="copd" value="Y"> Y <input type="radio" name="copd" value="N"> N </td>
                                                    <td>Cancer </td>
                                                    <td> <input type="radio" name="cancer" value="Y"> Y <input type="radio" name="cancer" checked="" value="N"> N </td>
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
                                        <table style="margin-bottom: 10px;">
                                            <tbody>
                                                <tr>
                                                    <td>Salt </td>
                                                    <td> 
                                                        <input type="radio" name="salt"  value="Y"> Y 
                                                        <input type="radio" name="salt" value="N"> N
                                                    </td>
                                                    <td> SLT </td>
                                                    <td>
                                                        <input type="radio" name="smoke" value="Y"> Y 
                                                        <input type="radio" name="smoke"  value="N"> No
                                                    </td>
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
                                                    <input id="1"  type="checkbox" name="advice[]" value="1">
                                                    <label for="1">প্রচুর পরিমাণ পানি পান করবেন।</label><br>

                                                    <input id="2"  type="checkbox" name="advice[]" value="2">
                                                    <label for="2">প্রতিদিন কিছু শাক-সবজি ও দেশী ফল খাবেন।</label><br>

                                                    <input id="3"  type="checkbox" name="advice[]" value="3">
                                                    <label for="3">ধূমপান করবেন না।</label><br>

                                                    <input id="4" type="checkbox" name="advice[]" value="4">
                                                    <label for="4">পাতে লবণ খাবেন না।</label><br>

                                                    <input id="5" type="checkbox" name="advice[]" value="5">
                                                    <label for="5">চিনি ও চিনিজাতীয় খাবার কম খাবেন।</label><br>

                                                    <input id="6"  type="checkbox" name="advice[]" value="6">
                                                    <label for="6">ভারী কাজ করবেন না।</label><br>

                                                    <input id="7"  type="checkbox" name="advice[]" value="7">
                                                    <label for="7">নিয়মিত ঔষধ খাবেন।</label><br>

                                                    <input id="8" type="checkbox" name="advice[]" value="8">
                                                    <label for="8">জর্দ্দা, সাদা পাতা, গুল ইত্যাদি খাবেন না।</label><br>

                                                    <input id="9" type="checkbox" name="advice[]" value="9">
                                                    <label for="9">পরিমিত খাবার খাবেন, নিয়মিত সকাল-সন্ধ্যা হাঁটবেন।</label><br>

                                                    <input id="10" type="checkbox" name="advice[]" value="10">
                                                    <label for="10">প্রতিদিন ডিম খাবেন।</label><br>

                                                    <input id="11" type="checkbox" name="advice[]" value="11">
                                                    <label for="11">প্রতিদিন দুধ খাবেন।</label><br>

                                                    <input id="12"  type="checkbox" name="advice[]" value="12">
                                                    <label for="12">কুসুম গরম পানিতে লবণ মিশিয়ে গড়্গড়া করবেন।</label><br>

                                                    <input id="13" type="checkbox" name="advice[]" value="13">
                                                    <label for="13">গরম পানিতে গোসল করবেন।</label><br>

                                                    <input id="14" type="checkbox" name="advice[]" value="14">
                                                    <label for="14">গরম সেঁক নিবেন।</label><br>

                                                    <input id="15" type="checkbox" name="advice[]" value="15">
                                                    <label for="15">বিশ্রামের সময় পায়ের নিচে বালিশ দিয়ে রাখবেন।</label><br>

                                                    <input id="16" type="checkbox" name="advice[]" value="16">
                                                    <label for="16">প্রতিদিন ইনফ্রারেড থেরাপি নিবেন।</label><br>

                                                    <input id="17" type="checkbox" name="advice[]" value="17">
                                                    <label for="17">গরম পানি বা মেনথল এর ধোঁয়া নাকে টানবেন।</label><br>

                                                    <input id="18" type="checkbox" name="advice[]" value="18">
                                                    <label for="18">পরবর্তী সাক্ষাতের সময় ঔষধের পাতা নিয়ে আসবেন।</label><br>

                                                    <input id="19" type="checkbox" name="advice[]" value="19">
                                                    <label for="19">১৫ দিন বিশ্রামে থাকবেন।</label><br>

                                                    <input id="20" type="checkbox" name="advice[]" value="20">
                                                    <label for="20">জ্বর মেপে লিখে রাখবেন।</label><br>

                                                    <input id="21" type="checkbox" name="advice[]" value="21">
                                                    <label for="21">শক্ত বিছানায় ঘুমাবেন।</label><br>

                                                    <input id="22" type="checkbox" name="advice[]" value="22">
                                                    <label for="22">ইনহেলার ব্যবহারের পর কুলি করবেন।</label><br>

                                                    <input id="23" type="checkbox" name="advice[]" value="23">
                                                    <label for="23">প্রতিদিন ৩০ মিনিটের বেশি করে দ্রুত গতিতে হাঁটবেন।</label><br>

                                                    <input id="24" type="checkbox" name="advice[]" value="24">
                                                    <label for="24">ডায়াবেটিসের ঔষধ ব্যবহারকারীদের বেশি ঘাম বা অজ্ঞান ভাব হলে 
                                                        (বিশেষত খালি পেটে থাকা অবস্থায়), অনতিবিলম্বে চিনির শরবত বা মিষ্টি কিছু খাবেন।</label><br>

                                                    <input id="25" type="checkbox" name="advice[]" value="25">
                                                    <label for="25">শ্বাস-প্রশ্বাসের ব্যায়াম করবেন।</label><br>

                                                    <input id="26" type="checkbox" name="advice[]" value="26">
                                                    <label for="26">ঠান্ডা পানি,আইসক্রিম সহ সকল প্রকার শীতল খাবার থেকে বিরত থাকবেন।</label><br>

                                                    <input id="28" type="checkbox" name="advice[]" value="28">
                                                    <label for="28">আজ রাতে ও ৭ দিন পর রাতে।</label><br>

                                                    <input id="29" type="checkbox" name="advice[]" value="29">
                                                    <label for="29">ব্যাক্তিগত পরিষ্কার পরিচ্ছন্নতা ও স্বাস্থ্যবিধি মেনে চলবেন।</label><br>

                                                    <input id="30" type="checkbox" name="advice[]" value="30">
                                                    <label for="30">যে সমস্ত খাবার খেলে চুলকানি হয় (যেমন- হাঁসের ডিম, গরুর গোশত, বেগুন ইত্যাদি), সেগুলো পরিহার করবেন।</label><br>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-12 col-md-12" data-select2-id="86">
                                        <b for="">Follow-up Investigation(s):</b>
                                        <hr>
                                        <select id="testFollowup" class="form-control  form-control-sm " name="suggest_test[]" multiple="" style="width: 100%;" data-select2-id="5" tabindex="-1" aria-hidden="true">
                                            <option value="5" data-select2-id="15">ASO Titre</option>
                                            <option value="47" data-select2-id="16">Barium Swallow X-Ray</option>
                                            <option value="19" data-select2-id="17">Bilirubin</option>
                                            <option value="13" data-select2-id="18">Blood Glucose, 2h After 75g Glucose Intake</option>
                                            <option value="12" data-select2-id="19">Blood Glucose, 2h After Breakfast</option>
                                            <option value="10" data-select2-id="20">Blood Glucose, Fasting</option>
                                            <option value="11" data-select2-id="21">Blood Glucose, Random</option>
                                            <option value="8" data-select2-id="22">Blood Grouping</option>
                                            <option value="50" data-select2-id="23">CA-125</option>
                                            <option value="1" data-select2-id="24">CBC</option>
                                            <option value="16" data-select2-id="25">Cholesterol Total</option>
                                            <option value="34" data-select2-id="26">Coronary Angiogram</option>
                                            <option value="14" data-select2-id="27">Creatinine</option>
                                            <option value="36" data-select2-id="28">CRP</option>
                                            <option value="54" data-select2-id="29">CT-Scan of Brain</option>
                                            <option value="23" data-select2-id="30">Delete</option>
                                            <option value="63" data-select2-id="31">Delete</option>
                                            <option value="64" data-select2-id="32">Delete</option>
                                            <option value="65" data-select2-id="33">Delete</option>
                                            <option value="69" data-select2-id="34">Delete</option>
                                            <option value="33" data-select2-id="35">ECG</option>
                                            <option value="42" data-select2-id="36">Echocardiography (2D)</option>
                                            <option value="43" data-select2-id="37">Echocardiography (Doppler)</option>
                                            <option value="20" data-select2-id="38">Electrolytes</option>
                                            <option value="3" data-select2-id="39">ESR</option>
                                            <option value="44" data-select2-id="40">Free T3</option>
                                            <option value="45" data-select2-id="41">Free T4</option>
                                            <option value="37" data-select2-id="42">HbA1C</option>
                                            <option value="9" data-select2-id="43">HBsAg</option>
                                            <option value="2" data-select2-id="44">Hemoglobin</option>
                                            <option value="62" data-select2-id="45">Infrared Therapy</option>
                                            <option value="21" data-select2-id="46">Lipid Profile</option>
                                            <option value="53" data-select2-id="47">MRI of L/S Spine (Plain)</option>
                                            <option value="61" data-select2-id="48">Nebulization</option>
                                            <option value="24" data-select2-id="49">Pregnancy Test</option>
                                            <option value="57" data-select2-id="50">PSA</option>
                                            <option value="6" data-select2-id="51">RA/RF</option>
                                            <option value="38" data-select2-id="52">RT-PCR for COVID-19</option>
                                            <option value="68" data-select2-id="53">Serum Amylase</option>
                                            <option value="58" data-select2-id="54">Serum Ig E</option>
                                            <option value="67" data-select2-id="55">Serum Lipase</option>
                                            <option value="18" data-select2-id="56">SGOT</option>
                                            <option value="17" data-select2-id="57">SGPT/ALT</option>
                                            <option value="59" data-select2-id="58">Sputum for AFB</option>
                                            <option value="4" data-select2-id="59">TC/DC</option>
                                            <option value="70" data-select2-id="60">TG</option>
                                            <option value="35" data-select2-id="61">Troponin-I</option>
                                            <option value="40" data-select2-id="62">TSH</option>
                                            <option value="15" data-select2-id="63">Uric Acid</option>
                                            <option value="22" data-select2-id="64">Urine R/E</option>
                                            <option value="27" data-select2-id="65">USG of KUB region</option>
                                            <option value="28" data-select2-id="66">USG of KUB region &amp; Prostate</option>
                                            <option value="26" data-select2-id="67">USG of Pregnancy Profile</option>
                                            <option value="25" data-select2-id="68">USG of Whole Abdomen</option>
                                            <option value="49" data-select2-id="69">VDRL</option>
                                            <option value="7" data-select2-id="70">Widal Test</option>
                                            <option value="32" data-select2-id="71">X-Ray Abdomen erect posture A/P view</option>
                                            <option value="51" data-select2-id="72">X-Ray Cervical Spine both view</option>
                                            <option value="55" data-select2-id="73">X-ray Chest A/P view</option>
                                            <option value="29" data-select2-id="74">X-Ray Chest P/A view</option>
                                            <option value="46" data-select2-id="75">X-Ray Foot both view (Right/Left)</option>
                                            <option value="48" data-select2-id="76">X-Ray Knee both view</option>
                                            <option value="30" data-select2-id="77">X-Ray L/S spine both view</option>
                                            <option value="52" data-select2-id="78">X-Ray Leg both view</option>
                                            <option value="41" data-select2-id="79">X-ray of wrist joint of left side</option>
                                            <option value="39" data-select2-id="80">X-Ray Pelvis A/P view</option>
                                            <option value="31" data-select2-id="81">X-Ray PNS O/M view</option>
                                            <option value="56" data-select2-id="82">X-Ray right ankle joint both view</option>
                                            <option value="60" data-select2-id="83">X-Ray right wrist joint both view</option>
                                        </select>
                                    </div>


                                    <div class="row text-center" style="border-top:1px solid #2b6749; padding:5px; text-align: center !important;">
                                        <div class="col-sm-12 col-print text-center">
                                            <select name="next_meet">
                                                <option selected="false" disabled="">Select</option>
                                                <option value="0">0</option>
                                                <option value="1" >১</option>
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

<!-- 
  "mem_type" => "HCU"
  "education" => "1"
  "sbp" => "2"
  "dbp" => "3"
  "oxygen" => "4"
  "pulse" => "5"
  "temp" => "6"
  "edima" => "Y"
  "anemia" => "Y"
  "jaundice" => "Y"
  "weight" => "10"
  "height" => "11"
  "bmi" => "12"
  "blgr" => "13"
  "heart" => "14"
  "lungs" => "15"
  "diabeties" => "Y"
  "hp" => "Y"
  "ihd" => "Y"
  "strk" => "Y"
  "copd" => "Y"
  "cancer" => "Y"
  "ckd" => "Y"
  "salt" => "Y"
  "smoke" => "Y"
  "smoking" => "Y"
  "cc" => "26"
  "diagnosis" => "27"
  "sec_diagnosis" => "28"
  "sec_dx2" => "29"
  "medicine" => "3"
  "medicine_id" => "2,3"
  "frequency" => array:2 [▶]
  "qty" => array:2 [▶]
  "qtyType" => array:2 [▶]
  "eatingType" => array:2 [▶]
  "advice" => array:3 [▶]
  "suggest_test" => array:2 [▶]
  "next_meet" => "15"
  "meet_day" => "day"
  "patient_id" => "1" 
-->



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
    $("#patient").on('change', function() {
        var patient_id = $(this).val();

        $("#patient_id").val( patient_id);

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