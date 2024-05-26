@extends('layouts.app')

@section('content')
<div>
  <h1><a href="{{route('mypage') }}">マイページ</a> > 会員情報の編集</h1>

  <hr>

  <form method="POST" action="{{ route('mypage') }}">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
      <div>
        <label for="name">氏名</label>
      </div>
      <div>
        <input id="name" type="text" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="侍 太郎">
          @error('name')
          <span role="alert">
            <strong>氏名を入力してください</strong>
          </span>
          @enderror
        </input>
      </div>
    </div>
    <br>

    <div class="form-group">
      <div>
        <label for="nickname">ニックネーム</label>
      </div>
      <div>
        <input id="nickname" type="text" name="nickname" value="{{ $user->nickname }}" required autocomplete="nickname" autofocus placeholder="さむたろう">
          @error('nickname')
          <span role="alert">
            <strong>ニックネームを入力してください</strong>
          </span>
          @enderror
        </input>
      </div>
    </div>
    <br>

    <div class="form-group">
      <div>
        <label for="phone_number">電話番号</label>
      </div>
      <div>
        <input id="phone_number" type="text" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="phone_number" autofocus placeholder="01-2345-6789">
          @error('phone_number')
          <span role="alert">
            <strong>電話番号を入力してください</strong>
          </span>
          @enderror
        </input>
      </div>
    </div>
    <br>

    <div class="form-group">
      <div>
        <label for="email">メールアドレス</label>
      </div>
      <div>
        <input id="email" type="text" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="taro@example.com">
          @error('email')
          <span role="alert">
            <strong>メールアドレスを入力してください</strong>
          </span>
          @enderror
        </input>
      </div>
    </div>
    <br>

    <div class="form-group">
      <div>
        <label for="occupation">職業</label>
      </div>
      <div>
        <input id="occupation" type="text" name="occupation" value="{{ $user->occupation }}" required autocomplete="occupation" autofocus placeholder="宇宙飛行士">
          @error('occupation')
          <span role="alert">
            <strong>職業を入力してください</strong>
          </span>
          @enderror
        </input>
      </div>
    </div>
    <br>

    <div class="form-group">
      <div>
        <label for="age">年令</label>
      </div>
      <div>
        <input id="age" type="text" name="age" value="{{ $user->age }}" required autocomplete="age" autofocus placeholder="20">
          @error('age')
          <span role="alert">
            <strong>年令を入力してください</strong>
          </span>
          @enderror
        </input>
      </div>
    </div>
    
    <hr>
    <button type="submit">
      保存
    </button>
  </form>
</div>

@endsection
      