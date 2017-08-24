	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://code.jquery.com/jquery.js"></script>-->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>-->

    <!-- <script type="text/javascript" src="{{ URL::asset('https://code.jquery.com/jquery.js') }}"></script> -->

    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    <script src="{{URL::asset('js/custom.js')}}"></script>
    <script src="{{URL::asset('js/fontawesome.js')}}"></script>
    {{-- <script src="{{URL::asset('js/material-kit.js')}}"></script> --}}
    <!-- <script src="https://use.fontawesome.com/62b05711ad.js"></script> -->
    <script src = "{{asset('js/search-questions-resources-ajax.js')}}"></script>

    <!-- The order of the parsley js files must remain like this,
     otherwise the user configuration would be overwritten by default -->
    <script src = "{{asset('js/parsley-config.js')}}"></script>
    <script src = "{{asset('js/parsley.min.js')}}"></script>
{{--     <script src="{{ mix('/js/reactjs.js') }}"></script> --}}