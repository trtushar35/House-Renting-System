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

        <div class="row mt-3">
            <h2 class="mb-1 text-center">User Information</h2>
            <!-- <div class="col-1"></div> -->
            <div class="col">
                <button id="print" class="btn btn-success mb-3" onclick="printlist()">Print List</button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Role</th>
                            <th scope="col">Address</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key=>$singleUser)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$singleUser->name}}</td>
                            <td>{{$singleUser->email}}</td>
                            <td>0{{$singleUser->phone}}</td>
                            <td>{{$singleUser->role}}</td>
                            <td>{{$singleUser->address}}</td>
                            <td>
                                <img style="border-radius: 60px; height: 80px; width: 80px;" src="{{url('/uploads/'.$singleUser->image)}}" alt="image null">
                            </td>

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