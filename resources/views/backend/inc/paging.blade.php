<div class="row">
    <div class="col-sm-5">
        <ul class="pagination">
            <li>Đang xem {{ $_object->firstItem() }} đến {{ $_object->lastItem() }} trong  tổng số {{ $_object->total() }}</li>
        </ul>
    </div>
    <div class="col-sm-7 text-right">
        {{$object->appends($_param)->links()}}
    </div>
</div>