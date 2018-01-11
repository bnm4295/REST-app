@extends('layouts.app')

@section('content')
<?php
$recipients = $thread->participantsUserIds();
foreach ($recipients as $recipient) {
    if($recipient == Auth::id()){
      ?>
      <div class="col-md-6">
          <h1>{{ $thread->subject }}</h1>
          <div id="thread_{{ $thread->id }}">
              @each('messenger.partials.messages', $thread->messages, 'message')
          </div>

          @include('messenger.partials.form-message')
      </div>
<?php
    }

}
?>
@stop
