<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <body>
      {!! $text !!}
      <br>
      <div class="footer-bottom">
        <h3>Suuty Technologies - All rights reserved </h3>
        <div>
          <div>
            <h4>
              <p>
                <h3>Follow us</h3>
                <a href="http://facebook.com/realsuuty">
                  <img src="{{$message->embed(public_path() . '/images/if_square-facebook_317727.png')}}" alt="logo" style="display: inline-block;">
                </a>
                <a href="https://twitter.com/realsuuty">
                  <img src="{{$message->embed(public_path() . '/images/if_4_939755.png')}}" alt="logo" style="display: inline-block;">
                </a>
                <a href="https://www.linkedin.com/company-beta/18123110/">
                  <img src="{{$message->embed(public_path() . '/images/if_linkedin_386655.png')}}" alt="logo" style="display: inline-block;">
                </a>
                <a href="https://instagram.com/realsuuty">
                  <img src="{{$message->embed(public_path() . '/images/if_25_social_2609558.png')}}" alt="logo" style="display: inline-block;">
                </a>
              </p>
            </h4>
          </div>
        </div>
        <div style="display:inline-block;">
          <a href="https://www.suuty.com">
            <img src="{{$message->embed(public_path() . '/images/Teal-Large.png')}}" alt="logo">
          </a>
        </div>
        <div style="display:inline-block; vertical-align: 44px;">
          <div>1250 - 789 West Pender Street</div>
          <div>604-346-5185</div>
          <div><a href="mailto:connect@suuty.com">connect@suuty.com</a></div>
        </div>
      </div>
  </body>
</html>
