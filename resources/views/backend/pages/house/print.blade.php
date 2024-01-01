<!DOCTYPE html>
<html lang="en">

<head>
    @notifyCss

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>House Renting System</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <link href="{{url('backend/')}}/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>

<style>
    @media print {
        #print {
            display: none;
        }
    }
</style>

<body>
    <div class="container">

        <div style="font-size: 13px;" class="row mt-3 ">
            <h2 class="mb-1 text-center">House List</h2>
            <!-- <div class="col-1"></div> -->
            <div class="col ">
                <button id="print" class="btn btn-success mb-3" onclick="printlist()">Print List</button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">House Name</th>
                            <th scope="col">House Owner Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Division</th>
                            <th scope="col">District</th>
                            <th scope="col">Thana/Area</th>
                            <th scope="col">Floor Number</th>
                            <th scope="col">Flat Number</th>
                            <th scope="col">Total Bedroom</th>
                            <th scope="col">Total Bathroom</th>
                            <th scope="col">Rent Amount</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Available Date</th>
                            <th scope="col">Summary</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>

                    @foreach($houses as $key=>$house)

                    <tbody>
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$house->house_name}}</td>
                            <td>{{$house->house_owner_name}}</td>
                            <td>{{$house->house_address}}</td>
                            <td>{{$house->division}}</td>
                            <td>{{$house->district}}</td>
                            <td>{{$house->thana}}</td>
                            <td>{{$house->floor_number}}</td>
                            <td>{{$house->flat_number}}</td>
                            <td>{{$house->total_bedroom}}</td>
                            <td>{{$house->total_bathroom}}</td>
                            <td>{{$house->rent_amount}}</td>
                            <td>{{$house->category}}</td>
                            <td>{{$house->available_date}}</td>
                            <td>{{$house->summary}}</td>
                            <td>
                                <img width="100%" src="{{url('/uploads/'. $house->image)}}" alt="image">
                            </td>
                            <td>{{$house->status}}</td>
                        </tr>

                        @endforeach

                        <script>
                            function printlist() {
                                window.print();
                            }
                        </script>
                    </tbody>
                </table>
            </div>
            <!-- <div class="col-1"></div> -->
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{url('backend/')}}/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{url('backend/')}}/assets/demo/chart-area-demo.js"></script>
    <script src="{{url('backend/')}}/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{url('backend/')}}/js/datatables-simple-demo.js"></script>

    @notifyJs
</body>

</html>