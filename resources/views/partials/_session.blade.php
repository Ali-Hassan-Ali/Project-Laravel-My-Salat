@if (session('success'))

    <script>
        // new Noty({
        //     type: 'success',
        //     layout: 'topRight',
        //     text: "{{ session('success') }}",
        //     timeout: 2000,
        //     killer: true
        // }).show();

        // $('.top-center').click(function() {
                
            Snackbar.show({
                text: "{{ session('success') }}",
                pos: 'top-center'
            });
        // });
    </script>

@endif
