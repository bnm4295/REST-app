@extends('layouts.app')

@section('content')
<section class="splash-section">
  <div class="splash-inner-media"></div>
  <div class="splash-inner-content">
    <div class="container">
      <div id="home-container" class="container">
        <div class="splash-title">
          <p style="text-align: center; font-size: 50px; color: white">About Suuty</p>
          <p style="text-align: center; font-size: 25px; color: white">Welcome to the New Home of Real Estate</p>
        </div>
      </div>
      <div class="row" style="height: 500px">
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
    <div class="page-wrap">
      <div class="row row-fluid">
        <div class="col-sm-12">
          <h1>About Suuty</h1>
          <hr>
          <h3 style="font-size: 20px; text-align:center;">
            We believe that everyone should have the support to sell their own home.
          </h3>
          <p>  Suuty is a transparent marketplace that connects homeowners with buyers.
            This allows buyers and sellers to interact directly with each other, eliminating traditional commissions in the process.
            We are driven by the vision to facilitate a fair deal for all.
          </p>
        </div>
      </div>
    </div>
    <hr>
    <div class="row row-fluid">
      <div class="col-sm-12">
        <h3 style="text-align: center;">No more commissions. Just one flat fee of $990 for home owners when you close the deal.</h3>
        <p style="text-align: center">Suuty was built to simplify the home transaction process and empower you with the tools to buy or sell your next home.</p>
      </div>
    </div>
    <div class="row row-fluid">
      <div class="col-sm-6">
            <span class="fa fa-usd"></span>
          	<div>
          		<div>
              <p style="text-align: left;"><b>How does selling my home on Suuty work?&nbsp;</b></p>
              <p>At Suuty, we put the control back in your hands.</p>
              <p>Once you have registered an account with Suuty, you can create your listing. You will have the ability to set open house showings based on your schedule and availability, update your listing whenever you want, and set an offer submission deadline suitable for your timeline. Suuty finalizes a legally binding transaction and transfer of ownership quickly, fairly and transparently.</p>
              <p>Give your home the exposure it deserves with Suuty’s marketing machine and save thousands of dollars worth of commissions with our $990 flat fee, which will only be collected if you receive and accept an offer you are happy with.</p>
          		</div>
          	</div>
      </div>
       <div class="col-sm-6">
          <span class="fa fa-home"></span>
        	<div>
        		<div>
              <p><b>How does buying my next home on Suuty work?&nbsp;</b></p>
              <p>Finding your dream home is about to get easier, and a lot more fun.</p>
              <p>Use Suuty’s comprehensive custom search filters to help you find your next home. When new listings match your search criteria, you’ll be notified. Visit Open Houses or schedule a tour to check out your dream home. When you submit an offer through Suuty, you will also be able to see the other offers on the table and update your offer until the offer submission deadline. Suuty ensures that you will be informed every step of the way. There’s also no cost for home buyers to use the Suuty platform.</p>
              <p>We believe in transparency and shutting the door on backroom deals. Suuty; it’s suitable for both of you.</p>
        		</div>
          </div>
       </div>
     </div>
     <hr>
     <div class="row row-fluid">
       <div class="col-sm-12">
         <div>
  			      <h1 class="p1" style="margin-bottom: 5px; text-align: center;">Our Commitment to Affordable Housing</h1>
            <p style="text-align: center;">Affordable housing is an important issue to Suuty and we recognize that it is also an issue that is more relevant than ever to Canada and to Canadians. That’s why we are pledging to donate 25% of our proceeds from each transaction to Habitat for Humanity. Join us in support of housing for all.</p>
  		   </div>
       </div>
       <div class="col-sm-12">
         <div style="text-align: center;" >
           <h4><img src="https://www.suuty.com/wp-content/myimage/2016/03/HFHGV-Vertical-Colour.jpg" alt="" width="166" height="192"></h4>
           <h4 style="text-align: center;">Have more questions? Visit our <a href="/">FAQs </a>page.</h4>
          </div>
       </div>
    </div>
    <hr style="border-top: 1px solid black">
 </div>
</div>

@endsection

@section('footer')
@include('includes.footer')
@endsection
