@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
            <h2>Contactez-nous</h2>
            <p class="text-muted">Si vous rencontrez des problèmes avec ce service, veuillez <a href="mailto:ask@outlok.com">demander de l'aide.</a></p>
        
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="name" class="control-label">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" required="required">
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required="required">
                </div>
            </form>

        </div>
    </div>
</div>

@endsection 