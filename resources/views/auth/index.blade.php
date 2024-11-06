<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body style="background: blue">
    
    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5 mb-5">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <button type="submit" class=" btn btn-md btn-primary text-center" >Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>