@if (session('success'))
    <script type="text/javascript">
        alert('{{session('success')}}');
    </script>
@endif