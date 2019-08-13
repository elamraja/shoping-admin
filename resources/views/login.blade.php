<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SVI - Authentication</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />
    {{ HTML::style('sadmin/plugins/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('sadmin/css/main.css') }}
</head>
<body>
    <div class="login_cover">
        <div class="login_box">
            <h2>SVI ADMIN PANEL</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Email Address</label>
                        <input type="text" class="form-control" placeholder="Enter the email address">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="text" class="form-control" placeholder="Enter the email address">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary">LOGIN</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      {{ HTML::script('sadmin/plugins/bootstrap/js/bootstrap.min.js') }}
</body>
</html>
