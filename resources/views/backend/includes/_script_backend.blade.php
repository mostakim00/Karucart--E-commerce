<script src="{{asset('backend/assets/lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/assets/lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<script src="{{asset('backend/assets/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/assets/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('backend/assets/lib/moment/min/moment.min.js')}}"></script>
<script src="{{asset('backend/assets/lib/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('backend/assets/lib/rickshaw/vendor/d3.min.js')}}"></script>
<script src="{{asset('backend/assets/lib/rickshaw/vendor/d3.layout.min.js')}}"></script>
<script src="{{asset('backend/assets/lib/rickshaw/rickshaw.min.js')}}"></script>
<script src="{{asset('backend/assets/lib/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('backend/assets/lib/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('backend/assets/lib/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('backend/assets/lib/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('backend/assets/lib/echarts/echarts.min.js')}}"></script>
<script src="{{asset('backend/assets/lib/select2/js/select2.full.min.js')}}"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>
<script src="{{asset('backend/assets/lib/gmaps/gmaps.min.js')}}"></script>
{{-- DataTable --}}
<script src="{{ asset('backend/assets/lib/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script>

<script src="{{asset('backend/assets/js/bracket.js')}}"></script>
<script src="{{asset('backend/assets/js/map.shiftworker.js')}}"></script>
<script src="{{asset('backend/assets/js/ResizeSensor.js')}}"></script>
<script src="{{asset('backend/assets/js/dashboard.js')}}"></script>
<!-- category ajax code link -->
<script src="{{asset('backend/assets/js/app.category.js')}}"></script>

<!-- Subcategory ajax code link -->
<script src="{{asset('backend/assets/js/app.subcategory.js')}}"></script>

<!-- for Lightbox -->
<script src="{{asset('backend/assets/js/lightbox.min.js')}}"></script>

<!-- for Slider ajax -->
<script src="{{asset('backend/assets/js/custom.js')}}"></script>


<!-- SUMMERONNOTE -->

<script src="{{asset('backend/assets/lib/summernote/summernote-bs4.min.js')}}"></script>
<script>
      $('#summernote').summernote({
        placeholder: 'PRODUCT LONG DESCRIPTION......',
        tabsize: 10,
        height: 100,
      });
</script>

<!-- SWEET ALERT -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('backend/assets/js/code.js')}}"></script>
<!-- SEARCH OR CUSTOM ETC-->
<script src="{{asset('backend/assets/js/search_image_preview.js')}}"></script>

<!-- TOASTER -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif
  
  @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('success') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>



