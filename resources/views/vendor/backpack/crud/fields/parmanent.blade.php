<!-- field_type_name -->
@include('crud::fields.inc.wrapper_start')
    <label id="hideLable">{!! $field['label'] !!}</label>
    <input type="text" name="{{ $field['name'] }}" id="current_ad" @include('crud::fields.inc.attributes') >

    <div class="fieldwrapper">
        <label>Permanent Address</label>
        <input type="text" name="per_add" @include('crud::fields.inc.attributes')>

        <label>Permanent Post</label>
        <input type="text" name="per_post" @include('crud::fields.inc.attributes')>

        <label>Permanent Dist</label>
        <input type="text" name="per_dist" @include('crud::fields.inc.attributes')>

        <label>Permanent City</label>
        <input type="text" name="per_city" @include('crud::fields.inc.attributes')>

        <label>Permanent State</label>
        <input type="text" name="per_state" @include('crud::fields.inc.attributes')>
    </div>
    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')

@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD EXTRA CSS  --}}
    {{-- push things in the after_styles section --}}
    @push('crud_fields_styles')
    <style type="text/css">
        #current_ad{
            display: none;
        }

        #hideLable{
            display: none;
        }
    </style>
    @endpush

    {{-- FIELD EXTRA JS --}}
    {{-- push things in the after_scripts section --}}
    @push('crud_fields_scripts')
    <script type="text/javascript">
        
         $('.btn-success').click(function(){
            var json = {};
            $('.fieldwrapper').each(function(e){
                // var obj = {};
                address = $(this).find('input[name=per_add]').val();
                post = $(this).find('input[name=per_post]').val();
                dist = $(this).find('input[name=per_dist]').val();
                city = $(this).find('input[name=per_city]').val();
                state = $(this).find('input[name=per_state]').val();
                json = {
                    "address":address,
                    "post":post,
                    "dist":dist,
                    "city":city,
                    "state":state
                };            
            });   
            jsonString = JSON.stringify(json);
            $('#current_ad').val(jsonString);
            console.log(jsonString);
        });
    </script>
    @endpush
@endif