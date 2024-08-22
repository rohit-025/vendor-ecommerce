@extends('layouts.front.app')
@section('content')
@if(session()->has('success'))
<script>
swal({
  title: "Thank You!",
  text: "Your order is placed successfully",
  icon: "success",
});
</script>
@endif
@livewire('checkout')

@endsection