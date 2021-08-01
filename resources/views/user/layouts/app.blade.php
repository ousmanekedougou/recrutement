<!DOCTYPE html>
<html lang="en zxx" class="no-js">

<head>
@include('user/layouts/head')
  @section('headsection')
  @show
</head>
<body>

 @include('user/layouts/header')

 @section('main-content')
 
 @show

	{{--
  @include('user/layouts/footer')
--}}
@section('footersection')
@show
</body>

</html>
