@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Choice Options Test'])
    <div id="app403"x>
        <div class="number">403</div>
        <div class="text"><span>Sorry...</span><br>Access Forbidden</div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4" id="question">
        <div class="row">

        </div>
        @include('layouts.footers.auth.footer')
    </div>

<style>
body {
  width: 100%;
  height: 100%;
  margin: 0;
  align-content: center;
  justify-content: center;
}

#app403 {
  /* font-family: "Courgette"; */
  width: 100%;
  text-align: center;
}

.number {
  background: #fff;
  position: relative;
  font: 900 30vmin "Consolas";
  letter-spacing: 5vmin;
  text-shadow: 2px -1px 0 #000, 4px -2px 0 #0a0a0a, 6px -3px 0 #0f0f0f, 8px -4px 0 #141414, 10px -5px 0 #1a1a1a, 12px -6px 0 #1f1f1f, 14px -7px 0 #242424, 16px -8px 0 #292929;
}
.number::before {
  background-color: #673ab7;
  background-image: radial-gradient(closest-side at 50% 50%, #ffc107 100%, rgba(0, 0, 0, 0)), radial-gradient(closest-side at 50% 50%, #e91e63 100%, rgba(0, 0, 0, 0));
  background-repeat: repeat-x;
  background-size: 40vmin 40vmin;
  background-position: -100vmin 20vmin, 100vmin -25vmin;
  width: 100%;
  height: 100%;
  mix-blend-mode: screen;
  -webkit-animation: moving 10s linear infinite both;
          animation: moving 10s linear infinite both;
  display: block;
  position: absolute;
  content: "";
}
@-webkit-keyframes moving {
  to {
    background-position: 100vmin 20vmin, -100vmin -25vmin;
  }
}
@keyframes moving {
  to {
    background-position: 100vmin 20vmin, -100vmin -25vmin;
  }
}

.text {
  /* font-family: "Courgette"; */
  font: 400 5vmin "Courgette";
}
.text span {
  font-size: 10vmin;
}
</style>

@endsection
