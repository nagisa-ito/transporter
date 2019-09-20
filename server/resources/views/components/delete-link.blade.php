{{
    Form::open([
        'method' => 'DELETE',
        'route' => ["{$table}.destroy", $id],
        'class' => 'card-footer-item',
        'onsubmit' => "return confirmDelete('{$name}')"
    ])
}}
    @csrf
    @method('DELETE')
    <button type="submit" class="button is-link is-inverted">
        <i class="fas fa-trash-alt"></i>
    </button>
{{ Form::close() }}
