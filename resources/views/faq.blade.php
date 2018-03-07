@extends('layouts.app')


@section('content')

<div class="container panel-collapse">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-contentbar">
    <h3>FAQs</h3>
    <hr>
    <div class="panel-group" id="accordion">
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq1">
          <div class="panel-heading">
            <div class="panel-title">
                <h4>How does Suuty work?</h4>
            </div>
          </div>
        </a>
        <div id="faq1" class="panel-collapse collapse in">
          <div class="panel-body"><p>Suuty is an online real estate marketplace that supports both home owners and home buyers throughout the entire transaction process: from listing/looking for a home to showings to accepting the offer. Suuty makes the process a breeze through our online messaging, appointment booking and document workflow. Suuty also introduces a new-to-the-industry bidding system that ensures a fair deal for all. It’s fast, easy and transparent! What are you waiting for? Join the Revolution!</p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq2">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>Is it legal to buy/sell a home without a realtor?</h4>
            </div>
          </div>
        </a>
        <div id="faq2" class="panel-collapse collapse">
          <div class="panel-body">
            <p>For sale by owner has been around as long as the real estate industry, however, it has not been supported by the best technology…until now! By doing it yourself, you can walk away with tens of thousands of dollars more in your pocket by avoiding commissions. As a buyer, you will benefit by working with your own schedule (no more waiting around) and knowing that you received a fair deal for the property through Suuty’s transparent home auctions.</p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq3">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>How does the bidding process work?</h4>
            </div>
          </div>
        </a>
        <div id="faq3" class="panel-collapse collapse">
          <div class="panel-body">
            <p>The seller will enter their target price and desired timeframe for offers. Prospective purchasers can enter their offers including and subjects. At the end of the timeframe the seller will accept the offer that is the best for their circumstance and move into negotiation. This is true “market pricing”! Suuty will then assist both parties drawing up all the paperwork and ensuring the deal is legit.  All you have to do is start planning your move!</p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq4">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>How do I deal with the legal documents?</h4>
            </div>
          </div>
        </a>
        <div id="faq4" class="panel-collapse collapse">
          <div class="panel-body">
            <p>Suuty’s document workflow will have all the legal paperwork done before you can say abracadabra! Suuty’s integrated document preparation service will make sure the transaction is handled professionally. You have nothing to do but start planning that bathroom reno.</p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq5">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>Will I receive a better price than using a realtor?</h4>
            </div>
          </div>
        </a>
        <div id="faq5" class="panel-collapse collapse">
          <div class="panel-body">
            <p>When someone lists their home through a real estate agent, they will be responsible for paying realtor’s fees to both their agent and the agent representing the buyer. You can save this money by listing and selling the house on your own. Suuty provides a powerful platform that performs most of the functions that a realtor would which allows you to save the money. Suuty also allows buyers and sellers to participate in a transparent auction process which will ensure offers are at market price. Today’s hot market means many of these offers are behind closed doors.</p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq6">
        <div class="panel-heading">
            <div class="panel-title">
              <h4>Can I use Suuty for my vacation property in the USA?</h4>
            </div>
          </div>
        </a>
        <div id="faq6" class="panel-collapse collapse">
          <div class="panel-body">
            <p>Suuty is currently only available to Canadians. (Sorry!)
            If we’re not yet in your city and you want to see Suuty expand to your neighbourhood, please reach out to us at connect@suuty.com.</p>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#faq7">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>How will my home be marketed?</h4>
          </div>
        </div>
        </a>
        <div id="faq7" class="panel-collapse collapse">
          <div class="panel-body">
            <p>90% of buyers look for their new home online. Why do you need a lawn sign? Suuty will provide gorgeous listings with search filters that prospective buyers are looking for. Suuty will allow buyers to sign up to receive listings tailored to their home of their dreams. Rest assured that Suuty’s fully integrated social media network will get your home out to the people who are looking.
              Still have questions? Send us an email at connect@suuty.com and we will get back to you!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



@section('footer')
@include('includes.footer')
@endsection
