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
    <div class="content">
      <div class="username">{{$user->name}}さん</div>
      <div class="reserved_lists">
            <h3 class="reserve_ttl">予約状況</h3>
        @foreach($reserved as $key => $reserved_list)
        <div class="reserved_list">
          <div class="list_top">
            <p class="num_of_lists">予約{{$key+1}}</p>
            <form action="/reserve/delete?id={{$reserved_list->id}}" method="post">
              @csrf
              <button class="delete_btn" type="submit">✕</button>
            </form>
          </div>
          <form action="/reserve/update?id={{$reserved_list->id}}" method="post">
            @csrf
            <script>
                function hoge{{$reserved_list->id}}() {
                  var valueA = document.getElementById("start_date{{$reserved_list->id}}").value;
                  var valueB = document.getElementById("start_time{{$reserved_list->id}}").value;
                  document.getElementById("start_at{{$reserved_list->id}}").value = valueA + valueB;
                };
            </script>
            <table class="rese_table">
              <tr>
                <th>Shop</th>
                <td>{{$reserved_list->shop->name}}</td>
              </tr>
              <tr>
                <th>Date</th>
                <td><input type="date" min="{{$tommorow}}" max="{{$limit}}" name="start_date" id="start_date{{$reserved_list->id}}" onchange="hoge{{$reserved_list->id}}()" value="{{\Carbon\Carbon::parse($reserved_list->start_at)->format("Y-m-d")}}"></td>
              </tr>
              <tr>
                <th>Time</th>
                <td>
                  <select name="start_time" id="start_time{{$reserved_list->id}}" onchange="hoge{{$reserved_list->id}}()">
                    <option value="-{{\Carbon\Carbon::parse($reserved_list->start_at)->format("H:i")}}">{{\Carbon\Carbon::parse($reserved_list->start_at)->format("H:i")}}</option>
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
                  <input type="hidden" name="start_at" id="start_at{{$reserved_list->id}}" value="{{$reserved_list->start_at}}">
                </td>
              </tr>
              <tr>
                <th>Number</th>
                <td>
                  <select name="num_of_users">
                    <option value="{{$reserved_list->num_of_users}}">{{$reserved_list->num_of_users}}</option>
                    @foreach($count_users as $count_user)
                    <option value="{{$count_user}}">{{$count_user}}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
            </table>
            <div class="update_btn_div">
              <input type="submit" class="update_btn" value="更新">
            </div>
          </form>
        </div>
        @endforeach
      </div>
      <div class="like_lists">

        <h3 class="like_ttl">お気に入り店舗</h3>
      <div class="like_lists_flex">
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
              <form action="/search" method="get" class="area_tag">
                <input type="hidden" value="{{$like->shop->area->id}}" name="area">
                <button>#{{$like->shop->area->area}}</button>
              </form>
              <form action="/search" method="get" class="genre_tag">
                <input type="hidden" value="{{$like->shop->genre->id}}" name="genre">
                <button>#{{$like->shop->genre->genre}}</button>
              </form>
            </div>
            <div class="detail_like">
              <a href="/detail/{{$like->shop->id}}" class="shop_detail_btn">詳しく見る</a>
              <div class="like_btn">
              <span>  
              @if($like->shop->is_liked_by_auth_user())
              <form id="form{{$like->id}}1" action="/like/delete" method="POST" class="like_delete_form1" target="send">
                @csrf
                <input type="hidden" name="shop_id" value="{{$like->shop_id}}">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <button class="like_delete" id="like_delete{{$like->id}}">
                  ❤
                </button>
              </form>
              <form id="form{{$like->id}}2" action="/like" method="POST" target="send" class="like_create_form1">
                @csrf
                <input type="hidden" name="shop_id" value="{{$like->shop_id}}">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <button class="like_create" id="like_create{{$like->id}}">
                  ❤
                </button>
              </form>
              <iframe name="send" style="width: 0px; height: 0px; border: 0px;"></iframe>
              <script>
                const likeCreateBtn1{{$like->id}} = document.getElementById('like_create{{$like->id}}');
                const likeDeleteBtn1{{$like->id}} = document.getElementById('like_delete{{$like->id}}')
                const form1{{$like->id}} = document.getElementById('form{{$like->id}}1');
                const form2{{$like->id}} = document.getElementById('form{{$like->id}}2');

                likeCreateBtn1{{$like->id}}.addEventListener('click', () => {
                  form2{{$like->id}}.style.display = 'none';
                  form1{{$like->id}}.style.display = 'block';
                })
                likeDeleteBtn1{{$like->id}}.addEventListener('click', () => {
                  form2{{$like->id}}.style.display = 'block';
                  form1{{$like->id}}.style.display = 'none';
                })
              </script>
                            <style>
                .like_create_form1 {
                  display: none;
                }
                .like_delete_form1 {
                  display: block;
                }
              </style>
            @else
              <form id="form{{$like->id}}3" action="/like" method="POST" target="send" class="like_create_form2">
                @csrf
                <input type="hidden" name="shop_id" value="{{$like->shop_id}}">
                <input type="hidden" name="user_id" value="{{$like->id}}">
                <button class="like_create" id="like_create{{$like->id}}2">
                  ❤
                </button>
              </form>
              <form id="form{{$like->id}}4" action="/like/delete" method="POST" class="like_delete_form2" target="send">
                @csrf
                <input type="hidden" name="shop_id" value="{{$like->shop_id}}">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <button class="like_delete" id="like_delete{{$like->id}}2">
                  ❤
                </button>
              </form>
              <iframe name="send" style="width: 0px; height: 0px; border: 0px;"></iframe>
              <script>
                const likeCreateBtn2{{$like->id}} = document.getElementById('like_create{{$like->id}}2');
                const likeDeleteBtn2{{$like->id}} = document.getElementById('like_delete{{$like->id}}2');
                const form3{{$like->id}} = document.getElementById('form{{$like->id}}3');
                const form4{{$like->id}} = document.getElementById('form{{$like->id}}4');

                likeCreateBtn2{{$like->id}}.addEventListener('click', () => {
                  form3{{$like->id}}.style.display = 'none';
                  form4{{$like->id}}.style.display = 'block';
                })
                likeDeleteBtn2{{$like->id}}.addEventListener('click', () => {
                  form3{{$like->id}}.style.display = 'block';
                  form4{{$like->id}}.style.display = 'none';
                })


                // const $form = $('#form{{$like->id}}')
                // $('.like_create').on('click', evt => {
                //   $form.submit()
                //   $form[0].reset()
                //   return false
                // })
              </script>
              <style>
                .like_create_form2 {
                  display: block;
                }
                .like_delete_form2 {
                  display: none;
                }
              </style>
              @endif
              </span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      </div>
    </div>
  </main>
  <script src="/js/reload.js"></script>
</body>

</html>