<!-- fraimwork - jquery include -->
<script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
<script src="{{ asset('frontend') }}/js/popper.min.js"></script>
<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>

<!-- carousel - jquery plugins collection -->
<script src="{{ asset('frontend') }}/js/jquery-plugins-collection.js"></script>

<!-- google map  -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6"></script>
<script src="{{ asset('frontend') }}/js/gmaps.min.js"></script> --}}

<!-- toster alert-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<!-- custom - main-js -->
<script src="{{ asset('frontend') }}/js/main.js"></script>
<!-- WISHLISTS JS-->
<script src="{{ asset('backend/assets/js/wishlist.js')}}"></script>

@stack('website-custom-script')
<!-- custom - newslatter-js -->
<script src="{{ asset('frontend') }}/js/app.newsletter.js"></script>
<script src="{{ asset('frontend') }}/js/custom.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6392d30bb0d6371309d36af2/1gjqogpkd';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

<script>
//toster alert script
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

