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
                {{ FORM::open(['url'=>'/auth/','method'=>'post']) }}
                <div class="col-md-12">
                    <div class="form-group {{ $errors->has('email') ? 'has-error': '' }}">
                        <label class="control-label">Email Address</label>
                        {{ FORM::text('email','',['class'=>'form-control','placeholder'=>'Enter the email address']) }}
                        @if($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group {{ $errors->has('password') ? 'has-error': '' }}">
                        <label class="control-label">Password</label>
                        {{ FORM::password('password',['class'=>'form-control','placeholder'=>'Enter the password']) }}
                         @if($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary">LOGIN</button>
                    </div>
                </div>
                @if($errors->has('invalid'))
                <div class="col-md-12">
                    <div class="form-group has-error">
                       <span class="help-block text-center">{{ $errors->first('invalid') }}</span>
                    </div>
                </div>
                @endif
                {{ FORM::close() }}
            </div>
        </div>
    </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      {{ HTML::script('sadmin/plugins/bootstrap/js/bootstrap.min.js') }}
</body>
</html>
