

function flash() {
    document.getElementById("message").style.animationDuration = "2s";
    document.getElementById("message").style.display = "none";
}
setTimeout(flash, 6400);

// <script>

//     @if(count($errors) > 0)
//         @foreach($errors->all() as $error)
//             toastr.error(" {{ $error }}", "Task failed!");
//         @endforeach
//     @endif

//     @if(Session::has('success'))
//         toastr.success(" {{ Session::get('success') }}", "Success Here!");
//     @endif
//     @if(Session::has('info'))
//         toastr.info(" {{ Session::get('info') }}", "Information Here!");
//     @endif
//     @if(Session::has('error'))
//         toastr.error(" {{ Session::get('error') }}", "Task failed!");
//     @endif

// </script>
