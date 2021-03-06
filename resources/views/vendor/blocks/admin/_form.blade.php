@push('js')
    <script src="{{ asset('components/ckeditor/ckeditor.js') }}"></script>
@endpush

@component('core::admin._buttons-form', ['model' => $model])
@endcomponent

<filepicker related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></filepicker>

{!! BootForm::hidden('id') !!}

{!! BootForm::text(__('Name'), 'name')->required() !!}

<div class="form-group">
    {!! TranslatableBootForm::hidden('status')->value(0) !!}
    {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
</div>
{!! TranslatableBootForm::textarea(__('Body'), 'body')->addClass('ckeditor') !!}

</div>
