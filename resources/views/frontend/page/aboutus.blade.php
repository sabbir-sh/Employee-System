@extends('frontend.layout.app')

@section('title', 'About Us')

@section('main-content')
<section style="padding: 200px 20px; background-color: #f8f9fa; font-family: Arial, sans-serif;">
  <div style="max-width: 1000px; margin: auto; text-align: center;">

 

    <p style="font-size: 1.4rem; color: #444; line-height: 1.9;">
      <strong>E.COm</strong> is your trusted destination for quality products delivered right to your doorstep.
      We are dedicated to offering the best in skincare, wellness, fashion, and more — all at unbeatable prices.
    </p>

    <p style="font-size: 1.4rem; color: #444; line-height: 1.9; margin-top: 20px;">
      With a commitment to customer satisfaction, secure shopping, and fast delivery, E.COm brings you a seamless
      online shopping experience backed by a passionate team.
    </p>

    <p style="font-size: 1.2rem; color: #666; margin-top: 25px;">
      From Dhaka to every corner of Bangladesh — your lifestyle, our mission.
    </p>

    <a href="{{ route('home') }}" class="btn btn-dark mt-4" style="font-size: 1rem; padding: 10px 20px;">← Back to Home</a>
  </div>
</section>

@endsection
