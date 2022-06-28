<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>一覧ページ</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/index.css">
  <link rel="stylesheet" href="/css/header.css">
</head>

<body>
<header>
  <nav class="nav" id="nav">
    @if(Auth::check())
    <ul class="outline">
      <li><a href="/">Home</a></li>
      <li><a href="/logout">Logout</a></li>
      <li><a href="/mypage">Mypage</a></li>
      <li><a href="/review">Review</a></li>
    </ul>
    @else
    <ul class="outline">
      <li><a href="/">Home</a></li>
      <li><a href="/register">Register</a></li>
      <li><a href="/login">Login</a></li>
    </ul>
    @endif
  </nav>
  <div class="menu" id="menu">
    <span class="menu__line--top"></span>
    <span class="menu__line--middle"></span>
    <span class="menu__line--bottom"></span>
  </div>
  <div class="title"><a href="/index.php">Rese</a></div>
  <div class="search">
    <form action="/search" method="get">
      <select name="area" id="area">
        <option value="">All area</option>
        @foreach($areas as $key => $area)
        <option value="{{$area->id}}" @if(old('area', $input_area) == $key+1) selected @endif>{{$area->area}}</option>
        @endforeach
      </select>
      <select name="genre" id="genre">
        <option value="">All genre</option>
        @foreach($genres as $key => $genre)
        <option value="{{$genre->id}}" @if(old('genre', $input_genre) == $key+1) selected @endif> {{$genre->genre}} </option>
        @endforeach
      </select>
      <input type="text" name="name" value="{{$input_name}}">
      <input type="submit" value="検索">
    </form>
  </div>
</header>
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
            <form action="/search" method="get" class="area_tag">
              <input type="hidden" value="{{$shop->area->id}}" name="area">
              <button>#{{$shop->area->area}}</button>
            </form>
            <form action="/search" method="get" class="genre_tag">
              <input type="hidden" value="{{$shop->genre->id}}" name="genre">
              <button>#{{$shop->genre->genre}}</button>
            </form>
          </div>
          <div class="detail_like">
              <a href="/detail/{{$shop->id}}" class="shop_detail_btn">詳しく見る</a>
            <div class="like_btn">
              <span>
              @if(Auth::check())
                @if($shop->is_liked_by_auth_user())
                <form id="form{{$shop->id}}1" action="/like/delete" method="POST" class="like_delete_form1" target="send">
                  @csrf
                  <input type="hidden" name="shop_id" value="{{$shop->id}}">
                  <input type="hidden" name="user_id" value="{{$user->id}}">
                  <button class="like_delete" id="like_delete{{$shop->id}}">
                    <img src="\img\icon_140180_256.png" width="30px" alt="">
                  </button>
                </form>
                <form id="form{{$shop->id}}2" action="/like" method="POST" target="send" class="like_create_form1">
                  @csrf
                  <input type="hidden" name="shop_id" value="{{$shop->id}}">
                  <input type="hidden" name="user_id" value="{{$user->id}}">
                  <button class="like_create" id="like_create{{$shop->id}}">
                    <img src="\img\icon_140220_256.png" width="30px" alt="">
                  </button>
                </form>
                <iframe name="send" style="width: 0px; height: 0px; border: 0px;"></iframe>
                <script>
                  const likeCreateBtn1{{$shop->id}} = document.getElementById('like_create{{$shop->id}}');
                  const likeDeleteBtn1{{$shop->id}} = document.getElementById('like_delete{{$shop->id}}')
                  const form1{{$shop->id}} = document.getElementById('form{{$shop->id}}1');
                  const form2{{$shop->id}} = document.getElementById('form{{$shop->id}}2');

                  likeCreateBtn1{{$shop->id}}.addEventListener('click', () => {
                    form2{{$shop->id}}.style.display = 'none';
                    form1{{$shop->id}}.style.display = 'block';
                  })
                  likeDeleteBtn1{{$shop->id}}.addEventListener('click', () => {
                    form2{{$shop->id}}.style.display = 'block';
                    form1{{$shop->id}}.style.display = 'none';
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
                <form id="form{{$shop->id}}3" action="/like" method="POST" target="send" class="like_create_form2">
                  @csrf
                  <input type="hidden" name="shop_id" value="{{$shop->id}}">
                  <input type="hidden" name="user_id" value="{{$user->id}}">
                  <button class="like_create" id="like_create{{$shop->id}}2">
                    <img src="\img\icon_140220_256.png" width="30px" alt="">
                  </button>
                </form>
                <form id="form{{$shop->id}}4" action="/like/delete" method="POST" class="like_delete_form2" target="send">
                  @csrf
                  <input type="hidden" name="shop_id" value="{{$shop->id}}">
                  <input type="hidden" name="user_id" value="{{$user->id}}">
                  <button class="like_delete" id="like_delete{{$shop->id}}2">
                    <img src="\img\icon_140180_256.png" width="30px" alt="">
                  </button>
                </form>
                <iframe name="send" style="width: 0px; height: 0px; border: 0px;"></iframe>
                <script>
                  const likeCreateBtn2{{$shop->id}} = document.getElementById('like_create{{$shop->id}}2');
                  const likeDeleteBtn2{{$shop->id}} = document.getElementById('like_delete{{$shop->id}}2');
                  const form3{{$shop->id}} = document.getElementById('form{{$shop->id}}3');
                  const form4{{$shop->id}} = document.getElementById('form{{$shop->id}}4');

                  likeCreateBtn2{{$shop->id}}.addEventListener('click', () => {
                    form3{{$shop->id}}.style.display = 'none';
                    form4{{$shop->id}}.style.display = 'block';
                  })
                  likeDeleteBtn2{{$shop->id}}.addEventListener('click', () => {
                    form3{{$shop->id}}.style.display = 'block';
                    form4{{$shop->id}}.style.display = 'none';
                  })


                  // const $form = $('#form{{$shop->id}}')
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
              @else
                <button class="like_create">
                  <a href="/register">
                  <img src="\img\icon_140220_256.png" width="30px" alt="">
                  </a>
                </button>
              @endif
              </span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </main>
    <script src="/js/header.js"></script>
    <script src="/js/reload.js"></script>
</body>

</html>