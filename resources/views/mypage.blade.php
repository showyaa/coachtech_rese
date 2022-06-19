<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/mypage.css">
</head>

<body>
  @include('layouts.header')
  <main>
    <div class="username">{{$user->name}}さん</div>
    <h3 class="mypage_ttl"><span>予約状況</span><span>お気に入り店舗</span></h3>
    <div class="content">
      <div class="reserved_lists">
        @foreach($reserved as $reserved_list)
        <div class="reserved_list">
          <div class="list_delete">
            <form action="/reserve/delete?id={{$reserved_list->id}}" method="post">
              @csrf
              <button type="submit">✕</button>
            </form>
          </div>
          <table class="rese_table">
            <tr>
              <th>Shop</th>
              <td>{{$reserved_list->shop->name}}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td>{{\Carbon\Carbon::parse($reserved_list->start_at)->format("Y-m-d")}}</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>{{\Carbon\Carbon::parse($reserved_list->start_at)->format("H:i")}}</td>
            </tr>
            <tr>
              <th>Number</th>
              <td>{{$reserved_list->num_of_users}}人</td>
            </tr>
          </table>
        </div>
        @endforeach
      </div>
      <div class="like_lists">
        @foreach($likes as $like)
        <div class="shop">
          <div class="shop_img">
            <a href="/detail/{{$like->shop->id}}">
              <img src="{{$like->shop->image_url}}" alt="">
            </a>
          </div>
          <div class="shop_content">
            <div class="shop_name">
              {{$like->shop->name}}
            </div>
            <div class="tag">
              <p class="shop_area">{{$like->shop->area->area}}</p>
              <p class="shop_tag">{{$like->shop->genre->genre}}</p>
            </div>
            <div class="shop_detail_btn">
              <a href="/detail/{{$like->shop->id}}">詳しく見る</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </main>
  <script src="/js/reload.js"></script>
</body>

</html>