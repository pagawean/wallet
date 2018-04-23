@extends('layouts.default')

@section('title','Video')

@section('css')

@endsection

@section('content')
    <!-- banner -->

<div class="Latest-tv-series">
    <!-- <h4 class="latest-text w3_latest_text w3_home_popular">Upload Your Videos</h4> -->
    <div class="container" >
        <br/>
        <br/>
        <br/>
        <div id="dropZone" class="dropzone"></div>
    <br>
		<div id="status"></div>
    </div>
</div>


@endsection

@section('js')

<script src="{{url('dropzone/js/dropzone.js')}}"></script>
<link rel="stylesheet" href="{{url('dropzone/dropzone.css')}}">
<script>
Dropzone.options.dropZone = 
    {
        url: "{{url('user_pages/post_upload')}}",
        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
        params:{
                    
                },
        paramName: "fileVideo", // The name that will be used to transfer the file
        // acceptedFiles:'image/*',
        acceptedFiles:'.mp4',
        dictDefaultMessage:'Klik untuk upload video.<br/>File hanya bisa dalam format <strong>.mp4</strong>.',
        dictInvalidFileType:'Tipe file yang anda upload tidak sesuai',
        // maxFilesize: 5, // MB
        accept: function(file, done) {
            if (file.name == "justinbieber.jpg") {
                done("Naha, you don't.");
            }else{
                done();
            }
        },
        queuecomplete:function(file){
            // document.location.href=document.location;
            // console.log("mantep",file);
            // window.location.href = '{{ url('/') }}/user_pages/'+file+'/process';    
        },
        success:function(file, response) {
            window.location.href = '{{ url('/') }}/user_pages/'+response+'/process';
        }
};
</script>
@endsection

@push('js')
<script>
    $(document).ready(function(){
        var bodyHeight = $(window).innerHeight();
        var footerHeight = $('.footer').height();
        var headerHeight = $('.header').height();
        
        console.log(bodyHeight, footerHeight, headerHeight);

        $('.Latest-tv-series').css('height', (bodyHeight-(footerHeight+headerHeight))+'px');
    })
</script>
@endpush
