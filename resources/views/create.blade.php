<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>店舗新規作成</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
  @include('layouts.header')
  <main>
    <div class="content">
      <div class="shop_create">
        <form action="/add" method="post">
          @csrf
          <div class="form-create">
            <div class="form-item">
              <p class="form-item-label">店名</p class="form-item-label">
              <input type="text" name="name">
            </div class="form-item">
            <div class="form-item">
              <p>店舗代表者</p>
              <select name="user_id" id="">
                @foreach($admins as $admin)
                <option value="{{$admin->id}}">{{$admin->name}}</option>
                @endforeach
              </select>
            </div class="form-item">
            <div class="form-item">
              <p class="form-item-label">都道府県</p class="form-item-label">
              <select name="area_id" id="">
                @foreach($areas as $area)
                <option value="{{$area->id}}">{{$area->area}}</option>
                @endforeach
              </select>
            </div class="form-item">
            <div class="form-item">
              <p class="form-item-label">ジャンル</p class="form-item-label">
              <select name="genre_id" id="">
                @foreach($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->genre}}</option>
                @endforeach
              </select>
            </div class="form-item">
            <div class="form-item">
              <p class="form-item-label">店舗概要</p class="form-item-label">
              <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div class="form-item">
            <div class="form-item">
              <p class="form-item-label">店舗画像(url)</p class="form-item-label">
              <input type="text" name="image_url">
            </div class="form-item">
          </div>
          <div class="create_submit">
            <input type="submit" class="create_btn" value="追加">
          </div>
        </form>
      </div>
  </main>
</body>

</html>