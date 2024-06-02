@extends('layouts.app')

@section('content')
<div class="container">
  <h3>会員情報の編集</h3>

  <hr>
  <div class="d-flex justify-content-center py-3">
    <form method="POST" action="{{ route('mypage') }}" class="w-100" style="max-width: 600px;">
      @csrf
      <input type="hidden" name="_method" value="PUT">
      
      <div class="form-group row justify-content-center">
        <label for="name" class="col-md-4 col-form-label text-md-right">氏名</label>
        <div class="col-md-6">
          <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="侍 太郎" style="max-width: 300px;">
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>氏名を入力してください</strong>
          </span>
          @enderror
        </div>
      </div>
      <br>

      <div class="form-group row justify-content-center">
        <label for="nickname" class="col-md-4 col-form-label text-md-right">ニックネーム</label>
        <div class="col-md-6">
          <input id="nickname" type="text" class="form-control" name="nickname" value="{{ $user->nickname }}" required autocomplete="nickname" autofocus placeholder="さむたろう" style="max-width: 300px;">
          @error('nickname')
          <span class="invalid-feedback" role="alert">
            <strong>ニックネームを入力してください</strong>
          </span>
          @enderror
        </div>
      </div>
      <br>

      <div class="form-group row justify-content-center">
        <label for="phone_number" class="col-md-4 col-form-label text-md-right">電話番号</label>
        <div class="col-md-6">
          <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="phone_number" autofocus placeholder="01-2345-6789" style="max-width: 300px;">
          @error('phone_number')
          <span class="invalid-feedback" role="alert">
            <strong>電話番号を入力してください</strong>
          </span>
          @enderror
        </div>
      </div>
      <br>

      <div class="form-group row justify-content-center">
        <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
        <div class="col-md-6">
          <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="taro@example.com" style="max-width: 300px;">
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>メールアドレスを入力してください</strong>
          </span>
          @enderror
        </div>
      </div>
      <br>

      <div class="form-group row justify-content-center">
        <label for="occupation" class="col-md-4 col-form-label text-md-right">職業</label>
        <div class="col-md-6">
          <input id="occupation" type="text" class="form-control" name="occupation" value="{{ $user->occupation }}" required autocomplete="occupation" autofocus placeholder="宇宙飛行士" style="max-width: 300px;">
          @error('occupation')
          <span class="invalid-feedback" role="alert">
            <strong>職業を入力してください</strong>
          </span>
          @enderror
        </div>
      </div>
      <br>

      <div class="form-group row justify-content-center">
        <label for="age" class="col-md-4 col-form-label text-md-right">年齢</label>
        <div class="col-md-6">
          <input id="age" type="text" class="form-control" name="age" value="{{ $user->age }}" required autocomplete="age" autofocus placeholder="20" style="max-width: 300px;">
          @error('age')
          <span class="invalid-feedback" role="alert">
            <strong>年齢を入力してください</strong>
          </span>
          @enderror
        </div>
      </div>
      
      <div class="form-group row mb-0 justify-content-center mt-5">
        <div class="col-md-8 text-center">
          <button type="submit" class="btn btn-warning">
            保存
          </button>
        </div>
      </div>
    </form>
  </div>

  <hr>

  <form method="POST" action="{{ route('mypage.destroy') }}">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <div class="container mt-5">
      <div class="d-flex justify-content-end">
          <div class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#delete-user-confirm-modal">退会する</div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="delete-user-confirm-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">退会確認</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                </div>
                <div class="modal-body">
                    本当に退会しますか？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-danger">退会する</button>
                </div>
            </div>
        </div>
    </div>
  </form>
  
</div>

@endsection
      