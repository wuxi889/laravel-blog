<div class="form-group row">
    <label for="name" class="col-md-3 col-form-label">
        评论者IP
    </label>
    <div class="col-md-8">
        <label class="col-form-label">{{ $data['ip'] }}</label>
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-md-3 col-form-label">
        评论内容
    </label>
    <div class="col-md-8">
        <textarea class="form-control" rows="8" style="resize:none" disabled>{{ $data['comment'] }}</textarea>
    </div>
</div>

<div class="form-group row">
    <label for="original" class="col-md-3 col-form-label">
        审核状态
    </label>
    <div class="col-md-8">
        <div class="radio">
            <label class="radio-inline">
                <input type="radio" name="status" value="0" @if (!$data['status']) checked @endif /> 未审核
            </label>
            
            <label class="radio-inline">
                <input type="radio" name="status" value="1" @if ($data['status'] == 1) checked @endif /> 通过
            </label>
            
            <label class="radio-inline">
                <input type="radio" name="status" value="2" @if ($data['status'] == 2) checked @endif /> 拒绝
            </label>
        </div>
    </div>
</div>