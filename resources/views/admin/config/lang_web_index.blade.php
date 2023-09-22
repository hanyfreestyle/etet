@extends('admin.layouts.app')

@section('content')
    @php
        if(isset($_GET['id'])){
            $selId = $_GET['id'];
        }else{
            $selId = "";
        }
    @endphp

    <div class="content-header">
        <div class="container-fluid">

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12" >

                <x-ui-card title="{{ __('admin/menu.lang_file_web') }}" >

                    <x-mass.confirm-massage/>
                    <form action="">
                        <x-form-select-arr  name="selectfile" :sendvalue="$selId" label="{{__('admin/config/admin.lang_select_file')}}" :send-arr="config('adminLangFile.webFile')" />
                    </form>

                    @if($ViewData == 1)
                        @if(isset($_GET['id']))
                            <form action="{{route('weblang.updateFile')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$_GET['id']}}" name="file_id">

                                <hr>
                                @php
                                    $index = 1 ;
                                @endphp

                                @foreach($mergeData as $key=>$val)

                                    <div class="row">

                                        <div class="col-3">
                                            @if(config('app.development'))
                                                <input type="text" class="form-control dir_en"  value="{{$key}}" name="key[]"  >
                                            @else
                                                <div class="text-left font-weight-bold pt-2">{{$key}}</div>
                                                <input type="hidden" class="form-control dir_en"  value="{{$key}}" name="key[]"  >
                                            @endif
                                        </div>

                                        @foreach(config('app.lang_file') as $langkey=>$lang )
                                            <div class="col-4">
                                                <textarea  name="{{$langkey}}[]" class="form-control @if($langkey == 'en') dir_en @endif">{!! AdminHelper::arrIsset($allData[$langkey],$key,"") !!}</textarea>
{{--                                                <input type="text" class="form-control @if($langkey == 'en') dir_en @endif" value="{!! AdminHelper::arrIsset($allData[$langkey],$key,"") !!}" name="{{$langkey}}[]" >--}}
                                            </div>
                                        @endforeach

                                        <div class="col-1">
                                            <a href="#" thisid="custmid_{{$index}}" class="btn btn-sm btn-primary copyThisText"><i class="fa fas fa-copy"></i></a>
                                            <input value="__('{{$prefixCopy.$key}}')" id="custmid_{{$index}}" type="hidden">
                                        </div>
                                    </div>
                                    <hr>
                                    @php
                                        $index++
                                    @endphp

                                @endforeach


                                @if(config('app.development'))
                                    <div id="newinput"></div>
                                    <div class="row">
                                        <button id="rowAdder" type="button" class="btn btn-dark">{{__('admin/config/admin.lang_add_new_key')}}</button>
                                    </div>
                                @endif


                                @can('weblang_edit')
                                    <hr>
                                    <x-form-submit text="Update" />
                                @endcan

                            </form>
                        @endif
                    @endif




                </x-ui-card>
            </div>
        </div>
    </div>

@endsection

@push('JsCode')

    <script type="text/javascript">
        $("#rowAdder").click(function () {
            newRowAdd =
                '<div id="row" class="row">' +
                '<div class="col-3"><input type="text" class="form-control dir_en" value="" name="key[]"></div>' +
                '<div class="col-4"><textarea type="text" class="form-control dir_ar" value="" name="ar[]"></textarea></div>' +
                '<div class="col-4"><textarea type="text" class="form-control dir_en" value="" name="en[]"></textarea></div>' +
                '<div class="col-1"><button class="btn btn-danger" id="DeleteRow" type="button"><i class="fas fa-trash"></i></button></div>' +
                '<div class="row col-12"> <hr/> </div>'+
                '</div>';
            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    </script>

    <script>
        jQuery(document).ready(function($) {
            $('.copyThisText').on('click', function(e) {
                e.preventDefault();
                var inputId = $(this).attr('thisid');
                // alert(inputId);

                /* Get the text field */
                var copyText = document.getElementById(inputId);

                /* Prevent iOS keyboard from opening */
                copyText.readOnly = true;

                /* Change the input's type to text so its text becomes selectable */
                copyText.type = 'text';

                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                navigator.clipboard.writeText(copyText.value);

                /* Change the input's type back to hidden */
                copyText.type = 'hidden';
            });


        });
    </script>
    <script>
        $('#selectfile').change(function() {
            var idSel =  this.value;
            idSel = parseInt(idSel);
            if(idSel > 0){
                window.location = "{{ route('weblang.index','id=') }}"+idSel;
            }
            ///alert(idSel);

        });
    </script>
@endpush
