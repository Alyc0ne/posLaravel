@extends('Dashboard.index')
@section('content')
<script src="js/system/IC/Goods/Goods.js"></script>
<div class="block-content">
    <input type="hidden" id='SystemName' value='{{ $SystemName }}'>
    <div class='block-menu' style="border-bottom:none;">
        <div class='row'>
            <div class="col-md-12 col-lg-6 d-flex"> 
               {{-- //// --}}
            </div>
            <div class="col-md-12 col-lg-6 d-inline-flex flex-wrap justify-content-lg-end">
                <div class="col-9 p_lr0">
                    <input type="text" class="form-control" id="frmGoods-Search" placeholder="Not Ready" disabled>
                </div>
                
                <div class="col-3 p_lr0">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle w_100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                            Filter Search Button
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <select name="" id="">
                                <option value="">1</option>
                                <option value="">2</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m_a0 bordered-box table-scoller">
        <table class="table" style="margin-bottom:0px;">
            <thead style="background-color:#fafafa;">
                <tr>
                    <th class="w_10">รหัสสินค้า</th>
                    <th class="w_60">ชื่อสินค้า</th>
                    <th class='w_20 text-right'>ราคาสินค้า</th>
                    <th class='w_10' style="text-align:center;">#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Goods as $_Goods)
                    <tr>
                        <td scope="row">{{ $_Goods->GoodsID }}</td>
                        <td>{{ $_Goods->GoodsName }}</td>
                        <td class="text-right">{{ number_format($_Goods->GoodsPrice,2) }}</td>
                        <td style="text-align:center;"><button class="btn btn-default p_a0"><i class="fas fa-edit"></i></button><button class="btn btn-default p_a0"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
            {!! $Goods->links() !!}
    </div>
</div>
@endsection
<div class='ExtendsModal'>
    @extends('Shared.Modal.Goods.AddGoods')
</div>