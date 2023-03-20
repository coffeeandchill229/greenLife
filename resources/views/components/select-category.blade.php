@php
    $value = $attributes['category_id'];
@endphp
<div class="form-group mb-2">
    <label class="form-label">Danh mục</label>
    <select name="category_id" id="" class="form-select">
        @foreach ($cats as $item)
        <option value="{{$item->id}}" {{$item->id == $value ? 'selected' : ''}}>{{$item->name}}</option>
        @endforeach
        @error('description')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </select>
</div>