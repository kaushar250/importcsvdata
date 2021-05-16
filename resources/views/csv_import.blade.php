<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Import File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-6 offset-3 my-auto">
            <div class="card shadow">
            <div class="card-header">
                <h2>CSV IMPORT </h2>
            </div>
            <div class="card-body">
            <div class="text-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            <form action="read_excel" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="upload_csv">upload csv File</label>
                    <input type="file" name="csv_import" id="csv_import" class="form-control-file" type="file" required /><br>
            </div>
            <div class="form-group text-right">
                 <input class="btn btn-primary" type="submit" value="submit" /> 
            </div>
            <div class="form-group text-info text-center">
                            {{ isset($message) ? $message : "" }}
            </div>
            </form>
            </div>
            </div>
            </div> <!-- end of column -->
          
        </div> <!-- end of row -->
    </div> <!-- end of container -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>