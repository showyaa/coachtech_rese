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
    <div class="review_lists">
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
              <input id="review01{{$review_list->id}}" type="radio" name="star" value="5"><label for="review01{{$review_list->id}}">★</label>
              <input id="review02{{$review_list->id}}" type="radio" name="star" value="4"><label for="review02{{$review_list->id}}">★</label>
              <input id="review03{{$review_list->id}}" type="radio" name="star" value="3"><label for="review03{{$review_list->id}}">★</label>
              <input id="review04{{$review_list->id}}" type="radio" name="star" value="2"><label for="review04{{$review_list->id}}">★</label>
              <input id="review05{{$review_list->id}}" type="radio" name="star" value="1"><label for="review05{{$review_list->id}}">★</label>
            </span>
          </div>
          <textarea name="comment" id="" cols="25" rows="10" class="comment"></textarea>
          <input type="submit" value="送信" class="review_btn">
        </form>
      </div>
      <style>
        .stars span {
          display: flex;
          /* 要素をフレックスボックスにする */
          flex-direction: row-reverse;
          /* 星を逆順に並べる */
          justify-content: flex-end;
          /* 逆順なので、左寄せにする */
        }

        .stars input[type='radio'] {
          display: none;
          /* デフォルトのラジオボタンを非表示にする */
        }

        .stars label {
          color: #D2D2D2;
          /* 未選択の星をグレー色に指定 */
          font-size: 30px;
          /* 星の大きさを30pxに指定 */
          padding: 0 5px;
          /* 左右の余白を5pxに指定 */
          cursor: pointer;
          /* カーソルが上に乗ったときに指の形にする */
          transition: 0.3s;
        }

        .stars label:hover,
        .stars label:hover~label,
        .stars input[type='radio']:checked~label {
          color: #F8C601;
          /* 選択された星以降をすべて黄色にする */
        }
      </style>
      @endempty
      @endforeach
    </div>
  </main>
</body>

</html>