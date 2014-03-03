<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Cyber Range</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/app.css"/>
        <script src="js/vendor/modernizr.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.6/angular.min.js"></script>
        <script src="js/app.js"></script>

    </head>
    <body ng-app="cyberrange">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <form action="server.php" method="post" name="form" ng-controller="formCtrl">
            <fieldset>
                <legend>Contact</legend>
                <label for="first">First Name</label>
                <input id="first" name="first" required ng-model="participant.first" ng-pattern="/^\w+$/" type="text">
                <span class="error" ng-show="form.first.$error.required">*</span>
                <span class="error" ng-show="form.first.$error.pattern">Only Letters Allowed!</span>

                <label for="last">Last Name</label>
                <input id="last" name="last" required ng-model="participant.last" ng-pattern="/^\w+$/" type="text">
                <span class="error" ng-show="form.last.$error.required">*</span>
                <span class="error" ng-show="form.last.$error.pattern">Only Letters Allowed!</span>

                <label for="phone">Phone</label>
                <input id="phone" class="input" name="phone" required ng-model="participant.phone" ng-pattern="/\d+/" ng-minlength="10" ng-maxlength="10" placeholder="8081231234" required type="tel"/>
                <span class="error" ng-show="form.phone.$error.required">*</span>
                <span class="error" ng-show="form.phone.$error.pattern">Invalid Phone Number: only numbers allowed.</span>
                <span class="error" ng-show="form.phone.$error.minlength">Invalid Phone Number: Please input as 10-digit number.</span>
                <span class="error" ng-show="form.phone.$error.maxlength">Invalid Phone Number: Please input as 10-digit number.</span>

                <label for="email">Email</label>
                <input id="email" name="email" ng-model='participant.email' required type="email">
                <span class="error" ng-show="form.email.$error.required">*</span>
                <span class="error" ng-show="form.email.$error.email">Invalid Email</span>

                <label for="work">Company / Organization</label>
                <input id="work" name="work" ng-model='participant.work' ng-pattern="/[^\w\s]/" required type="text">
                <span class="error" ng-show="form.work.$error.required">*</span>
                <span class="error" ng-show="!form.work.$error.pattern">Only letters and numbers please.</span>

                </br>
                <span class="notification">Military personnel will be asked to fill out a form at the event</span>

            </fieldset>
            <fieldset>
                <legend>Team</legend>
                <label for="captain">Team Captain</label>
                <input id="captain" name="captain" ng-model='participant.captain' ng-pattern="/[^\w\s]/" required type="text">
                <span class="error" ng-show="form.captain.$error.required">*</span>
                <span class="error" ng-hide="form.captain.$error.pattern">Only letters and numbers please.</span>

                <label for="cocaptain">Team Co-Captain</label>
                <input id="cocaptain" name="cocaptain" ng-model='participant.cocaptain' ng-pattern="[^\w\s]" type="text">
                <span class="error" ng-hide="form.cocaptain.$error.pattern">Only letters and numbers please.</span>

            </fieldset>
            <fieldset>
                <legend>Background</legend>
                <label for="rating">On a scale of 1-10, How would you rate your knowledge of Information Technology? (10 being excellent)</label>
                <input id="rating" max="10" min="1" name="rating" type="range">

                <label for="insight">Describe your current knowledge of Information Technology (i.e. unix/linux, sql, languages, current postion, etc.)</label>
                <textarea id="insight" ng-model="participant.insight" ng-pattern="/[^\w\s\.,]/" name="insight"></textarea>
                <span class="error" ng-hide="form.insight.$error.pattern"> Invalid input: please only use letters, numbers, commas and periods.</span>

                <label for="comments">Comments</label>
                <textarea id="comments" name="comments" ng-model="participant.comments" ng-pattern="/[^\w\s,.]"></textarea>
                <span class="error" ng-hide="form.comments.$error.pattern"> Invalid input: please only use letters, numbers, commas and periods.</span>

            </fieldset>
            <input type="submit" value="submit">
        </form>
    </body>
</html>