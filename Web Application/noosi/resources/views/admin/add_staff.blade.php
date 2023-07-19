<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>

  
    @include('admin.sidebar')

    @include('admin.navbar')




<div class="content-wrap">
    <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Add Staff Here</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
<!-- ------------------alert------------------------- -->
@if(session()->has('message'))
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">x</button>
{{session()->get('message')}}
</div>
@endif
<!-- -------------------------alert end--------------- -->



<form action="{{url('upload_staff')}}" method="POST" enctype="multipart/form-data">
@csrf
<table align="center">

    <tr>
        <th>Name</th><td><input type="text" name="name" placeholder="Give a Name....." required="" class="form-control"></td>
    </tr>


    <tr>
        <th>Contact</th><td><input type="number" name="phone" placeholder="Give a Phone Number....." required="" class="form-control"></td>
    </tr>
    


    <tr>
        <th>Email</th><td><input type="email" name="email" placeholder="Give a Email....." required="" class="form-control"></td>
    </tr>

   

<tr><td><input type="submit"  class="btn btn-success"></td></tr>

</table>

</form>





            </div>
        </div>
    </div>
</div>






            </div>
        </div>
    </div>
</div>





    @include('admin.script')
</body>

</html>