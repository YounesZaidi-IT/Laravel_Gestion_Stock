<!DOCTYPE html>
<html lang="en" >
  <!-- begin::Head -->
  <head>
    <meta charset="utf-8"/>
    <title>Error 404
    </title>
    <meta name="description" content=""> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js">
    </script>
    <script>
      WebFont.load({
        google: {
          "families":["Poppins:300,400,500,600,700"]}
        ,
        active: function() {
          sessionStorage.fonts = true;
        }
      }
                  );
    </script>
    <!--end::Fonts -->
    <style>
      .kt-error-v2 {
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      .kt-error-v2 .kt-error_container .kt-error_title2 > h1 {
        font-size: 6rem;
        text-align: center;
        margin-top: 45rem;
        font-weight: 500;
      }
      .kt-error-v2 .kt-error_container .kt-error_desc {
        font-size: 2.5rem;
        text-align: center;
        display: block;
        font-weight: 700;
      }
      @media (max-width: 768px) {
        .kt-error-v2 .kt-error_container .kt-error_desc {
          padding-left: 0.6rem;
          padding-right: 0.6rem;
        }
      }
    </style>
    <!--begin::Page Custom Styles(used by this page) --> 
    <!--end::Page Custom Styles -->
    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('Template\layoutsStyle\css\vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Template\layoutsStyle\css\style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->
    <!--begin::Layout Skins(used by all pages) -->
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{ asset('Template\images\favicon.ico')}}" />
  </head>
  <!-- end::Head -->
  <!-- begin::Body -->
  <body  style="background-image: url('{{ asset('Template\images\header.jpg')}}'; background-position: center top; background-size: 100% 350px;"  class="kt-page--loading-enabled kt-page--loading kt-page--fixed kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading"  >
    <!-- begin::Page loader -->
    <!-- end::Page Loader -->        
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
      <div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v2" 
	  style="background-image: url('{{ asset('Template/images/bg2.jpg')}}');">
        <div class="kt-error_container">
          <span class="kt-error_title2 kt-font-light">
            <h1>OOPS!
            </h1>		 
          </span> 	
          <span class="kt-error_desc kt-font-light">
            Something went wrong here
          </span>		 
        </div>	 
      </div>
    </div>
    <!-- end:: Page -->
    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
      var KTAppOptions = {
        "colors":{
          "state":{
            "brand":"#366cf3","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"}
          ,"base":{
            "label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}
        }
      };
    </script>
    <!-- end::Global Config -->
    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ asset('Template\js\vendors.bundle.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('Template\js\scripts.bundle.js') }}" type="text/javascript">
    </script>
    <!--end::Global Theme Bundle -->
  </body>
  <!-- end::Body -->
</html>
