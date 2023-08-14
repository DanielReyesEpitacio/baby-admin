@if (session('error'))
    <script type="text/javascript">
        alert({{session('error')}});
    </script>
@endif