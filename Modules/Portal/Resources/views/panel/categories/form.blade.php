@extends('admin::layouts.default')
@section('admin::main')
    <div class="page-content__top">
        <div class="container-fluid page-content__top-content">
            <div class="page-content__top-details">
                <a href="{{ build_crud_route('index') }}" class="return-back"><i
                        class="fas fa-long-arrow-alt-left"></i> Offers</a>
                @if($item->id)
                    <h2 class="font-weight-bold">{{ $item->name }}</h2>
                @else
                    <h2>@module_lang('title.type.' . get_current_method())</h2>
                @endif
            </div>
            <div class="page-content__top-buttons d-flex">
                @if(isset($edit) && $edit == 1)
                    <button type="submit" class="btn btn--delete" form="offerCategoryForm">@lang('admin::main.delete')</button>
                    <button type="submit" class="btn btn--edit" form="offerCategoryForm">@lang('admin::main.update')</button>
                @elseif(!$item->id)
                    <button type="submit" class="btn btn--create" form="offerCategoryForm">@lang('admin::main.save')</button>
                @else
                    <a class="btn btn--edit" href="{{ build_crud_route('edit', $item) }}">@lang('admin::main.edit')</a>
                @endif
            </div>
        </div>
    </div>
    <div class="page-content__container">
        <div class="container-fluid">
            <div class="card card-custom">
                <div class="card-header card-tabs">
                    <div class="card-title card-columns">
                        <ul class="nav nav-pills h-100" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#general"
                                   role="tab"
                                   aria-controls="pills-general" aria-selected="true">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-content-tab" data-toggle="pill" href="#content"
                                   role="tab"
                                   aria-controls="pills-content" aria-selected="true">Content</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{!! \Session::get('success') !!}</p>
                        </div>
                    @endif
                    {!! form_start($form, ['id' => 'offerCategoryForm', 'files' => true]) !!}
                    <div class="container-fluid">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="general" role="tabpanel"
                                 aria-labelledby="pills-general-tab">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        {!! form_row($form->name) !!}
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        {!! form_row($form->image) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        {!! form_row($form->active) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="content" role="tabpanel"
                                 aria-labelledby="pills-content-tab">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        {!! form_row($form->short_content) !!}
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        {!! form_row($form->content) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! form_end($form, false) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
