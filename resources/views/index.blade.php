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
          <div class="like_btn">
            <span>
              @if(Auth::check())
              @if($shop->is_liked_by_auth_user())
              <form id="form{{$shop->id}}" action="/like/delete" method="POST">
                @csrf
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <button class="like_delete">
                  <img src="\img\icon_140180_256.png" width="30px" alt="">
                </button>
              </form>
              @else
              <form id="form{{$shop->id}}" action="/like" method="POST" target="send">
                @csrf
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <button class="like_create">
                  <img src="\img\icon_140220_256.png" width="30px" alt="">
                </button>
              </form>
              @endif
              <!-- <iframe name="send" style="width: 0px; height: 0px; border: 0px;"></iframe>
              <script>
                const $form = $('#form{{$shop->id}}')
                $('.like_create').on('click', evt => {
                  $form.submit()
                  $form[0].reset()
                  return false
                })
              </script> -->
              @endif
            </span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </main>
</body>

</html>