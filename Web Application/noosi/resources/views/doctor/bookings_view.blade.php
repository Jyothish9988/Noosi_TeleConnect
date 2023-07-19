@include('doctor.header_2');
<style>
    .order-table {
        margin-top: 20px;
        width: 100%;
        border-collapse: collapse;
    }

    .order-table th,
    .order-table td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ccc;
    }

    .order-table th {
        background-color: #f2f2f2;
    }

    .order-table img {
        height: 150px;
        width: 150px;
    }
</style>
<section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('user2/images/bg_1.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-4">
                <h1 class="mb-3 bread">Bookings</h1>
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span>
                    <span>Appointment <i class="ion-ios-arrow-forward"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<!-- ------------------alert------------------------- -->
@if(session()->has('message'))
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">x</button>
{{session()->get('message')}}
</div>
@endif
<!-- -------------------------alert end--------------- -->
<table class="order-table" align="center">

<tr>
    <th></th>
    <th>Name</th>
    <th>Phone</th>
    <th>Address</th>
   
    <th>Date</th>
    <th>Url</th>

    <th>Schedule</th>
    <th>Delete</th>
 

</tr> 
@foreach($data as $p)


<tr>
    
    <td><img src="/uploads/{{$p->image}}" alt="Product image" heigh="150px" width="150px" class="product-image"></td>
    <td>{{$p->name}}</td>
    <td>{{$p->phone}}</td>
    <td>{{$p->address}}</td>
   
    <td>{{$p->date}}</td>
    @if ($p->url == null)
    <td><a href="" class="btn btn-danger">Appoinment time not fixed</a></td>
    @else
    <td><a href="{{ url('videocall_join',['url' => $p->url]) }}" clas="btn btn-success">Join</a></td>
    @endif
    <td><a href="{{url('consultation_schedule', ['bkey' => $p->reg_id])}}"   class="btn btn-info">Schedule Meeting</a></td>
    <td><a href=""   class="btn btn-warning">Refund</a></td>


</tr>

@endforeach

</table>

<br>
<br>
<br>
@include('doctor.footer_2');