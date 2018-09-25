@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
            <h2>Contactez-nous</h2>
            <p class="text-muted">Si vous rencontrez des problèmes avec ce service, veuillez <a href="{{ config('projet.admin_support_email') }}">demander de l'aide.</a></p>
        
            <form action="{{ route('contact') }}" method="POST">
            {{ csrf_field() }}

                <div class="form-group has-error">
                    <label for="name" class="control-label">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" required="required" value="{{ old('name') }}">
                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required="required" value="{{ old('email') }}">
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="message" class="control-label sr-only">Message</label>
                    <textarea name="message" id="message" rows="10" cols="10" class="form-control" required="required" value="{{ old('message') }}"></textarea>
                    {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group">
                    <button class="btn btn-default-primary btn-block" type="submit">Envoyer</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection 