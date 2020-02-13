@extends('layouts.admin')

@section('title','Messages')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="jumbotron">
                {{ $message->message }}
            </div>
        </div>

        <div class="col-md-6">
             @if($sent_messages == 0)
                 <a href="#" onclick="runPlainRequest('{{ url("provider/messages/message/".$message->id) }}')" class="btn btn-outline-info">Send Message to All Contacts</a>

                 @else

                 <ul style="list-style-type: disc">
                     @foreach($contacts as $contact)
                         <li>{{ $contact->name }}</li>
                         @endforeach
                 </ul>

                 @endif
        </div>
    </div>
@endsection
