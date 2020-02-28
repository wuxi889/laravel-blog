<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js" defer></script>

<div class="form-group row">
    <label for="title" class="col-md-3 col-form-label">
        标题
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="title" id="title" value="{{ $data['title'] }}">
    </div>
</div>

<div class="form-group row">
    <label for="subtitle" class="col-md-3 col-form-label">
        作者
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="author" id="author" value="{{ $data['author'] }}">
    </div>
</div>

<div class="form-group row">
    <label for="original" class="col-md-3 col-form-label">
        是否原创
    </label>
    <div class="col-md-8">
        <div class="radio">
        <label class="radio-inline">
            <input type="radio" name="original" value="0" id="not_original" @if (!$data['original']) checked @endif /> 否
        </label>
        
        <label class="radio-inline">
            <input type="radio" name="original" value="1" id="is_original" @if ($data['original']) checked @endif /> 是
        </label>
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-md-3 col-form-label">
        描述信息
    </label>
    <div class="col-md-8">
        <textarea class="form-control" id="description" name="description" rows="3">{{ $data['description'] }}</textarea>
    </div>
</div>

<div class="form-group row">
    <label for="category_id" class="col-md-3 col-form-label">
        分类
    </label>
    <div class="col-md-8">
        <select name="category_id" class="form-control">
            <option value="0" @if ($data['category_id'] == 0) selected @endif>无</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if ($data['category_id'] == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="tags" class="col-md-3 col-form-label">
        标签
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="tags" id="tags" value="{{ $data['tags'] ?? '' }}">
        标签之间使用空格分隔
    </div>
</div>

<div class="form-group row">
    <label for="content" class="col-md-3 col-form-label">
        文章内容
    </label>
    <div class="col-md-8">
        <textarea class="form-control" id="summernote" name="content" rows="15">{{ $data['content'] ?? '' }}</textarea>
    </div>
</div>
<script>
    $(function () {
        $('#summernote').summernote({
            minHeight: 300,
            height: 300,
            maxHeight: 600,
        });
    });
</script>