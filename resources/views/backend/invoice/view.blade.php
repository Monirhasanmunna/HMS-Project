@extends('layouts.backend.main')

@push('css')

@endpush

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row pt-3">
<div class="page pb-0 d-flex flex-column justify-content-between">
      <div>
        <!-- pad header  -->
        <div class="row mb-4 bg-light py-3 border-bottom">
          <div class="col-12 text-center d-flex justify-content-center">
            <div>
              <img style="height: 60px; width: 80px" src="https://logos-world.net/wp-content/uploads/2020/12/Lays-Logo.png" alt="">
            </div>
            <div>
              <h3 class="p-0 m-0 text-info"><b>QB DEMO HOSPITAL</b></h3>
              <p class="p-0 m-0">
                <small class="border-bottom border-top bg-white border-info">
                  <span class="text-info">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 12px">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"></path>
                    </svg>
                    <i class="text-info">+880 1798691956</i>,
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 15px">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path>
                    </svg>

                    <i class="text-info">abcedfg@gmail.com</i>
                  </span></small>
              </p>
            </div>
          </div>
        </div>

        <!-- barcode and title  -->
        <div class="row px-4 justify-content-between">
          <div class="col-4 text-left">
            <img style="height: 30px; width: 150px" src="https://static.vecteezy.com/system/resources/previews/001/199/360/non_2x/barcode-png.png" alt="">
          </div>
          <div class="col-4 text-center">
            <span class="bg-light text-dark p-2 border border-secondary rounded-pill rounded-pill"><b>MONEY RECEIPT</b></span>
          </div>
          <div class="col-4 text-right">
            <img style="height: 30px; width: 150px" src="https://static.vecteezy.com/system/resources/previews/001/199/360/non_2x/barcode-png.png" alt="">
          </div>
        </div>
        <div class="row px-4 mt-2">
          <div class="col-6">
            <p class="mb-0"><b>Ms. Sahara Khatun</b></p>
          </div>
          <div class="col-6">
            <p class="mb-0 text-right"><b>Cabin NO : 101</b></p>
          </div>
        </div>
        <!-- invoice top information  -->
        <div class="row px-4 justify-content-between mb-3">
          <div class="col-5">
            <p class="m-0 p-0 text-gray">
              <small>UHID</small>: <b class="bg-light">001</b>
            </p>
            <small>
              <p class="m-0 p-0 text-gray">Age/Sex: <b>48Y/Female</b></p>
              <p class="m-0 p-0 text-gray">Contact: <b>Husband</b></p>
              <p class="m-0 p-0 text-gray">
                Contact No: <b>+880 1798691956</b>
              </p>
              <p class="m-0 p-0 text-gray">
                Address: <b>Kawkhali, Rangamati.</b>
              </p>
            </small>
          </div>
          <div class="col-7 text-right">
            <small>
              <p class="m-0 p-0 text-gray">
                Supervise BT: <b>DR M.A. Majid(MBBS)</b>
              </p>
              <p class="m-0 p-0 text-gray">Admission : <b>30-10-2018</b></p>
              <p class="m-0 p-0 text-gray">Receipt NO: <b>100011</b></p>
              <p class="m-0 p-0 text-gray">Invoice Date: <b>30-10-2018 </b></p>
              <p class="m-0 p-0 text-gray">
                Receipt Time: <b>30-10-2018 01:57PM </b>
              </p>
            </small>
          </div>
        </div>
        <!-- product details -->
        <div class="px-4">
          <small>
            <table class="table border">
              <thead class="bg-light my-0 border-top-0">
                <tr class="text-gray">
                  <th scope="col" class="p-1 text-center">SN</th>
                  <th scope="col" class="p-1">Particulars</th>
                  <th scope="col" class="p-1">Description</th>
                  <th scope="col" class="text-center p-1">QYT</th>
                  <th scope="col" class="text-center p-1">AMOUNT</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="p-1 text-center" scope="row">1</td>
                  <td class="p-1">Admission asdsa FE</td>
                  <td class="p-1"></td>
                  <td class="p-1 text-center">1</td>
                  <td class="p-1 text-center">5,000/-</td>
                </tr>
                <tr>
                  <td class="p-1 text-center" scope="row">1</td>
                  <td class="p-1">Admission asdsa FE</td>
                  <td class="p-1"></td>
                  <td class="p-1 text-center">1</td>
                  <td class="p-1 text-center">5,000/-</td>
                </tr>
                <tr>
                  <td class="p-1 text-center" scope="row">1</td>
                  <td class="p-1">Admission asdsa FE</td>
                  <td class="p-1"></td>
                  <td class="p-1 text-center">1</td>
                  <td class="p-1 text-center">5,000/-</td>
                </tr>
                <tr>
                  <td class="p-1 text-center" scope="row">1</td>
                  <td class="p-1">Admission asdsa FE</td>
                  <td class="p-1"></td>
                  <td class="p-1 text-center">1</td>
                  <td class="p-1 text-center">5,000/-</td>
                </tr>
                <tr>
                  <td class="p-1 text-center" scope="row">1</td>
                  <td class="p-1">Admission asdsa FE</td>
                  <td class="p-1"></td>
                  <td class="p-1 text-center">1</td>
                  <td class="p-1 text-center">5,000/-</td>
                </tr>
              </tbody>
            </table>
          </small>
        </div>
      </div>
      <!-- footer  -->
      <div>
        <div class="row px-4 border-top pt-2">
          <div class="col-7">
            <small>
              <b>
                <p class="m-0"><u>Remarks:</u></p></b>

              <p class="text-gray">Some Comment Will be hare</p>
            </small>
            <small>
              <b>
                <p class="m-0"><u>Paid Amount(In Words)</u></p></b>

              <p class="m-0 text-gray">Five Hundred</p>
            </small>
          </div>
          <div class="col-5">
            <small>
              <p class="d-flex m-0 justify-content-between">
                <span class="text-right col-7">Sub Total :</span>
                <span class="">1000.00</span>
              </p>
              <p class="d-flex m-0 justify-content-between">
                <span class="text-right col-7">Vat (0%):</span>
                <span class="">(+)10.00</span>
              </p>
              <p class="d-flex m-0 justify-content-between">
                <span class="text-right col-7">Discount :</span>
                <span class="">(-) 100.00</span>
              </p>
              <p class="d-flex m-0 justify-content-between">
                <span class="text-right col-7">Net Payable :</span>
                <span class="">1000.00</span>
              </p>
              <p class="d-flex m-0 justify-content-between">
                <span class="text-right col-7">Pay Amount :</span>
                <span class="">1000.00</span>
              </p>

              <p class="d-flex m-0 justify-content-between">
                <span class="text-right col-7">Due : </span>
                <span class="">1000.00</span>
              </p>
              <p class="mb-5 mt-4 text-right">
                <span class="text-right d-block"><b><u>Recevied By:</u></b>
                </span>
                <span class="text-gray">MD RIAJ</span>
              </p>
            </small>
          </div>
        </div>
        <div class="text-center px-4 d-flex justify-content-between">
          <small>
            <p class="text-gray mb-1">SoftWare Developed By QBSOFT</p>
          </small>
          <small>
            <p class="text-gray mb-1">Printed Date: 01/11/2002</p>
          </small>
        </div>
      </div>
    </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('js')

@endpush
