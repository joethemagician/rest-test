<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>REST test</title>

    <!-- Bootstrap -->
    <link href="<?= asset('css/app.css') ?>" rel="stylesheet">

  </head>
  <body>

    <div class="container rest-test" ng-app="restTest" ng-controller="personController">

        <div class="page-header">
            <h1>REST test</h1>
        </div>
        
        <div class="panel" ng-repeat="person in people">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <input class="form-control" value="{{ person.first_name }}">
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <input class="form-control" value="{{ person.email }}">
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <input class="form-control" value="{{ person.last_name }}">
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <input class="form-control" value="{{ person.phone }}">
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-danger">Delete</button>

        </div>
        
        <!-- Add new person -->
        <div class="panel">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <input class="form-control" placeholder="First name">
                    </div>
                    <div class="col-xs-6">
                        <input class="form-control" placeholder="Email">
                    </div>
                    <div class="col-xs-6">
                        <input class="form-control" placeholder="Last name">
                    </div>
                    <div class="col-xs-6">
                        <input class="form-control" placeholder="Contact number">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary">+ Add</button>
        </div>

    </div>

    
    <script src="<?= asset('js/app.js') ?>"></script>
  </body>
</html>