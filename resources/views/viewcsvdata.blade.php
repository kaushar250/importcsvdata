<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" type="text/css" />  
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-12">
                <p class=text-right>
                    <a href="read_excel" class="btn btn-primary">Import Data</a>
                </p>
                <div class="text-danger">
                {{ isset($message) ? $message : "" }}
                </div>
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>SR No</th>
                                <th>course name</th>
                                <th>course info</th>
                                <th>course code</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($course_object as $course)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$course['course_name']}}</td>
                                <td>{{$course['course_info']}}</td>
                                <td>{{$course['course_code']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> 
<script>
        $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>  
</body>
</html>