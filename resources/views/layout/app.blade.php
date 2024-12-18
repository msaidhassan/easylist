@include('partials._header')
<body class="layout-light side-menu">
    
    <style>
        @media screen and (max-width: 767px) {
    .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate {
         float: right !important; 
        text-align: center;
    }
    
            .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #2da9f7 !important;
    border-color: #2da9f7 !important;
}
    
    .sidebar__menu-group ul.sidebar_nav li.active {
    background-color: transparent !important;
}

    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
    top: 18px !important;
    left: 4px;
    height: 14px;
    width: 14px;
    display: block;
    position: absolute;
    color: white;
    border: 2px solid white;
    border-radius: 14px;
    box-shadow: 0 0 3px #444;
    box-sizing: content-box;
    text-align: center;
    text-indent: 0 !important;
    font-family: 'Courier New', Courier, monospace;
    line-height: 14px;
    content: '+';
    background-color: #31b131;
}


.mobile-author-actions, .mobile-search {
    position: fixed;
    width: 100%;
    height: 60px;
    top: 78px !important;
    /*z-index: 99999 !important;*/
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-transform: translateY(-80px);
    -ms-transform: translateY(-80px);
    transform: translateY(-80px);
    -webkit-transition: .35s;
    -o-transition: .35s;
    transition: .35s;
    -webkit-box-shadow: 0 2px 30px rgba(146, 153, 184, .063);
    box-shadow: 0 2px 30px rgba(146, 153, 184, .063);
    background-color: transparent !important;
     visibility: visible; 
     opacity: 1; 
}



}


table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
    top: 20px !important;
    left: -7px;
    height: 14px;
    width: 14px;
    display: block;
    position: absolute;
    color: white;
    border: 2px solid white;
    border-radius: 14px;
    box-shadow: 0 0 3px #444;
    box-sizing: content-box;
    text-align: center;
    text-indent: 0 !important;
    font-family: 'Courier New', Courier, monospace;
    line-height: 14px;
    content: '+';
    background-color: #31b131;
}


    </style>
    <div class="mobile-search">
        <form action="/" class="search-form">
            <img src="{{ asset('assets/img/svg/search.svg') }}" alt="search" class="svg">
            <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
        </form>
    </div>
    <div class="mobile-author-actions" ></div>
    <header class="header-top">
        @include('partials._top_nav')
    </header>
    <main class="main-content">
        <div class="sidebar-wrapper">
            <aside class="sidebar sidebar-collapse" id="sidebar">
                @include('partials._menu')
            </aside>
        </div>
        <div class="contents">
            @yield('content')
        </div>
        {{-- <footer class="footer-wrapper">
            @include('partials._footer')
        </footer> --}}
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
    <div class="customizer-wrapper">
        @include('partials._customizer')
    </div>

    <script>
        var env = {
            iconLoaderUrl: "{{ asset('assets/js/json/icons.json') }}",
            googleMarkerUrl: "{{ asset('assets/img/markar-icon.png') }}",
            editorIconUrl: "{{ asset('assets/img/ui/icons.svg') }}",
            mapClockIcon: "{{ asset('assets/img/svg/clock-ticket1.sv') }}g"
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
    <script src="{{ asset('assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{asset('assets/js/all.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>

    <script>
      @if(Session::has('message'))
      var type = "{{Session::get('alert-type' , 'info')}}"
      switch (type) {
        case 'info':
        toastr.info( "{{Session::get('message')}}" );
        break;
  
        case 'success':
        toastr.success( "{{Session::get('message')}}" );
        break;
  
        case 'warning':
        toastr.warning( "{{Session::get('message')}}" );
        break;
  
        case 'error':
        toastr.error( "{{Session::get('message')}}" );
        break;
        
      }
              
      @endif
    </script>
    






    
</body>
</html>
