@extends('layouts.master')
@section('tambahanCSS')

<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection



@push('lwStyles')
@livewireStyles
@endpush

@push('lwScripts')
@livewireScripts
@endpush

@section('konten')
@livewire('penjualan')
@endsection

@section('tambahanJS')


<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endsection

@section('tambahScript')
<script>
    @if($message = Session::get('success'))
    toastr.success("{{ $message}}");
    @elseif($message = Session::get('updated'))
    toastr.warning("{{ $message}}");
    @elseif($message = Session::get('deleted'))
    toastr.error("{{ $message}}");
    @endif
</script>
@endsection