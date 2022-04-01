@extends('layouts.app')

@section('content')
    <div class="container">

        @if (isset($success) && $success)
            <div class="row container-sm justify-content-center">
                <div class="col-md-auto alert alert-success" role="alert">
                    {{ __('cabinet_form.FeedbackStored') }}
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header alert-info">{{ __('cabinet_form.Title') }}</div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('cabinet.feedbackStore') }}">
                            @csrf
                            {{--Имя клиента--}}
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('cabinet_form.Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('cabinet_form.Phone') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="company" class="col-md-4 col-form-label text-md-end">{{ __('cabinet_form.Company') }}</label>
                                <div class="col-md-6">
                                    <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company">
                                    @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="feedback_title" class="col-md-4 col-form-label text-md-end">{{ __('cabinet_form.FeedbackTitle') }}</label>
                                <div class="col-md-6">
                                    <input id="feedback_title" type="text" class="form-control @error('feedback_title') is-invalid @enderror" name="feedback_title" value="{{ old('feedback_title') }}" required autocomplete="feedback_title">
                                    @error('feedback_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--Сообщение--}}
                            <div class="row mb-3">
                                <label for="feedback_text" class="col-md-4 col-form-label text-md-end">{{ __('cabinet_form.FeedbackText') }}</label>
                                <div class="col-md-6">
                                    <textarea id="feedback_text" class="form-control" @error('feedback_text') is-invalid @enderror name="feedback_text" autocomplete="feedback_text">{{ old('feedback_text') }}</textarea>
                                    @error('feedback_text')
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                             {{--Файл--}}
                            <div class="row mb-3">
                                <label for="file_attach" class="col-md-4 col-form-label text-md-end">{{ __('cabinet_form.FileAttach') }}</label>
                                <div class="col-md-6">
                                    <input id="file_attach" type="file" class="form-control" name="file_attach">
                                    @error('file_attach')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $file_attach }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('cabinet_form.Send') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

            @if (isset($feedbacks) && count($feedbacks)>0)
                <div class="mx-auto my-2 my-sm-3 my-lg-4 p-3">
                    <div class="row container-sm justify-content-center gy-5">
                        <div class="col-md-auto alert alert-info" role="alert">
                            {{ __('cabinet_form.OldFeedbacks') }}
                        </div>
                    </div>
                </div>
            @endif

            @foreach($feedbacks as $feedback)

                <div class="card mb-4">
                    <div class="card-header">
                        {{$feedback->feedback_title}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$feedback->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$feedback->company}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">{{$feedback->phone}}</h6>
                        <p class="card-text">{{$feedback->feedback_text}}</p>
                    </div>
                </div>
            @endforeach
    </div>
@endsection
