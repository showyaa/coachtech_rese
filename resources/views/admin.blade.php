<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>店舗作成・更新</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
  @include('layouts.header')
  <main>
    <div class="content">
      @empty($shop)
      <div class="shop_create">
        <form action="/admin/create" method="post">
          @csrf
          <div class="form-create">
            <div class="form-item">
              <p class="form-item-label">店名</p class="form-item-label">
              <input type="text" name="name">
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
      @endempty



      @if($admin->shops != null)
      <div class="admin_shops">
        @foreach($admin->shops as $admin_shop)
        <div class="admin_shop">
          <div class="shop_name">{{$admin_shop->name}}</div>
          <form action="/admin/update?id={{$admin_shop->id}}" method="post">
            @csrf
            <div class="form-update">
              <div class="form-item">
                <p class="form-item-label">店名</p class="form-item-label">
                <input type="text" name="name" value="{{$admin_shop->name}}">
              </div class="form-item">
              <div class="form-item">
                <p class="form-item-label">都道府県</p class="form-item-label">
                  <select name="area_id" id="">
                    <option value="{{$admin_shop->area->id}}">{{$admin_shop->area->area}}</option>
                    @foreach($areas as $area)
                    <option value="{{$area->id}}">{{$area->area}}</option>
                    @endforeach
                  </select>
              </div class="form-item">
              <div class="form-item">
                <p class="form-item-label">ジャンル</p class="form-item-label">
                  <select name="genre_id" id="">
                    <option value="{{$admin_shop->genre->id}}">{{$admin_shop->genre->genre}}</option>
                    @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->genre}}</option>
                    @endforeach
                  </select>
              </div class="form-item">
              <div class="form-item">
                <p class="form-item-label">店舗概要</p class="form-item-label">
                  <textarea name="description" id="" cols="30" rows="10">{{$admin_shop->description}}</textarea>
              </div class="form-item">
              <div class="form-item">
                <p class="form-item-label">店舗画像(url)</p class="form-item-label">
                <input type="text" name="image_url" value="{{$admin_shop->image_url}}">
              </div class="form-item">
            </div>
            <div class="update_submit">
              <input type="submit" class="update_btn" value="更新">
            </div>
          </form>
        </div>
        @endforeach
      </div>
      @endif
    </div>
  </main>
</body>

</html>