<div class="sidebar">
    <!-- Sidebar user panel (optional) -->


    <!-- Sidebar Menu -->
    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="{{Route('app.dashboard')}}" class="nav-link {{Request::is('app/dashboard*')?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-header">User Management</li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-sharp fa-solid fa-person"></i>
            <p>
              Role
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-person-circle-plus"></i>
                <p>Role Add</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-sharp fa-solid fa-users"></i>
                <p>Role List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-user"></i>
            <p>
              User
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-user-plus"></i>
                <p>User Add</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-users"></i>
                <p>User List</p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-header">Patient Management</li>

        <li class="nav-item">
          <a href="#" class="nav-link {{Request::is('app/doctor*')?'active':''}}">
            <i class="fa-solid fa-user-doctor"></i>
            <p>
              Doctor
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="{{Route('app.doctor.create')}}" class="nav-link">
                <i class="fa-solid fa-circle-plus"></i>
                <p>Doctor Add</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.doctor.index')}}" class="nav-link">
                <i class="fa-solid fa-list"></i>
                <p>Doctor List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link {{Request::is('app/assistant*')?'active':''}}">
            <i class="fa-solid fa-user-nurse"></i>
            <p>
              Assistant
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="{{Route('app.assistant.create')}}" class="nav-link">
                <i class="fa-solid fa-circle-plus"></i>
                <p>Assistant Add</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.assistant.index')}}" class="nav-link">
                <i class="fa-solid fa-list"></i>
                <p>Assistant List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link {{Request::is('app/patient*')?'active':''}}">
            <i class="fa-sharp fa-solid fa-wheelchair"></i>
            <p>
              Patient
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="{{Route('app.patient.create')}}" class="nav-link">
                <i class="fa-solid fa-circle-plus"></i>
                <p>Patient Add</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.patient.index')}}" class="nav-link">
                <i class="fa-solid fa-list"></i>
                <p>Patient List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link {{Request::is('app/admition*')?'active':''}}">
            <i class="fa-solid fa-bed-pulse"></i>
            <p>
              Patient Admission
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="{{Route('app.admition.create')}}" class="nav-link">
                <i class="fa-solid fa-circle-plus"></i>
                <p>New Admission</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.admition.index')}}" class="nav-link">
                <i class="fa-solid fa-list"></i>
                <p>Patient List</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-header">Prescription Management</li>

        <li class="nav-item">
          <a href="#" class="nav-link {{Request::is('app/prescription*')?'active':''}}">
            <i class="fa-solid fa-file-prescription"></i>
            <p>
              Prescription
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="{{Route('app.prescription.dashboard')}}" class="nav-link">
                <i class="fa-solid fa-circle-plus"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.prescription.create')}}" class="nav-link">
                <i class="fa-solid fa-circle-plus"></i>
                <p>Prescription Add</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.prescription.index')}}" class="nav-link">
                <i class="fa-solid fa-list"></i>
                <p>Prescription List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-list-check"></i>
            <p>
              Manage
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="{{Route('app.medicinegroup.index')}}" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Medicine Group</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.medicine.index')}}" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Medicine</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.frequency.index')}}" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Frequency</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.quantity.index')}}" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Quantity</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.quantity.type.index')}}" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Qty Type</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.eatingtime.index')}}" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Eating Time</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.advice.index')}}" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Advice</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.medical.test.index')}}" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Medical Test</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.complaint.index')}}" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Complaint</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.disease.index')}}" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Disease</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.blood.index')}}" class="nav-link">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <p>Blood Group</p>
              </a>
            </li>
          </ul>
        </li>


        

      <li class="nav-header">Bed Management</li>

      
        <li class="nav-item">
          <a href="#" class="nav-link {{Request::is('app/bed*')?'active':''}}">
            <i class="fa-solid fa-bed"></i>
            <p>
              Bed
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="{{Route('app.beddashboard.index')}}" class="nav-link">
                <i class="fa-solid fa-bed"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.bed.index')}}" class="nav-link">
                <i class="fa-solid fa-bed"></i>
                <p>Bed</p>
              </a>
          </li>
          </ul>
        </li>

        {{-- <li class="nav-header">Settings</li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-gear"></i>
            <p>
              Setting
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="{{Route('app.disease.index')}}" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Disease</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="{{Route('app.blood.index')}}" class="nav-link">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <p>Blood Group</p>
              </a>
            </li>
          </ul>
        </li> --}}

        <li class="nav-header">Pathology</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-flask"></i>
            <p>
              Lab Test
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                 <i class="fa-solid fa-circle-plus"></i>
                <p>Test Add</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Test List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">Report</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-receipt"></i>
            <p>
              Reports
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>Financial Report</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <p>User Activity Report</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <p>Daily Income</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <p>Monthly Income</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <p>Income Vs Expense</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <p>Birth Report</p>
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <p>Operation Report</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">Settings</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-gear"></i>
            <p>
              Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ml-2">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-bars"></i>
                <p>User Settings</p>
              </a>
            </li>
            
          </ul>
        </li>

      </ul>
    </nav>
    
      <form method="POST" id="logoutForm" action="{{ route('logout') }}" style="display: none">
        @csrf

      </form>

  <button type="submit" class="btn btn-danger" style="width: 100%; margin-bottom: 10px;" onclick="$('#logoutForm').submit();">Log Out</button>
    <!-- /.sidebar-menu -->
  </div>