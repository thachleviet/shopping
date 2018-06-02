<div class="col-md-3 product-agileinfo-grid">
    <div class="categories">
        <h3>Danh mục sản phẩm </h3>
        <ul class="tree-list-pad">
            @foreach($categoryMenuLevelOne as $key=>$value)
                <li>
                    <input type="checkbox" checked="checked" id="item-{{$key}}">
                    <label for="item-{{$key}}"><span></span>{{$value['category_name']}}</label>
                   <ul>@foreach($categoryMenuLevelTwo as $key1=>$value1)
                           @if($value1['category_parent_id'] == $value['category_id'])
                               <li><input type="checkbox" checked="checked" id="item-1-{{$key1}}"><label for="item-1-{{$key1}}">{{$value1['category_name']}}</label>
                                   <ul>
                                       @foreach($categoryMenuLevelThree as $key2=>$value2)
                                           @if($value2['category_parent_id'] == $value1['category_id'])
                                               <li><a href="{{route('categorys.list-category', $value2['category_id'])}}">{{$value2['category_name']}}</a></li>
                                           @endif
                                       @endforeach
                                   </ul>
                               </li>
                          @endif
                       @endforeach
                   </ul>
                </li>
             @endforeach
        </ul>
    </div>
    <div class="price">
        <h3>Mức giá</h3>
        <select name="price" id="price" class="price dropdown-menu6 form-control product-filter">
            <option value=""> Chọn mức giá </option>
            <option {{($param['start_price'] == 0) ? 'selected' : ''}} value="{{URL::current().'?sort='.$param['sort'].'&limit='.$param['limit'].'&start_price=0&end_price=500000'}}"> 0đ - 500,000đ </option>
            <option {{(($param['start_price'] == 500000) || ($param['end_price'] == 1000000)) ? 'selected' : ''}} value="{{URL::current().'?sort='.$param['sort'].'&limit='.$param['limit'].'&start_price=500000&end_price=1000000'}}"> 500,000đ  - 1,000,000đ </option>
            <option {{($param['start_price'] == 1000000 || $param['end_price'] == 2000000) ? 'selected' : ''}} value="{{URL::current().'?sort='.$param['sort'].'&limit='.$param['limit'].'&start_price=1000000&end_price=2000000'}}"> 1,000,000đ - 2,000,000đ</option>
            <option {{($param['start_price'] == 2000000 || $param['end_price'] == 'max') ? 'selected' : ''}} value="{{URL::current().'?sort='.$param['sort'].'&limit='.$param['limit'].'&start_price=2000000&end_price=max'}}"> Lớn hơn 2,000,000đ  </option>
        </select>

    </div>
    <div class="cat-img">
        <img class="img-responsive " src="static/images/45.jpg" alt="">
    </div>
</div>