@if(session('msg'))
    @section('js')
            <script>
                //Notify
                $.notify({
                    icon: 'flaticon-alarm-1',
                    message: '{{session('msg')}}',
                },{
                    type: 'info',
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    time: 1000,
                });
            </script>
    @endsection
@endif
@if(session('err'))
@section('js')
    <script>
        //Notify
        $.notify({
            icon: 'flaticon-alarm-1',
            message: '{{session('err')}}',
        },{
            type: 'danger',
            placement: {
                from: "top",
                align: "right"
            },
            time: 1000,
        });
    </script>
@endsection
@endif
@if(count($errors) > 0)
    @section('js')
        @foreach($errors->all() as $error)
        <script>
            //Notify
            $.notify({
                icon: 'flaticon-alarm-1',
                message: '{{$error}}',
            },{
                type: 'danger',
                newest_on_top: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                time: 1000,
            });
        </script>
        @endforeach
    @endsection

@endif
