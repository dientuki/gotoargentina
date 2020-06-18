@foreach ($languages as $language)
  <?php $packageLanguage = $packageTranslation->firstWhere('fk_language', $language->id); ?>
  @if ($packageLanguage != null )
    <fieldset class="sticky-wrapper">
        <h2 class="sticky-head">{{ $language->language }}</h2>

        <div class="form-group">
            <?php $class = $errors->has('name_' . $language->id) != null ? 'form-control is-invalid' : 'form-control'; ?>
            {!! Form::label('name_' . $language->id, ucfirst(__('fields.name'))) !!}
            {!! Form::text('name_' . $language->id, $packageLanguage->name, array('placeholder' => ucfirst(__('fields.name')),
            'class'=>$class, 'required'=>true, 'maxlength' => 190)) !!}
            @error('name_' . $language->id)
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <div class="form-group">
            <?php $class = $errors->has('summary_' . $language->id) != null ? 'form-control is-invalid' : 'form-control'; ?>
            {!! Form::label('summary_' . $language->id, ucfirst(__('fields.summary'))) !!}
            {!! Form::textarea('summary_' . $language->id, $packageLanguage->summary, array('placeholder' => ucfirst(__('fields.summary')),
            'class'=>$class, 'required'=>true)) !!}
            @error('summary_' . $language->id)
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <div class="form-group">
            <?php $class = $errors->has('body_' . $language->id) != null ? 'draftjs is-invalid' : 'draftjs'; ?>
            {!! Form::label('body_' . $language->id, ucfirst(__('fields.body'))) !!}
            <div class="relative">
              {!! Form::text('body_' . $language->id, $packageLanguage->body, array('class'=>'below-draft', 'required'=>true)) !!}
              <div class="{{ $class }}" data-field="body_{{$language->id}}"></div>
            </div>
            @error('body_' . $language->id)
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        {!! Form::hidden('fk_language_' . $language->id, $language->id) !!}
    </fieldset>
  @endif
@endforeach