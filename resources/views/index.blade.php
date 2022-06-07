<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>一覧ページ</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/index.css">
</head>
<body>
  @include('layouts.header')
  <main>
    <div class="shops">
  @foreach($shops as $shop)
      <div class="shop">
        <div class="shop_img">
          <a href="/detail/{{$shop->id}}">
            <img src="{{$shop->image_url}}" alt="">
          </a>
        </div>
        <div class="shop_content">
          <div class="shop_name">
            {{$shop->name}}
          </div>
          <div class="tag">
            <p class="shop_area">{{$shop->area->area}}</p>
            <p class="shop_tag">{{$shop->genre->genre}}</p>
          </div>
          <div class="shop_detail">
            <a href="/detail/{{$shop->id}}">詳しく見る</a>
          </div>
        </div>
      </div>
  @endforeach
    </div>
  </main>
</body>
</html>
