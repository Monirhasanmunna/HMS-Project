@extends('layouts.backend.main')

@push('css')
 <style>
  .dashboard_header{
    background-color: 
 }

 .card1-border{
  border: 1px solid blue;
 }

 .card1-header-border{
  border-bottom: 1px solid blue;

 }

 .card2-border{
  border: 1px solid green;
 }

 .card2-header-border{
  border-bottom: 1px solid green;

 }

 </style>
@endpush

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row pt-3 px-2">
                <div class="col-12 bg-primary pt-1" style="border-radius: 3px">
                  <div class="dashboard_header">
                    <h6>Welcome To Prescription Management Dashboard</h6>
                  </div>
                </div>
            </div>

            <div class="row pt-3">
              <div class="col-3">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>50</h3>
  
                    <p>Invoice</p>
                  </div>
                  <div class="icon">
                    <i class="fa-solid fa-receipt"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-3">
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>15000</h3>
    
                    <p>Discount</p>
                  </div>
                  <div class="icon">
                    <i class="fa-solid fa-percent"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-3">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>2000</h3>
    
                    <p>Due</p>
                  </div>
                  <div class="icon">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-3">
                <div class="small-box bg-primary">
                  <div class="inner">
                    <h3>20000</h3>
    
                    <p>Cash In</p>
                  </div>
                  <div class="icon">
                    <i class="fa-solid fa-cash-register"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
          </div>

          <div class="row pt-3">
            <div class="col-7">
                <div class="row">
                    <div class="col-4">
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>20</h3>
                          <p>Total Patient</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-person-pregnant"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>

                    <div class="col-4">
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3>10</h3>
                            <p>New Patient</p>
                          </div>
                          <div class="icon">
                            <i class="fa-solid fa-person"></i>
                          </div>
                          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3>15</h3>
                            <p>IPD Patient</p>
                          </div>
                          <div class="icon">
                            <i class="fa-solid fa-bed"></i>
                          </div>
                          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                </div>
                <div class="row">
                    <div class="col-4">
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>20</h3>
                          <p>Total Patient</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-person-pregnant"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>

                    <div class="col-4">
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3>10</h3>
                            <p>New Patient</p>
                          </div>
                          <div class="icon">
                            <i class="fa-solid fa-person"></i>
                          </div>
                          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3>15</h3>
                            <p>IPD Patient</p>
                          </div>
                          <div class="icon">
                            <i class="fa-solid fa-bed"></i>
                          </div>
                          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                </div>
            </div>
            <div class="col-5">
                <div class="card card2-border">
                    <div class="card-header py-1 card2-header-border">
                      <h5 class="card-title text-danger">New Patient's</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table tborder">
                        <thead>
                          <tr>
                            <th>Patient</th>
                            <th>Date</th>
                            <th style="width: 40px">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Rafiq Ahmed(2005)</td>
                            <td>10/13/22</td>
                            <td class="text-right"><a href="#"><i class="fa-solid fa-bars btn-sm btn-info"></i></a></td>
                          </tr>
                          <tr>
                            <td>Shafiq Islam(2458)</td>
                            <td>10/14/22</td>
                            <td class="text-right"><a href="#"><i class="fa-solid fa-bars btn-sm btn-info"></i></a></td>
                          </tr>
                          <tr>
                            <td>Rayhan Islam(1400)</td>
                            <td>10/17/22</td>
                            <td class="text-right"><a href="#"><i class="fa-solid fa-bars btn-sm btn-info"></i></a></td>
                          </tr>
                          <tr>
                            <td>Rafiq Ahmed(8654)</td>
                            <td>10/13/22</td>
                            <td class="text-right"><a href="#"><i class="fa-solid fa-bars btn-sm btn-info"></i></a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
          </div>
            
          </div>

          <div class="row pt-3">
            <div class="col-md-6">
              <div class="card card2-border">
                <div class="card-header py-1 card2-header-border">
                  <h5 class="card-title text-danger">Discharge</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table tborder">
                    <thead>
                      <tr>
                        <th>Patient</th>
                        <th>Date</th>
                        <th style="width: 40px">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Rafiq Ahmed(2005)</td>
                        <td>10/13/22</td>
                        <td><span class="badge badge-warning">Pending</span></td>
                      </tr>
                      <tr>
                        <td>Shafiq Islam(2458)</td>
                        <td>10/14/22</td>
                        <td><span class="badge badge-warning">Pending</span></td>
                      </tr>
                      <tr>
                        <td>Rayhan Islam(1400)</td>
                        <td>10/17/22</td>
                        <td><span class="badge badge-warning">Pending</span></td>
                      </tr>
                      <tr>
                        <td>Rafiq Ahmed(8654)</td>
                        <td>10/13/22</td>
                        <td><span class="badge badge-warning">Pending</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <section>
</div>
@endsection

@push('js')
{{-- <!-- Select2 -->
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(".js-example-placeholder-single").select2({
      placeholder: "--Select One--",
      allowClear: true
  });
</script>

<script>
    $("#bedAddBtn").click(function(){
        $("#bedAddModel").modal('show');
    });
</script>

<script>
  function editbed(id){
    $.ajax({
      url         : '/app/bed/edit/'+id,
      type        : 'GET',
      dataType    : 'json',
      success     : function(response){
        console.log(response);
        $("#bed_id").val(response.id);
        var bedtype = `
          <option selected hidden value="${response.bedtype.id}">${response.bedtype.name}</option>
        `;
        var bedgroup = `
          <option selected hidden value="${response.bedgroup.id}">${response.bedgroup.name}</option>
        `;
        $("#bedtype").append(bedtype);
        $("#bedgroup").append(bedgroup);
        $("#name").val(response.name);
        if(response.status == 1){
              $("#bedstatus").attr("checked",true);
              $("#bedstatus").val(response.status);
          }
        $("#bedEditModel").modal('show');
      }
    });
  }
</script>

<script>
  function deletebed(id){

      Swal.fire({
          title: 'Are you sure?',
          text: "You will lost this data!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
          if (result.isConfirmed) {
              Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
              )
              $.ajax({
              url      : '/app/bed/delete/'+id,
              dataType : 'json',
              Type     : 'Delete',
              success  : function(response){
                  setTimeout(function(){
                  window.location.reload();
                  },1000);
              },
              });
          }
      });
  }
</script> --}}
@endpush
