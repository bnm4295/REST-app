@extends('layouts.app')
@include('includes.socialshare')
@section('content')
<section class="splash-section">
  <div id="about-media" class="splash-inner-media"></div>
  <div class="splash-inner-content">
    <div class="container">
      <div class="container page-container">
        <div class="splash-title">
          <p style="text-align: center; font-size: 50px; color: white">About Suuty</p>
          <p style="text-align: center; font-size: 25px; color: white">Welcome to the New Home of Real Estate</p>
        </div>
      </div>
      <div class="row">
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 container-contentbar">
    <div class="page-wrap">
      <div class="row row-fluid">
        <div class="col-sm-12">
          <h1>About Suuty</h1>
          <hr>
          <h4 style="text-align:center">
            <b>We believe everyone should be able to buy and sell their home themselves, directly and transparently, without paying tens of thousands of dollars in realtors’ fees.</b>
          </h4>
          <p>  Suuty is a transparent marketplace that connects homeowners with buyers.
            This allows buyers and sellers to interact directly with each other, eliminating traditional commissions in the process.
            We are driven by the vision to facilitate a fair deal for all.
          </p>
          <p>
            Founded in Vancouver, BC by technology entrepreneur Marilouise Muller, Suuty is an online real estate marketplace platform that connects home sellers
            with home buyers and allows them to connect, message, negotiate, buy, sell and transfer legal documents directly.
          </p>
          <p>
            Transparency is key to Suuty’s bidding process. When an offer is made on a property, the amount is visible to other potential buyers, who can then make,
             not make or adjust their own offer amounts. Suuty protects each potential buyers’ identity and information—only the seller can see who has made the offers.
              Only the offer amount in dollars is visible to other potential buyers.
          </p>
          <p>
            Suuty’s proprietary and secure document transfer protocol creates and fills in the documents that allows potential buyers to make legal offers to sellers through Suuty, and for sellers to legally accept these offers on Suuty.
            When an offer is accepted, the buyer and seller then take the papers to a Notary Public to complete the paperwork for the transaction.
          </p>
          <p>
            At Suuty, we a driven by our vision to create a fair, transparent, and reasonably-priced real estate market for all.
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
          <span style="font-size: 30px;" class="fas fa-dollar-sign"></span>
        	<div>
            <p style="text-align: left;"><b>How does selling my home on Suuty work?&nbsp;</b></p>
            <p>At Suuty, we put the control back in your hands.</p>
            <p>Once you have registered an account with Suuty, you can create your listing. You will have the ability to set open house showings based on your schedule and availability,
               update your listing whenever you want, and set an offer submission deadline suitable for your timeline. Suuty finalizes a legally binding
                transaction and transfer of ownership quickly, fairly and transparently.</p>
            <p>Give your home the exposure it deserves with Suuty’s marketing machine and save thousands of dollars worth of commissions with our $990 flat fee,
               which will only be collected if you receive and accept an offer you are happy with.</p>
        	</div>
      </div>
       <div class="col-sm-6">
          <span style="font-size: 30px" class="fa fa-home"></span>
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
     <div class="marginfix" style="text-align: center;">
       <button class="btn btn-primary btn-lg" style="border-radius: 5px" onclick="window.location.href='{{ URL::to('properties') }}'">Find Your Home</button>
       <button class="btn btn-primary btn-lg" style="border-radius: 5px" onclick="window.location.href='{{ URL::to('properties/create') }}'">List Your Home</button>
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
           <h4><img src="/images/HFHGV-Vertical-Colour.jpg" alt="" width="166" height="192"></h4>
           <h4 style="text-align: center;">Have more questions? Visit our <a href="/questions">FAQs </a>page.</h4>
          </div>
       </div>
    </div>
    <hr style="border-top: 1px solid black">
 </div>
 <div class="col-md-4 col-sm-12 col-xs-12" style="float:right; margin-top: 22px;">
    <div class="row">
      <div style="text-align:center; background-color:white">
        <div style="display: inline-block">
          @include('includes.commcalc')
        </div>
      </div>
    </div>
 </div>
</div>

@endsection

@section('footer')
@include('includes.footer')
@endsection
