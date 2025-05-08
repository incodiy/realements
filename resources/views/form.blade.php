@if($formConfig)
<form method="{{ $formConfig['method'] }}" action="{{ $formConfig['action'] }}" enctype="{{ $formConfig['enctype'] }}" {!! implode(' ', array_map(function($value, $key) { return $key . '="' . $value . '"'; }, $formConfig['attributes'], array_keys($formConfig['attributes']))) !!}>
@endif

<div id="realements-form"></div>

@if($formConfig && ($formConfig['submitButton'] ?? true))
    <button type="submit" class="{{ $formConfig['buttonConfig']['class'] ?? 'btn btn-primary' }}">
        {{ $formConfig['buttonConfig']['text'] ?? 'Submit' }}
    </button>
@endif

@if($formConfig)
</form>
@endif

<script>
    window.realementsData = {
        elements: @json($elements),
        formConfig: @json($formConfig)
    };
</script>