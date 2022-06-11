<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mypage</title>
</head>

<body>
  @include('layouts.header')
  <div class="content">
    <div class="shop_name">{{$shop->name}}</div>
    <div class="shop_img">
      <img src="{{$shop->image_url}}" alt="">
    </div>
    <div class="tag">
      <p class="shop_area">{{$shop->area->area}}</p>
      <p class="shop_genre">{{$shop->genre->genre}}</p>
    </div>
    <div class="text">
      {{$shop->description}}
    </div>
  </div>
  <div class="reservation">
    <p>予約</p>
    @if(Auth::check())
    <form action="/reserve" method="POST">
      @csrf
      <input type="hidden" name="user_id" value="{{$user->id}}">
      <input type="hidden" name="shop_id" value="{{$shop->id}}">
      <input type="date" name="start_at">
      <input type="time" name="start_at">
      <input type="number" min="1" max="8" name="num_of_users">
      <input type="submit" value="予約する">
    </form>
    @endif
  </div>
</body>

</html>