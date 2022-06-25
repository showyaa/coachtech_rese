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
    @if(Auth::check())
    <div class="reservation">
      <div class="but_btn">
        <p class="reserve_ttl">予約</p>
        <form action="/reserve" method="POST">
          @csrf
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <input type="hidden" name="shop_id" value="{{$shop->id}}">
          <input type="date" name="start_date" value="{{old('start_date')}}" id="start_date" min="{{$tommorow}}" max="{{$limit}}" onchange="hoge()">
          <select name="start_time" id="start_time" onchange="hoge();TimeCheck()">
            <option disabled selected>時間</option>
            <option value="-10-00" {{old('start_time') == '-10-00' ? 'selected' : ''}}>10:00</option>
            <option value="-10-15" {{old('start_time') == '-10-15' ? 'selected' : ''}}>10:15</option>
            <option value="-10-30" {{old('start_time') == '-10-30' ? 'selected' : ''}}>10:30</option>
            <option value="-10-45" {{old('start_time') == '-10-45' ? 'selected' : ''}}>10:45</option>
            <option value="-11-00" {{old('start_time') == '-11-00' ? 'selected' : ''}}>11:00</option>
            <option value="-11-15" {{old('start_time') == '-11-15' ? 'selected' : ''}}>11:15</option>
            <option value="-11-30" {{old('start_time') == '-11-30' ? 'selected' : ''}}>11:30</option>
            <option value="-11-45" {{old('start_time') == '-11-45' ? 'selected' : ''}}>11:45</option>
            <option value="-12-00" {{old('start_time') == '-12-00' ? 'selected' : ''}}>12:00</option>
            <option value="-12-15" {{old('start_time') == '-12-15' ? 'selected' : ''}}>12:15</option>
            <option value="-12-30" {{old('start_time') == '-12-30' ? 'selected' : ''}}>12:30</option>
            <option value="-12-45" {{old('start_time') == '-12-45' ? 'selected' : ''}}>12:45</option>
            <option value="-13-00" {{old('start_time') == '-13-00' ? 'selected' : ''}}>13:00</option>
            <option value="-13-15" {{old('start_time') == '-13-15' ? 'selected' : ''}}>13:15</option>
            <option value="-13-30" {{old('start_time') == '-13-30' ? 'selected' : ''}}>13:30</option>
            <option value="-13-45" {{old('start_time') == '-13-45' ? 'selected' : ''}}>13:45</option>
            <option value="-14-00" {{old('start_time') == '-14-00' ? 'selected' : ''}}>14:00</option>
            <option value="-14-15" {{old('start_time') == '-14-15' ? 'selected' : ''}}>14:15</option>
            <option value="-14-30" {{old('start_time') == '-14-30' ? 'selected' : ''}}>14:30</option>
            <option value="-14-45" {{old('start_time') == '-14-45' ? 'selected' : ''}}>14:45</option>
            <option value="-15-00" {{old('start_time') == '-15-00' ? 'selected' : ''}}>15:00</option>
            <option value="-15-15" {{old('start_time') == '-15-15' ? 'selected' : ''}}>15:15</option>
            <option value="-15-30" {{old('start_time') == '-15-30' ? 'selected' : ''}}>15:30</option>
            <option value="-15-45" {{old('start_time') == '-15-45' ? 'selected' : ''}}>15:45</option>
            <option value="-16-00" {{old('start_time') == '-16-00' ? 'selected' : ''}}>16:00</option>
            <option value="-16-15" {{old('start_time') == '-16-15' ? 'selected' : ''}}>16:15</option>
            <option value="-16-30" {{old('start_time') == '-16-30' ? 'selected' : ''}}>16:30</option>
            <option value="-16-45" {{old('start_time') == '-16-45' ? 'selected' : ''}}>16:45</option>
            <option value="-17-00" {{old('start_time') == '-17-00' ? 'selected' : ''}}>17:00</option>
            <option value="-17-15" {{old('start_time') == '-17-15' ? 'selected' : ''}}>17:15</option>
            <option value="-17-30" {{old('start_time') == '-17-30' ? 'selected' : ''}}>17:30</option>
            <option value="-17-45" {{old('start_time') == '-17-45' ? 'selected' : ''}}>17:45</option>
            <option value="-18-00" {{old('start_time') == '-18-00' ? 'selected' : ''}}>18:00</option>
            <option value="-18-15" {{old('start_time') == '-18-15' ? 'selected' : ''}}>18:15</option>
            <option value="-18-30" {{old('start_time') == '-18-30' ? 'selected' : ''}}>18:30</option>
            <option value="-18-45" {{old('start_time') == '-18-45' ? 'selected' : ''}}>18:45</option>
            <option value="-19-00" {{old('start_time') == '-19-00' ? 'selected' : ''}}>19:00</option>
            <option value="-19-15" {{old('start_time') == '-19-15' ? 'selected' : ''}}>19:15</option>
            <option value="-19-30" {{old('start_time') == '-19-30' ? 'selected' : ''}}>19:30</option>
            <option value="-19-45" {{old('start_time') == '-19-45' ? 'selected' : ''}}>19:45</option>
            <option value="-20-00" {{old('start_time') == '-20-00' ? 'selected' : ''}}>20:00</option>
            <option value="-20-00" {{old('start_time') == '-20-15' ? 'selected' : ''}}>20:00</option>
            <option value="-20-15" {{old('start_time') == '-20-30' ? 'selected' : ''}}>20:15</option>
            <option value="-20-30" {{old('start_time') == '-20-45' ? 'selected' : ''}}>20:30</option>
            <option value="-20-45" {{old('start_time') == '-21-00' ? 'selected' : ''}}>20:45</option>
            <option value="-21-15" {{old('start_time') == '-21-15' ? 'selected' : ''}}>21:15</option>
            <option value="-21-30" {{old('start_time') == '-21-30' ? 'selected' : ''}}>21:30</option>
            <option value="-21-45" {{old('start_time') == '-21-45' ? 'selected' : ''}}>21:45</option>
            <option value="-22-00" {{old('start_time') == '-22-00' ? 'selected' : ''}}>22:00</option>
            <option value="-22-15" {{old('start_time') == '-22-15' ? 'selected' : ''}}>22:15</option>
            <option value="-22-30" {{old('start_time') == '-22-30' ? 'selected' : ''}}>22:30</option>
            <option value="-22-45" {{old('start_time') == '-22-45' ? 'selected' : ''}}>22:45</option>
            <option value="-23-00" {{old('start_time') == '-23-00' ? 'selected' : ''}}>23:00</option>
          </select>
          <input type="hidden" name="start_at" id="start_at">
          <select name="num_of_users" id="num_of_users" onchange="NumberCheck()">
            <option value="" disabled selected>人数</option>
            @foreach($count_users as $count_user)
            <option value="{{$count_user}}" @if(old('num_of_users', $input_num) == $count_user) selected @endif>{{$count_user}}</option>
            @endforeach
          </select>
          <div class="confirm">
            <table class="cofirm_table">
              <tr>
                <th>Shop</th>
                <td>{{$shop->name}}</td>
              </tr>
              <tr>
                <th>Date</th>
                <td id="date_check">{{old('start_date')}}</td>
              </tr>
              <tr>
                <th>Time</th>
                <td id="time_check">{{old('start_time')}}</td>
              </tr>
              <tr>
                <th>Number</th>
                <td><span id="number_check"></span>人</td>
              </tr>
            </table>
          </div>
          @if(count($errors) > 0)
          <div class="error">
            @error('start_date')
            <div>※{{$message}}</div>
            @enderror
            @error('start_time')
            <div>※{{$message}}</div>
            @enderror
            @error('num_of_users')
            <div>※{{$message}}</div>
            @enderror
          </div>
          @endif
      </div>
      <input class="reserve_btn" type="submit" value="予約する">
      </form>
    </div>
    @else
    <div class="not_login_reserve">
      <div class="message">
        <p>ログインして予約</p>
      </div>
      <div class="login_or_register">
        <a href="/register"><span class="register">新規登録</span></a>
        <a href="/login"><span class="login">ログイン</span></a>
      </div>
    </div>
    @endif
  </div>
  <script src="/js/reload.js"></script>
  <script src="/js/detail.js"></script>
</body>

</html>