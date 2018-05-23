<div id="block_top_menu" class="sf-contener col-sm-10 clearfix ">
    <div class="cat-title"><i class="fa fa-bars"></i> Menu </div>
    <ul class="sf-menu clearfix menu-content">
        @foreach($categoryMenuLevelOne as $key=>$value)
               @if($value['category_parent_id']==0)
                     <li><a href="#" title="ao nam">{{$value['category_name']}}</a>
                         @if($value['category_type'] !=='new')
                             <?php
                                $class = new Constants();
                                $count = $class->checkExitEIdCategory($value['category_id'])
                             ?>
                            @if($count >0 )
                                <ul>
                            @endif
                                 @foreach($categoryMenuLevelTwo as $key1=>$value1)
                                     @if($value1['category_parent_id'] == $value['category_id'])
                                         <li>
                                             <a href="#" title="ao so mi nam han quoc">{{$value1['category_name']}}</a>
                                             <ul>
                                                 @foreach($categoryMenuLevelThree as $key2=>$value2)
                                                     @if($value2['category_parent_id'] == $value1['category_id'])
                                                         <li><a href="#" title="ao so mi nam han quoc">{{$value2['category_name']}}</a></li>
                                                     @endif
                                                 @endforeach
                                             </ul>
                                         </li>
                                     @endif
                                 @endforeach
                             @if($count >0 )
                                 </ul>
                             @endif
                         @endif
                     </li>
               @endif
        @endforeach
    </ul>
</div>