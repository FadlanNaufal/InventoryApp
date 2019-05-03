@if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
      </div>
    @endif

    @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
    @endif

    @if ($message = Session::get('warning'))
      <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('info'))
      <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        Please check the form below for errors
    </div>
    @endif


<!--  -->



<form action="" method="POST" id="delete-form">
        @method('DELETE')
        @csrf
</form> 
<script>
    $(document).ready(function(){
        $('.delete-btn').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            swal({
                title: "Hapus data ?",
                text: "Data yang di hapus tidak dapat di kembalikan!", 
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $('#delete-form').attr('action',href).submit();
              }
            });
        });
    });
</script>
@if(session('message'))
<script>

iziToast.success({
    title: 'Berhasil',
    message: "{{ session('message') }}",
    position : "topRight",
});

</script>
@elseif(session('error'))
<script>

iziToast.error({
    title: 'Error',
    message: "{{ session('error') }}",
    position : "topRight",
});

</script>
@endif

@if($errors->any())
@foreach($errors->all() as $error)
<script>

iziToast.error({
    title: 'Whoops!',
    message: "{{ $error }}",
    position : "topRight",
});

</script>
@endforeach
@endif