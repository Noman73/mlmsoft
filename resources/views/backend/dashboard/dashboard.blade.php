
@extends('layouts.admin.master')
@section('content')
<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Hello, <span>Welcome Here</span></h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Form-Basic</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>
<section id="main-content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-title">
                    <h4>Input Style</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form>
                            <div class="form-group">
                                <p class="text-muted m-b-15 f-s-12">Use the input classes on an <code>input-default</code> for Default input.</p>
                                <input type="text" class="form-control input-default " placeholder="Input Default">
                            </div>
                            <div class="form-group">
                                <p class="text-muted m-b-15 f-s-12">Use the input classes on an <code>input-flat</code> for flat input.</p>
                                <input type="text" class="form-control input-flat" placeholder="Input Flat ">
                            </div>
                            <div class="form-group">
                                <p class="text-muted m-b-15 f-s-12">Use the input classes on an <code>input-rounded</code> for rounded input.</p>
                                <input type="text" class="form-control input-rounded" placeholder="Input Rounded">
                            </div>
                            <div class="form-group">
                                <p class="text-muted m-b-15 f-s-12">Use the input classes on an <code>input-focus</code> for focus input.</p>
                                <input type="text" class="form-control input-focus" placeholder="Input Focus">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
