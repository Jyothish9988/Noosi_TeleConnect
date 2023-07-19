@include('user.header_2')

<!-- Include DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<!-- Include Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

<script src="admin/assets/js/lib/bootstrap.min.js"></script><script src="admin/assets/js/scripts.js"></script>


<br><br><br><br><br><br><br><br><br>


                                        <!-- ------------------alert------------------------- -->
                                                @if(session()->has('message'))
                                                <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">x</button>
                                                {{session()->get('message')}}
                                                </div>
                                                @endif
                                        <!-- -------------------------alert end--------------- -->
                                    <div style="overflow-x:auto">
                                        <table id="bootstrap-data-table-export" class="table table-striped ">
                                            <thead>
        <tr>
            <th>Registration ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Age</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Blood Group</th>
            <th>Address</th>
            <th>Pin</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Health ID</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $a)
        <tr>
            <td>{{$a->reg_id}}</td>
            <td><img src="/uploads/{{$a->image}}" alt="Product image" height="150px" width="150px" class="product-image"></td>
            <td>{{$a->name}}</td>
            <td>{{$a->age}}</td>
            <td>{{$a->dob}}</td>
            <td>{{$a->gender}}</td>
            <td>{{$a->blood}}</td>
            <td>{{$a->address}}</td>
            <td>{{$a->pin}}</td>
            <td>{{$a->phone}}</td>
            <td>{{$a->email}}</td>
            <td>{{$a->hid}}</td>
            <td><a href="{{url('patient_booking',$a->reg_id)}}"  class="btn btn-success">Book Now</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
                                 
<!-- Include jQuery -->
<script src="admin/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="admin/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.flash.min.js"></script>
    <script src="admin/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="admin/assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="admin/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="admin/assets/js/lib/data-table/datatables-init.js"></script>



@include('user.footer_2')
