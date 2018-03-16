@extends('layouts.app')


@section('content')

<div class="container panel-collapse">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-contentbar">
    <h2><b>General Questions</b></h2>
    <hr>
    <div class="alert alert-info">
      <i style="font-size: 20px;"class="fa fa-info-circle" aria-hidden="true"></i>
      <h4><b>The Suuty Support Team is available to answer your questions from 8:30 A.M to 4:30 P.M
         PST at 604-346-5185, or email us at
         <a href="mailto:connect@suuty.com">connect@suuty.com</a>, or send an immediate message for live chat.</b>
      </h4>
    </div>
    <div class="panel-group" id="accordion">
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq1">
          <div class="panel-heading">
            <div class="panel-title">
                <h4>What is Suuty?</h4>
            </div>
          </div>
        </a>
        <div id="faq1" class="panel-collapse collapse in">
          <div class="panel-body">
            <p>
              Suuty is a online real estate marketplace platform that connects home sellers
               with home buyers and allows you to connect, message, negotiate, buy, show, and sell your home directly, with no realtor’s fees.
            </p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq2">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>What does it cost to sell a home on Suuty?</h4>
            </div>
          </div>
        </a>
        <div id="faq2" class="panel-collapse collapse">
          <div class="panel-body">
            <p>
              Suuty saves you tens of thousands of dollars in realtors fees by charging a flat fee of $990
              to the seller when an offer for purchase is accepted. We donate a portion of every transaction to Habitat For Humanity.
            </p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq3">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>What does it cost to buy a home on Suuty?</h4>
            </div>
          </div>
        </a>
        <div id="faq3" class="panel-collapse collapse">
          <div class="panel-body">
            <p>Nothing! Our flat fee of $990 is paid by the seller.</p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq4">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>How do I list my home on Suuty?</h4>
            </div>
          </div>
        </a>
        <div id="faq4" class="panel-collapse collapse">
          <div class="panel-body">
            <p>Simply go to our List Your Home page <a href="/propertes/create">HERE</a> to sign up and list your home. It’s an easy, one-step process.</p>
           </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq5">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>Can I change my listing or profile information?</h4>
            </div>
          </div>
        </a>
        <div id="faq5" class="panel-collapse collapse">
          <div class="panel-body">
            <p>Yes. Once you have signed up, simply Login and go to My Profile or My Listings to change your information any time. </p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq6">
        <div class="panel-heading">
            <div class="panel-title">
              <h4>Why do I need to sign a non-disclosure agreement to list my home on Suuty?</h4>
            </div>
          </div>
        </a>
        <div id="faq6" class="panel-collapse collapse">
          <div class="panel-body">
            <p>The property disclosure statement is designed, in part, to protect the seller by establishing that all relevant information
               concerning the premise has been provided to the buyer.</p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq7">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>How do I buy a home on Suuty?</h4>
          </div>
        </div>
        </a>
        <div id="faq7" class="panel-collapse collapse">
          <div class="panel-body">
            <p>Browse our listings any time. If you sign up <a href="/register">HERE</a> with Suuty with your email and name,
              you can save your property searches, add properties to your favourites list, and make offers to purchase.
            </p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq8">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>Is it legal to buy or sell a home without a realtor?</h4>
          </div>
        </div>
        </a>
        <div id="faq8" class="panel-collapse collapse">
          <div class="panel-body">
            <p>Yes! For Sale By Owner has always existed, but it has never been easy to do, until Suuty!</p>
            <p>As a seller listing your home on Suuty, you can market your home easily, schedule open houses and private showings to suit your schedule,
              deal directly with buyers, and save tens of thousands of dollars in realtor fees. And it’s free. We only charge you our flat fee of $990
              when you accept an offer for purchase.
            </p>
            <p>As a buyer, you can find and view homes when you want (no more waiting for a realtor). And Suuty’s transparent bidding process lets you view all offers,
               so you can make an offer that’s right for you, knowing exactly what everyone else’s offer is.
            </p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq9">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>How does the offer process work?</h4>
          </div>
        </div>
        </a>
        <div id="faq9" class="panel-collapse collapse">
          <div class="panel-body">
            <p>
            Transparency is key to Suuty’s bidding process. Sellers list their asking price, and a timeframe in which they will accept offers. Prospective buyers
             then enter their offer price, including whatever subject clauses they choose. All offer amounts and subjects are visible to prospective buyers,
              so you can make the right offer for you. (All prospective buyer identities are hidden, except to the seller.)
            </p>
            <p>At the end of the timeframe, sellers can accept the offer of their choice, and begin any negotiations or discussions with the prospective buyer who made the offer.
            </p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq10">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>Who handles the legal documents?</h4>
          </div>
        </div>
        </a>
        <div id="faq10" class="panel-collapse collapse">
          <div class="panel-body">
            <p>
              Suuty’s proprietary and secure document transfer protocol creates and fills in the legal documents (the offer to purchase and property disclosure documents)
               that allow buyers to make legal offers to sellers through Suuty, and for sellers to legally accept these offers on Suuty.
                When an offer is accepted, the buyer and seller print the documents, then take the papers to a Notary Public to complete the paperwork for the transaction.
            </p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq11">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>Does Suuty handle the transfer of money between the buyer and the seller? How does that process work?</h4>
          </div>
        </div>
        </a>
        <div id="faq11" class="panel-collapse collapse">
          <div class="panel-body">
            <p>
              With Suuty, the seller makes a deposit with their notary or lawyer after their offer is accepted by the seller.
               That deposit is then held in a trust account for the benefit of the transaction.
            </p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq12">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>What happens if I make an offer and change my mind? Can I withdraw my offer?</h4>
          </div>
        </div>
        </a>
        <div id="faq12" class="panel-collapse collapse">
          <div class="panel-body">
            <p>
              Yes, you can under certain circumstances.
            </p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq13">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>Will I receive a better deal buying or selling a home on Suuty than if I use a realtor?</h4>
          </div>
        </div>
        </a>
        <div id="faq13" class="panel-collapse collapse">
          <div class="panel-body">
            <p>
              When you sell your home through a real estate agent,
              you are responsible for paying realtor’s fees to both your agent and the agent representing the buyer.
               You can save this money by listing and selling the house on your own. Suuty’s powerful platform that offers everything a realtor does,
                while saving you tens of thousands of dollars in realtor fees.
            </p>
            <p>When you buy your home through Suuty, you get to see all other offer amounts,
              something you do not get to see when you are working with a realtor and a property has multiple offers on it.
              Suuty makes the process fair and transparent, allowing you to make the offer that is right for you—so you are not blindly making offers, or offers
               above what you would like to pay, or potentially losing out on a home you want because your offer was too low.</p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq14">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>How do I market my home?</h4>
          </div>
        </div>
        </a>
        <div id="faq14" class="panel-collapse collapse">
          <div class="panel-body">
            <p>
              90% of buyers prefer look for their new home online. Suuty’s full-feature platform has the gorgeous listings and search filters
               prospective buyers want. Buyers can receive notifications for listings that match what they are looking for.
               And sellers can schedule both open houses and private showings on a schedule that suits you.
            </p>
            <p>Suuty’s fully-integrated social media advertising platform (no added fees to you) gets your home in front to the buyers looking for a property just like yours!</p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq15">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>Can I use Suuty to sell my vacation property in the USA?</h4>
          </div>
        </div>
        </a>
        <div id="faq15" class="panel-collapse collapse">
          <div class="panel-body">
            <p>
                Suuty is currently only available for properties in Canada. We are expanding to new cities all the time—please get in touch [LINK] to list your property in your city!
            </p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq16">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>Can an accepted offer to purchase made on Suuty fall through?</h4>
          </div>
        </div>
        </a>
        <div id="faq16" class="panel-collapse collapse">
          <div class="panel-body">
            <p>
              Yes, transactions can fall through for many reasons. If this happens to you,
               we suggest you contact your lawyer to get legal advice on your specific situation.
               You can also contact our Support Team <a href="/contact-us">HERE<a/>.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="marginfix" style="text-align: center;">
    <button class="btn btn-primary btn-lg" style="border-radius: 5px" onclick="window.location.href='{{ URL::to('properties') }}'">Find Your Home</button>
    <button class="btn btn-primary btn-lg" style="border-radius: 5px" onclick="window.location.href='{{ URL::to('properties/create') }}'">List Your Home</button>
  </div>
</div>
@endsection



@section('footer')
@include('includes.footer')
@endsection
