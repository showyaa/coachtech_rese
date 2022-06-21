<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/detail.css">
</head>

<body>
  @include('layouts.header')
  <div class="content">
    <div class="shop_detail">
      <div class="detail_top">
        <a class="back_btn" type="button" onclick="history.back()">&lt;</a>
        <div class="shop_name">{{$shop->name}}</div>
      </div>
      <div class="shop_img">
        <img src="{{$shop->image_url}}" alt="">
      </div>
      <div class="tag">
        <form action="/search" method="get" class="area_tag">
          <input type="hidden" value="{{$shop->area->id}}" name="area">
          <button>#{{$shop->area->area}}</button>
        </form>
        <form action="/search" method="get" class="genre_tag">
          <input type="hidden" value="{{$shop->genre->id}}" name="genre">
          <button>#{{$shop->genre->genre}}</button>
        </form>
      </div>
      <div class="text">
        {{$shop->description}}
      </div>
    </div>
    <div class="reservation">
      <div class="but_btn">
        <p class="reserve_ttl">予約</p>
        @if(Auth::check())
        <form action="/reserve" method="POST">
          @csrf
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <input type="hidden" name="shop_id" value="{{$shop->id}}">
          <input type="date" name="start_date" id="start_date" min="{{$tommorow}}" max="{{$limit}}" onchange="hoge()">
          <select name="start_time" id="start_time" onchange="hoge();TimeCheck()">
            <option disabled selected>時間</option>
            <option value="-10-00">10:00</option>
            <option value="-10-15">10:15</option>
            <option value="-10-30">10:30</option>
            <option value="-10-45">10:45</option>
            <option value="-11-00">11:00</option>
            <option value="-11-15">11:15</option>
            <option value="-11-30">11:30</option>
            <option value="-11-45">11:45</option>
            <option value="-12-00">12:00</option>
            <option value="-12-15">12:15</option>
            <option value="-12-30">12:30</option>
            <option value="-12-45">12:45</option>
            <option value="-13-00">13:00</option>
            <option value="-13-15">13:15</option>
            <option value="-13-30">13:30</option>
            <option value="-13-45">13:45</option>
            <option value="-14-00">14:00</option>
            <option value="-14-15">14:15</option>
            <option value="-14-30">14:30</option>
            <option value="-14-45">14:45</option>
            <option value="-15-00">15:00</option>
            <option value="-15-15">15:15</option>
            <option value="-15-30">15:30</option>
            <option value="-15-45">15:45</option>
            <option value="-16-00">16:00</option>
            <option value="-16-15">16:15</option>
            <option value="-16-30">16:30</option>
            <option value="-16-45">16:45</option>
            <option value="-17-00">17:00</option>
            <option value="-17-15">17:15</option>
            <option value="-17-30">17:30</option>
            <option value="-17-45">17:45</option>
            <option value="-18-00">18:00</option>
            <option value="-18-15">18:15</option>
            <option value="-18-30">18:30</option>
            <option value="-18-45">18:45</option>
            <option value="-19-00">19:00</option>
            <option value="-19-15">19:15</option>
            <option value="-19-30">19:30</option>
            <option value="-19-45">19:45</option>
            <option value="-20-00">20:00</option>
            <option value="-20-00">20:00</option>
            <option value="-20-15">20:15</option>
            <option value="-20-30">20:30</option>
            <option value="-20-45">20:45</option>
            <option value="-21-15">21:15</option>
            <option value="-21-30">21:30</option>
            <option value="-21-45">21:45</option>
            <option value="-22-00">22:00</option>
            <option value="-22-15">22:15</option>
            <option value="-22-30">22:30</option>
            <option value="-22-45">22:45</option>
            <option value="-23-00">23:00</option>
          </select>
          <input type="hidden" name="start_at" id="start_at">
          <select name="num_of_users" id="num_of_users" onchange="NumberCheck()">
            <option value="" disabled selected>人数</option>
            <?php
            $count = 1;
            while ($count <= 10) {
              print $count . '<option value="' . $count . '">' . $count . '</option>';
              $count++;
            }
            ?>
          </select>
          @endif
          <div class="confirm">
            <table class="cofirm_table">
              <tr>
                <th>Shop</th>
                <td>{{$shop->name}}</td>
              </tr>
              <tr>
                <th>Date</th>
                <td id="date_check"></td>
              </tr>
              <tr>
                <th>Time</th>
                <td id="time_check"></td>
              </tr>
              <tr>
                <th>Number</th>
                <td><span id="number_check"></span>人</td>
              </tr>
            </table>
          </div>
        </div>
      <input class="reserve_btn" type="submit" value="予約する">
      </form>
    </div>
  </div>
  <script src="/js/reload.js"></script>
  <script src="/js/detail.js"></script>
</body>

</html>