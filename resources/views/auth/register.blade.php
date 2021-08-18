@extends('layouts.app')

@section('content')
<registre-component csrf_token="{{ @csrf_token() }}"></registre-component>
@endsection
