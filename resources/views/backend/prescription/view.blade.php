@extends('layouts.main')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<style>
  table,
  th,
  td {
    border: 1px solid black;
    border-collapse: collapse;
  }

  th,
  td {
    padding: 5px;
    text-align: left;
  }



  @media print {
    body * {
      visibility: hidden;
    }

    .page * {
      visibility: visible;
    }

    #printBtn {
      visibility: hidden !important;
    }

  }
</style>
@endpush

@section('content')

<div class="content-wrapper">


  <div class="page d-flex flex-column justify-content-between" style="min-height: 100vh;">

    <div>
      <div class="row p-5 pb-0">
        <div class="col-6">
          <h2 class="m-0">{{$prescription->doctor->name}}</h2>
          <p class="m-0"><b>{{$prescription->doctor->degrees}}</b></p>
          <p class="text-danger m-0">{{$prescription->doctor->specialist}}</p>
          
          <p class="m-0">{{$prescription->doctor->designation}}</p>
          <b>
            <p class="text-primary m-0">{{$prescription->doctor->consultant_of_college}}</p>
          </b>
        </div>
        <div class="col-6 text-end">
          <button id="printBtn" onclick="window.print()" class="btn btn-primary float-right">Print</button>
        </div>
      </div>

      <div class="row px-5 pb-2">
        <div class="col-4">
          <img style="height: 30px; width: 250px" src="https://static.vecteezy.com/system/resources/previews/001/199/360/non_2x/barcode-png.png" alt="" />
          <p class="m-0"><b>Prescription ID</b> : {{$prescription->id}}</p>
        </div>
        <div class="col-4 text-center">
          <p><b>Total Visit</b> -01</p>
        </div>
        <div class="col-4 text-end pt-3">
          <span class="inline-block bg-light rounded-5 border border-2 border-gray p-2">
            <b>UHID : 102-2022</b>
          </span>
        </div>
      </div>

      <div class="row border px-5 border-start-0 border-end-0 border-1 border-dark">
        <div class="col-5">
          <p class="m-0"><b>Name</b>: {{$prescription->patient->name}}</p>
          <p class="m-0"><b>Address</b>: {{$prescription->patient->address}}</p>
        </div>
        <div class="col-4">
          <p class="m-0"><b>Age</b>: {{$prescription->patient->age}} years</p>
          <p class="m-0"><b>Mobile</b>: {{$prescription->patient->mobile}}</p>
        </div>
        <div class="col-3">
          <p class="m-0"><b>Sex</b>: {{$prescription->patient->sex}}</p>
          <p class="m-0"><b>Date</b>: {{ date("Y-m-d")}}</p>
        </div>
      </div>

      <div class="d-flex">
        <div class="col-4 ml-4 pt-3 pl-5 border border-top-0 border-bottom-0 border-left-0 border-right-1">
          <div class="mt-2">
            <p class="border-bottom mb-0 border-gray">
              <b>Patient Details</b>
            </p>
            <div>
              @if($prescription->patient->blood_group)<div>• <small>Blood Group: <span class="text-danger">{{$prescription->patient->blood_group}}</span></small></div>@endif
              @if($prescription->patient->maritial_status)<div>• <small>Marital Status: {{$prescription->patient->maritial_status}}</small></div>@endif
              @if($prescription->patient->ocupation)<div>• <small>Occupation {{$prescription->patient->ocupation}}</small></div>@endif
              @if($prescription->patient->religion)<div>• <small>Religion - {{$prescription->patient->religion}}</small></div>@endif

            </div>
          </div>
          @if($prescription->cc)
          <div class="mt-2">
            <p class="border-bottom mb-0 border-gray">
              <b>Chief Complaints</b>
            </p>
            <p>{{$prescription->cc}}</p>
          </div>
          @endif
          @if($prescription->diagnosis)
          <div class="mt-2">
            <p class="border-bottom mb-0 border-gray">
              <b> Diagnosis</b>
            </p>
            <p>{{$prescription->diagnosis}}</p>
          </div>
          @endif
          @if($prescription->sec_diagnosis)
          <div class="mt-2">
            <p class="border-bottom mb-0 border-gray">
              <b>Secondary Diagnosis</b>
            </p>
            <p>{{$prescription->sec_diagnosis}}</p>
          </div>
          @endif
          @if($prescription->sec_dx2)
          <div class="mt-2">
            <p class="border-bottom mb-0 border-gray">
              <b>Secondary Diagnosis 2</b>
            </p>
            <p>{{$prescription->sec_dx2}}</p>
          </div>
          @endif

          <div class="mt-2">
            <p class="border-bottom mb-0 border-gray">
              <b>Investigations</b>
            </p>
            <ul>
              @if($prescription->mem_type)<li>Pt. Type: {{$prescription->mem_type}}</li>@endif
              @if($prescription->education)<li>Edu Year: {{$prescription->education}}</li>@endif
              @if($prescription->sbp)<li>SBP (mm of Hg): {{$prescription->sbp}}</li>@endif
              @if($prescription->dbp)<li>DBP (mm of Hg): {{$prescription->dbp}}</li>@endif
              @if($prescription->oxygen)<li>Satu. (%): {{$prescription->oxygen}}</li>@endif
              @if($prescription->pulse)<li>Pulse (/min): {{$prescription->pulse}}</li>@endif
              @if($prescription->temp)<li>Temp. (°F): {{$prescription->temp}}</li>@endif
              @if($prescription->edima)<li>Edema: {{$prescription->edima}}</li>@endif
              @if($prescription->anemia)<li>Anemia: {{$prescription->anemia}}</li>@endif
              @if($prescription->jaundice)<li>Jaundice: {{$prescription->jaundice}}</li>@endif
              @if($prescription->weight)<li>Weight (Kg): {{$prescription->weight}}</li>@endif
              @if($prescription->height)<li>Height (cm): {{$prescription->height}}</li>@endif
              @if($prescription->bmi)<li>BMI: {{$prescription->bmi}}</li>@endif
              @if($prescription->blgr)<li>Bl. Gr.: {{$prescription->blgr}}</li>@endif
              @if($prescription->heart)<li>Heart: {{$prescription->heart}}</li>@endif
              @if($prescription->lungs)<li>Lungs: {{$prescription->lungs}}</li>@endif
              @if($prescription->stron)<li><strong>Disease History:</strong></li>@endif
              @if($prescription->diabeties)<li>Diabetes: {{$prescription->diabeties}}</li>@endif
              @if($prescription->hp)<li>HTN: {{$prescription->hp}}</li>@endif
              @if($prescription->ihd)<li>IHD: {{$prescription->ihd}}</li>@endif
              @if($prescription->strk)<li>Stroke: {{$prescription->strk}}</li>@endif
              @if($prescription->copd)<li>COPD: {{$prescription->copd}}</li>@endif
              @if($prescription->cancer)<li>Cancer: {{$prescription->cancer}}</li>@endif
              @if($prescription->ckd)<li>CKD: {{$prescription->ckd}}</li>@endif
              @if($prescription->stron)<li><strong>Behavioural History::</strong></li>@endif
              @if($prescription->salt)<li>Salt: {{$prescription->salt}}</li>@endif
              @if($prescription->smoke)<li>smoke: {{$prescription->smoke}}</li>@endif
              @if($prescription->smoking)<li>Smoking: {{$prescription->smoking}}</li>@endif


            </ul>
          </div>
        </div>

        <div class="col-8 d-flex flex-column justify-content-between ms-4  pb-4">
          <div class="mt-2">
            <h1>R<span class="fs-4">x</span></h1>
            <ol class="pe-5 me-4">
              @foreach($prescription->medicines as $med)
              <li>
                <h5 class="p-0 m-0">{{$med->medicines}}</h5>
                <div class="d-flex justify-content-between">
                  <p class="fs-6">{{$med->frequencies}} {{$med->quantities}} {{$med->quantity_types}} {{$med->eatingtimes}} </p>
                  <div class="d-flex justify-content-end">
                    <p class="mx-2">---------------------</p>
                    <p>{{$med->eatDuration}} month/Day</p>
                  </div>
                </div>
              </li>
              @endforeach

            </ol>
          </div>

          <div class="justify-content-between">


            @if(count($prescription->advice)>0)
            <div>
              <h4 class="pl-4">Advice</h4>

              <ol>
                @foreach($prescription->advice as $adv)
                <li>{{$adv->name}}</li>
                @endforeach

              </ol>
            </div>
            @endif
            @if(count($prescription->test)>0)
            <div>
              <h4 class="pl-4">Test</h4>

              <ol>
                @foreach($prescription->test as $test)
                <li>{{$test->name}}</li>
                @endforeach

              </ol>
            </div>
            @endif
            @if($prescription->next_meet)
            <div>
              <h4 class="pl-4">Next Visit</h4>

              <p class="pl-4 m-0 text-danger fw-bold">
                {{$prescription->next_meet}} {{$prescription->meet_day}} পর রিপোর্টসহ দেখাতে আসবেন
              </p>
            </div>
            @endif
          </div>
        </div>

      </div>
    </div>

    <div class="px-5 bg-light pt-1 pb-3">
            <!-- chamber details  -->
            <div class="row align-iteml-center">
              <div class="col-5">
                <p class="mb-0">প্রতি শুক্রবার বিকাল ৩ টা থেকে রাত ৮ টা</p>
                <p class="mb-0">শামসুল আলম চৌধুরী মার্কেট,</p>
                <p class="mb-0">চৌহমুহনী, পেকুয়া কক্সবাজার</p>
                <p class="mb-0 text-primary">সিরিয়ালের জন্য:</p>
                <p class="mb-0 text-danger fw-bold">
                  ০১৮৮-৮৮৮-২২১, ০১৮৮-৮৮৮-২২১
                </p>
              </div>
              <div class="col-2">
                <img class="img-fluid" src="data:image/png;base64,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" alt="">
              </div>
              <div class="col-5 text-right">
                <p class="mb-0">প্রতি শুক্রবার বিকাল ৩ টা থেকে রাত ৮ টা</p>
                <p class="mb-0">(মঙ্গলবার ও শুক্রবার বন্ধ)</p>
                <p class="mb-0">রুম নঙ- 319</p>
                <p class="mb-0">Health Care institure Name</p>
              </div>
            </div>
          </div>
  </div>

</div>


@endsection

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>



@endpush