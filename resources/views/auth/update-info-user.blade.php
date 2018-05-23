@extends('frontend.layouts')
@section('content')
    <div class="content">
        <div class="login">
            <div class="main-agileits" style="width: 50%">
                <div class="form-w3agile form1" >
                    <h3>Cập nhập thông tin người dùng</h3>
                    <div id="message_error">
                    </div>
                <form  id="updateProfile"  method="post"  onsubmit="return false">
                    {!! csrf_field() !!}
                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}" style="margin-top: 20px; ">
                            <label class="col-md-4"> Tên <span class="required">*</span></label>
                            <div class=" col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{$object['name']}}" placeholder="Nhập Username"  autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4"> Email <span class="required">*</span></label>
                            <div class=" col-md-8">

                                <input id="email" type="text" class="form-control" name="email" value="{{$object['email']}}" placeholder="Nhập Email"   autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-md-4">Giới tính</label>
                            <div class=" col-md-8">
                                <label>Nam</label>
                                <input  type="radio" value="1" checked name="gender" >
                                <label>Nữ</label>
                                <input  type="radio" value="0"  name="gender" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4"> Số điện thoại <span class="required">*</span></label>
                            <div class=" col-md-8">

                                <input type="text"  name="phone" class="form-control" placeholder="Nhập số điện thoại" aria-describedby="basic-addon1">
                            </div>
                        </div >
                        <div class="form-group row"  style="padding-top: 20px; ">
                            <label class="col-md-4"> Ngày sinh <span class="required">*</span></label>
                            <div class="col-md-8">
                                <div class=" col-md-4">
                                    <select id="day" name="day" class="form-control select2">
                                        <option value="">Ngày</option>
                                        <?php for ($i = 1; $i<=31; $i++): ?>
                                        <option value="{{$i}}">{{$i}}</option>
                                        <?php endfor;?>
                                    </select>
                                </div>
                                <div class=" col-md-4">
                                    <select id="month" name="month" class="form-control select2">
                                        <option value="">Tháng</option>
                                        <?php for ($i = 1; $i<=12; $i++): ?>
                                        <option value="{{$i}}">{{$i}}</option>
                                        <?php endfor;?>
                                    </select>
                                </div>
                                <div class=" col-md-4">
                                    <select id="year" name="year" class="form-control select2">
                                        <option value="">Năm</option>

                                        @for ($i = date('Y'); $i >= 1900; $i--)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row"  style="padding-top: 20px; ">
                            <label class="col-md-4"> Chọn tỉnh/thành phố <span class="required">*</span></label>
                            <div class=" col-md-8">

                                <select onclick="Main.provinceOption()" name="province_id" class="form-control select2">
                                    @foreach($provinceOption as $key=>$item)
                                        <option value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"  style="padding-top: 20px; ">
                            <label class="col-md-4"> Chọn quận/huyện <span class="required">*</span></label>
                            <div class=" col-md-8">

                                <select disabled onclick="Main.districtOption()" name="district_id" class="form-control select2">
                                    <option value="">Chọn  quận huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"  style="padding-top: 20px; ">
                            <label class="col-md-4"> Chọn Xã/Phường <span class="required">*</span> </label>
                            <div class=" col-md-8">

                                <select disabled name="ward_id" class="form-control select2-single" >
                                    <option value="">Chọn xã phường</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" >
                            <label class="col-md-4"> Số nhà, tên đường  <span class="required">*</span></label>
                            <div class=" col-md-8">

                                <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"></label>
                        <div class="col-lg-8">
                            <button  style="width:auto;"  class="btn btn-warning btn-buynow" ><i class="fa fa-save"></i> Lưu</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('script_after')
    <script src="{{asset('static/main/js/main.js?v='.time())}}"></script>
    <script src="{{asset('js/jquery.validate.min.js?v='.time())}}"></script>
    <script src="{{asset('js/additional-methods.min.js?v='.time())}}"></script>
    <script>
        updateProfile._init();
    </script>
@stop
