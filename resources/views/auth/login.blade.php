<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>IslandOfLoves</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
        <link rel="icon" type="image/png" href="{{url('images/apple-touch-icon.png')}}" />
        <link rel="apple-touch-icon" href="{{url('images/apple-touch-icon.png')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!-- <link rel="stylesheet" href="{{url('./css/styleLogin.css')}}"> -->
<link rel="stylesheet" href="{{url('./css/register_style.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="log-form">
  <h2>{{trans('application.login.title')}}</h2>
  <form id="msform" method="POST" action="{{ route('login', app()->getLocale()) }}">
    @csrf
    <div class="groupmsform">
        <fieldset>           
            <div class="form-group row">
                <div class="col-md-6">
                    <input id="email" placeholder="{{ __('E-Mail Address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn action-button">{{ trans('application.login.connecte') }}</button>
            <br>
            <a style = "float: left" class="forgot" href="{{ route('password.request', app()->getLocale()) }}">{{ trans('application.login.forgot') }}</a>
            <a style = "float: right" class="forgot" href="{{ route('register', app()->getLocale()) }}">{{ trans('application.login.noaccount') }}</a>
        
        </fieldset>
    </div>
<center>	
    <table>
    	<tr>
    		<td colspan="2">
    			<h1 style="text-align: center;">Paiement</h1>
    			<br>
    		</td>
    	</tr>
        <tr>
            <td>
                <img src="{{ url('/images/iolmois.png/' )}}" style="width: 400px">
            </td>
            <td>
                <img src="{{ url('/images/iolan.png/' )}}" style="width: 400px">
            </td>
        </tr>
    </table>
</center>
    
  </form>
</div><!--end log form -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
