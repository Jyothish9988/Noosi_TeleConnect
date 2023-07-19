<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add your custom styles here */
        .alert {
            background-color: #f2f2f2;
            padding: 10px;
            margin-bottom: 20px;
        }

        .product-image {
            max-height: 150px;
            max-width: 150px;
        }

        .search-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .search-container input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .search-container button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .excel-button {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .table-container {
            overflow-x: auto;
        }
    </style>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("dataTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                var matchFound = false;
                var tdArr = tr[i].getElementsByTagName("td");

                for (var j = 0; j < tdArr.length; j++) {
                    td = tdArr[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;

                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            matchFound = true;
                            break;
                        }
                    }
                }

                if (matchFound) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        function exportToExcel() {
            var wb = XLSX.utils.table_to_book(document.getElementById("dataTable"), { sheet: "Sheet JS" });
            XLSX.writeFile(wb, "data.xlsx");
        }
    </script>
</head>
<body>
    @include('user.header_2')

    <br><br><br><br><br><br>

    <!-- ------------------alert------------------------- -->
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
        </div>
    @endif
    <!-- -------------------------alert end--------------- -->

    <div class="search-container">
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search by name, reg_id, dob, or created_at">
        <button onclick="exportToExcel()" class="excel-button">Export to Excel</button>
    </div>

    <div class="table-container">
        <table class="table table-striped" id="dataTable">
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
                    <td>{{ $a->reg_id }}</td>
                    <td><img src="/uploads/{{ $a->image }}" alt="Product image" height="150px" width="150px" class="product-image"></td>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->age }}</td>
                    <td>{{ $a->dob }}</td>
                    <td>{{ $a->gender }}</td>
                    <td>{{ $a->blood }}</td>
                    <td>{{ $a->address }}</td>
                    <td>{{ $a->pin }}</td>
                    <td>{{ $a->phone }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->hid }}</td>
                
                        @if($a->status == 0)
                           <td> <a href="{{ url('patient_booking', $a->reg_id) }}" class="btn btn-success">Book Now</a> </td>
                        @elseif($a->status == 1)
                           <td> <span class="status-booked">Booked</span> </td>
                        @else
                    
                       <td> <span class="status-booked">Appointed</span> </td>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('user.footer_2')
</body>
</html>
