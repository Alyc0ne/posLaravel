<div class="row m_a0 bordered-box table-scoller">
    <table class="table" style="margin-bottom:0px;">
        <thead style="background-color:#fafafa;">
            <tr>
                <th class="w_10">รหัสหน่วยนับ</th>
                <th class="w_60">ชื่อหน่วยนับ</th>
                <th class='w_10' style="text-align:center;">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Unit as $_Unit)
                <tr>
                    <td scope="row">{{ $_Unit->UnitNo }}</td>
                    <td>{{ $_Unit->UnitName }}</td>
                    <td style="text-align:center;"><button class="btn btn-default p_a0"><i class="fas fa-edit"></i></button><button class="btn btn-default p_a0"><i class="fas fa-trash-alt"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    {!! $Unit->links() !!}
</div>