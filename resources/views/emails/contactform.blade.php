<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <body>
      <b>Someone has sent you a contact form</b>
      {!! $text !!}
      <img src="{{$message->embed(public_path() . '/images/logo.png')}}" alt="logo" width="40px" height="40px" style="display: inline-block;">
      <a href="https://www.suuty.com">Back to Suuty</a>
  </body>
</html>
