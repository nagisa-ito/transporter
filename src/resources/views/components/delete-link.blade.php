{{
    Form::open([
        'method' => 'DELETE',
        'route' => ["{$table}.destroy", $id],
        'class' => $div,
        'onsubmit' => "return confirmDelete('{$name}')"
    ])
}}
    @csrf
    @method('DELETE')
    <button type="submit" class="{{ $class }}">
        <i class="fas fa-trash-alt"></i>
    </button>
{{ Form::close() }}
