<!--   Core JS Files   -->
<script src="{{ asset("assets/js/jquery-1.10.2.js") }}" type="text/javascript"></script>
<script src="{{ asset("assets/js/bootstrap.min.js") }}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ asset("assets/js/bootstrap-checkbox-radio.js") }}"></script>

<!--  Charts Plugin -->
<script src="{{ asset("assets/js/chartist.min.js") }}" ></script>

<!--  Notifications Plugin    -->
<script src="{{ asset("assets/js/bootstrap-notify.js") }}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="{{ asset("assets/js/paper-dashboard.js") }}"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
{{--<script src="assets/js/demo.js"></script>--}}

{{--<script type="text/javascript">--}}
    {{--$(document).ready(function(){--}}

        {{--demo.initChartist();--}}

        {{--$.notify({--}}
            {{--icon: 'ti-gift',--}}
            {{--message: "You are now logged in ."--}}

        {{--},{--}}
            {{--type: 'success',--}}
            {{--timer: 4000--}}
        {{--});--}}

    {{--});--}}
{{--</script>--}}
<script>
    $('div.alert').not('.alert-important').delay(8000).fadeOut(350);

    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>