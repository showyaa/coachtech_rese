<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>レビュー</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/review.css">
</head>

<body>
  @include('layouts.header')
  <main>
    <div class="review_title">レビュー</div>
    @foreach($review_lists as $review_list)
      @empty($review_list->review)
      <div class="review_list">
        <div class="shop_img">
          <a href="/detail/{{$review_list->shop->id}}">
            <img src="{{$review_list->shop->image_url}}" alt="">
          </a>
        </div>
        <div class="date_time">
          <p>来店日時<span>{{\Carbon\Carbon::parse($review_list->start_at)->format("Y-m-d H:i")}}</span></p>
        </div>
        <div class="text">
          <p class="text_p1"><span>{{$review_list->shop->name}}</span>はいかがでしたか？</p>
          <p class="text_p2">お聞かせいただいた評価とコメントはレストランに通知されます。</p>
        </div>
        <form action="/review/create" method="post" class="review_form">
          @csrf
          <input type="hidden" value="{{$review_list->id}}" name="reservation_id">
          <div class="stars">
            <span>
              <input id="review01" type="radio" name="star" value="5"><label for="review01">★</label>
              <input id="review02" type="radio" name="star" value="4"><label for="review02">★</label>
              <input id="review03" type="radio" name="star" value="3"><label for="review03">★</label>
              <input id="review04" type="radio" name="star" value="2"><label for="review04">★</label>
              <input id="review05" type="radio" name="star" value="1"><label for="review05">★</label>
            </span>
          </div>
          <textarea name="comment" id="" cols="25" rows="7" class="comment"></textarea>
          <input type="submit" value="送信" class="review_btn">
        </form>
      </div>
      @endempty
    @endforeach
  </main>
</body>

</html>