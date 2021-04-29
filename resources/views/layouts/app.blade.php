{{-- ,['breadcumb'=>['icon'=>"",'title'=>"",'desc'=>"",'create'=>""],'sidebar'=>""] --}}
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        Detergent Laundry - {{ preg_replace('/\s+/', ' ', ucfirst($breadcumb['title'] ?? '')) }}
    </title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <script language='JavaScript'>
        txt = "Detergent Laundry - {{ preg_replace('/\s+/', ' ', $breadcumb['title'] ?? '')}} | ";
        var speed = 300;
        var refresh = null;
        function action() {
            document.title = txt;
            txt = txt.substring(1, txt.length) + txt.charAt(0);
            refresh = setTimeout("action()", speed);
        }
        action();
    </script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"> --}}
    <link href="{{ asset('architect-ui/main.css') }}" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        {{-- navbar --}}
        @include('layouts/navbar',['search'=>($search?? '')])
        {{-- Seting Theme --}}
        @include('layouts/setting')

        <div class="app-main">
            {{-- Side bar --}}
            @include('layouts/sidebar',['sidebar'=>($sidebar ?? '')])
            {{-- Main --}}
            <div class="app-main__outer">
                <div class="app-main__inner">
                    {{-- Badges --}}
                    @empty($breadcumb)
                    @else
                    @include('layouts/breadcumb',['breadcumb'=>($breadcumb ?? '') ])
                    @endempty
                    {{-- content --}}
                    @yield('content')
                    {{-- finish content --}}
                </div>
                {{-- footer --}}
                @include('layouts/footer')
                {{-- finush footer --}}
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('js/chart/Chart.js')}}"></script>
    <script type="text/javascript" src="{{ asset('architect-ui/assets/scripts/main.js')}}"></script>
         @yield('script')
    {{-- @include('layouts.script') --}}
</body>

</html>
